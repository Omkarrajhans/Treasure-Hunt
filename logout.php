<?php

session_start();

$_SESSION['email']="";

// session_distroy();
session_destroy();

header ("location:index.php");

?>