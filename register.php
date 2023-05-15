<?php

include "connection.php";

if(isset($_POST['submit']))
{
    $returnValue = $_POST['returnValue'];
    if ($returnValue === 'true') {

        $player_name=$_POST['player_name'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $sql = "SELECT * FROM players WHERE email = '$email'";
        $result1 = mysqli_query($con, $sql);

        if(mysqli_num_rows($result1) > 0) {
            echo '<script>alert("This email is already been used")</script>';
        } else {
        
        $sql="insert into `players` (`Id`,`player_name`,`email`,`password`) values(0,'$player_name','$email','$password')";
        $result=mysqli_query($con,$sql);
        $sql="insert into tasks (`email`,`task1`,`task1_compleation_time`,`task1_attempts`,`task2`,`task2_compleation_time`,`task2_attempts`,`task3`,`task3_compleation_time`,`task3_attempts`,`task4`,`task4_compleation_time`,`task4_attempts`,`task5`,`task5_compleation_time`,`task5_attempts`,`task6`,`task6_compleation_time`,`task6_attempts`) values('$email',0,NOW(),0,0,NOW(),0,0,NOW(),0,0,NOW(),0,0,NOW(),0,0,NOW(),0)";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            header('location:index.php');
        }
        else
        {
            die(mysqli_error);
        }
    }
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
    <script src="script.js"></script>
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="register">
            <h1>Register Here</h1>
            <div class="reg_form">
                <form action="#" method="post">
                    <div class="form_data">
                        <label for="player_name">Name</label>
                        <br>
                        <input type="text" required id="player_name" name="player_name" placeholder="Enter Your Name">
                    </div>
                    <br>

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

                    <div class="form_data">
                        <label for="c_password">Confirm Password</label>
                        <br>
                        <input type="password" required id="c_password" name="c_password" placeholder="Confirm Password">
                    </div>
                    <br>
                    <input type="hidden" id="returnValue" name="returnValue">
                    <input type="submit" class="submit" name="submit" value="Register" onclick="validateForm()">
                </form>
            </div>
        </div>
    </div>
</body>
</html>