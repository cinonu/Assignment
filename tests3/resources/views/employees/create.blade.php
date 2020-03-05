@extends('employees.layout')
  
@section('content')
  
  <script type="text/javascript">

function yesnoCheck() {
    if (document.getElementById('male').checked) {
        document.getElementById('age').style.display = 'block';
    }
    else document.getElementById('age').style.display = 'none';

}
</script>

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Employee</h2>
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
   
<form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" id="form">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                <input type="text" name="firstname" class="form-control" placeholder="firstname" id="firstname">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Second Name:</strong>
                <input type="text" name="lastname" class="form-control"  name="secondname" placeholder="Second Name"
                id="lastname">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email Address:</strong>
                <input type="text"  class="form-control"  name="email" placeholder="email" id="email">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contact Number:</strong>
                <input type=""  class="form-control"  name="phonenumber" placeholder="Phone Number" id="phonenumber"></textarea>
            </div>
        </div> <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>City</strong>
                <input type=""  class="form-control"  name="city" placeholder="City" id="city"></textarea>
            </div>
        </div>
         
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Picture</strong>
                <input type="file" name="picture" class="form-control" id="picture">
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status</strong>
                <input type="checkbox" class="form-control" id="status" name="status" value="Active">
                <input type="checkbox" class="form-control" id="status" name="status" value="InActive">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
         
          <strong>Gender</strong>
         Male<input type="radio" onclick="javascript:yesnoCheck();" name="gender" id="male" value="male">
         Female<input type="radio" onclick="javascript:yesnoCheck();" name="gender" id="noCheck" value="Female"><br>
</div>
</div>
      
        <div class="col-xs-12 col-sm-12 col-md-4">
            <div class="form-group">
               
         
         <div id="age" style="display:none;">
             <strong>age</strong>
        <input  type='text' id='age'  name='age'>
     </div>
 </div>
</div>
</div>
        
     

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
    {{-- <script type="text/javascript" src="{{asset('validate.js')}}"></script> --}}
</form>
    

@endsection

