<?php

	class User
	{
		private $firstName;
		private $lastName;
		private $email;
		private $userName;
		private $password;
		private $id;
		private $created;
		private $permissionsID;
		
		public function User($mail = null , $password = null , $fName = null , $lName = null , $userName = null , $id = null)
		{
			$this->firstName = $fName;
			$this->lastName = $lName;
			$this->email = $mail;
			$this->userName = $userName;
			$this->password = $password;
			$this->id = $id;
		}
		
		public function setFirstName($firstName)
		{
			$this->firstName = $firstName;
		}
		
		public function getFirstName()
		{
			return $this->firstName;
		}
		
		public function setLastName($lastName)
		{
			$this->lastName = $lastName;
		}
		
		public function getLastName($lastName)
		{
			return $this->lastName;
		}
		
		public function setEmail($mail)
		{
			$this->email = $mail;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
		
		public function setUserName($userName)
		{
			$this->userName = $userName;
		}
		
		public function getUserName()
		{
			return $this->userName;
		}
		
		public function setPassword($password)
		{
			$this->password = $password;
		}
		
		public function getPassword()
		{
			return $this->password;
		}
		
		public function setId($id)
		{
			$this->id = $id;
		}
		
		public function getId()
		{
			return $this->id;
		}
		
		public function setCreated($created)
		{
			$this->created = $created;
		}
		
		public function getCreated()
		{
			return $this->created;
		}
		
		public function setPermissionsID($permissionsID)
		{
			$this->permissionsID = $permissionsID;
		}
		
		public function getPermissionsID()
		{
			return $this->permissionsID;
		}
		
	}
	