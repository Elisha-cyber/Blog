<?php include_once 'header.php';?>
    <section class="Index-intro">
        <h1>This is the website which we are going to work on from sunday, june 20 to sunday june 26</h1>
        <p>This website is going to deal with experience of form handling in php</p>
        <section class="Index-categories">
            <?php
            if (isset($_SESSION["useruid"])){
                echo "<p>Hello there ".$_SESSION["useruid"]."</p>";

            }
            ?>
            <h2>We are going to start has follow </h2>
            <div class="Index-categories-list">
                <div>
                    <h3>This is the first goal challenge</h3>
                </div>
                <div>
                    <h4>This is the second goal challenge</h4>
                </div><div>
                    <h5>This is the third goal challenge</h5>
                </div><div>
                    <h6>This is the fourth goal challenge</h6>
                </div>
            </div>
        </section>
    </section>
<?php include_once 'footer.php';?>
;