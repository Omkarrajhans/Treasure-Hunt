<?php

include "connection.php";
session_start();

$email=$_SESSION['email'];

if(isset($_POST['submit']))
{
    $answer=$_POST['answer'];
    $sql="select * from tasks where email='$email'";
    $result=mysqli_query($con,$sql);
    $res=mysqli_fetch_assoc($result);
    // echo "submitted";
    $task3=$res['task3'];
    $task3_attempts=$res['task3_attempts'];

    $correct_answer="12343421";

    $task3_attempts=$task3_attempts+1;

    if($answer==$correct_answer)
    {
        // echo "correct";
        $task3=1;

        $sql="update tasks set task3='$task3' , task3_compleation_time=NOW(), task3_attempts='$task3_attempts' where email='$email'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            header("location:tasks.php");
        }
        else
        {
            die(mysqli_error());
        }
    }
    else
    {
        $sql="update tasks set task3='$task3' , task3_compleation_time=NOW(), task3_attempts='$task3_attempts' where email='$email'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            // header("location:task3.php");
            echo '
            <script> alert("Incorrect Answer Try again !") </script>
            ';
        }
        else
        {
            die(mysqli_error());
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
    <title>Task3</title>
</head>
<body>
    <!-- <h1>Welcome to Task 1</h1> -->
    <div class="task-bar">
        <h1>Clue Number 3</h1>
        <a href="logout.php" class="logout">Logout</a>
        <a href="restart.php" class="restart">Restart</a>
        <!-- <button id="restart-button">Restart</button> -->
    </div>
    <br>
    <br>
    <div class="container">
        <form action="#" method="post">
            <h1>Third Key</h1>
            <div class="hint">
                <img src="task3_hint.png" alt="" width=300px, height="auto">
                <br>
                <br>
                <label for="decr">Hint :- </label>
                <p name="decr">Raster it</p>
                <br>
                <label for="answer">Answer : </label>
                <input type="text" name="answer" id="answer">
                <!-- <input type="submit" name="submit" value="submit"> -->
                <input type="submit" class="submit" name="submit" value="Submit">
            </div>
            

        </form>
    </div>
</body>
</html>