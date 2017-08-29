<?php

require_once 'Model.php';

class usersManager
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


	

	public function countUsers()
	{
		$req=$this->_bdd->query('SELECT Count(*) AS nbUsers From Users');
		$data=$req->fetch();
		$req->closeCursor();
		$nbUsers=$data['nbUsers'];

		return $nbUsers;
	}

	// select All users

	public function getAllUsers()
	{
		$req= $this->_bdd->query('SELECT id, login, first_name as firstName, last_name as lastName, email, role FROM Users');
		return $req;

	}

	public function checkUser($login)
	{

		$req= $this->_bdd->prepare('SELECT id, login, password, email, role FROM Users WHERE login=:login');
		$req->bindValue(':login', $login, PDO::PARAM_STR);
		$req->execute();
		$data=$req->fetch();
		
		return $data;
		

	}

	// select one user from id
	public function getUser($idUser)
	{
		$req= $this->_bdd->prepare('SELECT id, login, email, first_name AS firstName, last_name AS lastName, role FROM Users WHERE id=:idUser');
		$req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
		$req->execute();
		$data=$req->fetch();

		return $data;

	}

	//Create


	public function addUser($login, $password, $firstName, $lastName, $email)
	{
		
		$securePassword= password_hash($password, PASSWORD_DEFAULT);

		$req= $this->_bdd->prepare('INSERT INTO Users(login, password, first_name, last_name, email) VALUES (:login, :password, :firstName, :lastName, :email)');
		$req->bindValue(':login', $login, PDO::PARAM_STR);
		$req->bindValue(':password',$securePassword, PDO::PARAM_STR);
		$req->bindValue(':firstName',$firstName, PDO::PARAM_STR);
		$req->bindValue(':lastName', $lastName, PDO::PARAM_STR);
		$req->bindValue(':email', $email, PDO::PARAM_STR);
		
		$result=$req->execute();
		return $result;
		
	}

	//UPDATE

	public function updateUser($role, $idUser)
	{
		$req=$this->_bdd->prepare('UPDATE Users SET role=:role WHERE id=:id');
		$req->bindValue(':role', $role, PDO::PARAM_STR);
		$req->bindValue(':id', $idUser, PDO::PARAM_INT);
		$req->execute();

		return $req;
	}


	//DELETE

	public function deleteUser($idUser)
	{
		$req=$this->_bdd->prepare('DELETE FROM Users WHERE id=:idUser');
		$req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
		$req->execute();
	}

	
}




