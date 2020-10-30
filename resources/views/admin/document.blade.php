@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage document
@endsection
@section('content')
@if(Session::has('document_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('document_added')}}
  </div>
 @endif
 @if(Session::has('document_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('document_updated')}}
  </div>
 @endif
<!----------------Adding Status-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#adddocument">Add Document</button>
<div class="modal fade" id="adddocument" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('document.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
          <div class="form-group">
    <label for="documentname">Document Name</label>
    <input type="text" class="form-control" id="documentname" name="documentname" placeholder="Enter Document Name" required>
  </div>
   <div class="form-group">
    <label for="statusid">Manage Status</label><br>
      @foreach ($statuses as $status)
  <input type="radio" id="statusid" name="statusid" value="{{$status->statusid}}" required>
  <label for="statusid">{{$status->statusname}}</label>
  @endforeach
  </div>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-------------------Edit Document-------------------->
<div class="modal fade" id="editdocument" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('document.update')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Document</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
    <label for="editdocumentname">Edit Document Name</label>
    <input type="text" class="form-control" id="editdocumentname" name="documentname">
    <input type="hidden" class="form-control" id="documentid" name="id">
    <input type="hidden" class="form-control" id="editstatusid" name="editstatusid">
     <label for="statusid">Manage Status</label><br>
      @foreach ($statuses as $status)
  <input type="radio" id="{{$status->statusid}}" name="statusid" value="{{$status->statusid}}">
  <label for="statusid">{{$status->statusname}}</label>
  @endforeach
  </div>
</div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
   </form>
</div>
  </div>
</div>
<!--------------Data Table------>
<table class="table table-bordered table-hover text-center" id="myTable">
  <thead class="bg-primary" style="color:white;">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Document Name</th>
      <th scope="col">Status Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($documents as $document)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row">{{$document->documentname}}</td>
      <td scope="row">{{$document->statusname}}</td>
      <td><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$document->documentid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$document->documentid}}">Delete</button></td>
   <?php $i++; ?>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
  $(document).on('click', '.editbtn', function(){
        var _token = $('input[name="_token"]').val();
        var id = $(this).attr("id");
        $.ajax({
            url:"{{ route('document.editdocument') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editdocument').modal('show');
                $('#documentid').val(data.documentid);
                $('#editdocumentname').val(data.documentname);
                $('#editstatusid').val(data.statusid);
                var statusid = $('#editstatusid').val();
                document.getElementById(statusid).checked=true;
               
              }
               
        });
     });
  $(document).on('click','.delete', function(){
       var _token = $('input[name="_token"]').val();
        var id = $(this).attr("id");
        $('#deletebox').modal('show');
      $(document).on('click','#btnyes',function(){
            $('#deletebox').modal('hide');
           $.ajax({
                url:"{{ route('document.delete')}}",
                method:"post",
                data:{id:id,_token:_token},
                success:function(data)
                {
                     $("#deletealert").modal('show');
                     $("#myTable").load(window.location + " #myTable");
                  
                }
            });
      });
      $(document).on('click','#btnno',function()
      {
          $("#deletebox").modal('hide');
      })
    });
    </script>
@endsection
