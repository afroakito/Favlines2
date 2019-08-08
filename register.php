<?php
include("includes/config.php");
include("includes/handlers/classes/Account.php");

$account = new Account($con);

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");
// $account->register($username, $firstName, $lastName, $email, $email2, $password, $password2);
// mysqli_connect("localhost", "root", "", "favlines2");
// echo mysqli_connect_errno();
// echo "<br>";
?>

<html lang="ja">
<head>
<meta charset="utf-8">
<title>Favlines2</title>

<link rel="stylesheet" href="assets/css/register.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/js/register.js"></script>
</head>

<body>
    <?php
    if(isset($_POST['registerButton'])) {
        echo "<script>
                $(document).ready(function() {
                    $('#loginForm').hide();
                    $('#registerForm').show();
                });
            </script>";
    }
    else {
        echo "<script>
                $(document).ready(function() {
                    $('#loginForm').show();
                    $('#registerForm').hide();
                });
            </script>";
    }
    ?>

    <div class="background">

        <div id="loginContainer">

            <div id="inputContainer">

                <form id="loginForm" action="register.php" method="POST">

                    <h2>Login to your account</h2>
					<p>
                        <?php echo $account->getError("Your username or password is incorrect"); ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSimpson" value="" required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required>
					</p>

					<button type="submit" name="loginButton">LOG IN</button>

					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Signup here.</span>
					</div>

                </form>

                <form id="registerForm" action="register.php" method="POST">

                    <h2>Create your free account</h2>
					<p>
                        <?php echo $account->getError("Username must be between 5 and 25 characters") ?>
						<label for="username">Username</label>
						<input id="username" name="username" type="text" placeholder="e.g. bartSimpson" value="" required>
					</p>

					<p>
                        <?php echo $account->getError("First name must be between 5 and 25 characters") ?>
						<label for="firstName">First name</label>
						<input id="firstName" name="firstName" type="text" placeholder="e.g. Bart" value="" required>
					</p>

					<p>
                        <?php echo $account->getError("Last name must be between 5 and 25 characters") ?>
						<label for="lastName">Last name</label>
						<input id="lastName" name="lastName" type="text" placeholder="e.g. Simpson" value="" required>
					</p>

					<p>
                        <?php echo $account->getError("Your emails do not match") ?>
						<label for="email">Email</label>
						<input id="email" name="email" type="email" placeholder="e.g. bart@gmail.com" value="" required>
					</p>

					<p>
						<label for="email2">Confirm email</label>
						<input id="email2" name="email2" type="email" placeholder="e.g. bart@gmail.com" value="" required>
					</p>

					<p>
                        <?php echo $account->getError("Your passwords do not match") ?>
						<label for="password">Password</label>
						<input id="password" name="password" type="password" placeholder="Your password" required>
					</p>

					<p>
						<label for="password2">Confirm password</label>
						<input id="password2" name="password2" type="password" placeholder="Your password" required>
					</p>

					<button type="submit" name="registerButton">SIGN UP</button>

					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? Log in here.</span>
					</div>

                </form>

            </div>

            <div id="loginText">
                <h1>Get and post powerful words, right now</h1>
                <h2>Listen to loads of songs for free</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create your own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>

        </div>


    </div>


</body>

</html>
