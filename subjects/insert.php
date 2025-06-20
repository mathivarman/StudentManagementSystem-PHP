<?php
    $addsub=$_POST["addsub"];




    $connection = mysqli_connect("localhost","root","root","crudsystem");
    /*if($connection){
        echo "Connection Successfull";
    }else{
        echo("Connection fail".mysqli_connect_error() );
    }*/

    if(!$connection){
        echo("Connection fail".mysqli_connect_error() );
    }
    $sql="INSERT INTO `crudsystem`.`subjects` ( `subjects`) VALUES ( '".$addsub."')";


    $result = mysqli_query($connection,$sql);
    
    if(!$result){
        die("quey faild".mysqli_error($connection));
    }
    echo "Successfully added !";
    mysqli_close($connection);
    header("Location:index.php?page=index&section=subjects");
?>