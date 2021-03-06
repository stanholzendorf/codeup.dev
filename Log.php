<?php

class Log 
{
	
	private $filename;
	private $handle;


	protected function setfilenameString()
	{
		$date = date("y-m-d");
    	$time = date("h:i:s");
		$this->filename = __DIR__ . '/public/logs/' . $prefix .  $date . '.log';
	}


	public function __construct($prefix = "log.")

	{	
		$this->setfilenameString();
    	if (!touch($this->filename) && !is_writable($this->filename)) {
			echo "Not possible!";
		} else {
    		$this->handle = fopen($this->filename, 'a');
		}
	}

	public function ____destruct()

	{
		fclose($this->handle);
	}



	public function logMessage($logLevel, $message)
	{
    
		$date = date("y-m-d");
    	$time = date("h:i:s");

  //   	$this->filename = $date . '.log';
  //   	$handle = fopen($this->filename, 'a');
    	fwrite($this->handle, $date . " " . $time . " " .  "[$logLevel]" . " " . $message . PHP_EOL);
		// fclose($handle);
	}

	public function logInfo($message)
	
	{
  		$this->logMessage("INFO", $message);
	}


	public function logError($message)
	
	{
  		$this->logMessage("ERROR", $message);
	}

		

}






?>