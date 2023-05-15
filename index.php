<?php

session_start();
include "connection.php";

if(isset($_POST['submit']))
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="select password from `players` where email='$email'";
    $result=mysqli_query($con,$sql);
    $res=mysqli_fetch_assoc($result);

    $apass=$res["password"];

    if($email=="omkarrajhans22@gmail.com")
    {
        if($password="Omkar@1234")
        {
            header('location:dashboard.php');
        }
        else
        {
            echo "Invalid Password!";
        }
    }

    if($apass==$password)
    {
        $_SESSION['email']=$email;
        header('location:tasks.php');
    }
    else
    {
         echo "Incorrect Credentials!";
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg_style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login">
            <h1>Login Here</h1>
            <div class="login_form">
                <form action="#" method="post">
                <div class="form_data">
                        <label for="email">Email Address</label>
                        <br>
                        <input type="email" required id="email" name="email" placeholder="Enter Your Email Address">
                    </div>
                    <br>

                    <div class="form_data">
                        <label for="password">Password</label>
                        <br>
                        <input type="password" required id="password" name="password" placeholder="Enter Password">
                    </div>
                    <br>

                    <input type="submit" class="submit" name="submit" value="Login">
                    <br>
                    <br>
                    <a href="register.php">Don't have account ? Register here</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>