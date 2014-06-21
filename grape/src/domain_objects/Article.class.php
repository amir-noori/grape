<?

	class Page
	{
		
		private $id;
		private $title;
		private $userID;
		private $pageID;
		private $articleContent;
		private $summary;
		
		public function Page($id = null , $title = null , $userID = null , $pageID = null , $articleContent = null , $summary = null)
		{
			$this->id = $id;
			$this->title = $title;
			$this->userID = $userID;
			$this->pageID = $pageID;
			$this->articleContent = $articleContent;
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
		
		public function setPageID($pageID)
		{
			$this->pageID = $pageID;
		}
		
		public function getPageID()
		{
			return $this->pageID;
		}
		
		public function setArticleContent($articleContent)
		{
			$this->articleContent = $articleContent;
		}
		
		public function getArticleContent()
		{
			return $this->articleContent;
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