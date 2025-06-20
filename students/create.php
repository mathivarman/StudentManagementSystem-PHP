<?php
    $connection = mysqli_connect("localhost", "root", "root", "crudsystem");
    if(!$connection){
        die("Connection failed: " .mysqli_connect_error());
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
        <form action="index.php?page=insert&section=students"  method="post" >
            <label for="admissionno"></label>Addmission No :
            <input type="text" name="admissionno" id="admissionno"><br><br>
            <label for="fname"></label>First Name :
            <input type="text" name="fname" id="fname"><br><br>
            <label for="lname"></label>Last Name :
            <input type="text" name="lname" id="lname"><br><br>
            Gender :
            <label for="male">Male </label>
            <input type="radio" id="male" name="gender" value="male">
            <label for="female">Female</label>
            <input type="radio" id="female" name="gender" value="female"><br><br>
            Grade :
            <select name="grade_id" id="grade_id" required>
            <option value="" disabled selected>Select Grade</option>
            <?php
                while ($row = mysqli_fetch_assoc($grades)) {
                    $grade_id = $row['id']; 
                    $grade_name = htmlspecialchars($row['grade']); 
                    echo "<option value='$grade_id'>$grade_name</option>";
                }
            ?>
            </select><br>

            <?php
            echo "Subjects: <br>";
            while ($row = mysqli_fetch_assoc($subjects)) {
                $subject_id = $row['id']; 
                $subject_name = htmlspecialchars($row['subjects']); 
                echo "<input type='checkbox' name='subject[]' value='$subject_id' id='$subject_id'>";
                echo "<label for='$subject_id'>$subject_name</label><br>";
            }
            ?>

            
            <label for="address">Address :</label>
            <textarea name="address" id="address"></textarea><br><br>
            <label for="mail">Email :</label>
            <input type="email" name="mail" id="mail"><br><br>
            <label for="nic">Telephone NO :</label>
            <input type="text" name="tele" id="tele"><br><br>
            <label for="nic">NIC No :</label>
            <input type="text" name="nic" id="nic"><br><br>
            <?php
            echo "Hobbies: <br>";
            while ($row = mysqli_fetch_assoc($hobbies)) {
                $hobby_id = $row['id']; // Use actual hobby ID
                $hobby_name = htmlspecialchars($row['hobby']); // Prevent XSS
                echo "<input type='checkbox' name='hobbies[]' value='$hobby_id' id='hobby_$hobby_id'>";
                echo "<label for='hobby_$hobby_id'>$hobby_name</label><br>";
            }
            ?>

            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </fieldset>
    <form action="">
        <table>
            
        </table>
</body>
</html>