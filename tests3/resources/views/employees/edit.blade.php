@extends('employees.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Employees</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('employees.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ route('employees.update',$employee->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="firstname" class="form-control" placeholder="firstname" value="{{ $employee->firstname }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Second Name:</strong>
                <input type="text" name="lastname" class="form-control"  name="secondname" placeholder="SecondName" value="{{ $employee->lastname }}">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email Address:</strong>
                <input type="text"  class="form-control"  name="email" placeholder="Second Name" value="{{ $employee->email }}">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact Number:</strong>
                <input type=""  class="form-control"  name="phonenumber" placeholder="Phone Number" value="{{ $employee->phonenumber }}">
            </div>
        </div> <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City</strong>
                <input type=""  class="form-control"  name="city" placeholder="City" value="{{ $employee->city}}">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender</strong>
               <input type="radio" id="male" name="gender" value="male" @if( $employee->gender == 'male') checked @endif>Male
                 <input type="radio" id="male" name="gender" value="female" @if( $employee->gender == 'female') checked @endif>Female
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Picture</strong>
                <input type="file" name="picture" class="form-control">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
          {{--   <div class="form-group">
                <strong>Status</strong>
               <input type="checkbox" class="form-control" name="status" value="">               
               <input type="checkbox" class="form-control" name="status" >
            </div>
 --}}        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
          
        </div>
   
    </form>
@endsection