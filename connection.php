<?php

$con=new mysqli('localhost','root','','treasure_hunt');

if(!$con)
{
    die(mysqli_error($con));
}
// else
// {
//     echo"success";
// }

?>