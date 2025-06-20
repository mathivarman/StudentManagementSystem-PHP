<?php
    if(!isset($_GET['id'])){
        echo "No ID provided!";
        exit;
    }
    if(!is_numeric($_GET['id'])){
        echo "Invalid ID!";
        exit;
    }
    $id=intval($_GET["id"]);
    $connection = mysqli_connect("localhost", "root", "root", "crudsystem");
    if(!$connection){
        die("Connection failed: " .mysqli_connect_error());
    }
    $sql1 = "SELECT `id`,`subjects` FROM `subjects`";
    if(!$subjects = mysqli_query($connection,$sql1)){
        die("Query failed: " .mysqli_error($connection));
    }
     $sql_subjects = "SELECT sub_id FROM students_subjects WHERE stu_id = '".$_GET['id']."'";
    $result_subjects = mysqli_query($connection, $sql_subjects);
    $selected_subjects = [];
    while ($row = mysqli_fetch_assoc($result_subjects)) {
        $selected_subjects[] = $row['sub_id']; 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
</head>
<body>
    <fieldset>
        <legend>Student Registration</legend>
        <form action="index.php?page=update&section=subjects&id=<?php echo $id; ?>" method="post">
            <?php
            echo "Subjects: <br>";
            while ($row = mysqli_fetch_assoc($subjects)) {
                $subject_id = $row['id'];
                $subject_name = htmlspecialchars($row['subjects']);
                $checked = in_array($subject_id, $selected_subjects) ? "checked" : ""; 
                echo "<input type='checkbox' name='subject[]' value='$subject_id' id='$subject_id' $checked>";
                echo "<label for='$subject_id'>$subject_name</label><br>";
            }
            ?>

            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </fieldset>
</body>
</html>