
<html>

<head>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="main.css">
</head>

<body>
{% if user is defined %}
<div class="container">
<div class="row col-sm-10 col-sm-offset-1">

	<div class="row">
	<div class="page-header">
		<h1>The Awesome Website of Awesome</h1>
		<div>Welcome, {{ user.username }}! 
		{% if user.id is not empty %}
		<a href="logout"><em>logout</em></a>
		{% endif %}</div>
	</div></div>

{% if user.admin == 0 %}
	<div class="row">
	<p>You are not an adminstrator. You are a common peasant from the
	internet. You'll get a picture of Jar Jar Binks and like it.</p>

	<img src="http://uploads.neatorama.com/images/posts/335/56/56335/1355718775-0.jpg">
	</div>

	{% else %}
	<div class="row">
	<p>You are Awesome. As a reward, here's the awesome Star Wars The Force Awakens poster.</p>

	<img src="http://vignette2.wikia.nocookie.net/starwars/images/f/fd/Star_Wars_Episode_VII_The_Force_Awakens.jpg/revision/latest?cb=20151018162823">
	</div>
	{% endif %}

	<div class="row">
	<p><a href="index.php">Step off, man</a></p>
	</div>

</div>
</div>
{% endif %}
</body>
</html>
