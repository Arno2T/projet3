<?php

require_once 'Model.php';
require_once 'Comments.php';

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

	//----READ----- //

	//get all comments from idPost
	public function getComments($idPost)
	{
		$req=$this->_bdd->query('SELECT Comments.id, content_com AS content, DATE_FORMAT(date_com, "%d/%m/%Y %Hh%imin%ss") AS date, id_users AS idUser, id_post AS idPost, moderate, login FROM Comments INNER JOIN Users ON id_users=Users.id WHERE id_post='.$idPost);

		$comments=[];
	
		while($datas=$req->fetch(PDO::FETCH_ASSOC))
			{	
					$comments[]=new Comments($datas);		
			}
		return $comments;
				
	}


	//get all comments which are moderated
	public function getAllComments()
	{
		$req=$this->_bdd->query('SELECT Comments.id, content_com AS content, DATE_FORMAT(date_com, "%d/%m/%Y %Hh%imin%ss") AS date, id_users, id_post, moderate, login FROM Comments INNER JOIN Users ON id_users=Users.id WHERE moderate >0 ORDER BY moderate DESC');
		
		$comments=[];
		while($datas=$req->fetch(PDO::FETCH_ASSOC))
		{
			
				 $comments[]=new Comments($datas);
				 //return $comments;
			
			
		}
		return $comments;
	}

	//get a comment from idComment
	public function getComment($idComment)
	{	
		$req=$this->_bdd->query('SELECT id, content_com AS content, DATE_FORMAT(date_com, "%d/%m/%Y %Hh%imin%ss") AS date, id_users AS idUser, id_post AS idPost, moderate FROM Comments WHERE id='.$idComment);
		//die(var_dump($idComment));
		while($datas=$req->fetch(PDO::FETCH_ASSOC))
		{
			$comment=new Comments($datas);
		}
		return $comment;
	}


	//----- CREATE ---- //


	//add a comment

	public function datasComment($author, $content, $idPost, $idUser)
	{
		$datas=array('author'=>$author, 'content'=>$content, 'idPost'=>$idPost, 'idUser'=>$idUser);
		$comment= new Comments($datas);
		return $comment;
	}

	public function addComments(Comments $comment)
	{
		$req=$this->_bdd->prepare('INSERT INTO Comments(id_users, content_com, date_com, id_post) VALUES(:idUsers, :content, :dateCom, :idPost)');
		$req->bindValue(':idUsers', $comment->getIdUser(), PDO::PARAM_INT);
		$req->bindValue(':content', $comment->getContent(), PDO::PARAM_STR);
		$req->bindValue(':idPost', $comment->getIdPost(), PDO::PARAM_INT);
		$req->bindValue(':dateCom', date(DATE_W3C)); 

		$req->execute();
		return $req;
	
	}

	//delete a comment from idComment
	public function idComment($idComment)
	{
		$datas= array('id'=>$idComment);
		$comment= new Comments($datas);
		return $comment;
	}

	public function deleteComment(Comments $comment)
	{
		$req=$this->_bdd->prepare('DELETE From Comments WHERE id=:idComment');
		$req->bindValue(':idComment', $comment->getId(), PDO::PARAM_INT);
		$req->execute();

		return $req;
	}

	//----UPDATE----  //

	//signal a comment from idComment
	
	public function signalComment($idComment)
	{ 
		$comment=$this->getComment($idComment);
		$moderate=$comment->getModerate();
		$moderate=$moderate+1;
		

		$req=$this->_bdd->prepare('UPDATE Comments SET moderate=:moderate WHERE id=:idComment');
		$req->bindValue(':idComment', $idComment, PDO::PARAM_INT);
		$req->bindValue(':moderate', $moderate, PDO::PARAM_INT);
		$req->execute();

		return $req;
	}
}

