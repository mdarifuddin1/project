<?php 
include 'connect.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM `duty` WHERE id = $id";
        $result = mysqli_query($con, $sql);
        if ($result) {
            header('location:display.php');
        }else {
            die(mysqli_error($con));
        }
    }
    ?>