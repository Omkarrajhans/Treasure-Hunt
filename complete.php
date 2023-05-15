<?php
include "connection.php";

session_start();
$email=$_SESSION['email'];

$sql = "select player_name from players where email='$email'";
$result=mysqli_query($con,$sql);

$res=mysqli_fetch_assoc($result);
$name=$res['player_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg_style.css">

    <title>Document</title>
</head>
<body>
<div class="task-bar">
        <h1>Task Complete</h1>
        <a href="logout.php" class="logout">Logout</a>
        <a href="restart.php" class="restart">Restart</a>
        <!-- <button id="restart-button">Restart</button> -->
    </div>
    <br>
    <br>
    <div class="container">
        <h1>Congratulations <?php echo "$name" ?> You have completed the quiz !</h1>
    </div>
</body>
</html>