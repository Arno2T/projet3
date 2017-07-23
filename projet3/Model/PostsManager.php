<?php

/**
* Manages connection to database
**/
require 'Model.php';

class PostsManager
{
	private $_bdd;


	public function __construct()
	{
		$db= new Model;
		$database=$db->getBdd();
		$this->setBdd($database);

		
	}


	//Connection to database
	public function setBdd($bdd)
	{
		$this->_bdd=$bdd; 
		
	}

	// Read 

	// get all posts
	public function getAllPosts()
	{
		$req=$this->_bdd->query('SELECT id, title_post as title, content_post as content, date_post FROM Posts ORDER BY id DESC');

		return $req;

	}

	// get one post by id
	public function getPost($idPost)
	{
		$req=$this->_bdd->prepare('SELECT title_post as title, content_post as content, date_post FROM Posts WHERE id=:id');

		$req->bindValue(':id', $idPost=$_GET['id'], PDO::PARAM_INT);
		$req->execute();

	}

	// Create 



	public function insertPost()
	{
		$req = $this->_bdd->prepare ('INSERT INTO Posts(title_post, content_post, date_post) VALUES (:title, :content, date_post) ');
		$req->bindValue(':title', $_POST['title'], PDO::PARAM_STRING);
	}
}





