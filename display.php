<?php
include 'connect.php';
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
        <button type="button" class="btn btn-success my-5 ">
            <a href="addTeacher.php" class="text-light ">Add User</a>
        </button>

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