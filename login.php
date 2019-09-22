<?php
session_start();
require_once("config.php");

function login_header($title = "Log In", $alert = array()){

?><!DOCTYPE HTML>
<html lang="en-ZA">
<head>
	<title><?php echo(SITE_NAME); ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<style type="text/css">
		.error {
			color: red; display: none;
		}
	</style>
</head>
<body>
<div id="login" class="login">
	<h1><a href="<?php echo(SITE_URL); ?>"><?php echo(SITE_NAME); ?></a></h1>
<?php
if(isset($_SESSION['alert']['success'])):
?>
	<div class="alert alert-success"><?php echo($_SESSION['alert']['success']); ?></div>
<?php
unset($_SESSION['alert']);
elseif(isset($_SESSION['alert']['warning'])):
?>
	<div class="alert alert-warning"><?php echo($_SESSION['alert']['warning']); ?></div>
<?php
unset($_SESSION['alert']);
endif;
}

function login_footer($target = ""){
?>
<p><a href="<?php echo(SITE_URL); ?>" title="">&larr; Go back Home</a></p>
</div>
<script type="text/javascript">
<?php if(!empty($target)): ?>
	document.getElementById("<?php echo($target); ?>").focus();
<?php endif; ?>
	$('.submit').click(function(e){
		//var response = grecaptcha.getResponse();
		var response = "Something";
		if(response.length === 0){
			return false;
		} else {
			var name    = $(this).attr("name");
			var missing = [];

			$('.error').each(function(){
				$(this).css("display", "none");
			});

			switch(name){
				case "login":
					var user_pass  = document.getElementById("user_pass");
					var user_login = document.getElementById("user_login");

					//
					// Clear missing fields buffer
					//
					missing = [];

					//
					// Validate user input
					//
					if(user_login.value === ''){
						missing.push("user_login");
					}

					if(user_pass.value === ''){
						missing.push("user_pass");
					}
					break;
				case "reset":
					var user_login  = document.getElementById("user_login");

					//
					// Clear missing fields buffer
					//
					missing = [];

					//
					// Validate user input
					//
					if(user_login.value === ''){
						missing.push("user_login");
					}
					break;
				case "register1":
					var user_pass      = document.getElementById("user_pass");
					var user_login     = document.getElementById("user_login");
					var user_title     = document.getElementById("user_title");
					var user_gender    = document.getElementById("user_gender");
					var user_lastname  = document.getElementById("user_lastname");
					var user_firstname = document.getElementById("user_firstname");

					//
					// Clear missing fields buffer
					//
					missing = [];

					//
					// Validate user input
					//
					if(user_pass.value === ''){
						missing.push("user_pass");
					}

					if(user_login.value === ''){
						missing.push("user_login");
					}

					if(user_title.value === ''){
						missing.push("user_title");
					}

					if(user_gender.value === ''){
						missing.push("user_gender");
					}

					if(user_lastname.value === ''){
						missing.push("user_lastname");
					}

					if(user_firstname.value === ''){
						missing.push("user_firstname");
					}
					break;
			}

			//
			// Check if there are missing fields
			//
			if(missing.length > 0){
				$(missing).each(function(){
					var control = document.getElementById(this.toString());
					$(control).closest("p").find(".error").css("display", "block");
				});
				//e.preventDefault();
				return false;
			}
		}
	});
</script>
</body>
</html>
<?php 
}

$alert  = array();
$action = isset($_GET['action']) ? $_GET['action'] : "login";

switch($action):
case "logout":
	$user   = $_SESSION['user']['ID'];
	$query  = "INSERT INTO ms_log SET ms_log.user_id = $user, ms_log.description = 'Logged out of account.'";
	$logout = $dbcon->query($query) or trigger_error($dbcon->error . "[$query]");

	if($logout){
	    session_unset();
	    setcookie(session_name(), '', 100);
	    session_destroy();
	    $_SESSION = array();
	}

	// Redirect to the home page
	header("Location: " . SITE_URL);
	exit();
case "forgotpassword":
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reset'])){
		$user_pass  = cleanstring("password", "password!");
		$user_login = cleanstring("login", $_POST['user_login']);

		/**
		 * Verify if the email address provided exists
		 */
		$user = verify_user($user_login);

		if($user){
			$SQL   = "UPDATE ms_user SET ms_user.password = $user_pass WHERE ms_user.email = $user_login";
			$query = $dbcon->query($SQL) or trigger_error($dbcon->error . ": [$SQL]");
			if($query){
				$_SESSION['alert']['success'] = "Check your email for your temporary password.";
				header("Location: " . SITE_URL . "/login.php");
				exit();
			}
		} else {
			$_SESSION['alert']['warning'] = "There is no account registered with the email address provided.";
			header("Location: " . SITE_URL . "/login.php?action=forgotpassword");
			exit();
		}
	}

	login_header("Forgot Password");
?>
<form name="forgotform" id="forgotform" action="<?php echo(SITE_URL . '/login.php?action=forgotpassword'); ?>" method="POST">
	<p>
		<label for="user_login">Email</label>
		<input type="email" name="user_login" id="user_login" class="form-control">
		<label class="error">You need to provide an email address to reset your password.</label>
	</p>
	<p>
		<button type="submit" name="reset" class="btn submit">Reset</button>
	</p>
	<p>
		<div class="g-recaptcha" data-sitekey="6Ld8NHcUAAAAAFMUzPQqtpGxqQ-HkfLkQ3hbPa9b"></div>
		<label class="error">Verify that you are not a robot.</label>
	</p>
</form>
<p><a href="<?php echo(SITE_URL . '/login.php'); ?>">Login</a> | <a href="<?php echo(SITE_URL . '/login.php?action=register'); ?>">Register</a></p>
<?php
	login_footer("user_login");
	break;
case "resetpassword":
	login_header("Reset Password");
?>
<form name="resetform" id="resetform" action="<?php echo(SITE_URL . '/login.php?action=resetpassword'); ?>" method="POST">
	<p>
		<label for="user_login">Email</label>
		<input type="email" name="user_login" id="user_login" class="form-control">
		<label class="error">You need to provide an email address to reset your password.</label>
	</p>
	<p>
		<button type="submit" name="reset" class="btn submit">Reset</button>
	</p>
	<p>
		<div class="g-recaptcha" data-sitekey="6Ld8NHcUAAAAAFMUzPQqtpGxqQ-HkfLkQ3hbPa9b"></div>
		<label class="error">Verify that you are not a robot.</label>
	</p>
</form>
<p><a href="<?php echo(SITE_URL . '/login.php'); ?>">Login</a> | <a href="<?php echo(SITE_URL . '/login.php?action=register'); ?>">Register</a></p>
<?php
	login_footer("user-login");
	break;
case "register":
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
		foreach($_POST as $key => $value){
			if($value === '' && $key !== 'register' && $key !== 'g-recaptcha-response'){
				$_SESSION['alert']['warning'] = "Fill in all the fields below to register. " . $key;
				header("Location: " . SITE_URL . "/login.php?action=register");
				exit();
			}
		}

		$user_pass      = cleanstring("password", $_POST['user_pass']);
		$user_login     = cleanstring("login", $_POST['user_login']);
		$user_title     = cleanstring("login", $_POST['user_title']);
		$user_gender    = cleanstring("login", $_POST['user_gender']);
		$user_lastname  = cleanstring("login", $_POST['user_lastname']);
		$user_firstname = cleanstring("login", $_POST['user_firstname']);

		/**
		 * Check if email address not in use already
		 */
		$user = verify_user($user_login);

		if($user){
			$_SESSION['alert']['warning'] = "The email address provided is already registered. Please choose another one.";
			header("Location: " . SITE_URL . "/login.php?action=register");
			exit();
		}

		$SQL   = "INSERT INTO ms_user SET ms_user.firstname = $user_firstname, ms_user.lastname = $user_lastname, ms_user.email = $user_login, ms_user.password = $user_pass, ms_user.gender = $user_gender, ms_user.title = $user_title";
		$query = $dbcon->query($SQL) or trigger_error($dbcon->error . ": [$SQL]");

		if($query){
			$_SESSION['alert']['success'] = "Your registration was successful.";
			header("Location: " . SITE_URL . "/login.php");
			exit();
		} else {
			$_SESSION['alert']['warning'] = "There was an error creating your account. Please try again later.";
			header("Location: " . SITE_URL . "/login.php");
			exit();
		}
	}

	login_header("Register");
?>
<form name="registerform" id="registerform" action="<?php echo(SITE_URL . '/login.php?action=register'); ?>" method="POST">
	<p>
		<label for="user_title">Title</label>
		<select name="user_title" id="user_title" class="form-control">
			<option value selected disabled>Select Option</option>
<?php
$SQL   = "SELECT ms_title.ID, ms_title.name FROM ms_title";
$query = $dbcon->query($SQL) or trigger_error($dbcon->error . ": [$SQL]");
while($title = $query->fetch_array()):
?>
			<option value="<?php echo($title['ID']); ?>"><?php echo($title['name']); ?></option>
<?php
endwhile;
?>
		</select>
		<label class="error">Please select your title.</label>
	</p>
	<p>
		<label for="user_firstname">Name</label>
		<input type="text" name="user_firstname" id="user_firstname" class="form-control">
		<label class="error">We need your first name to identify you with.</label>
	</p>
	<p>
		<label for="user_lastname">Surname</label>
		<input type="text" name="user_lastname" id="user_lastname" class="form-control">
		<label class="error">We neeed your surname.</label>
	</p>
	<p>
		<label for="user_login">Gender</label>
		<select name="user_gender" id="user_gender" class="form-control">
			<option value selected disabled>Select Option</option>
<?php
$SQL   = "SELECT ms_gender.ID, ms_gender.orientation FROM ms_gender";
$query = $dbcon->query($SQL) or trigger_error($dbcon->error . ": [$SQL]");
while($gender = $query->fetch_array()):
?>
			<option value="<?php echo($gender['ID']); ?>"><?php echo($gender['orientation']); ?></option>
<?php
endwhile;
?>
		</select>
		<label class="error">Please select your gender.</label>
	</p>
	<p>
		<label for="user_login">Email</label>
		<input type="email" name="user_login" id="user_login" class="form-control">
		<label class="error">You need an email address to log in with.</label>
	</p>
	<p>
		<label for="user_pass">Password</label>
		<input type="password" name="user_pass" id="user_pass" class="form-control">
		<label class="error">You need a password to log in with.</label>
	</p>
	<p>
		<button type="submit" name="register" class="btn submit">Register</button>
	</p>
	<p>
		<div class="g-recaptcha" data-sitekey="6Ld8NHcUAAAAAFMUzPQqtpGxqQ-HkfLkQ3hbPa9b"></div>
		<label class="error">Verify that you are not a robot.</label>
	</p>
</form>
<p><a href="<?php echo(SITE_URL . '/login.php?action=forgotpassword'); ?>">Forgot your password?</a> | <a href="<?php echo(SITE_URL . '/login.php'); ?>">Login</a></p>
<?php
	login_footer("user_firstname");
	break;
case "login":
default:
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){

		$user_login = cleanstring("login", $_POST['user_login']);
		$user_pass  = cleanstring("password", $_POST['user_pass']);

		$SQL   = "SELECT ms_user.ID, ms_user.firstname, ms_user.lastname, ms_user.email, ms_user.gender, ms_user.dateofbirth, ms_user.title, ms_user.relation FROM ms_user WHERE ms_user.email = $user_login AND ms_user.password = $user_pass LIMIT 1";
		$query = $dbcon->query($SQL) or trigger_error($dbcon->error . ": [$SQL]");
		if($query->num_rows > 0){
            session_unset();
            
            // New session
            $_SESSION = array();
            
            // Store user information on session variable 'user'
            $_SESSION['user'] = $query->fetch_array();
            
            // Set authorised variable
            $_SESSION['AUTHORISED'] = true;
            
            $user  = $_SESSION['user']['ID'];
            $query = "INSERT INTO ms_log SET ms_log.user_id = $user, ms_log.description = 'Logged into account.'";
            $login = $dbcon->query($query) or trigger_error($dbcon->error . "[$SQL]");

			header("Location: " . SITE_URL . "/profile.php");
			exit();
		} else {
			$_SESSION['alert']['warning'] = "Username or password incorrect.";
			header("Location: " . SITE_URL . "/login.php");
			exit();
		}
	}

	login_header();
?>
<form name="loginform" id="loginform" action="<?php echo(SITE_URL . '/login.php'); ?>" method="POST">
	<p>
		<label for="user_login">Username</label>
		<input type="text" name="user_login" id="user_login" class="form-control">
		<label class="error">You need to provide a username to log in.</label>
	</p>
	<p>
		<label for="user_pass">Password</label>
		<input type="password" name="user_pass" id="user_pass" class="form-control">
		<label class="error">A password is required to successfully authenticate you.</label>
	</p>
	<p>
		<button type="submit" name="login" class="btn submit">Sign in</button>
	</p>
	<p>
		<div class="g-recaptcha" data-sitekey="6Ld8NHcUAAAAAFMUzPQqtpGxqQ-HkfLkQ3hbPa9b"></div>
		<label class="error">Verify that you are not a robot.</label>
	</p>
</form>
<p><a href="<?php echo(SITE_URL . '/login.php?action=forgotpassword'); ?>">Forgot your password?</a> | <a href="<?php echo(SITE_URL . '/login.php?action=register'); ?>">Register</a></p>
<?php
	login_footer("user_login");
	break;
endswitch;