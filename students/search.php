<?php
    $sstu=$_POST["sstu"];
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
    $sql="SELECT `id`,`admission_no`,`first_name`,`last_name`,`gender`,`grade_id`,`address`,`email`,`telephone_no`,`nic`,`created_at`,`updated_at`,`deleted_at` FROM `crudsystem`.`students` where `id`='$sstu';";


    $result = mysqli_query($connection,$sql);
    
    if(!$result){
        die("quey faild".mysqli_error($connection));
    }
    $studuents= mysqli_fetch_all($result,MYSQLI_ASSOC);
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
        <form action="index.php?page=search&section=students" method="post">
            <label for="sstu">Enter Student ID:</label>
            <input type="text" name="sstu" id="sstu">
            <input type="submit" value="Search">
            <button><a href="index.php?page=index&section=students">Back</a></button>
        </form>
    </div>
</div>
   <div style="overflow-x: auto; max-width: 100%;">
        <table border="1" style="width: 100%; border-collapse: collapse;">
            <tr align="center">
                <th>ID</th>
                <th>ADMISSION NO</th>
                <th>FIRSTNAME</th>
                <th>LASTNAME</th>
                <th>GENDER</th>
                <th>GRADE_ID</th>
                <th>ADDRESS</th>
                <th>EMAIL</th>
                <th>TELEPHONE</th>
                <th>NIC</th>
                <th colspan="2">Actions</th>
            </tr>
            <?php if (count($studuents) > 0): ?>
            <?php foreach ($studuents as $student): ?>
                <tr>
                    <td><?php echo $student['id'] ?></td>
                    <td><?php echo $student['admission_no'] ?></td>
                    <td><?php echo $student['first_name'] ?></td>
                    <td><?php echo $student['last_name'] ?></td>
                    <td><?php echo $student['gender'] ?></td>
                    <td><?php echo $student['grade_id'] ?></td>
                    <td><?php echo $student['address'] ?></td>
                    <td><?php echo $student['email'] ?></td>
                    <td><?php echo $student['telephone_no'] ?></td>
                    <td><?php echo $student['nic'] ?></td>
                    <td><a href="index.php?page=edit&section=students&id=<?php echo $student['id']; ?>">Edit</a></td>
                    <td><a href="index.php?page=delete&section=students&id=<?php echo $student['id']; ?>" onclick="return confirm('Do you want to delete?')">Delete</a></td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="12" style="text-align: center;">No data found for the entered ID.</td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>