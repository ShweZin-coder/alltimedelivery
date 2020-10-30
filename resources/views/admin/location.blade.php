@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage Location
@endsection
@section('content')
@if(Session::has('location_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('location_added')}}
  </div>
 @endif
 @if(Session::has('location_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('location_updated')}}
  </div>
 @endif
<!----------------Adding Location-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addlocation">Add Location</button>
<div class="modal fade" id="addlocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('location.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
          <div class="form-group">
    <label for="locationname">Location Name</label>
    <input type="text" class="form-control" id="locationname" name="locationname" placeholder="Enter Location Name" required>
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
<!-------------------Edit Location-------------------->
<div class="modal fade" id="editlocation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('location.update')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Location</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
    <label for="editcurrentstatename">Edit Location Name</label>
    <input type="text" class="form-control" id="editlocationname" name="locationname">
    <input type="hidden" class="form-control" id="locationid" name="id">
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
      <th scope="col">Location Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($locations as $location)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row">{{$location->locationname}}</td>
      <td><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$location->locationid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$location->locationid}}">Delete</button>
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
            url:"{{ route('location.editlocation') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editlocation').modal('show');
                $('#locationid').val(data.locationid);
                $('#editlocationname').val(data.locationname);
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
                url:"{{ route('location.delete')}}",
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