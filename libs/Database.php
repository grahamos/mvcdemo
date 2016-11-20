<?php

class Database extends PDO
{
	
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS)
	{
		parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
	}
	
	/**
	 * insert
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 */
	public function insert($table, $data) 
	{	
		ksort($data);
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ': ' . implode(', : ', array_keys($data));

	$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
		
		foreach ($data as $key => $value){
			$sth->bindValue(":$key", $value);
		}

		$sth->execute();
	}

	/**
	 * update
	 * @param string $table A name of table to insert into
	 * @param string $data An associative array
	 * @param string $where the WHERE query part
	 */
	public function update($table, $data, $where) 
	{
		ksort($data);

		$fieldNDetails = null;
		foreach ($data as $key => $value){
			$fieldNDetails = "`key` =:$key, "; 
		}

		$fieldDetails = rtrim($fieldDetails, ' ,  ');
			
			// UPDATE table set item1 = a item2 = b item3 = c where something = 1
		$sth = $this->prepare("UPDATE $table set $fieldNDetails WHERE $where");
			
			foreach ($data as $key => $value){
				$sth->bindValue("$key", $value);
			}

			$sth->execute();
	}
}