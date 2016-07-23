<?php

class DB{
    function __construct(){
        //database configuration
        $dbServer = 'localhost'; 
        $dbUsername = 'user';
        $dbPassword = 'password';
        $dbName = 'drag_and_drop';
        
        $con = mysqli_connect($dbServer, $dbUsername, $dbPassword, $dbName);
        if (mysqli_connect_errno()) {
            die("Failed to connect with MySQL: " .misqli_connect_error());
        } else {
            $this->connect = $con;
        }
        
    }
}

function getRows() {
    $sql = "SELECT * FROM `images` ORDER BY `order` ASC";
    $result = mysqli_query($this->connect, $sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function updateOrder($id_array) {
    $count = 1;
    foreach($id_array as $id) {
        $sql = "UPDATE `images` SET `order` = $count WHERE id = $id";
        $result = mysqli_query($this->connect, $sql);
        $count ++;
    }
    return true;
}