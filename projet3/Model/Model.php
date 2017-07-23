<?php

class Model
{
	private $_bdd;


	public function getBdd()
	{
		$this->_bdd= new PDO('mysql: host=localhost; dbname=p3_blog; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		return $this->_bdd;
	}
}