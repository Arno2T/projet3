<?php


class View

{
	private $_fichier;


	public function __construct($action)
	{
		$this->_fichier='View/view'.$action.'php';
	}
}