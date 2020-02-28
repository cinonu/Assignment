@extends('index')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">USERS</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
</div>
   
    {{-- <table class="table table-bordered">
        <tr>
            
            
            <th>role</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($roles as $role)
        <tr>
          
            <td>{{ $role->role_name }}</td>
            <td>
                <form action="{{ route('role.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('role.show',$role->role_id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('role.edit',$role->role_id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
   --}}
  <!-- /.content-wrapper -->
  @endsection