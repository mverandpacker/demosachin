@extends('layout.main')
 @section('main-container')  
<style type="text/css">
  .container{
    margin-top: 8%;
    width: 400px;
    border: ridge 1.5px white;
    padding: 20px;
  }
  .main-wrapper {
    background: #E0EAFC;  
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  
background: linear-gradient(to right, #CFDEF3, #E0EAFC); 
  }
</style>


      <!-- partial -->
      <section class="sect">




<div>
  <?php
    if(isset($_POST['create'])){
      $firstname  = $_POST['firstname'];
      $lastname   = $_POST['lastname'];
      $phoneno    = $_POST['phoneno'];
      $email      = $_POST['email'];
      $password   = $_POST['password'];

      echo $firstname ." ".$lastname ." ".$phoneno ." ".$email ." ".$password; 
    }
  ?>
</div>

<div class="container">
  <h2>Edit Customer</h2>
<form action="{{url('/update')}}" method="post">
  @csrf
  <input type="hidden" name="id" value="{{$customer->id}}" />
  <div class="form-group">
  <label for="firstname">Name</label>
  <input type="text" class="form-control" id="exampleInputfirstname" name="firstname" value="{{$customer->Name}}" required>
</div>
<div class="form-group">
  <label for="Email1">Email address</label>
  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="{{$customer->Email}}" required>
</div>

<div class="form-group">
  <label for="phoneno">Phone Number</label>
  <input type="text" class="form-control" id="exampleInputphoneno" name="phoneno" value="{{$customer->Phone}}" required>
</div>
<div class="form-group">
  <label for="exampleFormControlTextarea1">Address</label>
  <input type="text" class="form-control" id="exampleInputphoneno" name="address" value="{{$customer->Address}}" required  style=" height:100px;">
</div>
<button type="submit" class="btn btn-primary" name="create">Update</button>
</form>
</div>



   </section>
    </div>
  </div>
@endsection