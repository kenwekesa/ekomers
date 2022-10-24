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

    <link href="{{asset('css/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('css/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">
</head>
<body>
<div class="forms">
	<ul class="tab-group">
		<li class="tab"><a href="{{route('loginadmin')}}">Log In</a></li>
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
			<input type="hidden" name="city" value="companytown"/>
			<label for="email">Phone no:</label> 
	        <input type="text" name="phone"/>
			<input type="hidden" name="profile" value="images/default.jpg"/>
            <label for="flag">Flag: </label> 
            
            <div class="rs-select2 js-select-simple select--no-search">
            <select name="flag">
                  <option>Super admin</option>
                  <option>Admin</option>
            </select>
            </div>
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
