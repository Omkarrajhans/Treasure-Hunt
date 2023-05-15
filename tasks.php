<?php
session_start();

include "connection.php";

$email=$_SESSION['email'];

$sql="select player_name from players where email='$email'";
$result=mysqli_query($con,$sql);
$res=mysqli_fetch_assoc($result);
$name=$res['player_name'];

if(isset($_POST))
{
    $sql="select * from tasks where email='$email'";
    $result=mysqli_query($con,$sql);
    $res=mysqli_fetch_assoc($result);

    $task1=$res['task1'];
    $task2=$res['task2'];
    $task3=$res['task3'];
    $task4=$res['task4'];
    $task5=$res['task5'];
    $task6=$res['task6'];

    if($task1==0)
    {
        header("location:task1.php");
    }
    else if($task2==0)
    {
        header("location:task2.php");
    }
    else if($task3==0)
    {
        header("location:task3.php");
    }
    else if($task4==0)
    {
        header("location:task4.php");
    }
    else if($task5==0)
    {
        header("location:task5.php");
    }
    else if($task6==0)
    {
        header("location:task6.php");
    }
    else
    {
        header("location:complete.php");
    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="reg_style.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="post">
            <h1> Hello <?php echo "$name" ?> Welcome To quiz</h1>
            <input type="submit" class="submit" name="submit" value="Continue">
        </form>
        
    </div>
</body>
</html>