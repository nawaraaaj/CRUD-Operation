<?php
include 'connect.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "INSERT INTO crud(name, email, mobile, password) VALUES('$name', '$email', '$mobile', '$password')";

    $result = mysqli_query($con, $sql);

    if($result){
        header("location:display.php");
    }else{
        die(mysqli_error($con));
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>user</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

</html>

<body>
    <div class="container my-5">
        <form method="post" action="user.php">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" placeholder="Enter your mobile" name="mobile" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter your password" name="password">
            </div>



            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

        </form>
    </div>
</body>
</html>