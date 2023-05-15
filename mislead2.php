<?php

session_start();

if(isset($_POST['submit']))
{
    header("location:task5.php");
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
        <h1>Clue Number 6</h1>
        <a href="logout.php" class="logout">Logout</a>
        <a href="restart.php" class="restart">Restart</a>
        <!-- <button id="restart-button">Restart</button> -->
    </div>
    <br>
    <br>
    <div class="container">
        <form action="#" method="post">
    
            <h1>Sixth Key</h1>
            <p>Most Played Song On This list</p>
            <!-- <br> -->
            <p>List :- </p>
            <a href="https://en.wikipedia.org/wiki/Category:Economics_books">Click here</a>
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