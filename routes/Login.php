<?php
$app->post('/login', function() use($app){ //login must be of type post
	require_once( "models/User.php" );
	
	if(!isset($_SESSION["user"])){
		$_SESSION["login"] = $login_user = new User();
	}
	$login_user = $_SESSION["login"];

	// try logging in
	//app->request->isPost returns a bool to check if the post exists
	if(($app->request->isPost("username")) && ($app->request->isPost("password"))){
		//while app->request->post("argument") allows us to fetch the post
		$login_user->username = $app->request->post("username");
		// on success, redirect to homepage
		if($login_user->login($app->request->post("password")))
		{
			$user = new User();
			$user = User::findByUsername($login_user->username);
			$_SESSION['user'] = $user;
			$app->response->redirect($app->urlFor("home"), 303);
		}
		// on failure, errors should be set in the User model so that GetError works
		else{
			$signup_user = new User;
			//render loginform while passing in login user and signup user
			$app->render("loginform.php", ['login_user' => $login_user, 'signup_user' => $signup_user]);
		}
	}
	else{
		$signup_user = new User;
		$app->render("loginform.php", ['login_user' => $login_user, 'signup_user' => $signup_user]);
	}
})->setName("login");








?>
