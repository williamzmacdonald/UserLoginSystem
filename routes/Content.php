<?php
$app->get('/content', function() use($app){
	require_once( "models/User.php" );

	// a sample content page

	// case 1: they have an active session, with a valid user in it
	// outcome: set $user to that User and render the content.php view

	// case 2: they don't have an active session with a valid user in it
	// outcome: render the noaccess.php view

	// find their session or create a new one
	// check session for a valid user, go to content if found
	if(isset($_SESSION['user']))
	{
		$user = $_SESSION['user'];
		if($_SESSION['user']["username"] != "Filthy, Filthy Guest")
		{
			$app->render("content.php", ['user' => $user]);
		}
		// otherwise, not allowed here!
		else{
			$app->render("noaccess.php");		
		}
	}
	else{
		$app->render("noaccess.php");	
	}
})->setName("content");
?>
