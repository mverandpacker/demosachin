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
		<h2>Add Repair</h2>
	<form action="{{url('/add_repair')}}"  enctype="multipart/form-data" method="post">
    @csrf
    
    <div class="form-group">
    <label for="firstname">Customer</label><br>
      <input list="browsers" name="customerid" class="form-control" id="browser">
        <datalist id="browsers">
            @foreach($customer as $customers)
            <option value="{{$customers->id}}">{{$customers->Phone}}</option>
            @endforeach
        </datalist>
    </div>
		<div class="form-group">
    <label for="firstname">Title</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="repairtitle" required>
  </div>
  <div class="form-group">
    <label for="photo">Product Photo</label>
    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="repairpic" required>
  </div>

  <!-- <div class="form-group">
    <label for="phoneno">Product Price</label>
    <input type="text" class="form-control" id="exampleInputphoneno" name="productprice" required>
  </div> -->
  <div class="form-group">
    <label for="phoneno">Salling Price</label>
    <input type="text" class="form-control" id="exampleInputphoneno" name="sallingprice" required>
  </div>
  <div class="form-group">
    <label for="phoneno">MRP</label>
    <input type="text" class="form-control" id="exampleInputphoneno" name="mrp" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Repairdescription" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="create">Add</button>
</form>
</div>



     </section>
    </div>
  </div>
@endsection