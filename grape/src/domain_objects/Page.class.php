<?

	class Page
	{
		
		private $id;
		private $title;
		private $userID;
		private $categoryID;
		private $summary;
		
		public function Page($id = null , $title = null , $userID = null , $categoryID = null , $summary = null)
		{
			$this->id = $id;
			$this->title = $title;
			$this->userID = $userID;
			$this->categoryID = $categoryID;
			$this->summary = $summary;
		}
		
		public function setId($id)
		{
			$this->id = $id;
		}
		
		public function getId()
		{
			return $this->id;
		}
		
		public function setTitle($title)
		{
			$this->title = $title;
		}
		
		public function getTitle()
		{
			return $this->title;
		}
		
		public function setUserID($userID)
		{
			$this->userID = $userID;
		}
		
		public function getUserID()
		{
			return $this->userID;
		}
		
		public function setCategoryID($categoryID)
		{
			$this->categoryID = $categoryID;
		}
		
		public function getCategoryID()
		{
			return $this->categoryID;
		}
		
		public function setSummary($summary)
		{
			$this->summary = $summary;
		}
		
		public function getSummary()
		{
			return $this->summary;
		}
	}