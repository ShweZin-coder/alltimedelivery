@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage Restaurant
@endsection
@section('content')
@if(Session::has('restaurant_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('restaurant_added')}}
  </div>
 @endif
 @if(Session::has('restaurant_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('restaurant_updated')}}
  </div>
 @endif
 <style type="text/css">
   .dropdown-item:hover{
    color:white bolder;
   }
 </style>
<!----------------Adding Restaurant-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addrestaurant">Add Restaurant</button>
<div class="modal fade" id="addrestaurant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Restaurant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('restaurant.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="form-group">
           <div class="image-upload-wrap">
    <input class="file-upload-input" type='file' name="file" onchange="readURL(this);" accept="image/*" />
     <h3>Add Restaurant Logo</h3>
    <div class="drag-text">
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" id="editrestaurantlogo" src="" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
    </div>
  </div>
        </div>
          <div class="form-group">
    <label for="restaurantname">Restaurant Name</label>
    <input type="text" class="form-control" id="restaurantname" name="restaurantname" placeholder="Enter Restaurant Name" required>
  </div>
     <div class="form-group">
    <label for="restaurantemail">Restaurant Email</label>
    <input type="email" class="form-control" id="restaurantemail" name="restaurantemail" placeholder="Enter Restaurant Email" required>
  </div>
  <div class="form-group">
    <label for="restaurantphnumber">Restaurant Phone Number</label>
    <input type="text" class="form-control" id="restaurantphnumber" name="restaurantcontactnumber" placeholder="Enter Restaurant Phone Number" pattern="[09]{2}[0-9]{9}" required>
  </div>
    <div class="form-group">
    <label for="personname">Contact Person Name</label>
    <input type="text" class="form-control" id="personname" name="personname" placeholder="Enter Contact Person Name" required>
  </div>
    <div class="form-group">
    <label for="personphnumber">Contact Person Phone Number</label>
    <input type="text" class="form-control" id="personphnumber" name="personphnumber" placeholder="Enter Contact Person Phone Number" pattern="[09]{2}[0-9]{9}" required>
  </div>
  <div class="form-group">
    <label for="restaurantid">Manage Restaurant Type</label><br>
      @foreach ($restauranttypes as $restauranttype)
  <input type="radio" id="restauranttypeid" name="restauranttypeid" value="{{$restauranttype->restauranttypeid}}" required>
  <label for="restaurantid">{{$restauranttype->restauranttypename}}</label>
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
<!-------------------Edit Restaurant-------------------->
<div class="modal fade" id="editrestaurant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Restaurant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('restaurant.update')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
        <div class="form-group">
           <div class="image-upload-wrap">
    <input class="file-upload-input" type='file' name="logofile" onchange="readURL(this);" accept="image/*" />
       <h3>Edit Restaurant Logo</h3>
    <div class="drag-text">
    </div>
  </div>
  <div class="file-upload-content">
    <img class="file-upload-image" id="editrestaurantlogo" src="" alt="your image" />
    <div class="image-title-wrap">
      <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
    </div>
  </div>
        </div>
          <div class="form-group">
    <label for="editrestaurantname">Restaurant Name</label>
    <input type="text" class="form-control" id="editrestaurantname" name="restaurantname"required>
     <input type="hidden" class="form-control" id="restaurantid" name="id">
     <input type="hidden" class="form-control" id="editrestauranttypeid" name="restauranttypeid">
  </div>
     <div class="form-group">
    <label for="editrestaurantemail">Restaurant Email</label>
    <input type="email" class="form-control" id="editrestaurantemail" name="restaurantemail" required>
  </div>
  <div class="form-group">
    <label for="editrestaurantphnumber">Restaurant Phone Number</label>
    <input type="text" class="form-control" id="editrestaurantphnumber" name="restaurantcontactnumber" pattern="[09]{2}[0-9]{9}"required>
  </div>
    <div class="form-group">
    <label for="editpersonname">Contact Person Name</label>
    <input type="text" class="form-control" id="editpersonname" name="personname" required>
  </div>
    <div class="form-group">
    <label for="editpersonphnumber">Contact Person Phone Number</label>
    <input type="text" class="form-control" id="editpersonphnumber" name="personphnumber" pattern="[09]{2}[0-9]{9}"required>
  </div>
  <div class="form-group">
    <label for="restaurantid">Manage Restaurant Type</label><br>
      @foreach ($restauranttypes as $restauranttype)
  <input type="radio" id="{{$restauranttype->restauranttypeid}}" name="restauranttypeid" value="{{$restauranttype->restauranttypeid}}" required>
  <label for="restaurantid">{{$restauranttype->restauranttypename}}</label>
  @endforeach
  </div>
     
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!--------------Data Table------>
<div class="table-responsive-md">
<table class="table table-bordered text-center" id="myTable" style="font-size:12px;">
  <thead class="bg-primary" style="color:white;">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Restaurant<br> Name</th>
      <th scope="col">Restaurant<br>Gmail</th>
      <th scope="col">Restaurant<br>Phone <br>Number</th>
      <th scope="col">Person<br>Name</th>
      <th scope="col">Person<br>Phone<br> Number</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($restaurants as $restaurant)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row"><img src="{{asset('alltimeimages/restaurantlogos')}}/{{$restaurant->restaurantlogo}}" width="150px"><br><br>{{$restaurant->restaurantname}}
      
</td>
      <td scope="row">{{$restaurant->restaurantemail}}</td>
      <td scope="row">{{$restaurant->restaurantcontactnumber}}</td>
      <td scope="row">{{$restaurant->personname}}</td>
      <td scope="row">{{$restaurant->personphnumber}}</td>
      <td><div class="dropdown"><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$restaurant->restaurantid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$restaurant->restaurantid}}" style="margin:5px;">Delete</button>
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Manage Restaurant
  </button>
  <div class="dropdown-menu btn btn-primary" aria-labelledby="dropdownMenuButton" style="margin-left:200px;">
    <a class="dropdown-item" href="/menu?restaurantid={{$restaurant->restaurantid}}">Manage Menu</a>
    <a class="dropdown-item" href="/location?restaurantid={{$restaurant->restaurantid}}">Manage Location</a>
    <a class="dropdown-item" href="/bank?restaurantid={{$restaurant->restaurantid}}">Manage Bank</a>
  </div>
</div></td>
   <?php $i++; ?>
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
   function readURL(input) {
  if (input.files && input.files[0]) {

    var reader = new FileReader();

    reader.onload = function(e) {
      $('.image-upload-wrap').hide();

      $('.file-upload-image').attr('src', e.target.result);
      $('.file-upload-content').show();

      $('.image-title').html(input.files[0].name);
    };

    reader.readAsDataURL(input.files[0]);

  } else {
    removeUpload();
  }
}

function removeUpload() {
  $('.file-upload-input').replaceWith($('.file-upload-input').clone());
  $('.file-upload-content').hide();
  $('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
        $('.image-upload-wrap').addClass('image-dropping');

    });
    $('.image-upload-wrap').bind('dragleave', function () {
        $('.image-upload-wrap').removeClass('image-dropping');
});
  $(document).on('click', '.editbtn', function(){
        var _token = $('input[name="_token"]').val();
        var id = $(this).attr("id");
        $.ajax({
            url:"{{ route('restaurant.editrestaurant') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editrestaurant').modal('show');
                $('.image-upload-wrap').hide();
                $('.file-upload-image').attr('src','alltimeimages/restaurantlogos/'+data.restaurantlogo);
                $('.file-upload-content').show();
                $('#restaurantid').val(data.restaurantid);
                $('#editrestaurantname').val(data.restaurantname);
                $('#editrestaurantemail').val(data.restaurantemail);
                $('#editrestaurantphnumber').val(data.restaurantcontactnumber);
                $('#editpersonname').val(data.personname);
                $('#editpersonphnumber').val(data.personphnumber);
                $('#editrestauranttypeid').val(data.restauranttypeid);
                var restauranttypeid = $('#restauranttypeid').val();
                document.getElementById(restauranttypeid).checked= true;

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
                url:"{{ route('restaurant.delete')}}",
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