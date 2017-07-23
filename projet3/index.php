<?php

require 'Controller/Router.php';

$router= new Router();

$router-> requestRouter();















/*
require 'Model/PostsManager.php';

$bdd= new PDO('mysql: host=localhost; dbname=p3_blog; charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$reqs= new PostsManager($bdd);
$datas = $reqs->getAllPosts();


foreach ($datas as $data) 
{
	echo '<h1><a href="?action=Posts&id='.$data['id'].'">'.$data['title'].'</a></h1>';
	echo '<p>'.$data['content'].'</p>';
	

}
*/





