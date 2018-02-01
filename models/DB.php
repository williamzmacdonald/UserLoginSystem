<?php
//creates Elequent database capsule and adds connection to our database with given settings
use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
	"driver" => "mysql",
	"host" => "localhost",
	"database" => "3342a10",
	"username" => "3342user",
	"password" => "temp1234",
	"charset" => "utf8",
	"collation" => "utf8_unicode_ci",
	"prefix" => "",
]);
//set as a global variable so we can call anywhere we use Slim
$capsule->setAsGlobal();
//start Eloquent
$capsule->bootEloquent();

?>
