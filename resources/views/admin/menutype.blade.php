@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage Menu Type
@endsection
@section('content')
@if(Session::has('menutype_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('menutype_added')}}
  </div>
 @endif
 @if(Session::has('menutype_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('menutype_updated')}}
  </div>
 @endif
<!----------------Adding Menu Type-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addmenutype">Add Menu Type</button>
<div class="modal fade" id="addmenutype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Menu Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('menutype.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
          <div class="form-group">
    <label for="menutypename">Menu Type Name</label>
    <input type="text" class="form-control" id="menutypename" name="menutypename" placeholder="Enter Menu Type Name" required>
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
<!-------------------Edit Menu Type-------------------->
<div class="modal fade" id="editmenutype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('menutype.update')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Menu Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
    <label for="editmenutypename">Edit Menu Type Name</label>
    <input type="text" class="form-control" id="editmenutypename" name="menutypename">
    <input type="hidden" class="form-control" id="menutypeid" name="id">
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
      <th scope="col">Menu Type Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($menutypes as $menutype)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row">{{$menutype->menutypename}}</td>
      <td><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$menutype->menutypeid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$menutype->menutypeid}}">Delete</button></td>
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
            url:"{{ route('menutype.editmenutype') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editmenutype').modal('show');
                $('#menutypeid').val(data.menutypeid);
                $('#editmenutypename').val(data.menutypename);
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
                url:"{{ route('menutype.delete')}}",
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