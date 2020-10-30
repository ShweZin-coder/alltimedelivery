@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage Restaurant Type
@endsection
@section('content')
@if(Session::has('restauranttype_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('restauranttype_added')}}
  </div>
 @endif
 @if(Session::has('restauranttype_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('restauranttype_updated')}}
  </div>
 @endif
<!----------------Adding Restaurant Type-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addrestauranttype">Add Restaurant Type</button>
<div class="modal fade" id="addrestauranttype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Restaurant Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('restauranttype.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
          <div class="form-group">
    <label for="statusname">Restaurant Type Name</label>
    <input type="text" class="form-control" id="restauranttypename" name="restauranttypename" placeholder="Enter Restaurant Type Name" required>
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
<!-------------------Edit Restaurant Type-------------------->
<div class="modal fade" id="editrestauranttype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('restauranttype.update')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Restaurant Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
    <label for="editrestauranttypename">Edit Restaurant Type Name</label>
    <input type="text" class="form-control" id="editrestauranttypename" name="restauranttypename">
    <input type="hidden" class="form-control" id="restauranttypeid" name="id">
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
      <th scope="col">Restaurant Type Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($restauranttypes as $restauranttype)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row">{{$restauranttype->restauranttypename}}</td>
      <td><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$restauranttype->restauranttypeid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$restauranttype->restauranttypeid}}">Delete</button></td>
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
            url:"{{ route('restauranttype.editrestauranttype') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editrestauranttype').modal('show');
                $('#restauranttypeid').val(data.restauranttypeid);
                $('#editrestauranttypename').val(data.restauranttypename);
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
                url:"{{ route('restauranttype.delete')}}",
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