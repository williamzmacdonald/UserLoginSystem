<?php
//if user wants to logout we set session user to null as there is no session destroy, we then redirect to home
$app->get('/logout', function() use ($app){
	require_once( "models/User.php" );
	$_SESSION["user"] = null;
	$app->response->redirect($app->urlFor("home"), 303);
})->setName("logout");




?>
