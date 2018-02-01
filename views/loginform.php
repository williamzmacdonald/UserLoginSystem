<html> <!-- braces and % allows us to do things like for loops if statements etc. -->

<head>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
</head>

<body>
{% if login_user is defined or signup_user is defined %} <!-- make sure login and signup user are defined -->
<div class="container">

<div class="row col-sm-10 col-sm-offset-1">

	<div class="row">
	<div class="page-header">
		<h1>The Awesome Website of Awesome</h1>
	</div></div>

	<div class="row col-sm-5">
		<h3>Login</h3>    <!-- while double braces are used for printing variables-->
		<div class="error">{{ login_user.getError( "login" ) }}</div>
		<form method="POST" action="login"> <!-- action is login because we named our routes -->
			<input type="text" class="form-control" name="username" value="{{ login_user.username }}" 
				placeholder="Username">
			<input type="password" class="form-control" name="password" placeholder="Password">
			<button class="btn btn-primary">Login</button>
		</form>
	</div>

	<div class="row col-sm-5 col-sm-offset-1">
		<h3>New? Sign up!</h3>
		<form method="POST" action="signup">
          <div class="error">{{ signup_user.getError("full_name") }}</div>
          <input type="text" class="form-control" name="full_name" value="{{ signup_user.full_name }}" 
                 placeholder="Full Name">
          <div class="error">{{ signup_user.getError("username") }}</div>
          <input type="text" class="form-control" name="username" value="{{ signup_user.username }}" 
                 placeholder="Username">
          <div class="error">{{ signup_user.getError("password") }}</div>
          <input type="password" class="form-control" name="password" placeholder="Password">
          <input type="password" class="form-control" name="password2" placeholder="Retype Password">
          <button class="btn btn-primary">Sign Up</button>
		</form>
	</div>
</div>

</div>
{% endif %}
</body>
</html>
