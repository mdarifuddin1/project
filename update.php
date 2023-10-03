<?php

include 'connect.php';

$id = $_GET['updateid'];

if (isset($_POST['submit'])) {
    $name         = $_POST['name'];
    $designation  = $_POST['designation'];
    $date         = $_POST['date'];
    $my_date      = date('Y-m-d', strtotime($date));
    $time         = $_POST['time'];

    $sql = "UPDATE `duty` SET name='$name', designation='$designation', date='$date', time='$time' WHERE id=$id";

    $result = mysqli_query($con, $sql);
    if ($result) {
        header('location: display.php');
    } else {
        die(mysqli_error($con));
    }
}

// Fetch the current data from the database
$query = "SELECT * FROM `duty` WHERE id=$id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">

    <form method="post">
            <div class="mb-3">
                <label class="form-label">Add Teacher Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">designation</label>
                <input type="text" name="designation" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Duty Date</label>
                <input type="date" name="date" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Duty Time</label>
                <input type="text" name="time" class="form-control">
            </div>


            <button type="submit" name="submit" class="btn btn-danger">Submit</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</body>

</html>
