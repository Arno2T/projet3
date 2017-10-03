<?php

class Model
{
	/**
	* @var   object 		$_bdd	 PDO Object
	*/

	private $_bdd;

	/**
	* getBdd()		connexion to database with PDO Object
	* 
	* @return $_bdd
	*/

	public function getBdd()
	{
		try
		{
		$this->_bdd= new PDO('mysql: host=localhost; dbname=p3blog; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		return $this->_bdd;
		}
		catch (Exception $e)
		{
			die('Erreur :'.$e->getMessage());
		}
	}
}