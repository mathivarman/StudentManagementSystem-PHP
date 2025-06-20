<?php
if(!isset($_GET['id'])){
        echo "No ID provided!";
        exit;
    }
    if(!is_numeric($_GET['id'])){
        echo "Invalid ID!";
        exit;
    }
    $stu_id = intval($_GET["id"]); 
    echo $stu_id;
$connection = mysqli_connect("localhost", "root", "root", "crudsystem");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$subjects = array_map('intval', $_POST["subject"]); 
 



$delete_subjects = "DELETE FROM `students_subjects` WHERE `stu_id` = '$stu_id'";
mysqli_query($connection, $delete_subjects);


foreach ($subjects as $subject_id) {
    $subject_sql = "INSERT INTO `students_subjects` (`stu_id`, `sub_id`) VALUES ('$stu_id', '$subject_id')";
    mysqli_query($connection, $subject_sql);
}

echo "Successfully updated!";


mysqli_close($connection);


header("Location:index.php?page=index&section=subjects");
?>