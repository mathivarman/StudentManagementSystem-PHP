<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $connection = mysqli_connect("localhost","root","root","crudsystem");
    if(!$connection){
        echo("Connection fail".mysqli_connect_error() );
    }
    $id = $_GET['id'];
    $sql = "SELECT `stu_id`,`hobby_id`,`hobby` FROM `students_hobbies` INNER JOIN `hobbies` ON `students_hobbies`.`hobby_id`= `hobbies`.`id` WHERE `students_hobbies`.`stu_id`= '$id' ";
    $result = mysqli_query($connection,$sql);
    if(!$result){
        die("query faild".mysqli_error($connection));
    }
    $students= mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_close($connection);
    ?>
   <table border="1">
        <tr>
            <th>stu_id</th>
            <th>hobby_id</th>
            <th>hobbies</th>
            <th colspan = "2">Actions</th>
        </tr>
          <?php
            foreach($students as $student) {
            ?>
        <tr>
            <td>  <?php echo $student['stu_id'] ?></td>
            <td>  <?php echo $student['hobby_id']?></td>
            <td>  <?php echo $student['hobby']?></td>
            <td><a href="index.php?page=delete&section=hobbies&id=<?php echo $student['stu_id'];echo "&hobbyid=".$student['hobby_id'];?>" onclick="return confirm('Do you want to delete?')">Delete</a></td>
        </tr>
            <?php
            }
            ?>
         <td colspan = "4" align="center"><a href="index.php?page=edit&section=hobbies&id=<?php echo $student['stu_id']; ?>">Edit</a></td>
    </table>
</body>
</html>











