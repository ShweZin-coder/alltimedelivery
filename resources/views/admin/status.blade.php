@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage Status
@endsection
@section('content')
@if(Session::has('status_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('status_added')}}
  </div>
 @endif
 @if(Session::has('status_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('status_updated')}}
  </div>
 @endif
<!----------------Adding Status-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addstatus">Add Status</button>
<div class="modal fade" id="addstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('status.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
          <div class="form-group">
    <label for="statusname">Status Name</label>
    <input type="text" class="form-control" id="statusname" name="statusname" placeholder="Enter Status Name" required>
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
<!-------------------Edit Status-------------------->
<div class="modal fade" id="editstatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('status.update')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
    <label for="editstatusname">Edit Status Name</label>
    <input type="text" class="form-control" id="editstatusname" name="statusname">
    <input type="hidden" class="form-control" id="statusid" name="id">
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
      <th scope="col">Status Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($statuses as $status)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row">{{$status->statusname}}</td>
      <td><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$status->statusid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$status->statusid}}">Delete</button></td>
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
            url:"{{ route('status.editstatus') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editstatus').modal('show');
                $('#statusid').val(data.statusid);
                $('#editstatusname').val(data.statusname);
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
                url:"{{ route('status.delete')}}",
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