<?php
$connection = mysqli_connect("localhost", "root", "root", "crudsystem");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

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

$student_sql = "INSERT INTO `students` (`admission_no`, `first_name`, `last_name`, `gender`, `grade_id`, `address`, `email`, `telephone_no`, `nic`) 
                VALUES ('$addno', '$fname', '$lname', '$gender', '$grade_id', '$address', '$mail', '$tele', '$nic')";
$result_student = mysqli_query($connection, $student_sql);

if (!$result_student) {
    die("Query failed: " . mysqli_error($connection));
}

$stu_id = mysqli_insert_id($connection);


foreach ($subjects as $subject_id) {
    $subject_sql = "INSERT INTO `students_subjects` (`stu_id`, `sub_id`) VALUES ('$stu_id', '$subject_id')";
    mysqli_query($connection, $subject_sql);
}


foreach ($hobbies as $hobby_id) {
    $hobby_sql = "INSERT INTO `students_hobbies` (`stu_id`, `hobby_id`) VALUES ('$stu_id', '$hobby_id')";
    mysqli_query($connection, $hobby_sql);
}

echo "Successfully added!";

mysqli_close($connection);

header("Location: index.php");
?>