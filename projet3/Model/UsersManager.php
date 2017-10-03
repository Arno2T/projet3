<?php

require_once 'Model.php';
require_once 'Users.php';

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


	//---- READ ----- //

	//counts number of users
	public function countUsers()
	{
		$req=$this->_bdd->query('SELECT Count(*) AS nbUsers From Users');
		$data=$req->fetch();
		$req->closeCursor();
		$nbUsers=$data['nbUsers'];

		return $nbUsers;
	}

	// selects All users

	public function getAllUsers()
	{
		$req= $this->_bdd->query('SELECT id, login, first_name as firstName, last_name as lastName, email, role FROM Users');

		while($datas= $req->fetch(PDO::FETCH_ASSOC))
			{
				$users[]=new Users($datas);
			}
		return $users;

	}

	// selects user from login
	public function datasCheck($login)
	{
		$datas=array('login'=>$login);
		$user= new Users($datas);
		return $user;
	}
	public function checkUser(Users $user)
	{

		$req= $this->_bdd->prepare('SELECT id, login, password, email, role FROM Users WHERE login=:login');
		$req->bindValue(':login', $user->getLogin(), PDO::PARAM_STR);
		$req->execute();
		$data=$req->fetch(PDO::FETCH_ASSOC);
		
		return $data;
		

	}

	// selects one user from id
	public function getUser($idUser)
	{
		$idUser=(int) $idUser;
		$req= $this->_bdd->query('SELECT id, login, email, first_name AS firstName, last_name AS lastName, role FROM Users WHERE id='.$idUser);
		$datas=$req->fetch(PDO::FETCH_ASSOC);

		return new Users($datas);

	}

	//---- CREATE ----//

	// get $_POST datas' user
	public function datasUser($login, $password, $firstName, $lastName, $email)
	{
		$securePassword= password_hash($password, PASSWORD_DEFAULT); //hash a password
		$datas=(array('login'=>$login, 'password'=>$securePassword, 'firstName'=>$firstName, 'lastName'=>$lastName, 'email'=>$email));
		$user=new Users($datas);
		return $user;	

	}

	// add an user
	public function addUser(Users $user)
	{	

		$req= $this->_bdd->prepare('INSERT INTO Users(login, password, first_name, last_name, email) VALUES (:login, :password, :firstName, :lastName, :email)');
		$req->bindValue(':login', $user->getLogin(), PDO::PARAM_STR);
		$req->bindValue(':password',$user->getPassword(), PDO::PARAM_STR);
		$req->bindValue(':firstName',$user->getFirstName(), PDO::PARAM_STR);
		$req->bindValue(':lastName', $user->getlastName(), PDO::PARAM_STR);
		$req->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
		
		$result=$req->execute();
		return $result;
		
	}

	//---- UPDATE ----//

	//updates user's role from $idUser
	//public function updateUser($role, $idUser)
	public function datasUpdate($id, $role)
	{
		$datas=array('id'=>$id, 'role'=>$role);
		$user= new Users($datas);
		return $user;
	}


	public function updateUser(Users $user)
	{
		$req=$this->_bdd->prepare('UPDATE Users SET role=:role WHERE id=:id');
		$req->bindValue(':role', $user->getRole(), PDO::PARAM_STR);
		$req->bindValue(':id', $user->getId(), PDO::PARAM_INT);
		$req->execute();

		return $req;
	}


	//---- DELETE ----//

	//deletes user from $idUser
	public function datasDelete($idUser)
	{
		$datas=array('id'=>$idUser);
		$user= new Users($datas);
		return $user;
	}

	public function deleteUser(Users $user)
	{
		$req=$this->_bdd->prepare('DELETE FROM Users WHERE id=:idUser');
		$req->bindValue(':idUser', $user->getId(), PDO::PARAM_INT);
		$req->execute();
	}

	
}




