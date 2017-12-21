<?php

require_once "config/database.php";
require_once "record/Record.php";
require_once "record/Presenter.php";

class Article{
    protected $con;

    public function __construct(){
        $this->con = new Database;
        $this->db = new Record;
        $this->presenter = new Presenter;
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
        return $this->presenter->response('success','articles', $arr);
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
        return $this->presenter->response('success','articles', $arr);
    }

    public function add($table, $data){
        $result = $this->db->insert($table, $data);
        if($result){
            $hasil = 'success';
        }else{
            $hasil = 'failed';
        }
        return $this->presenter->response($hasil,'articles', $data);
    }

    public function update($id, $array){
        return $result = $this->db->update($id, 'id', $array, 'articles');
        // if($result){
        //     $hasil = 'sucess';
        // }else{
        //     $hasil = 'failed';
        // }
        // return $this->presenter->response($hasil,'articles', $array);
    }

    public function destroy($id){
        $result = $this->db->delete($id,'id', 'articles');
        if($result){
            $data = array(
                'message' => 'success',
                'count' => $result
            );
        }else{
            $data = array(
                'message' => 'failed',
                'count' => $result
            );
        }
        return json_encode($data);
    }
}
// 
// $article = new Article;
// $data = array(
//     'title' => 'haloo',
//     'description' => 'ini deskripti'
// );
// echo $article->update(4, $data);
