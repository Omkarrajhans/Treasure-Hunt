<?php

session_start();

include "connection.php";

$email=$_SESSION['email'];

$task1=0;
$task2=0;
$task3=0;
$task4=0;
$task5=0;
$task6=0;

$task1_attempts=0;
$task2_attempts=0;
$task3_attempts=0;
$task4_attempts=0;
$task5_attempts=0;
$task6_attempts=0;




$sql="update tasks set task1='$task1' , task1_compleation_time=NOW(), task1_attempts='$task1_attempts', task2='$task2' , task2_compleation_time=NOW(), task2_attempts='$task2_attempts', task3='$task3' , task3_compleation_time=NOW(), task3_attempts='$task3_attempts',  task4='$task4' , task4_compleation_time=NOW(), task4_attempts='$task4_attempts', task5='$task5' , task5_compleation_time=NOW(), task5_attempts='$task5_attempts', task1='$task1' , task6_compleation_time=NOW(), task6_attempts='$task6_attempts'  where email='$email'";
$result=mysqli_query($con,$sql);
if($result)
{
    header("location:tasks.php");
}
else
{
    die(mysqli_error);
}
?>