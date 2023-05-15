<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,tr,td{border:1px solid black;text-align: center;padding:8px;}
        body{color:white;}
        body{   background-color: #5d3197}
        .container1{margin-top: 30px}
        .container1{margin-left: 10px}
        .task-bar {
            margin-top: 15px;
            margin-left:130px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #a276d7;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
}

.task-bar h1 {
  margin: 0;
}

.logout {
  text-decoration: none;
  color: #fff;
  font-weight: bold;
}



    </style>
</head>
<body>
    <div class="task-bar">
        <h1>Players Data </h1>
        <a href="logout.php" class="logout">Logout</a>
    </div>
    <br>
    <br>
    <div class="container1">
    <?php

include "connection.php";session_start();



$sql= "SELECT *, 
COUNT(CASE WHEN task1 = 1 THEN 1 ELSE NULL END) 
  + COUNT(CASE WHEN task2 != 0 THEN 1 ELSE NULL END) 
  + COUNT(CASE WHEN task3 != 0 THEN 1 ELSE NULL END) 
  + COUNT(CASE WHEN task4 != 0 THEN 1 ELSE NULL END) 
  + COUNT(CASE WHEN task5 != 0 THEN 1 ELSE NULL END) 
  + COUNT(CASE WHEN task6 != 0 THEN 1 ELSE NULL END) AS num_completed_tasks,
MIN(CASE WHEN task1 = 1 THEN task1_compleation_time
         WHEN task2 = 1 THEN task2_compleation_time
         WHEN task3 = 1 THEN task3_compleation_time
         WHEN task4 = 1 THEN task4_compleation_time
         WHEN task5 = 1 THEN task5_compleation_time
         WHEN task6 = 1 THEN task6_compleation_time
    END) AS first_compleation_time
FROM tasks
GROUP BY email
ORDER BY num_completed_tasks DESC, first_compleation_time ASC";
$result=mysqli_query($con,$sql);

if($result)
{
    // echo "success";
    echo '<table class="table">
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Task 1 Compleated</th>
            <th scope="col">Task 1 Compleation Date and Time</th>
            <th scope="col">Task 1 Attempts </th>

            <th scope="col">Task 2 Compleated</th>
            <th scope="col">Task 2 Compleation Date and Time</th>
            <th scope="col">Task 2 Attempts </th>

            <th scope="col">Task 3 Compleated</th>
            <th scope="col">Task 3 Compleation Date and Time</th>
            <th scope="col">Task 3 Attempts </th>

            <th scope="col">Task 4 Compleated</th>
            <th scope="col">Task 4 Compleation Date and Time</th>
            <th scope="col">Task 4 Attempts </th>

            <th scope="col">Task 5 Compleated</th>
            <th scope="col">Task 5 Compleation Date and Time</th>
            <th scope="col">Task 5 Attempts </th>

            <th scope="col">Task 6 Compleated</th>
            <th scope="col">Task 6 Compleation Date and Time</th>
            <th scope="col">Task 6 Attempts </th>

    ';
    while($row=mysqli_fetch_assoc($result))
    {
        $email=$row['email'];
        $task1=$row['task1'];
        $task2=$row['task2'];
        $task3=$row['task3'];
        $task4=$row['task4'];
        $task5=$row['task5'];
        $task6=$row['task6'];

        $task1_compleation_time=$row['task1_compleation_time'];
        $task2_compleation_time=$row['task2_compleation_time'];
        $task3_compleation_time=$row['task3_compleation_time'];
        $task4_compleation_time=$row['task4_compleation_time'];
        $task5_compleation_time=$row['task5_compleation_time'];
        $task6_compleation_time=$row['task6_compleation_time'];

        $task1_attempts=$row['task1_attempts'];
        $task2_attempts=$row['task2_attempts'];
        $task3_attempts=$row['task3_attempts'];
        $task4_attempts=$row['task4_attempts'];
        $task5_attempts=$row['task5_attempts'];
        $task6_attempts=$row['task6_attempts'];

        $qry="select player_name from players where email='$email'";
        $rslt=mysqli_query($con,$qry);
        $rs=mysqli_fetch_assoc($rslt);
        $name=$rs['player_name'];

        echo "
        <tr> 
        <td>$name</td>
        <td>$email</td>

        <td>$task1</td>
        <td>$task1_compleation_time</td>
        <td>$task1_attempts</td>

        <td>$task2</td>
        <td>$task2_compleation_time</td>
        <td>$task2_attempts</td>

        <td>$task3</td>
        <td>$task3_compleation_time</td>
        <td>$task3_attempts</td>

        <td>$task4</td>
        <td>$task4_compleation_time</td>
        <td>$task4_attempts</td>

        <td>$task5</td>
        <td>$task5_compleation_time</td>
        <td>$task5_attempts</td>

        <td>$task6</td>
        <td>$task6_compleation_time</td>
        <td>$task6_attempts</td>
        </tr>
        ";





    }

    echo '
    </table>
    ';
}
else{
    die(mysqli_error);
}

?>

    </div>
</body>
</html>