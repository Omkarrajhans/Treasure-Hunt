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
    $task2=$res['task2'];
    $task2_attempts=$res['task2_attempts'];

    $correct_answer="mitsake";

    $task2_attempts=$task2_attempts+1;

    if($answer==$correct_answer)
    {
        $task2=1;

        $sql="update tasks set task2='$task2' , task2_compleation_time=NOW(), task2_attempts='$task2_attempts' where email='$email'";
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
        $sql="update tasks set task2='$task2' , task2_compleation_time=NOW(), task2_attempts='$task2_attempts' where email='$email'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
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
    <title>Task2</title>
</head>
<body>
    <div class="task-bar">
        <h1>Clue Number 2</h1>
        <a href="logout.php" class="logout">Logout</a>
        <a href="restart.php" class="restart">Restart</a>
    </div>
    <br>
    <br>
    <div class="container">
        <form action="#" method="post">
            <h1>Second Key</h1>
            <div class="hint">
                
                <div class="video-container">
                    <iframe src="https://www.youtube.com/embed/PM4NF5KPcYo?modestbranding=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </div>
                <br>
                <br>
                <label for="decr">Hint :- </label>
                <p name="decr">What is the biggest mitsake?</p>
                <br>
                <label for="answer">Answer : </label>
                <input type="text" name="answer" id="answer">
                <input type="submit" class="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>