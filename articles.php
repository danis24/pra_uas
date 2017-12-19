<?php
require_once "database.php";

class article{

    protected $con;

    public function __construct(){
        $this->con = new database;
    }

    public function show(){
        $query = "SELECT * FROM articles ORDER BY id DESC";
        $result = mysqli_query($this->con->getConnection(), $query);
        return mysqli_free_result($result);
    }

    public function read($id){
        $query = "SELECT * FROM articles WHERE id = $id";
        $result = mysqli_query($this->con->getConnection(), $query);
        return mysqli_free_result($result);
    }

    public function add($array){

    }

    public function update($id, $array){

    }
}

$article = new article;
echo $article->read(1);
