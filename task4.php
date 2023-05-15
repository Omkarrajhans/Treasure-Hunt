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
    $task4=$res['task4'];
    $task4_attempts=$res['task4_attempts'];

    $correct_answer="11";
    $answer2="9";

    $task4_attempts=$task4_attempts+1;

    if($answer==$correct_answer)
    {
        // echo "correct";
        $task4=1;

        $sql="update tasks set task4='$task4' , task4_compleation_time=NOW(), task4_attempts='$task4_attempts' where email='$email'";
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
    else if($answer==$answer2)
    {
        $sql="update tasks set task4='$task4' , task4_compleation_time=NOW(), task4_attempts='$task4_attempts' where email='$email'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            header("location:mislead1.php");
            // echo '
            // <script> alert("Incorrect Answer Try again !") </script>
            // ';
        }
        else
        {
            die(mysqli_error());
        }
    }
    else
    {
        $sql="update tasks set task4='$task4' , task4_compleation_time=NOW(), task4_attempts='$task4_attempts' where email='$email'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            // header("location:task4.php");
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
    <title>Task4</title>
</head>
<body>
    <!-- <h1>Welcome to Task 1</h1> -->
    <div class="task-bar">
        <h1>Clue Number 4</h1>
        <a href="logout.php" class="logout">Logout</a>
        <a href="restart.php" class="restart">Restart</a>
        <!-- <button id="restart-button">Restart</button> -->
    </div>
    <br>
    <br>
    <div class="container">
        <form action="#" method="post">
    
            <h1>Forth Key</h1>
            <!-- <p>Complete The Sequence</p> -->
            <h3>Complete The Sequence</h3>
            <br>
            <p>Sequence:-</p>
            <!-- <br> -->
            <p>3 , 5 , 7 , ?</p>
            <br>
            <label for="decr">Hint :- </label>
            <p name="decr">2</p>
            <label for="answer">Answer : </label>
            <input type="text" name="answer" id="answer">
            <input type="submit" class="submit" name="submit" value="Submit">

        </form>
    </div>
</body>
</html>