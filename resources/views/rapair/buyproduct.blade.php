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
  @if(\Session::has('message'))
      <p class="alert text-info text-center p-2" style=" box-shadow: 0 0 10px 5px rgb(0 187 221 / 35%) ">{!! \Session::get('message') !!}</p>
      @endif
	<div class="container">
		<h2>Buy Product</h2>
	<form action="{{url('/add_product')}}" method="post">
    @csrf
    
    <input type="hidden" name="customerid" value="{{$customer->id}}" />

    <div class="form-group">
    <label for="Email1">Product Search</label>
    <input list="browsers" class="form-control" name="Productid" id="browser">
    <datalist id="browsers">
      @foreach($rapirproduct as $repairs)
      <option value="{{$repairs->id}}">{{$repairs->Repair_title}}</option>
            @endforeach
    </datalist>
          </div>
		<div class="form-group">
    <label for="firstname">Date</label>
    <input type="date" class="form-control" id="exampleInputfirstname" name="dateproduct" required>
  </div>
  <div class="form-group">
    <label for="Email1">Total Price</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="total_price" required>
  </div>
 
  <button type="submit" class="btn btn-primary" name="create">Add</button>
</form>
</div>



     </section>
    </div>
  </div>
@endsection