@extends('admin.adminlayout')
@section('title')
  ALL TIME DELIVERY|Manage Current State
@endsection
@section('content')
@if(Session::has('currentstate_added'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('currentstate_added')}}
  </div>
 @endif
 @if(Session::has('currentstate_updated'))
 <div class="alert alert-primary" role="alert">
        {{Session::get('currentstate_updated')}}
  </div>
 @endif
<!----------------Adding Menu Type-------------------------->
<button class="btn btn-primary float-right" data-toggle="modal" data-target="#addcurrentstate">Add Current State</button>
<div class="modal fade" id="addcurrentstate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Current State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('currentstate.store')}}" enctype="multipart/form-data">
        @csrf
      <div class="modal-body">
          <div class="form-group">
    <label for="currentstatename">Current State Name</label>
    <input type="text" class="form-control" id="currentstatename" name="currentstatename" placeholder="Enter Current State Name" required>
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
<!-------------------Edit CurrentState-------------------->
<div class="modal fade" id="editcurrentstate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <form method="POST" action="{{route('currentstate.update')}}" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Current State</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
    <label for="editcurrentstatename">Edit Current State Name</label>
    <input type="text" class="form-control" id="editcurrentstatename" name="currentstatename">
    <input type="hidden" class="form-control" id="currentstateid" name="id">
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
      <th scope="col">Current State Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=1 ?>
    @foreach ($currentstates as $currentstate)
    <tr>
      <th  scope="row">{{$i}}</th>
      <td scope="row">{{$currentstate->currentstatename}}</td>
      <td><button class="btn btn-primary editbtn" data-toggle="modal" id="{{$currentstate->currentstateid}}" style="margin:5px;">Edit</button><button class="btn btn-danger delete" id="{{$currentstate->currentstateid}}">Delete</button></td>
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
            url:"{{ route('currentstate.editcurrentstate') }}",
            method:"POST",
            data:{id:id,_token:_token},
            dataType:"json",
            success:function(data)
            {
                $('#editcurrentstate').modal('show');
                $('#currentstateid').val(data.currentstateid);
                $('#editcurrentstatename').val(data.currentstatename);
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
                url:"{{ route('currentstate.delete')}}",
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