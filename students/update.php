<?php
$connection = mysqli_connect("localhost", "root", "root", "crudsystem");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$stu_id = intval($_GET["id"]); 
echo $stu_id;
$addno = $_POST["admissionno"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$grade_id = intval($_POST["grade_id"]); 
$address = $_POST["address"];
$tele = $_POST["tele"];
$nic = $_POST["nic"];
$mail = $_POST["mail"];
$subjects = array_map('intval', $_POST["subject"]); 
$hobbies = array_map('intval', $_POST["hobbies"]);   


$student_sql = "UPDATE `students` SET `admission_no` = '$addno', `first_name` = '$fname', `last_name` = '$lname', `gender` = '$gender', `grade_id` = '$grade_id', `address` = '$address', `email` = '$mail', `telephone_no` = '$tele', `nic` = '$nic' WHERE `id` = '$stu_id'";

$result_student = mysqli_query($connection, $student_sql);

if (!$result_student) {
    die("Query failed: " . mysqli_error($connection));
}


$delete_subjects = "DELETE FROM `students_subjects` WHERE `stu_id` = '$stu_id'";
mysqli_query($connection, $delete_subjects);


foreach ($subjects as $subject_id) {
    $subject_sql = "INSERT INTO `students_subjects` (`stu_id`, `sub_id`) VALUES ('$stu_id', '$subject_id')";
    mysqli_query($connection, $subject_sql);
}


$delete_hobbies = "DELETE FROM `students_hobbies` WHERE `stu_id` = '$stu_id'";
mysqli_query($connection, $delete_hobbies);


foreach ($hobbies as $hobby_id) {
    $hobby_sql = "INSERT INTO `students_hobbies` (`stu_id`, `hobby_id`) VALUES ('$stu_id', '$hobby_id')";
    mysqli_query($connection, $hobby_sql);
}

echo "Successfully updated!";


mysqli_close($connection);


header("Location: index.php");
?>