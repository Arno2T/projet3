<?php

require_once 'View/View.php';
require_once 'Model/UsersManager.php';
require_once 'Model/PostsManager.php';

class controllerAdmin
{

	private $_users;
	private $_posts;


	public function __construct()
	{
		$this->_users= new UsersManager();
		$this->_posts= new PostsManager();

	}


	// generate Admin's home
	public function admin()
	{
		$nbUsers=$this->_users->countUsers();
		$nbPosts=$this->_posts->countPosts();
		$view= new View('Admin');
		$view->generateAdmin(array('nbUsers'=>$nbUsers, 'nbPosts'=>$nbPosts));

	}
}