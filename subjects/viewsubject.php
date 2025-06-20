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
    $sql = "SELECT `stu_id`,`sub_id`,`subjects` FROM `students_subjects` INNER JOIN `subjects` ON `students_subjects`.`sub_id`= `subjects`.`id` WHERE `students_subjects`.`stu_id`= '$id' ";
    $result = mysqli_query($connection,$sql);
    if(!$result){
        die("query faild".mysqli_error($connection));
    }
    $students= mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_close($connection);
    ?>
   <table border="1">
        <tr>
            <th>Studenttu_id</th>
            <th>Subject_id</th>
            <th>Subject</th>
            <th colspan = "2">Actions</th>
        </tr>
          <?php
            foreach($students as $student) {
            ?>
        <tr>
            <td>  <?php echo $student['stu_id'] ?></td>
            <td>  <?php echo $student['sub_id']?></td>
            <td>  <?php echo $student['subjects']?></td>
           
            <td><a href="index.php?page=delete&section=subjects&id=<?php echo $student['stu_id'];echo "&subid=".$student['sub_id'];?>" onclick="return confirm('Do you want to delete?')">Delete</a></td>
        </tr>
            <?php
            }
            ?>
             <td colspan = "4" align="center"><a href="index.php?page=edit&section=subjects&id=<?php echo $student['stu_id']; ?>">Edit</a></td>
    </table>
</body>
</html>











