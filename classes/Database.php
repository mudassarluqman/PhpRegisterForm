<?php
class Database
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO("mysql:host=localhost;dbname=loginsystem_mine", 'root', '');
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query($sql){
        $this->db->query($sql);
        
    }
    

}