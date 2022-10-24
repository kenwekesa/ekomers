<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ URL::asset('css/forms/login.css')}} " rel="stylesheet">
    
    <script src="javasciptlogin.js"></script>
</head>
<body>
<div class="overlay">
<div class="forms">


	<ul class="tab-group">
		<li class="tab active"><a href="#login">Log In</a></li>
		<li class="tab"><a href="{{route('signup')}}">Sign Up</a></li>
	</ul>
<br/>
	<div class="success container">
            @if(session()->has('error'))
              <div class="alert alert-danger">
                  {{ session()->get('error') }}
              </div>
            @endif

            @if (count($errors) > 0)
    <div class="alert alert-danger">
     <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
     </ul>
    </div>
   @endif

           </div>

		   
<br/>
	<form method="post" action="{{ url('/main/checklogin') }}">


	{{ csrf_field() }}


	      <h1>Login to Ekomers</h1>
	      <div class="input-field">
	        <label for="email">Email</label>
	        <input type="email" name="email" required />
	        <label for="password">Password</label> 
	        <input type="password" name="password" required/>
	        <input type="submit" value="Login" class="button"/>
			<p class="text-p"> <a href="#">Forgot password?</a> </p>
			<br>
			
	      </div>
	  </form>

</div>


<script type="text/javascript">
$(document).ready(function(){
	  $('.tab a').on('click', function (e) {
	  e.preventDefault();
	  
	  $(this).parent().addClass('active');
	  $(this).parent().siblings().removeClass('active');
	  
	  var href = $(this).attr('href');
	  $('.forms > form').hide();
	  $(href).fadeIn(500);
	});
});
</script>
</body>
</html>
