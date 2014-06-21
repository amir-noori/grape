<?

	class Page
	{
		
		private $id;
		private $commentContent;
		private $userID;
		private $pageID;
		private $articleID;
		
		public function Page($id = null , $commentContent = null , $userID = null , $pageID = null , $articleID = null)
		{
			$this->id = $id;
			$this->commentContent = $commentContent;
			$this->userID = $userID;
			$this->pageID = $pageID;
			$this->articleID = $articleID;
		}
		
		public function setId($id)
		{
			$this->id = $id;
		}
		
		public function getId()
		{
			return $this->id;
		}
		
		public function setCommentContent($commentContent)
		{
			$this->commentContent = $commentContent;
		}
		
		public function getCommentContent()
		{
			return $this->commentContent;
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
		
		public function setArticleID($articleID)
		{
			$this->articleID = $articleID;
		}
		
		public function getArticleID()
		{
			return $this->articleID;
		}
		
	}