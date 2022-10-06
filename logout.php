<html>
<body>
<center>
<?php
// This page lets the user logout.
session_start(); // Access the existing session.
// If no session variable exists, redirect the user:
if (!isset($_SESSION['id'])) {
	header("Location: index.php");
} else { // cancel the session
	$_SESSION = []; //clear the variables.
	session_destroy(); //Destroy the session itself
}
// set the page title and include the HTML header:
echo "<h1>You are Logged out!</h1></p>";
echo "<p><a href=mysite.php>Go back to the main page</a></p>";
?>
</center>
</body>
</html>
