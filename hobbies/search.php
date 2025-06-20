<?php
    $shobby=$_POST["shobby"];
    
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
    
    $sql="SELECT `stu_id`,`hobby_id`,`hobby` FROM `crudsystem`.`students_hobbies` INNER JOIN hobbies ON `students_hobbies`.`hobby_id`=`hobbies`.`id` where `stu_id`='$shobby'";



    $result = mysqli_query($connection,$sql);
    
    if(!$result){
        die("quey faild".mysqli_error($connection));
    }
    $hobbies= mysqli_fetch_all($result,MYSQLI_ASSOC);
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
        <a href="index.php?page=create&section=hobbies" class="button-link">Create New Hobby</a>
    </div>

    <div>
        <form action="index.php?page=search&section=hobbies" method="post">
            <label for="shobby">Enter Student ID:</label>
            <input type="text" name="shobby" id="shobby">
            <input type="submit" value="Search">
            <button><a href="index.php?page=index&section=hobbies">Back</a></button>
        </form>
    </div>
</div>
    <div style="overflow-x: auto; max-width: 100%;">
        <table border="1" style="width: 100%; border-collapse: collapse;">
            <tr>
                <th>Student ID ID</th>
                <th>Hobby ID</th>
                <th>Hobbies</th>
              
            </tr>
            <?php if (count($hobbies) > 0): ?>
            <?php foreach ($hobbies as $hobby): ?>
                <tr>
                    <td><?php echo $hobby['stu_id'] ?></td>
                    <td><?php echo $hobby['hobby_id'] ?></td>
                    <td><?php echo $hobby['hobby'] ?></td>
                    <td><a href="index.php?page=edit&section=hobbies&id=<?php echo $hobby['stu_id']; ?>">Edit</a></td>
                    <td><a href="index.php?page=delete&section=hobbies&id=<?php echo $hobby['stu_id']; ?>&hobbyid=<?php echo $hobby['hobby_id']; ?>" onclick="return confirm('Do you want to delete?')">Delete</a></td>
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