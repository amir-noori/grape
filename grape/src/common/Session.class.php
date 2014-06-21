<?php
	
	require_once(dirname(__FILE__) . '/../domain_objects/User.class.php');
	
	class Session
	{
		private $user;
		private $lastVistTime;
		
		public function Session()
		{
			session_start();
			$this->user = new User();
			$this->lastVisitTime = date('r');
		}
		
		public function setUserInfo($user)
		{
			$this->user = $user;			
			$_SESSION['firstName'] = $this->user->getFirstName();
			$_SESSION['lastName'] = $this->user->getLastName();
			$_SESSION['email'] = $this->user->getEmail();
			$_SESSION['userId'] = $this->user->getId();
			$_SESSION['password'] = $this->user->getPassword();
			$_SESSION['userName'] = $this->user->getUserName();
			$_SESSION['userObject'] = serialize($this->user);
			
			$_SESSION['lastVisitTime'] = $this->lastVisitTime;
			$_SESSION['permissionsID'] = $this->user->getPermissionsID();
			$_SESSION['userCreated'] = $this->user->getCreated();
		}
		
		public function getUser()
		{
			return $this->user;
		}
		
		public function setUser(User $u)
		{
			$this->user = $u;
		}
		
	}