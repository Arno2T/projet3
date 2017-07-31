<?php

require_once 'Model/PostsManager.php';
require_once 'View/View.php';

class ControllerHome
{
	private $_home;


	public function __construct()
	{
		$this->_home= new PostsManager();
	}

	public function home()
	{
		$home= $this->_home->getAllPosts();

		$view= new View('Home');

		$view->generate(array('home'=>$home));
	}

}