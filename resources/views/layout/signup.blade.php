<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!--=======Font Open Sans======-->
    <link  rel='stylesheet' type='text/css'>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ URL::asset('css/forms/signup.css')}} " rel="stylesheet">
</head>
<body>
<div class="forms">
	<ul class="tab-group">
		<li class="tab"><a href="{{route('login')}}">Log In</a></li>
		<li class="tab active"><a href="#signup">Sign Up</a></li>
	</ul>
	  <form action="signup" id="signup" method="POST">

	  {{ csrf_field() }}


	      <h1>Sign Up to EKOMERS</h1>
	      <div class="input-field">
	        <label for="name">Name</label>
	        <input type="text" name="name"/>
	        <label for="email">Email</label> 
	        <input type="email" name="email" required="email"/>
			<label for="email">Phone no:</label> 
	        <input type="text" name="phone"/>
			<input type="hidden" name="profile" value="images/default.jpg"/>
			<label for="email">City</label> 
	        <input type="text" name="city"/>
			<input type="hidden" name="flag" value="normal"/>
	        <label for="password">Password</label> 
	        <input type="password" name="password" required/>
	        <label for="password">Confirm Password</label> 
	        <input type="password" name="password1" required/>
			<input type="submit" value="Sign up" class="button" />
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
