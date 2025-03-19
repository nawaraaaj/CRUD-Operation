<?php
include 'connect.php';

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    
    $sql = "SELECT * FROM `crud` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $name = $row['name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
    $password = $row['password'];
} else {
    die("Error: Update ID is missing.");
}

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "UPDATE `crud` SET 
            name='$name', 
            email='$email', 
            mobile='$mobile', 
            password='$password' 
            WHERE id=$id";

    $result = mysqli_query($con, $sql);

    if($result){
        echo 'Data updated successfully';
        header("location:display.php");
        exit();
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <form method="post" action="update.php?updateid=<?php echo $id; ?>">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="text" class="form-control" name="mobile" value="<?php echo $mobile; ?>" autocomplete="off">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>
</html>
