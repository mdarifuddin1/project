<?php
include 'connect.php';

session_start();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $date = $_POST['date'];
    $my_date = date('Y-m-d', strtotime($date));
    $time = $_POST['time'];

   

    $sql = "INSERT INTO `duty` (name, designation, date, time)
    VALUES ('$name', '$designation', '$my_date', '$time')";


    if (mysqli_query($con, $sql)) {

        echo "Data insertion Successful";
    } else {
        echo "Data insertion unsuccessful";
    }
}
?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

    <div class="container py-5">
        <h1 class="text-center text-info ">University Exam Duty Schedule</h1>
        <div>
    <h3>Select Teacher Name</h3>
    <select id="teacherSelect">
        <option value="MOHAMMAD ARIFUL HUQ">MOHAMMAD ARIFUL HUQ</option>
        <option value="RUTBA AMAN">RUTBA AMAN</option>
        <option value="MEHJABIN RAHMAN">MEHJABIN RAHMAN</option>
        <option value="RAHNUMA TASMIN">RAHNUMA TASMIN</option>
    </select>
    <button type="button" onclick="showCourses()" class="btn btn-primary">Submit</button>
</div>

<div id="courseList">
    <!-- The course list will be displayed here after clicking the submit button -->
</div>

<script>
    function showCourses() {
        // Get the selected teacher name from the dropdown
        var selectedTeacher = document.getElementById("teacherSelect").value;

        // Assuming you have a JavaScript object or data source with teacher-course mappings
        // You can replace this with your actual data source
        var teacherCourses = {
            "MOHAMMAD ARIFUL HUQ": [
                { courseName: "Course A", courseCode: "CSE 356", examDate: "12/10/04", examTime: "9:00 AM" },
                { courseName: "Course B", courseCode: "CSE 356", examDate: "12/10/04", examTime: "2:00 PM" },
                { courseName: "Course C", courseCode: "CSE 356", examDate: "12/11/04", examTime: "10:00 AM" }
            ],
            "RUTBA AMAN": [
                { courseName: "Course X", courseCode: "CSE 123", examDate: "12/12/04", examTime: "1:00 PM" },
                { courseName: "Course Y", courseCode: "CSE 456", examDate: "12/13/04", examTime: "3:00 PM" }
            ],
            "MEHJABIN RAHMAN": [
                { courseName: "Course P", courseCode: "CSE 789", examDate: "12/14/04", examTime: "11:00 AM" },
                { courseName: "Course Q", courseCode: "CSE 890", examDate: "12/15/04", examTime: "4:00 PM" },
                { courseName: "Course R", courseCode: "CSE 567", examDate: "12/16/04", examTime: "9:00 AM" }
            ],
            "RAHNUMA TASMIN": [
                { courseName: "Course M", courseCode: "CSE 999", examDate: "12/17/04", examTime: "2:00 PM" },
                { courseName: "Course N", courseCode: "CSE 111", examDate: "12/18/04", examTime: "10:00 AM" }
            ]
        };

        // Get the courses for the selected teacher
        var courses = teacherCourses[selectedTeacher];

        // Display the courses in the courseList div as a table
        var courseListDiv = document.getElementById("courseList");
        courseListDiv.innerHTML = "<h3>Courses Taught by " + selectedTeacher + "</h3>";

        if (courses && courses.length > 0) {
            var table = "<table border='1'><tr><th>Course Name</th><th>Course Code</th><th>Exam Date</th><th>Exam Time</th></tr>";
            for (var i = 0; i < courses.length; i++) {
                table += "<tr><td>" + courses[i].courseName + "</td><td>" + courses[i].courseCode + "</td><td>" + courses[i].examDate + "</td><td>" + courses[i].examTime + "</td></tr>";
            }
            table += "</table>";
            courseListDiv.innerHTML += table;
        } else {
            courseListDiv.innerHTML += "<p>No courses found for " + selectedTeacher + "</p>";
        }
    }
</script>

        <br>
       
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