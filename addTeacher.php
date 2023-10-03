<?php 
include 'connect.php';

if (isset($_POST['submit'])) {
    $name          = $_POST['name'];
    $designation   = $_POST['designation'];
    $course        = $_POST['course'];
    $course_code   = $_POST['course_code'];
    $exam_date     = $_POST['exam_date'];
    $my_date       = date('Y-m-d', strtotime($exam_date));
    $exam_time     = $_POST['exam_time'];
   
  
    

    $sql = "INSERT INTO course(name, designation, course, course_code, `exam_date`, exam_time) VALUES ('$name', '$designation', '$course', '$course_code', '$my_date', '$exam_time')";
    if (mysqli_query($con, $sql)) {

        echo "Data insertion Successful";
    } else {
        echo "Data insertion unsuccessful";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
        <h2 class="text-center " >Add Teacher</h2>
        <form method="post">
            <div class="mb-3">
                <label  class="form-label"> Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Course Name</label>
                <input type="text" name="course" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Course Code</label>
                <input type="text" name="course_code" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Exam Date</label>
                <input type="date" name="exam_date" class="form-control">
            </div>
            <div class="mb-3">
                <label  class="form-label">Exam time</label>
                <input type="time" name="exam_time" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>