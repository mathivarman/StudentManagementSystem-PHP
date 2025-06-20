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
     $sql="SELECT `id`,`admission_no`,`first_name`,`last_name`,`gender`,`grade_id`,`address`,`email`,`telephone_no`,`nic`,`created_at`,`updated_at`,`deleted_at` FROM `crudsystem`.`students` where `id`='".$_GET['id']."';";
    $result = mysqli_query($connection,$sql);
    
    if(!$result){
        die("quey faild".mysqli_error($connection));
    }
    $studuents= mysqli_fetch_assoc($result);

    $male="";
    $female="";
    if($studuents['gender']=="male"){
        $male="checked";
    }else if($studuents['gender']=="female"){
        $male="checked";
    }
    
    $sql1 = "SELECT `id`,`subjects` FROM `subjects`";
    if(!$subjects = mysqli_query($connection,$sql1)){
        die("Query failed: " .mysqli_error($connection));
    }
    $sql2 = "SELECT `id`,`hobby` FROM `hobbies`";
    if(!$hobbies = mysqli_query($connection,$sql2)){
        die("Query failed: " .mysqli_error($connection));
    }
    $sql3 = "SELECT `id`,`grade` FROM `grades`";
    if(!$grades = mysqli_query($connection,$sql3)){
        die("Query failed: " .mysqli_error($connection));
    }
 
    $sql_subjects = "SELECT sub_id FROM students_subjects WHERE stu_id = '".$_GET['id']."'";
    $result_subjects = mysqli_query($connection, $sql_subjects);
    $selected_subjects = [];
    while ($row = mysqli_fetch_assoc($result_subjects)) {
        $selected_subjects[] = $row['sub_id']; 
    }


    $sql_hobbies = "SELECT hobby_id FROM students_hobbies WHERE stu_id = '".$_GET['id']."'";
    $result_hobbies = mysqli_query($connection, $sql_hobbies);
    $selected_hobbies = [];
    while ($row = mysqli_fetch_assoc($result_hobbies)) {
        $selected_hobbies[] = $row['hobby_id'];
    }

    mysqli_close($connection);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Student Registation</legend>
        <form action="index.php?page=update&section=students&id=<?php echo ($_GET['id']); ?>"  method="post" >
            <label for="admissionno"></label>Addmission No :
            <input type="text" name="admissionno" id="admissionno" value="<?php echo $studuents['admission_no']; ?>"><br><br>
            <label for="fname"></label>First Name :
            <input type="text" name="fname" id="fname" value="<?php echo $studuents['first_name']; ?>"><br><br>
            <label for="lname"></label>Last Name :
            <input type="text" name="lname" id="lname" value="<?php echo $studuents['last_name']; ?>"><br><br>
            Gender :
            <label for="male">Male </label>
            <input type="radio" id="male" name="gender" value="male" <?php echo $male; ?>>
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female" <?php echo $male; ?>><br><br>
            Grade :
            <select name="grade_id" id="grade_id" required>
            <option value="" disabled>Select Grade</option>
            <?php
            while ($row = mysqli_fetch_assoc($grades)) {
                $grade_id = $row['id'];
                $grade_name = htmlspecialchars($row['grade']);
                $selected = ($studuents['grade_id'] == $grade_id) ? "selected" : "";
                echo "<option value='$grade_id' $selected>$grade_name</option>";
            }
            ?>
            </select><br>


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


            
            <label for="address">Address :</label>
            <textarea name="address" id="address"><?php echo $studuents['address']; ?></textarea><br><br>
            <label for="mail">Email :</label>
            <input type="email" name="mail" id="mail" value="<?php echo $studuents['email']; ?>"><br><br>
            <label for="nic">Telephone NO :</label>
            <input type="text" name="tele" id="tele" value="<?php echo $studuents['telephone_no']; ?>"><br><br>
            <label for="nic">NIC No :</label>
            <input type="text" name="nic" id="nic" value="<?php echo $studuents['nic']; ?>"><br><br>
            <?php
            echo "Hobbies: <br>";
            while ($row = mysqli_fetch_assoc($hobbies)) {
                $hobby_id = $row['id'];
                $hobby_name = htmlspecialchars($row['hobby']);
                $checked = in_array($hobby_id, $selected_hobbies) ? "checked" : ""; 
                echo "<input type='checkbox' name='hobbies[]' value='$hobby_id' id='$hobby_id' $checked>";
                echo "<label for='$hobby_id'>$hobby_name</label><br>";
            }
            ?>


            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </fieldset>
</body>
</html>