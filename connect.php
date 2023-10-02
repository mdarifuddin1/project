<?php 

    $con = new mysqli('localhost', 'root', '', 'project'); // root is user name

    if(!$con){
        die(mysqli_error($con));
    }

?>