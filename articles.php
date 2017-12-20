<?php
require_once "config/database.php";
require_once "record/Record.php";

class Article{
    protected $con;

    public function __construct(){
        $this->con = new Database;
        $this->db = new Record;
    }

    public function show(){
        $result = $this->db->show('articles');
        $arr = array();
        foreach($result as $row){
            $data = array(
                'title' => $row['title'],
                'description' => $row['description']
            );
            array_push($arr,$data);
        }
        $json = array(
            'status' => 'success',
            'type' => 'articles',
            'data' => $arr
        );
        return json_encode($json);
    }

    public function read($id){
        $result = $this->db->read($id, 'id', 'articles');
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

    public function add($table, $data){
        return $this->db->insert($table, $data);
    }

    public function update($id, $array){
        
    }

    public function destroy($id){

    }
}

// $article = new Article;
// $data = array(
//     'title' => 'halo Bos',
//     'description' => 'keren bos'
// );
// echo $article->add('articles', $data);
