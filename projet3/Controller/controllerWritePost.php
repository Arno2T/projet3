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


	public function newPost($title, $content, $category)
	{
		$this->_post->insertPost($title, $content, $category);
	}
	
	public function showPost($idPost)
	{	
		if (isset($idPost))
		{	
			$module="Posts";
			$id='&id='.$_GET['id'];
			$post= $this->_post->getPost($idPost);
			$content = $post['content'];
			$title = $post['title'];
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

	public function updatePost($title, $content, $category, $id)
	{
		$this->_post->updatePost($title, $content, $category, $id);
	}

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