<?php

class Database{
    private $dsn = 'mysql:host=localhost;dbname=company';
	private $user = 'root';
	private $pass = '';
	private $option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);
    private $connect;

    public function __construct(){
        try{
            $this->connect = new PDO($this->dsn, $this->user, $this->pass, $this->option);
		    $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo 'Failed To Connect' . $e->getMessage();
        }
    }

    public function encPassword($password){
        return sha1($password);
    }

    public function putData($query, $values){
        $stmt = $this->connect->prepare($query);
        $stmt->execute($values);
    }

    public function retrive($table){
        $stmt = $this->connect->prepare("SELECT * FROM $table");
        $stmt->execute();
        $rows = $stmt->fetchAll();
        return $rows;
    }   
    
    public function find($table, $id){
        $stmt = $this->connect->prepare("SELECT * FROM $table WHERE id = ?");
        $stmt->execute(array($id));
        $row = $stmt->fetchAll();
        return $row;
    }

    public function delete($table, $id){
        $stmt = $this->connect->prepare("DELETE FROM $table WHERE id = ?");
        $stmt->execute(array($id));
    }
}