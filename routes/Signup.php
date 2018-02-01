<?php
$app->post('/signup', function() use($app){//also needs to be a route of post type
	require_once( "models/User.php" );
	//initiates new user and sets variables from post
	$user = new User();
	if($app->request->isPost("full_name")){
		$user->full_name = $app->request->post("full_name");
	}
	else{
		$user->full_name = "";
	}
	if($app->request->isPost("username")){
		$user->username = $app->request->post("username");
	}
	else{
		$user->username = "";
	}
	if($app->request->isPost("password")){
		$password = $app->request->post("password");
	}
	else{
		$password = "";
	}
	if($app->request->isPost("password2")){
		$password2 = $app->request->post("password2");
	}
	else{
		$password2 = "";
	}

	// validate the object, if success, save and redirect to home


	if($user->validate($password, $password2))
	{
		$_SESSION["user"] = $user;
		$user->saveWithPassword($password);
		$app->response->redirect($app->urlFor("home"), 303);
	}
	// if failed, errors should already be set, go back to loginform view
	// you'll also need an empty login user model for the page
	else
	{
		$signup_user = $user;
		$login_user = new User();
		$app->render("loginform.php", ['login_user' => $login_user, 'signup_user' => $signup_user]);
	}
});




?>
