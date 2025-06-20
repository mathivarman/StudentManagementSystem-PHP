<?php
if(!isset($_GET['stuid'])){
        echo "No ID provided!";
        exit;
    }
    if(!is_numeric($_GET['stuid'])){
        echo "Invalid ID!";
        exit;
    }
    $stu_id = intval($_GET["stuid"]); 
    echo $stu_id;
$connection = mysqli_connect("localhost", "root", "root", "crudsystem");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}



$hobbies = array_map('intval', $_POST["hobbies"]);   


$delete_hobbies = "DELETE FROM `students_hobbies` WHERE `stu_id` = '$stu_id'";
mysqli_query($connection, $delete_hobbies);


foreach ($hobbies as $hobby_id) {
    $hobby_sql = "INSERT INTO `students_hobbies` (`stu_id`, `hobby_id`) VALUES ('$stu_id', '$hobby_id')";
    mysqli_query($connection, $hobby_sql);
}

echo "Successfully updated!";


mysqli_close($connection);


header("Location:index.php?page=index&section=hobbies");
?>