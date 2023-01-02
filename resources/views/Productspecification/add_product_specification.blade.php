@extends('layout.main')
 @section('main-container')  
      <!-- partial -->
     <section>
     @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

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
		<h2>Add Specification</h2>
	<form action="{{url('/Add_speci')}}"method="post"  enctype="multipart/form-data" >
    @csrf
    
		<div class="form-group">
    <label for="firstname">Product Specification</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="Product_Specification" required>
  </div>
  <div class="form-group">
    <label for="Email1">Discription</label>
    
    <textarea class="form-control" id="exampleFormControlTextarea1" name="Product_disc" rows="3" required></textarea>
  </div>

  <div class="form-group">
    <label for="phoneno">YouTube Link</label>
    
    <textarea class="form-control" id="exampleFormControlTextarea1" name="Product_youtube" rows="3" required></textarea>
  </div>
 
  <button type="submit" class="btn btn-primary" name="create">Add</button>
</form>
</div>



     </section>
    </div>
  </div>
 @endsection