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
    $task5=$res['task5'];
    $task5_attempts=$res['task5_attempts'];

    $correct_answer="0.1";
    $answer2="1.2";

    $task5_attempts=$task5_attempts+1;

    if($answer==$correct_answer)
    {
        // echo "correct";
        $task5=1;

        $sql="update tasks set task5='$task5' , task5_compleation_time=NOW(), task5_attempts='$task5_attempts' where email='$email'";
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
        $sql="update tasks set task5='$task5' , task5_compleation_time=NOW(), task5_attempts='$task5_attempts' where email='$email'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            header("location:mislead2.php");
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
        $sql="update tasks set task5='$task5' , task5_compleation_time=NOW(), task5_attempts='$task5_attempts' where email='$email'";
        $result=mysqli_query($con,$sql);
        if($result)
        {
            // header("location:task6.php");
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
    <title>Task5</title>
</head>
<body>
    <!-- <h1>Welcome to Task 1</h1> -->
    <div class="task-bar">
        <h1>Clue Number 5</h1>
        <a href="logout.php" class="logout">Logout</a>
        <a href="restart.php" class="restart">Restart</a>
        <!-- <button id="restart-button">Restart</button> -->
    </div>
    <br>
    <br>
    <div class="container">
        <form action="#" method="post">
    
            <h1>Fifth Key</h1>

            <h3>What is One-month percent change in Consumer Price Index for all urban consumers in month of march ?</h3>
            <br>
            <label for="decr">Hint :- </label>
            <a href="https://www.bls.gov/news.release/archives/cpi_05112022.pdf">Click here</a>
            <br>
            <label for="answer">Answer : </label>
            <br>
            <input type="text" name="answer" id="answer">
            <input type="submit" class="submit" name="submit" value="Next">

        </form>
    </div>
</body>
</html>