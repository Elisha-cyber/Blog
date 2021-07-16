<?php include_once 'header.php';?>
<section class="Login-form">
    <h2>Login</h2>
    <div class ="signup-form">
        <form action="includes/login.inc.php" method="post">
            <label>
                <input type="text" name="uid" placeholder="Username/Email.......">
            </label><br>
            <label>
                <input type="password" name="pwd" placeholder="Password.......">
            </label><br>
            <button type="submit" name="submit">Log In</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"])){
        if ($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields!</p>";
        }
        elseif ($_GET["error"] == "wronglogin"){
            echo "<p>Incorrect login information!</p>";
        }
    }
    ?>
</section>
<?php include_once 'footer.php';?>

