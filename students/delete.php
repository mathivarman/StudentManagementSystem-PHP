<?php
    if(!isset($_GET['id'])){
        echo "No ID provided!";
        exit;
    }
    if(!is_numeric($_GET['id'])){
        echo "Invalid ID!";
        exit;
    }
    $connection = mysqli_connect("localhost", "root", "root", "crudsystem");
    if(!$connection){
        die("Connection failed: " .mysqli_connect_error());
    }
    $sql1 = "DELETE FROM `students` WHERE `id` = " . $_GET['id'];
    $sql2 = "DELETE FROM `crudsystem`.`students_subjects` WHERE `stu_id` = " . $_GET['id'];
    $sql3 = "DELETE FROM `crudsystem`.`students_hobbies` WHERE `stu_id` = " . $_GET['id'] ;

    $result1 = mysqli_query($connection,$sql1);
    if(!$result1){
        die("Query failed: " .mysqli_error($connection));
    }
 
    $result2 = mysqli_query($connection,$sql2);
    if(!$result2){
        die("Query failed: " .mysqli_error($connection));
    }
    $result3 = mysqli_query($connection,$sql3);
    if(!$result3){
        die("Query failed: " .mysqli_error($connection));
    }
 
    mysqli_close($connection);
    header("Location:index.php");


?>







