<?php
require_once "database.php";

class Article{
    protected $con;

    public function __construct(){
        $this->con = new Database;
    }

    public function show(){
        $query = "SELECT * FROM articles ORDER BY id DESC";
        $result = mysqli_query($this->con->getConnection(), $query);
        $arr = array();
        foreach($result as $row){
            $data = array(
                'title' => $row['title'],
                'description' => $row['description']
            );
            array_push($arr,$data);
        }
        return json_encode($arr);
    }

    public function read($id){
        $query = "SELECT * FROM articles WHERE id = $id";
        $result = mysqli_query($this->con->getConnection(), $query);
        $arr = array();
        foreach($result as $row){
            $data = array(
                'title' => $row['title'],
                'description' => $row['description']
            );
            array_push($arr,$data);
        }
        return json_encode($arr);
    }

    public function add($title, $description, $created_by){
        $query = "INSERT INTO articles (title, description, created_by) VALUES ($title, $description, $created_by)";
        $result = mysqli_query($query);
        if($result){
            $hasil = 'success';
        }else{
            $hasil = 'failed';
        }
        return json_encode($hasil);
    }

    public function update($id, $array){

    }

    public function destroy($id){

    }
}

$article = new Article;
echo $article->add('buku cerita anak', 'buku tentang cerita si kancil', '2');
