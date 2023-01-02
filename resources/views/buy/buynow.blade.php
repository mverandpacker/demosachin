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
  @if(Session::has('message'))
<p class="alert alert-info text-center " style="font-weight:bold;">{{ Session::get('message') }}</p>
@endif
	<div class="container">
		<h2>Buy Product</h2>
	<form action="{{url('/buy_now')}}" method="post">
    @csrf
    <input type="hidden" name="customerID" value="{{$customer->id}}" />
 
    <div class="form-group">
    <label for="Email1">Product Search</label>
    <input list="browsers" class="form-control" name="Product_id" id="browser">
    <datalist id="browsers">
      @foreach($product as $products)
      <option value="{{$products->id}}">{{$products->Title}}</option>
      @endforeach
    </datalist>
          </div>
		<div class="form-group">
    <label for="firstname">Date</label>
    <input type="date" class="form-control" id="exampleInputfirstname" name="date" required>
  </div>
  <div class="form-group">
    <label for="Email1">Total Price</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="total_price" required>
  </div>
  <div class="form-group">
    <label for="description1">Description</label>
    <textarea name="disc_rption" class="form-control"  cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="create">Add</button>
</form>
</div>
@endsection