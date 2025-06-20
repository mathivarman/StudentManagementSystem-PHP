<?php
    if(!isset($_GET['id'])&&!isset($_GET['hobbyid'])){
        echo "No ID provided!";
        exit;
    }
    if(!is_numeric($_GET['id'])&&!is_numeric($_GET['hobbyid'])){
        echo "Invalid ID!";
        exit;
    }
    $connection = mysqli_connect("localhost", "root", "root", "crudsystem");
    if(!$connection){
        die("Connection failed: " .mysqli_connect_error());
    }
    $sql = "DELETE FROM `crudsystem`.`students_hobbies` WHERE `stu_id` = " . $_GET['id'] . " AND `hobby_id` = " . $_GET['hobbyid'];

    $result = mysqli_query($connection,$sql);
    if(!$result){
        die("Query failed: " .mysqli_error($connection));
    }
    mysqli_close($connection);
    header("Location:index.php?page=index&section=hobbies");


?>