@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage Discount Type
@endsection
@section('content')
@if(Session::has('discounttype_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('discounttype_added')}}
  </div>
 @endif
 @if(Session::has('discounttype_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('discounttype_updated')}}
  </div>
 @endif
<!----------------Adding Discount Type-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#adddiscounttype">Add Discount Type</button>
<div class="modal fade" id="adddiscounttype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Discounttype</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('discounttype.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
          <div class="form-group">
    <label for="statusname">Discount Type Name</label>
    <input type="text" class="form-control" id="discounttypename" name="discounttypename" placeholder="Enter Discount Type Name" required>
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
<!-------------------Edit Discount Type-------------------->
<div class="modal fade" id="editdiscounttype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('discounttype.update')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Discount Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
    <label for="editdiscounttypename">Edit Discount Type Name</label>
    <input type="text" class="form-control" id="editdiscounttypename" name="discounttypename">
    <input type="hidden" class="form-control" id="discounttypeid" name="id">
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
      <th scope="col">Discount Type Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($discounttypes as $discounttype)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row">{{$discounttype->discounttypename}}</td>
      <td><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$discounttype->discounttypeid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$discounttype->discounttypeid}}">Delete</button></td>
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
            url:"{{ route('discounttype.editdiscounttype') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editdiscounttype').modal('show');
                $('#discounttypeid').val(data.discounttypeid);
                $('#editdiscounttypename').val(data.discounttypename);
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
                url:"{{ route('discounttype.delete')}}",
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