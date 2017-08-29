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
		$this->_bdd= new PDO('mysql: host=localhost; dbname=p3_blog; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		return $this->_bdd;
	}
}