<?php
require_once('includes/mysqli_connect.php');
$id = mysqli_real_escape_string($connection, $_POST['id']);
$name = mysqli_real_escape_string($connection, $_POST['name']);
$price = mysqli_real_escape_string($connection, $_POST['price']);
$size = mysqli_real_escape_string($connection, $_POST['size']);

$query = "UPDATE carts SET id='$id', name = '$name', price = '$price', $size ='$size' WHERE id = $id";
$result = mysqli_query($connection,$query);
if ($result)
{
	echo "<p>The selected record has been updated.</p>";
	echo "<p><a href = airjordan.php> Go back to the main page</a></p>";
}
else
{
	echo "<p> The selected record could not be updated due to a system error.</p>";
}
mysqli_close($connection);
?>