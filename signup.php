<?php
$user=0;
$success=0;
include 'connection.php';
    if(isset($_POST['signup'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        // $sql="INSERT INTO `signup`(`id`, `username`, `password`) VALUES ('','$username','$password')";

        // $result = mysqli_query($con, $sql);
        // if($result){
        //     echo "data is inserted sucessfully";
        // }
        // else{
        //     echo "data is not submitted"; 
        // }
        $sql= "SELECT * FROM `signup` WHERE username='$username'";
        $result= mysqli_query($con, $sql);
        if($result){

            // mysqli_num_rows count the no of rows present in the database
            $num=mysqli_num_rows($result);

            // if the given username is already exits then it means greater than 0.
            if($num>0){
                // echo "username already exits, type something new username";
                $user=1;
            }
            else{
                 $sql="INSERT INTO `signup`(`id`, `username`, `password`) VALUES ('','$username','$password')";
                $result = mysqli_query($con, $sql);
                if($result){
                    // echo "SignUp sucessfull";
                    $success=1;
                    header('location:login.php');
                }
                else{
                    echo "failed SignUp"; 
                }
            }
        }

    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
.header {
    display: flex;
    justify-content: center;
    align-items: center;
}

.form-control {
    width: 150%;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.box {
    border: 1px solid blue;
    background-color: skyblue;
}

.btn-primary {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>

<body>
    <?php
    if($user){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Username already exist, </strong> type something new username!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

    <?php
    IF($success){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Successfull, </strong> You successfully signedUp!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

    <div class="box my-5">
        <div class="header my-3">
            <h1>SignUP form of Student</h1>
        </div>
        <div class="container my-5">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="username" class="form-control" name="username" autocomplete="off">
                    <div id="emailHelp" class="form-text">We'll never share your username with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary" name="signup">Sign UP</button>
            </form>
        </div>
    </div>
</body>

</html>