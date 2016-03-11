<?php

require_once 'Log.php';

// $log = new Log("password");


class Auth

{
	
	
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';


	public static function attempt($username, $password)
	
	{
		$log = new Log("ERROR");
		$logInfo = new LOG("INFO");
		if ($username == 'guest' && password_verify($password, self::$password)) 
		{
    	 $_SESSION['logged_in_user'] = $username;
    	 $logInfo->logInfo("User " . $username . " is logged in. ");
    	 
    	 
    	} else if ($username != '' && $password != '') 
			  {
			  	
			  	$log->logError("login Info incorrect!!");
			  	echo "You are WRONG!!!!";
			  }	

	}


	public static function check()
	
	{

		if (isset($_SESSION['logged_in_user']))
		{
			return true;
		
		} else {

			return false;
		}

	}

	
	public static function user()
	
	{
	 
	 return $_SESSION['logged_in_user'];
			
	}

	public static function logout()

	{

    	session_unset();
    	session_destroy();
    	session_regenerate_id();
		
    	

	}



}