<?php

/**
* Manages connection to database
**/
require_once 'Model.php';
require_once 'Posts.php';

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

	// --- READ --- //

	//get all posts

	public function getAllPosts()
	{
		$req=$this->_bdd->query('SELECT id, title_post AS title, content_post AS content, DATE_FORMAT(date_post, "%d/%m/%Y %Hh%imin%ss") AS date, category FROM Posts ORDER BY id DESC');

		while($datas= $req->fetch(PDO::FETCH_ASSOC))
			{
				$posts[]= new Posts($datas);
			}

		return $posts;
	}

	// get all posts by category
	public function getAllPostsByCat($category)
	{
		$category=(string) $category;
		 
		$req=$this->_bdd->query('SELECT id, title_post AS title, content_post AS content, DATE_FORMAT(date_post, "%d/%m/%Y %Hh%imin%ss") AS date, category FROM Posts WHERE category="'.$category.'"ORDER BY id DESC');
		while($datas=$req->fetch(PDO::FETCH_ASSOC))
		{
			$posts[]=new Posts($datas);
		}
		return $posts;

	}

	// get one post by id
	public function getPost($idPost)
	{	
		
			$idPost=(int) $idPost;
			$req=$this->_bdd->query('SELECT id, title_post AS title, content_post AS content, DATE_FORMAT(date_post, "%d/%m/%Y %Hh%imin%ss") AS date FROM Posts WHERE id='.$idPost);

			//while ($datas=$req->fetch(PDO::FETCH_ASSOC))
			//{
				$datas=$req->fetch(PDO::FETCH_ASSOC);
				$post[]=new Posts($datas);
			//}

			return $post;
	}

	public function getPostToUpdate($idPost)
	{
		$idPost=(int) $idPost;
		$req=$this->_bdd->query('SELECT id, title_post AS title, content_post AS content, DATE_FORMAT(date_post, "%d/%m/%Y %Hh%imin%ss") AS date FROM Posts WHERE id='.$idPost);

		$datas=$req->fetch(PDO::FETCH_ASSOC);
		$post=new Posts($datas);
		return $post;

	}

	 // count all posts (home, stories,...)
	public function countPosts()
	{
		$req= $this->_bdd->query('SELECT Count(*) AS nbPosts FROM Posts');
		$data=$req->fetch();
		$req->closeCursor();
		$nbPosts=$data['nbPosts'];

		return $nbPosts;
	}

	//----- CREATE ---- // 


	 //insert a post
	public function datasPost($title, $content,$category)
	{
		$datas= array('title'=>$title, 'content'=>$content, 'category'=>$category);
		$post= new Posts($datas);
		return $post;
	}
	public function insertPost(Posts $post)
	{
		$req= $this->_bdd->prepare('INSERT INTO Posts (title_post, content_post, date_post, category) VALUES (:title, :content, NOW(), :category)');
		$req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
		$req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
		$req->bindValue(':category', $post->getCategory(), PDO::PARAM_STR);

		$result=$req->execute();

		return $result;

	}


	//---- UPDATE ----//

	//update a post

	public function datasUpdate($id, $title, $content, $category)
	{
		$datas= array('id'=>$id, 'title'=>$title, 'content'=>$content, 'category'=>$category);
		$post= new Posts($datas);
		return $post;
	}

	//update a post
	public function updatePost(Posts $post)
	{
		$req=$this->_bdd->prepare('UPDATE Posts SET title_post=:title, content_post=:content, category=:category WHERE id=:id');
		$req->bindValue(':title', $post->getTitle(), PDO::PARAM_STR);
		$req->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
		$req->bindValue(':category', $post->getCategory(), PDO::PARAM_STR);
		$req->bindValue(':id', $post->getId(), PDO::PARAM_INT);
		$req->execute();
		
		return $req;
	}


	//---- DELETE ----//

	//delete a post

	public function datasDelete($idPost)
	{
		$datas= array('id'=>$idPost);
		$post=new Posts($datas);
		return $post;
	}
	public function deletePost(Posts $post)
	{
		$req= $this->_bdd->prepare('DELETE FROM Posts WHERE id=:id ');
		$req->bindValue(':id', $post->getId(), PDO::PARAM_INT);
		$req->execute();
	}

	
}





