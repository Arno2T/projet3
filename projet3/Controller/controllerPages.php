<?php

require_once 'Model/PostsManager.php';
require_once 'View/View.php';

class ControllerPages
{
	private $_pages;
	


	public function __construct()
	{
		$this->_pages= new PostsManager();
		
	}

	//dislays all posts for Homepage
	public function home()
	{
		$posts= $this->_pages->getAllPostsByCat('Accueil');

		$view= new View('Home');

		$view->generate(array('posts'=>$posts));
	}

	//  displays all posts for Actualites page
	public function news()
	{
		$posts= $this->_pages->getAllPostsByCat('Actualites');

		$view= new View('News');
		$view->generate(array('posts'=>$posts));
	}

	//displays contact's form
	public function contact()
	{
		$posts="";
		$view= new View('Contact');
		$view->generate(array('posts'=>$posts));

	}

	public function connexion()
	{	
		$posts="";
		$view= new View('connexion');
		$view->generate(array('posts'=>$posts));

	}

}