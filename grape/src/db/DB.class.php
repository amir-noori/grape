<?php

	require_once(dirname(__FILE__) . '/PDOFactory.class.php');
	
	class DB
	{		
		public static function executeQuery($query , $return = false)
		{
			try
			{
				$PDOF = PDOFactory::getPdoObject();
				$stmt = $PDOF->prepare($query);
				$stmt->execute() or die(print_r($stmt->errorInfo()));
				if($return)
				{
					return $stmt->fetchAll(PDO::FETCH_BOTH);
				}

			}
			catch(exception $e)
			{
				$e->getMessage();
			}

		}
				
		public static function getRows($table , $columns = null , $limit1 = null , $limit2 = null)
		{
			$query = 'SELECT * FROM `' . $table . '`';
			if($columns != null)
			{
				$query .= ' WHERE ';
				foreach($columns as $key => $val)
				{
					$query .= '`' . $key . '`="' . $val . '" AND ';
				}
				
				$query = substr_replace($query ,"", -4 , -1);
			}
			if(isset($limit1))
				$query .= 'LIMIT ' . $limit1 . ' , ' . $limit2;
				
			return DB::executeQuery($query , true);
		}
		
		public static function insertRows($table , $columns = array())
		{
			$query = '';
			if(is_array($columns[0]))
			{
				foreach($columns as $col)
				{
					$query .= 'INSERT INTO `' . $table . '` (' ;
					foreach($col as $key => $val)
					{
						$query .= '`' . $key . '` , ';
					}
					$query = substr_replace($query ,"", -3 , -1);
					$query .= ')VALUES(';
					foreach($col as $key => $val)
					{
						$query .= '`' . $val . '` , ';
					}
					$query = substr_replace($query ,"", -3 , -1);
					$query .= '); ';
				}
			}
			else
			{
				$query .= 'INSERT INTO `' . $table . '` (' ;
				foreach($columns as $key => $val)
				{
					$query .= '`' . $key . '` , ';
				}
				$query = substr_replace($query ,"", -3 , -1);
				$query .= ')VALUES(';
				foreach($columns as $key => $val)
				{
					$query .= '`' . $val . '` , ';
				}
				$query = substr_replace($query ,"", -3 , -1);
				$query .= ')';
			}
			
			DB::executeQuery($query);

		}
	
		
		public static function updateRows($table , $columns = array())
		{
			$query = '';
			if(is_array($columns[0]))
			{
				foreach($columns as $col)
				{
					$count = count($col);
					$temp = 0;
					$query .= 'UPDATE `' . $table . '` SET ' ;
					foreach($col as $key => $val)
					{
						if($temp < $count - 1)
						{
							$query .= '`' . $key . '`="' . $val . '" , ';
						}
						else
						{
							
							$query = substr_replace($query ,"", -3 , -1);	
							$query .= 'WHERE ';
							foreach($val as $k => $v)
							{
								$query .= ' `' . $k . '`="' . $v . '" AND ';
							}
							$query = substr_replace($query ,"", -4 , -1);	
						}
						$temp++;
					}
					$query .= ';';
				}
				
			}
			else
			{
				$count = count($columns);
				$temp = 0;
				$query .= 'UPDATE `' . $table . '` SET ' ;
				foreach($col as $key => $val)
				{
					if($temp < $count - 1)
					{
						$query .= '`' . $key . '`="' . $val . '" , ';
						$temp++;
					}
					else
					{
						$query = substr_replace($query ,"", -3 , -1);
						$query .= 'WHERE `' . $key . '`="' . $val . '" , ';
					}

				}
				$query .= ';';
			}
			echo $query;
			DB::executeQuery($query);
		}
		
	}
	
	
	