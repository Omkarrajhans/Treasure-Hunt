<?php

session_start();

// if(isset($_POST['submit']))
// {
//     // header ("location: mislead1_2.php");
// }
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
            <br>
            <p>Most Polluted German City In The list</p>
            <!-- <br> -->
            <p>List :- </p>
            <a href="https://en.wikipedia.org/wiki/List_of_most-polluted_cities_by_particulate_matter_concentration">Click here</a>
            <br>
            <br>
            <label for="answer">Answer : </label>
            <br>
            <input type="text" name="answer" id="answer">
            <input type="submit" class="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>