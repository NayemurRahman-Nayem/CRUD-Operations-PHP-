<?php
        include 'connect.php' ; 
        $id = $_GET['updateid'] ;
        $sql = "Select * from  `crud` where id=$id" ; 
        $result = mysqli_query($con,$sql) ; 
        $row = mysqli_fetch_assoc($result) ; 
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $mobile = $row['mobile'];
        $passowrd = $row['password'];
        if(isset($_POST['update'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $password = $_POST['password'];
                $sql = "update `crud` set id=$id,name = '$name' , email='$email' , mobile = '$mobile', password = '$password' where id=$id" ; 
                $result = mysqli_query($con, $sql);
                if ($result) {
                        header('location:index.php');
                } else {
                        die(mysqli_error($con));
                }
        }
?>
<!doctype html>
<html lang="en">
<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Crud Operations</title>
</head>
<body>
        <div class="container">
                <form method="post">
                        <div class="form-group">
                                <label> Name </label>
                                <input type="text" class="form-control" placeholder="Enter your name" name="name" value=<?php echo $name ?>>
                        </div>
                        <div class="form-group">
                                <label> Email </label>
                                <input type="email" class="form-control" placeholder="Enter your email" name="email" value=<?php echo $email ?>>
                        </div>
                        <div class="form-group">
                                <label> Mobile </label>
                                <input type="text" class="form-control" placeholder="Enter your phone number " name="mobile" value=<?php echo $mobile ?>>
                        </div>
                        <div class="form-group">
                                <label> Password </label>
                                <input type="text" class="form-control" placeholder="Enter your password" name="password" value=<?php echo $passowrd ?>>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                </form>
        </div>
</body>
</html>
