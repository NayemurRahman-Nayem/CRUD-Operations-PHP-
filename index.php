<?php

include 'connect.php';

if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $sql = "insert into `crud` (name,email,mobile,password) values('$name','$email','$mobile','$password')";
        $result = mysqli_query($con, $sql);
        if ($result) {
                header('location:index.php');
        } else {
                die(mysqli_error($con));
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud Operations</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

        <div class="container">
                <table class="table">
                        <thead>
                                <tr>
                                        <th scope="col">Sl no </th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Operations</th>
                                </tr>
                        </thead>
                        <tbody>
                                <?php
                                $sql = "select * from `crud`";
                                $result = mysqli_query($con, $sql);
                                if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                                $id = $row['id'];
                                                $name = $row['name'];
                                                $email = $row['email'];
                                                $mobile = $row['mobile'];
                                                $passowrd = $row['password'];
                                                echo '<tr>
                                                        <td scope="row"> ' . $id . ' </td>
                                                        <td>' . $name . ' </td>
                                                        <td>' . $email . '</td>
                                                        <td>' . $mobile . '</td>
                                                        <td>' . $passowrd . '</td>
                                                        <td> <button class="btn btn-primary"> <a href="update.php?updateid=' . $id . '" class="text-light"> Update </a> </button> 
                                                        </td> 
                                                        <td>
                                                        <button class="btn btn-danger"> <a href="delete.php?deleteid=' . $id . '" class="text-light" > Delete </a> </button> 
                                                        </td> 
                                                      </tr>';
                                        }
                                }
                                ?>


                        </tbody>
                </table>
        </div>
        <div class="container">
                <form method="post">
                        <div class="form-group">
                                <label> Name </label>
                                <input type="text" class="form-control" placeholder="Enter your name" name="name">
                        </div>
                        <div class="form-group">
                                <label> Email </label>
                                <input type="email" class="form-control" placeholder="Enter your email" name="email">
                        </div>
                        <div class="form-group">
                                <label> Mobile </label>
                                <input type="text" class="form-control" placeholder="Enter your phone number " name="mobile">
                        </div>
                        <div class="form-group">
                                <label> Password </label>
                                <input type="text" class="form-control" placeholder="Enter your password" name="password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

</body>
</html>