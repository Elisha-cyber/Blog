<?php include_once 'header.php';?>
<section class="Signup-form">
    <h2>Sign Up</h2>
    <div class ="signup-form">
<form action="includes/signup.inc.php" method="post">
    <label>
        <input type="text" name="name" placeholder="Full Name.......">
    </label><br>
    <label>
        <input type="text" name="email" placeholder="Email.......">
    </label><br>
    <label>
        <input type="text" name="uid" placeholder="Username.......">
    </label><br>
    <label>
        <input type="password" name="pwd" placeholder="Password.......">
    </label><br>
    <label>
        <input type="password" name="pwdrepeat" placeholder="Repeat Password.......">
    </label><br>
    <button type="submit" name="submit">Sign Up</button>
</form>
    </div>
    <?php
if (isset($_GET["error"])){
    if ($_GET["error"] == "emptyinput"){
        echo "<p>Fill in all fields!</p>";
    }
    elseif ($_GET["error"] == "invaliduid"){
        echo "<p>Choose proper username!</p>";
    }
    elseif ($_GET["error"] == "invalidemail"){
        echo "<p>Choose a proper email!</p>";
    }
    elseif ($_GET["error"] == "passwordsdontmatch"){
        echo "<p>Password doesn't match!</p>";
    }
    elseif ($_GET["error"] == "stmtfailed"){
        echo "<p>Something went wrong,try again!</p>";
    }
    elseif ($_GET["error"] == "usernametaken"){
        echo "<p>Username already taken!</p>";
    }
    elseif ($_GET["error"] == "none"){
        echo "<p>You have signed up</p>";
    }
}
    ?>
</section>
<?php include_once 'footer.php';?>
