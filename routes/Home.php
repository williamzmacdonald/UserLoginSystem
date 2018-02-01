<?php
// case 1: they have an active session, with a valid user object in it
// outcome: set $user to that user object and render the home.php view
// case 2: they don't have an active session with a valid user object in it
// outcome: create an empty $user object, set the username to "Filthy, Filthy Guest",
//          and render the home.php view
// find their session or create a new one

// make a User object $user with the default name "Guest"
$app->get('/', function() use($app){ //route is called immediately because our route is '/' with no arguments
	if(!isset($_SESSION['user'])){ //we can use session normally after creating it in our start page
		$user = new User;
		$user->full_name = "Guest";
		$user->username = "Filthy, Filthy Guest";
	}
	else{
		$user = $_SESSION['user'];
	}

	//using our app's render method we can render a view in our views folder, 
	//we can also pass in arguments such as User
	$app->render("home.php", ['user' => $user]);
})->setName("home");






?>