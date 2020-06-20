
@extends('employees.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 6</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('employees.create') }}"> Create New Employee</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered" style=" width: 1200px">
        <tr>
            
            <th>FirstName</th>
            <th>SecondName</th>
            <th>Email</th>
            <th>Contactnumber</th>
            <th>City</th>
            <th>Gender</th>
            <th>Profilephoto</th>
            <th>age</th>
            <th>Status</th>

            <th width="280px">Action</th>
        </tr>
        @foreach ($employees as $employee)
        <tr>
          
            <td>{{ $employee->firstname }}</td>
            <td>{{ $employee->lastname }}</td>
            <td>{{ $employee->email }}    </td>
            <td>{{ $employee->phonenumber }}</td>
            <td>{{ $employee->city }}</td>
            <td>{{ $employee->gender}}</td>
            <td> 
                <img width="100px" src="{{url('uploads/'.$employee->picture)}}" alt="{{$employee->picture}}">
            </td>
           <td>{{$employee->age}}</td>
            <td>{{ $employee->status }}</td>
            <td>
                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">
   
                    
                    <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
      
@endsection