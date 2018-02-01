<?php
//when the website is directed to /loginform this route is called
//name of slim variable, type of route, page where route is called, 
//we need to call use $app in order to access the Slim app's methods
$app->get('/loginform', function() use($app){ 
	require_once( "models/User.php" );
	// find their session or create a new one using our earlier created session cookie middleware
	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		//we can call the response's redirect method to change to our home page
		// urlFor is an app method that allows us to call a named route
		$app->response->redirect($app->urlFor("home"), 303); 
	}
	
	else{
		$login_user = new User;
		$signup_user = new User;
		$_SESSION["login"] = $login_user;
		$_SESSION["signup"] = $signup_user;
		//app-render allows us to render a view in our views directory while passing in needed objects
		$app->render("loginform.php", ['login_user' => $login_user, 'signup_user' => $signup_user]);
	}
})->setName("loginform"); //name of route
?>
