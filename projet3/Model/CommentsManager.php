<?php

require_once 'Model.php';

class CommentsManager
{
	private $_bdd;


	public function __construct()
	{
		$db= new Model();
		$database= $db->getBdd();
		$this->setBdd($database);
	}


	public function setBdd($bdd)
	{
		$this->_bdd=$bdd;
	}

	//Read

	//get all comments from idPost
	public function getComments($idPost)
	{
		$req=$this->_bdd->prepare('SELECT Comments.id, content_com AS content, DATE_FORMAT(date_com, "%d/%m/%Y %Hh%imin%ss") AS date_com, id_users, id_post, moderate, login FROM Comments INNER JOIN Users ON id_users=Users.id WHERE id_post=? ORDER BY id DESC');
		$req->execute(array($idPost));
		return $req;
	}

	public function getAllComments()
	{
		$req=$this->_bdd->query('SELECT Comments.id, content_com AS content, DATE_FORMAT(date_com, "%d/%m/%Y %Hh%imin%ss") AS date_com, id_users, id_post, moderate, login FROM Comments INNER JOIN Users ON id_users=Users.id WHERE moderate >0 ORDER BY moderate DESC');
		
		return $req;
	}

	//get a comment from idComment
	public function getComment($idComment)
	{
		$req=$this->_bdd->prepare('SELECT id, content_com AS content, DATE_FORMAT(date_com, "%d/%m/%Y %Hh%imin%ss") AS date_com, id_users, id_post, moderate FROM Comments WHERE id=:idComment');
		$req->bindValue(':idComment', $idComment, PDO::PARAM_INT);
		$req->execute();
		$data=$req->fetch();
		$req->closeCursor();

		return $data;
	}


	//Create

	public function addComments($author, $content, $idPost, $idUser)
	{
		$req=$this->_bdd->prepare('INSERT INTO Comments(id_users, content_com, date_com, id_post) VALUES(:idUsers, :content, :dateCom, :idPost) ');
		$req->bindValue(':idUsers', $idUser, PDO::PARAM_INT);
		$req->bindValue(':content', $content);
		$req->bindValue(':idPost', $idPost, PDO::PARAM_INT);
		$req->bindValue(':dateCom', date(DATE_W3C)); 

		$req->execute();
		return $req;
	
	}

	public function deleteComment($idComment)
	{
		$req=$this->_bdd->prepare('DELETE From Comments WHERE id=:idComment');
		$req->bindValue(':idComment', $idComment, PDO::PARAM_INT);
		$req->execute();

		return $req;
	}

	//UPDATE
	public function signalComment($idComment)
	{ 
		$comment=$this->getComment($idComment);
		$moderate=$comment['moderate'];
		$moderate=$moderate+1;
		

		$req=$this->_bdd->prepare('UPDATE Comments SET moderate=:moderate WHERE id=:idComment');
		$req->bindValue(':idComment', $idComment, PDO::PARAM_INT);
		$req->bindValue(':moderate', $moderate, PDO::PARAM_INT);
		$req->execute();

		return $req;
	}
}

