<?php
include("header2.html");
echo "<p> Personal Information </p>";

?>
<br>
<br>
<br>
<?php
	$errors = [];
	require_once('includes/mysqli_connect.php');
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
	}
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
	}
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$email = mysqli_real_escape_string($connection, $_POST['email']);
	}
	if (empty($_POST['address'])) {
		$errors[] = 'You forgot to enter your address.';
	} else {
		$address = mysqli_real_escape_string($connection, $_POST['address']);
	}
	if (empty($_POST['state'])) {
		$errors[] = 'You forgot to enter your state.';
	} else {
		$state = mysqli_real_escape_string($connection, $_POST['state']);
	}
	if (empty($_POST['country'])) {
		$errors[] = 'You forgot to enter your country.';
	} else {
		$country = mysqli_real_escape_string($connection, $_POST['country']);
	if (empty($_POST['zip'])) {
		$errors[] = 'You forgot to enter your zip code.';
	} else {
		$zip = mysqli_real_escape_string($connection, $_POST['zip']);
	}

	if (empty($errors)) {
		if (mysqli_num_rows($result) == 0) {
			$query = "INSERT INTO orders (first_name, last_name, email, address, state,country,zip)
			VALUES ('$first_name', '$last_name', '$email', '$address', '$state', '$country', '$zip')";
			$result = mysqli_query ($connection, $query);
			if ($result) {
				echo "<p>Thank you for your information.</p>";
				echo "<a href=index.php>Login</a>";
				mysqli_close($connection);
				exit();
			} else { 
				$errors[] = 'You could not be registered due to a system error. We apologize for any inconvenience.';
				$errors[] = mysqli_error($connection);
			}
		} else {
			$errors[] = 'We could not complete this step';
		}
	}
	
	if(!empty($errors)){
		echo '<h1>Error!</h1>
		<p>The following error(s) occurred:<br />';
		foreach ($errors as $msg) {
			echo "$msg<br>";
		}
		echo '</p><p>Please try again.</p>';
	}
	mysqli_close($connection);


?>

	<form action = "order.php" method = "post">
		First Name: <input name ="first_name" size = "50" value="<?php echo "$row[first_name]";?>"><br>
		Last Name: <input name ="last_name" size = "50" value="<?php echo "$row[last_name]";?>"><br>
		Email: <input name ="email" size = "50" value="<?php echo "$row[email]";?>"><br>
		Address: <input name ="address" size = "50" value="<?php echo "$row[address]";?>"><br>
		Country: <input name ="country" size = "50" value="<?php echo "$row[country]";?>"><br>
		State: <input name ="state" size = "50" value="<?php echo "$row[state]";?>"><br>
		Zip: <input name ="zip" size = "50" value="<?php echo "$row[zip]";?>"><br>
		<p><input type="submit" name="submitted" value="Register"></p>
	</form>

	<?php
	
mysqli_close($connection);
?>
