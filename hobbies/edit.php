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
    

    
    $sql2 = "SELECT `id`,`hobby` FROM `hobbies`";
    if(!$hobbies = mysqli_query($connection,$sql2)){
        die("Query failed: " .mysqli_error($connection));
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
        <form action="index.php?page=update&section=hobbies&stuid=<?php echo $id ?> "  method="post" >
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