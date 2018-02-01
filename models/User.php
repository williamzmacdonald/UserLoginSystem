<?php
require_once( 'PasswordHash.php' );

use Illuminate\Database\Eloquent\Model as Eloquent;
//extends Eloquent's model into our own User model
class User extends Eloquent{
	//Eloquent's model creates and stores our database variables for us including automatically setting table name
	//error tracking for login/signup page
	public $errors = array();
	//need to set timestamps to false so that Eloquent doesn't require timestamp columns in our database
	public $timestamps = false;
	//validate, same as assignment 10, checks for user input error
	function validate($password1, $password2){
		$this->errors = array();
		if($password1 != $password2){
			$this->errors["password"] = "Unmatching passwords.";
		}
		else if(empty($password1)){
			$this->errors["password"] = "Empty password field.";
		}
		if(empty($this->full_name)){
			$this->errors["full_name"] = "Empty full name field.";
		}
		if(empty($this->username)){
			$this->errors["username"] = "Empty username field.";
		}
		else if($this->usernameExists()){
			$this->errors["username"] = "Username exists.";
		}
		if(empty($this->errors)){
			return true;
		}
		else{
			return false;
		}
	}
	//prints errors if exists
	function getError($field){
		if( isset($this->errors[$field]) ) {
            return $this->errors[$field];
         }
        return "";
	}
	function saveWithPassword($passwd) {
		//all we need to do is hash our password
		$passwd = strtolower($passwd);
		$hasher = new PasswordHash(8, false);
		$hashed = $hasher->HashPassword($passwd);
    	// check if this is a new object
    	if( !$this->id ) {
	    	// if so, insert by just calling Eloquent's save method
	    	$this->password_hash = $hashed;
			$this->save();
	    	
		}

    	

	}

	function login($password) {
			// return true if $password is valid for this user or sets errors if incorrect login
			$this->errors = array();
			if ($this->username) {
				$user = new User;
				$hasher = new PasswordHash( 8, false );
				//Eloquent's where method allows us to fetch the first user by given username
				$user = User::where("username", $this->username)->first();
				$fetched = $user["password_hash"];
				if( $hasher->CheckPassword($password, $fetched ))  {
					$this->errors = array();
					return true;
				} 
			}
			$this->errors["login"] = "Incorrect login.";
			return false;
	}//same as before, we use Eloquent's static where method to return the first user with given username
	static function findByUsername( $username ) {
		return User::where("username", $username)->first();
	}//fetches user by username and checks if query returned null
	function usernameExists(){
		$user = new User;
		$user = User::where("username", $this->username)->first();
		if(is_null($user)){
			return false;
		}
		return true;
	}

}
?>
