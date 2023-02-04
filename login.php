<?php
$login=0;
$invalid=0;
include 'connection.php';
    if(isset($_POST['signup'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $sql= "SELECT * FROM `signup` WHERE username='$username' AND password='$password'";
        $result= mysqli_query($con, $sql);
        if($result){

            // mysqli_num_rows count the no of rows present in the database
            $num=mysqli_num_rows($result);

            // if the given username is already exits then it means greater than 0.
            if($num>0){
                // echo "username already exits, type something new username";
                // echo "login successfull";
                $login=1;

                // session function is used to store/manage our data  
                session_start();
                $_SESSION['username']=$username;
                header('location:dashboard.php');
            }
            else{
                // echo "invalid data";
                $invalid=1;
            }
        }

    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
    if($login){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Login success, </strong> you login successfully!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

    <?php
    IF($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Not login, </strong>check your valid password and email!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>

    <div class="box my-5">
        <div class="header my-3">
            <h1>Login to Student Dashboard</h1>
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
                <button type="submit" class="btn btn-primary" name="signup">Login</button>
            </form>
        </div>
    </div>
</body>

</html>