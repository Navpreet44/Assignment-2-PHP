<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Signup</title>
    <!-- Replace Bootstrap CSS with Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
    <section class="section">
        <div class="container">
            <h1 class="title">SIGN UP PAGE</h1>
            <form method="POST">
                <div class="field">
                    <label class="label" for="name">NAME</label>
                    <div class="control">
                        <input class="input" type="text" name="name">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="pass">PASSWORD</label>
                    <div class="control">
                        <input class="input" type="password" name="pass">
                    </div>
                </div>
                <div class="field">
                    <label class="label" for="pass2">CONFIRM PASSWORD</label>
                    <div class="control">
                        <input class="input" type="password" name="pass2">
                    </div>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-primary" type="submit" name="submit">SUBMIT</button>
                    </div>
                </div>
                <div class="field">
                    <p class="subtitle">DO NOT WANT TO SIGN IN?</p>
                    <a class="button is-link is-small" href="index.php">Go Back</a>
                </div>
                <div class="field">
                    <p class="subtitle">ALREADY HAVE AN ACCOUNT?</p>
                    <a class="button is-link is-small" href="login.php">Login</a>
                </div>
            </form>
        </div>
    </section>

    <?php
    require('db.php');
    $database = new Db();    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST['name'];
        $password = $_POST['pass'];
        $password2 = $_POST['pass2'];
        $database->signup($uname, $password, $password2);
    }
    ?>
</body>
</html>
