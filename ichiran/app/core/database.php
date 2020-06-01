<?php
//database wrapper
class database{
	//parameter dari config
	private $host = DB_HOST;
	private $pass = DB_PASS;
	private $user = DB_USER;
	private $name = DB_NAME;
	private $charset = DB_CHARSET;

	private $dbh;
	private $stmt;

	public function __construct()
	{
		$dsn = 'mysql:host=' . $this->host. ';dbname=' . $this->name. ';charset=' . $this->charset. '';
		$option = [PDO::ATTR_PERSISTENT => true,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

		try{
			$this->dbh = new PDO($dsn,$this->user,$this->pass,$option);

		} 
		catch(PDOException $e){
			die($error->getMessage());
		}
	}

	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}

	public function bind($parameter,$value, $type = null)
	{
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
				 $type = PDO::PARAM_STR;

			}
		}

		$this->stmt->bindValue($parameter,$value,$type);
	}

	public function execute()
	{
		$this->stmt->execute();
	}

	public function resultSet()//banyak data
	{
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function single()//data single
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function rowCount()
	{
		return $this->stmt->rowCount(); //rowCount punya PDO

	}



}