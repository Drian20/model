<?php

	class Model{

		protected $db;

		function __construct(){
			$this->db=DB::singleton();
		}

		function query($query)
		{
			$this->stmt = $this->db->prepare($query);
		}

		function bind($param, $value, $type = null)
		{
			switch ($value) {
				case is_null($value):
					$type=PDO::PARAM_NULL;
					break;
				case is_int($value):
					$type=PDO::PARAM_INT;
					break;
				case is_string($value):
					$type=PDO::PARAM_STR;	
					break;	
			}	
			$this->stmt->bindValue($param, $value, $type);
		}

		function execute(){
			$this->stmt->execute();
		}

		function resultset(){
			$this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		function single(){
			$this->stmt->fetchAll(PDO::FETCH_ASSOC);
		}

		function rowCount(){
			return $this->stmt->rowCount();
		}

		function lastInsertId(){
			return $this->stmt->lastInsertId();
		}

		function beginTransaction(){
			$this->db->begintransaction();
		}

		function endTransaction(){
			$this->db->endtransaction();
		}

		function cancelTransaction(){
			$this->db->canceltransaction();
		}

		function debugDumpParams(){
			$this->stmt->debugDumpParams();
		}
	}