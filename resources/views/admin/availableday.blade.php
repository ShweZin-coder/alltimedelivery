@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage Availableday
@endsection
@section('content')
@if(Session::has('availableday_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('availableday_added')}}
  </div>
 @endif
 @if(Session::has('availableday_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('availableday_updated')}}
  </div>
 @endif
<!----------------Adding Availableday-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addavailableday">Add Availableday</button>
<div class="modal fade" id="addavailableday" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Availableday</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('availableday.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
          <div class="form-group">
    <label for="statusname">Available Name</label>
    <input type="text" class="form-control" id="availablename" name="availablename" placeholder="Enter Available Name" required>
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
<!-------------------Edit AvailableDay-------------------->
<div class="modal fade" id="editavailableday" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('availableday.update')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Availableday</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
    <label for="editavailableday">Edit Available Name</label>
    <input type="text" class="form-control" id="editavailabledayname" name="editavailabledayname">
    <input type="hidden" class="form-control" id="availabledayid" name="id">
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
      <th scope="col">Availableday Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($availabledays as $availableday)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row">{{$availableday->availabledayname}}</td>
      <td><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$availableday->availabledayid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$availableday->availabledayid}}">Delete</button></td>
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
            url:"{{ route('availableday.editavailableday') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editavailableday').modal('show');
                $('#availabledayid').val(data.availabledayid);
                $('#editavailabledayname').val(data.availabledayname);
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
                url:"{{ route('availableday.delete')}}",
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