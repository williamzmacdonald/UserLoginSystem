

<html>

<head>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
</head>

<body> <!-- twig allows us to use logic like if and for statements in braces + percent sign -->
{% if user is defined %}
<div class="container">
<div class="row col-sm-10 col-sm-offset-1">

	<div class="row">
	<div class="page-header">
		<h1>The Awesome Website of Awesome</h1>
		<div>Welcome, {{ user.username }}!  <!-- double curly braces allows us to print items -->
		{% if user.id is not empty %}
		<a href="logout"><em>logout</em></a></div>
		{% endif %} <!-- we must end the if statement when an endif -->
	</div></div>

	{% if user.id is empty %}
	<div class="row">
	<p>This is content that anyone can see. Even you. Clearly it's
	not something we care much about. You can tell the important stuff
	because you're not looking at it.</p>
	</div>

	<div class="row">
	<p>Maybe you should <a href="loginform">Login or Signup</a></p>
	</div>
	{% else %}
	<div class="row">
	<p>This is content that only important people with accounts can see.
	At least that's what we want you to believe. The part where you're
	important to us, I mean. Because signing up for an account with some
	public email address is a sure sign that you're a real treasure.</p>
	</div>
	{% endif %}

	<div class="row">
	<p>Here's a link to the <a href="content">Awesome Stuff</a>.</p>
	</div>

</div>
</div>
{% endif %}
</body>
</html>
