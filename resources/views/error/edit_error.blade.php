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
		<h2>Add Error</h2>
	<form action="{{url('/update_error')}}"method="post"  enctype="multipart/form-data" >
    @csrf
<input type="hidden" name="id" value="{{$error->id}}">
		<div class="form-group">
    <label for="firstname">Title</label>
    <input type="text" class="form-control" value="{{$error->Err_title}}" id="exampleInputfirstname" name="err_title" required>
  </div>
  <div class="form-group">
    <label for="Email1">Photo</label>
    
    <input type="file" class="form-control" name="err_image" value="{{$error->Err_photo}}" required>
    {{$error->Err_photo}}
  </div>

  <div class="form-group">
    <label for="phoneno">Discription</label>
    
    <textarea class="form-control" id="exampleFormControlTextarea1"  name="err_discription" rows="3" required>{{$error->Err_discription}}</textarea>
  </div>
 
  <button type="submit" class="btn btn-primary" name="create">Add</button>
</form>
</div>



     </section>
    </div>
  </div>
@endsection