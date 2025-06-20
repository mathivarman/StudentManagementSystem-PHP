<?php
    $ssub=$_POST["ssub"];
?>
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
   $sql="SELECT `stu_id`,`sub_id`,`subjects` FROM `crudsystem`.`students_subjects` INNER JOIN subjects ON `students_subjects`.`sub_id`=`subjects`.`id` where `stu_id`='$ssub'";

    $result = mysqli_query($connection,$sql);
    
    if(!$result){
        die("quey faild".mysqli_error($connection));
    }
    $subjects= mysqli_fetch_all($result,MYSQLI_ASSOC);
//     echo "<pre>";
//    print_r($studuents);
//     echo "<pre>";

    //echo "Successfully added !";
    mysqli_close($connection);
    ?>
    <style>
    .container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
    }

    .button-link {
        display: inline-block;
        padding: 8px 16px;
        background-color: #007BFF;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
    }

    .button-link:hover {
        background-color: #0056b3;
    }
</style>
    <div class="container">
    <div>
        <a href="index.php?page=create&section=subjects" class="button-link">Create New Subject</a>
    </div>

    <div>
        <form action="index.php?page=search&section=subjects" method="post">
            <label for="ssub">Enter Student ID:</label>
            <input type="text" name="ssub" id="ssub">
            <input type="submit" value="Search">
            <button><a href="index.php?page=index&section=subjects">Back</a></button>
        </form>
    </div>
</div>
    <div style="overflow-x: auto; max-width: 100%;">
        <table border="1" style="width: 100%; border-collapse: collapse;">
            <tr>
                <th>Student Id</th>
                <th>Subject ID</th>
                <th>Subjects</th>
              
            </tr>
            <?php if (count($subjects) > 0): ?>
            <?php foreach ($subjects as $subject): ?>
                <tr>
                    <td><?php echo $subject['stu_id'] ?></td>
                    <td><?php echo $subject['sub_id'] ?></td>
                    <td><?php echo $subject['subjects'] ?></td>
                    <td><a href="index.php?page=edit&section=subjects&id=<?php echo $subject['stu_id']; ?>">Edit</a></td>
                    <td><a href="index.php?page=delete&section=subjects&id=<?php echo $subject['stu_id']; ?>&subid=<?php echo $subject['sub_id']; ?>" onclick="return confirm('Do you want to delete?')">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">No data found for the entered ID.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>