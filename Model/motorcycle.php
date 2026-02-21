<?php

namespace App\Model;

use App\Config\Database;

class Motorcycle{
    private $conn;
    private $table = 'motorcycle_details';

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll(){
        $result = $this->conn->query("SELECT * FROM $this->table");
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    public function getById($id){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($model, $cc, $transmission, $brakes){
        $stmt = $this->conn->prepare("INSERT INTO $this->table(model,cc,transmission,brakes) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss",$model,$cc,$transmission,$brakes);
        return $stmt->execute();
    }

    public function update($id,$model, $cc, $transmission, $brakes){
        $stmt=$this->conn->prepare("UPDATE $this->table SET model =?, cc =?, transmission =?, brakes =? WHERE id =?");
        $stmt->bind_param("ssssi", $model, $cc, $transmission, $brakes,$id);
        return $stmt->execute();
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id =?");
        $stmt->bind_param("i",$id);
        return $stmt->execute();
    }
}