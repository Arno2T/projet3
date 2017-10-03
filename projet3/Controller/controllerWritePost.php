<?php

require_once 'Model/PostsManager.php';
require_once 'View/View.php';

class controllerWritePosts
{
	private $_post;


	public function __construct()
	{
		$this->_post=new PostsManager();
	}

	//allows to add a new post
	public function newPost($title, $content, $category)
	{
		$post=$this->_post->datasPost($title, $content, $category);
		$this->_post->insertPost($post);
	}
	
	//displays page for updating a new post
	public function showPost($idPost)
	{	
		if (isset($idPost))
		{	
			$module="Posts";
			$id='&id='.$_GET['id'];
			$post= $this->_post->getPostToUpdate($idPost);
			$content=$post->getContent();
			$title =$post->getTitle();
			$view= new View('WritePosts');
			$view->generateAdmin(array('module'=>$module, 'id'=>$id, 'content'=>$content, 'title'=>$title));
		}
		else
		{
			$module="Posts";
			$id="";
			$content="";
			$title="";
			$view= new View('WritePosts');
			$view->generateAdmin(array('module'=>$module, 'id'=>$id, 'content'=>$content, 'title'=>$title));
		}
	}

	//allows to update a post
	public function updatePost($title, $content, $category, $id)
	{
		$post=$this->_post->datasUpdate($title, $content, $category, $id);
		$this->_post->updatePost($post);
	}


	//displays page for writing a post
	public function writeNewPost()
	{	
		$module="new";
		$id="";
		$content="";
		$title="";
		$view= new View('WritePosts');
		$view->generateAdmin(array('module'=>$module, 'id'=>$id, 'content'=>$content, 'title'=>$title));
		
	}
	
}