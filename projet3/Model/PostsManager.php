<?php

/**
* Manages connection to database
**/
require_once 'Model.php';

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

	//get all posts

	public function getAllPosts()
	{
		$req=$this->_bdd->query('SELECT id, title_post AS title, content_post AS content, date_post, category FROM Posts ORDER BY id DESC');

		return $req;
	}

	// get all posts by category
	public function getAllPostsByCat($category)
	{
		$req=$this->_bdd->prepare('SELECT id, title_post as title, content_post as content, date_post, category FROM Posts WHERE category=:category ORDER BY id DESC');
		$req->bindValue(':category', $category, PDO::PARAM_STR);
		$req->execute();

		return $req;

	}

	// get one post by id
	public function getPost($idPost)
	{	
		if (isset($_GET['id']))
		{
		$req=$this->_bdd->query('SELECT id, title_post as title, content_post as content, date_post FROM Posts WHERE id='.$_GET['id']);

		$result= $req->fetch(PDO::FETCH_ASSOC);

		return $result;
		}

	}

	public function countPosts()
	{
		$req= $this->_bdd->query('SELECT Count(*) AS nbPosts FROM Posts');
		$data=$req->fetch();
		$req->closeCursor();
		$nbPosts=$data['nbPosts'];

		return $nbPosts;
	}

	// Create 



	public function insertPost($title, $content, $category)
	{
		$req= $this->_bdd->prepare('INSERT INTO Posts (title_post, content_post, date_post, id_users, category) VALUES (:title, :content, NOW(), :idUsers, :category)');
		$req->bindValue(':title', $title, PDO::PARAM_STR);
		$req->bindValue(':content', $content, PDO::PARAM_STR);
		$req->bindValue(':idUsers', 12);
		$req->bindValue(':category', $category, PDO::PARAM_STR);

		$result=$req->execute();
		var_dump($result);

		
		return $result;

	}


	//UPDATE
	public function updatePost($title, $content, $category, $id)
	{
		$req=$this->_bdd->prepare('UPDATE Posts SET title_post=:title, content_post=:content, category=:category WHERE id=:id');
		$req->bindValue(':title', $title, PDO::PARAM_STR);
		$req->bindValue(':content', $content, PDO::PARAM_STR);
		$req->bindValue(':category', $category, PDO::PARAM_STR);
		$req->bindValue(':id', $id, PDO::PARAM_INT);
		$req->execute();
		
		return $req;
	}


	//DELETE

	public function deletePost($idPost)
	{
		$req= $this->_bdd->prepare('DELETE FROM Posts WHERE id=:id ');
		$req->bindValue(':id', $idPost, PDO::PARAM_INT);
		$req->execute();
	}





	
}





