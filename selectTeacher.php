<?php
include 'connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedName = $_POST["teacher"];
    $sql2 = "SELECT * FROM course WHERE name='$selectedName'";
    $res = $con->query($sql2);

    $results = array(); 

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            $results[] = $row; 
        }
    }
}


$sql = "SELECT DISTINCT name from course";
    $result = $con->query($sql);
    $options = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $options[] = $row["name"];
        }
    }

$con->close();
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container py-5">
        <h1 class="text-center text-info ">University Exam Duty Schedule</h1>
    <div>
    <form action="" method="post">
        <h3>Select Teacher Name</h3>
        <select id="teacherSelect" name="teacher">
            <?php foreach ($options as $option) : ?>
                <option><?php echo $option; ?></option>
            <?php endforeach; ?>
        </select>
    <input type="submit" value="Submit" class="btn btn-primary">
    </form>

<div id="courseList">
    <table class="table table-bordered">
        <thead>
            <tr>
                <td>Name</td>
                <td>DESIGNATION</td>
                <td>COURSE NAME</td>
                <td>COURSE CODE</td>
                <td>EXAM DATE</td>
                <td>TIME</td>
            </tr>
        </thead>
        <tbody>
        <?php
       
        foreach ($results as $user){
        ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['designation'] ?></td>
                <td><?php echo $user['course'] ?></td>
                <td><?php echo $user['course_code'] ?></td>
                <td><?php echo $user['exam_date'] ?></td>
                <td><?php echo $user['exam_time'] ?></td>
            </tr>

        <?php }?>
        </tbody>
    </table>
</div>

        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"crossorigin="anonymous"></script>
</body>

</html>