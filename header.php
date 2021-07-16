<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>PHP PROJECT</title>
    <meta charset="utf-8">
    <link href="">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
    <div class="wrapper">
        <!-- <a href="index.php"><img src="" alt="" </a> -->
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="discover.php">About Us</a></li>
            <li><a href="blog.php">Find Blogs</a></li>
            <?php
                if (isset($_SESSION["useruid"])){
                    echo "<li><a href='profile.php'>Profile page</a> </li>";
                    echo "<li> <a href='includes/logout.inc.php'>Log out</a></li>";
                }
                else{
                    echo "<li style='float:right'><a class='active' href='signup.php'>Sign Up</a></li>";
                    echo "<li><a href='login.php'>Log in</a></li>";
                }
            ?>
        </ul>
    </div>
</nav>

<div class="wrapper">