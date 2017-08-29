<?php

/**
* Class Session manages session start, session destroy and all session attributes.
*/

class Session
{
	
	private $_session;

	/**
	*  *__construct()*  manages session start.
	* @return void
	*/


	public function __construct()
	{
		session_start();
	}

	/**
	* *destruct()*  manages session destroy.
	* @return void
	*/


	public function destruct()
	{
		session_destroy();
	}

	/**
	*  *setAttribute()* manages session attributes
	* @param string   $name  
	* @param mixed    $value  
	* @return void
	*/
	public function setAttribute($name, $value)
	{
		$_SESSION[$name]=$value;
	}

	/**
	* *existAttribute* checks if attributes are setted
	* @param string $name
	* @return void
	*/

	public function existAttribute($name)
	{
		return (isset($_SESSION[$name]) && $_SESSION[$name] !="");
	}

	/** 
	* *getAttribute* 
	* @param string  $name
	* @return $_SESSION[name]
	*/


	public function getAttribute($name)
	{
		if ($this->existAttribute($name))
		{
			return $_SESSION[$name];
		}
		else
		{
			throw new Exception("Attribut '$name' absent de la session");
		}
	}
}


//End of file
