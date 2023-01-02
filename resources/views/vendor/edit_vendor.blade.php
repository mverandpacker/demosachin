@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
     <section>

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
	<style type="text/css">
		.container{
			margin-top: 8%;
			width: 400px;
			border: ridge 1.5px white;
			padding: 20px;
		}
		body{
			background: #E0EAFC;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #CFDEF3, #E0EAFC);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #CFDEF3, #E0EAFC); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

		}
	</style>


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
		<h2>Update Vendor</h2>
	<form action="{{url('/update_vendor')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$vendor->id}}">
		<div class="form-group">
    <label for="firstname">Vendor Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" value="{{$vendor->Vendor_name}}" name="vendorname" required>
  </div>
  <div class="form-group">
    <label for="firstname">Shop Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" value="{{$vendor->Shop_name}}" name="Shopname" required>
  </div>
  <div class="form-group">
    <label for="Email1">Email </label>
    <input type="email" class="form-control" id="exampleInputEmail1" value="{{$vendor->Vendor_email}}" aria-describedby="emailHelp" name="vendoremail" required>
  </div>

  <div class="form-group">
    <label for="phoneno">Phone Number</label>
    <input type="text" class="form-control" id="exampleInputphoneno" value="{{$vendor->Vendor_number}}" name="vendorphoneno" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Address</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="vendoraddress" required>{{$vendor->Vendor_address}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="create">Update</button>
</form>
</div>



     </section>
    </div>
  </div>
 @endsection