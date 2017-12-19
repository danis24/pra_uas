<?php
class Database{
    public function getConnection(){
        $con = mysqli_connect("localhost", "root","", "crud_mysqli");
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        return $con;
    }
}
?>
