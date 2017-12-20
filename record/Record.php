<?php

require_once "config/database.php";

class Record{

    protected $connection;

    public function __construct(){
        $this->connection = new Database;
    }

    public function show($table){
        $query = "SELECT * FROM ".$table;
        $result = mysqli_query($this->connection->getConnection(), $query) or die(mysqli_error());
        return $result;
    }

    public function read($id, $param, $table){
        $query = "SELECT * FROM ".$table." WHERE ".$param." = ".$id;
        $result = mysqli_query($this->connection->getConnection(), $query) or die(mysqli_error());
        return $result;
    }

    public function insert($table, $insData){
        $prep = array();
        foreach($insData as $k => $v ) {
            $prep["'".$v."'"] = $v;
        }
        $query = "INSERT INTO ".$table." (" . implode(', ',array_keys($insData)) . ") VALUES (" . implode(', ',array_keys($prep)) . ")";
        $result = mysqli_query($this->connection->getConnection(), $query);
        if($result){
            $hasil = 'success';
        }else{
            $hasil = 'failed';
        }
        $data = array(
            'message' => $hasil,
        );
        return json_encode($data);
    }

    public function update($id, $data){

    }

    public function delete($id, $table){

    }
}
