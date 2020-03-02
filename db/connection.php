<?php

require_once('config.php');
class db
{
    public $server = DB_SERVER;
    public $username = DB_USERNAME;
    public $password = DB_PASSWORD;
    public $database = DB_NAME;
    public $connection = '';

    public function __construct()
    {
		try {
			$connString = "mysql:host=$this->server;dbname=$this->database";

            $this->connection = new PDO($connString, $this->username, $this->password);
            $this->connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (PDOException $e) {
            //throw $th;
            die("Connection failed: " .  $e->getMessage());
        }
    }
}
