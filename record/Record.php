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
        return $result;
    }

    public function update($id, $param, $data, $table){
        $prep = array();
        $val = array();
        foreach($data as $key => $value){
            $prep["'".$value."'"] = $value;
        }
        foreach($data as $key => $value){
            $val["".$key.""] = $key;
        }
        $isi = array_keys($prep);
        $var = implode(', ', $isi);
        $query = "UPDATE ".$table." SET ".implode(', ', array_keys($prep))." WHERE ".$param." = ".$id;
        return $var;
    }

    public function delete($id, $param, $table){
        $query = "DELET FROM ".$table." WHERE ".$param." = ".$id;
        return $query;
    }
}
