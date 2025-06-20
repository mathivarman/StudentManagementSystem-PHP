<?php
    if(!isset($_GET['id'])&&!isset($_GET['subid'])){
        echo "No ID provided!";
        exit;
    }
    if(!is_numeric($_GET['id'])&&!is_numeric($_GET['subid'])){
        echo "Invalid ID!";
        exit;
    }
    $connection = mysqli_connect("localhost", "root", "root", "crudsystem");
    if(!$connection){
        die("Connection failed: " .mysqli_connect_error());
    }
    $sql = "DELETE FROM `crudsystem`.`students_subjects` WHERE `stu_id` = " . $_GET['id'] . " AND `sub_id` = " . $_GET['subid'];

    $result = mysqli_query($connection,$sql);
    if(!$result){
        die("Query failed: " .mysqli_error($connection));
    }
    mysqli_close($connection);
    header("Location:index.php?page=index&section=subjects");


?>