<?php

require_once 'Model/PostsManager.php';
require_once 'View/View.php';

class ControllerPages
{
	private $_home;
	private $_news;
	private $_contact;


	public function __construct()
	{
		$this->_home= new PostsManager();
		$this->_news= new PostsManager();
		$this->_contact= new PostsManager();
	}

	public function home()
	{
		$posts= $this->_home->getAllPostsByCat('Accueil');

		$view= new View('Home');

		$view->generate(array('posts'=>$posts));
	}

	public function news()
	{
		$posts= $this->_news->getAllPostsByCat('Actualites');

		$view= new View('News');
		$view->generate(array('posts'=>$posts));
	}

	public function contact()
	{
		$posts="";
		$view= new View('Contact');
		$view->generate(array('posts'=>$posts));

	}

}