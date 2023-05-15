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
    $task1=$res['task1'];
    $task1_attempts=$res['task1_attempts'];

    $correct_answer="Ino Idealist";

    $task1_attempts=$task1_attempts+1;

    if($answer==$correct_answer)
    {
        // echo "correct";
        $task1=1;

        $sql="update tasks set task1='$task1' , task1_compleation_time=NOW(), task1_attempts='$task1_attempts' where email='$email'";
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
        $sql="update tasks set task1='$task1' , task1_compleation_time=NOW(), task1_attempts='$task1_attempts' where email='$email'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            // header("location:task2.php");
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
    <title>Document</title>
</head>
<body>
    <div class="task-bar">
        <h1>Clue Number 1</h1>
        <a href="logout.php" class="logout">Logout</a>
        <a href="restart.php" class="restart">Restart</a>
    </div>
    <br>
    <br>
    <div class="container">
        <form action="#" method="post">
            <h1>First Key</h1>
            <div class="hint">
                <img src="task1_hint.jpeg" alt="" width=300px, height="auto">
                <br>
                <br>
                <label for="decr">Hint :- </label>
                <p name="decr">I am a creator of beauty, my canvas is the world. I bring color to life, and my brush strokes unfurl.</p>
                <br>
                <label for="answer">Answer : </label>
                <input type="text" name="answer" id="answer">
                <input type="submit" class="submit" name="submit" value="Submit">
            </div>
            

        </form>
    </div>
</body>
</html>