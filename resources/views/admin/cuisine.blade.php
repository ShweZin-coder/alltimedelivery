@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage Cuisine
@endsection
@section('content')
@if(Session::has('cuisine_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('cuisine_added')}}
  </div>
 @endif
 @if(Session::has('cuisine_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('cuisine_updated')}}
  </div>
 @endif
<!----------------Adding Cuisine-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addcuisine">Add Cuisine</button>
<div class="modal fade" id="addcuisine" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Cuisine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('cuisine.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
          <div class="form-group">
    <label for="cuisinename">Cuisine Name</label>
    <input type="text" class="form-control" id="cuisinename" name="cuisinename" placeholder="Enter Cuisine Name" required>
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
<!-------------------Edit Cuisine-------------------->
<div class="modal fade" id="editcuisine" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('cuisine.update')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Cuisine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
    <label for="editcategoryname">Edit Cuisine Name</label>
    <input type="text" class="form-control" id="editcuisinename" name="cuisinename">
    <input type="hidden" class="form-control" id="cuisineid" name="id">
  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
   </form>
</div>
  </div>
</div>
<!-----------------Delete Cusisine-------------------->
<div class="modal fade" id="deletecuisine" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: orange;color:white;">
        <h1 class="modal-title"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></h1>
        
      </div>
      <div class="modal-body">
             <h3 class="text-center">Are you sure?</h3>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-default" id="btnno">No</button>
        <button type="submit" class="btn btn-primary" id="btnyes">Yes</button>
      </div>
</div>
  </div>
</div>
<!-----------------Alert Box------------------------>
<div class="modal fade" id="deletealert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: orange;color:white;font-size:12px;">
           <h3>Information</h3>  
      </div>
      <div class="modal-body" style="font-size:12px;">
             <h3 class="text-center"><i class="fa fa-check-circle" aria-hidden="true" style="color:green;size:100px;margin:5px;"></i>Delete Successfully</h3>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
</div>
  </div>
</div>
<!--------------Data Table------>
<table class="table table-bordered table-hover text-center" id="myTable">
  <thead class="bg-primary" style="color:white;">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cuisine Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($cuisines as $cuisine)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row">{{$cuisine->cuisinename}}</td>
      <td><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$cuisine->cuisineid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$cuisine->cuisineid}}">Delete</button></td>
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
            url:"{{ route('cuisine.editcuisine') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editcuisine').modal('show');
                $('#cuisineid').val(data.cuisineid);
                $('#editcuisinename').val(data.cuisinename);
            }
        });
     });
  $(document).on('click','.delete', function(){
       var _token = $('input[name="_token"]').val();
        var id = $(this).attr("id");
        $('#deletecuisine').modal('show');
      $(document).on('click','#btnyes',function(){
            $('#deletecuisine').modal('hide');
           $.ajax({
                url:"{{ route('cuisine.deletecuisine')}}",
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
          $("#deletecuisine").modal('hide');
      })
    });
    </script>
@endsection