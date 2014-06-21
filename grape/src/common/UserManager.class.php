<?php 
	require_once(dirname(__FILE__) . '/Session.class.php');
	require_once(dirname(__FILE__) . '/../db/PDOFactory.class.php');
	
	class UserManager
	{
		private $user;
		private $PDO;
		
		public function UserManager($user)
		{
			$this->user = $user;
			$this->PDO = PDOFactory::getPdoObject();
		}
		
		public function getUser()
		{
			return $this->user;
		}
		
		public function setUser(User $u)
		{
			$this->user = $u;
		}
		
		public function userExists()
		{			
			if(!$this->user->getEmail())
				return false;
			$query = "SELECT * FROM `User` WHERE `email`='" . $this->user->getEmail() . "' AND `password`='" . $this->user->getPassword() . "'";
			try
			{
				$stmt = $this->PDO->prepare($query);
				$stmt->execute() or die(print_r($stmt->errorInfo()));
				$result = $stmt->fetch(PDO::FETCH_BOTH);
				if($result['email'] == $this->user->getEmail() && $result['password'] == $this->user->getPassword())
				{
					$this->user->setId($result['id']);
					$this->user->setFirstName($result['firstName']);
					$this->user->setLastName($result['lastName']);
					$this->user->setUserName($result['userName']);
					$this->user->setCreated($result['created']);
					$this->user->setPermissionsID($result['permissionsID']);
					return true;
				}
				else
					return false;	
			}
			catch(PDOException $e)
			{
				$e->getMessage();
			}
					
		}
	}