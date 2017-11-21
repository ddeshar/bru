<?php
if(isset($_POST["mem_idcard"])){
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
        die();
    }
    $mysqli = new mysqli('localhost' , 'root', '', 'db_sk');
    if ($mysqli->connect_error){
        die('Could not connect to database!');
    }

    $username = filter_var($_POST["mem_idcard"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW|FILTER_FLAG_STRIP_HIGH);

    $statement = $mysqli->prepare("SELECT mem_idcard FROM member WHERE mem_idcard=?");
    $statement->bind_param('s', $username);
    $statement->execute();
    $statement->bind_result($username);
    if($statement->fetch()){
        die('<img src="asset/loding/not-available.png" />');
    }else{
        die('<img src="asset/loding/available.png" />');
    }
}
