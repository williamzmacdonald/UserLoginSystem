<?php
//allows us to use eloquent with just Capsule
use Illuminate\Database\Capsule\Manager as Capsule;
//autoloads needed vendor files
require_once("vendor/autoload.php");
//include our database and user model
require_once( "models/DB.php" );
require_once( "models/User.php" );
//initiate our Slim app while initializing our view object
$app = new \Slim\Slim([
	"view" => new \Slim\Views\Twig()
]);
//initialize database for slim (eloquent's capsule)
$app->db = function(){
	return new Capsule;
};
//create middleware that allows us to use Sessions, doesn't need start or destroy_session
$app->add(new \Slim\Middleware\SessionCookie(array(
    'expires' => '20 minutes',
    'path' => '/',
    'domain' => null,
    'secure' => false,
    'httponly' => false,
    'name' => 'slim_session',
    'secret' => 'CHANGE_ME',
    'cipher' => MCRYPT_RIJNDAEL_256,
    'cipher_mode' => MCRYPT_MODE_CBC
)));
//sets template directory, in this case views is where we store our views
$view = $app->view();
$view->setTemplatesDirectory("views");
//include Twig's extension to allow us to run twig in our view code
$view->parserExtensions = [
	new \Slim\Views\TwigExtension()
];
//include all of our routes files
require_once("routes.php");
//start Slim app
$app->run();
?>