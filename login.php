<?php
//header included here
include("header.html");
?>
<br>
<br>
<br>
<br>
<br>
<?php
// check if the form has been submitted:
$email = $_POST['email'];
$pass = $_POST['pass'];
$errors = []; // Initialize error array.

#if (empty(email)) {
#		$errors[] = 'You forgot to enter your email address.';
#	}

#if (empty($pass)) {
#		$errors[] = 'You forgot to enter your password.';
#	}

if(!empty($email) && !empty($pass)) {
		require_once('includes/mysqli_connect.php');
		$query = "SELECT * FROM users WHERE email='$email' AND pass= SHA2('$pass', 512)";
		$result = mysqli_query($connection, $query); // Run the query.
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if($row) {
			session_start();
			$_SESSION['id'] = $row['id'];
			$_SESSION['first_name'] = $row['first_name'];
			$_SESSION['last_name'] = $row['last_name'];
			$_SESSION['email'] = $row['email'];
			// Redirect
			header("Location:loggedin.php");

			exit(); // Quit the script
		}
}

#$errors[] = 'Your email address and/or password do not match.';
#if (!empty($errors)) {
#	echo "<h1>Error!</h1>
	#<p>The following error(s) occured:<br>";
	#foreach ($errors as $msg) {
		#echo "$msg<br>";
#	}
	#echo '</p><p><a href=index.php>Please try again.</a></p>';
#}

mysqli_close($connection); //close the database connection.
?>

<html>
<body>
	<center>
		
<h2>Please Login here to use our service</h2>
<br>
<form action="login.php" method="post">
	<p>Email Address: <input type="email" name="email" size="20" maxlength="60"></p>
	<p>Password: <input type="password" name="pass" size="20" maxlength="20"></p>
	<p><input type="submit" name="submit" value="Login"></p>
</form>
	</center>
</body>
</html>