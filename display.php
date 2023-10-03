<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $name         = $_POST['name'];
    $designation  = $_POST['designation'];
    $date         = $_POST['date'];
    $my_date      = date('Y-m-d', strtotime($date));
    $time         = $_POST['time'];

    $sql = "INSERT INTO duty(name, designation, `date`, time) VALUES ('$name', '$designation', '$my_date', '$time')";


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
    <title>Display</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="text-center">University Exam Duty Schedule</h2>
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

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Duty Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Opereation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from `duty`";
                $result = mysqli_query($con, $sql);
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $designation = $row['designation'];
                        $date = $row['date'];
                        $time = $row['time'];

                        echo ' <tr>
                          <th scope="row">' . $id . '</th>
                          <td>' . $name . '</td>
                          <td>' . $designation . '</td>
                          <td>' . $date . '</td>
                          <td>' . $time . '</td>
                          <td>
                                   <button name="update" type="button" class="btn btn-primary">
                                   <a class="text-light " href="update.php? updateid='.$id.'">Update</a>
                                   </button>
                                   <button name="delete" type="button" class="btn btn-danger">
                                   <a class="text-light " href="delete.php? id='.$id.'">Delete</a>
                                   </button>
                         </td>
                     </tr>';
                    }
                }
                ?>



            </tbody>
        </table>
    </div>
   
    
    
    
</body>

</html>