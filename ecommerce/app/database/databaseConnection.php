<?php

class databaseConnection {
    // database connection
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'nti_ecommerce';
    private $connection;
    function __construct()
    {
        $this->connection = new mysqli($this->host,$this->username,$this->password,$this->database);
        if($this->connection->connect_error){
            die("connection failed:".$this->connection->connect_error);
            // echo $connection->error;die;
        }
        // echo "connection Successfull";
    }

    // selects
    public function runDQL($query)
    {
        $reuslt =  $this->connection->query($query);
        if($reuslt->num_rows > 0){
            return $reuslt;
        }else{
            return [];
        }
    }

    // inserts updates deletes
    public function runDML($query)
    {
        $reuslt = $this->connection->query($query);
        if($reuslt){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}

