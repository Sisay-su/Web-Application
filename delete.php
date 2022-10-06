<?php
require_once('includes/mysqli_connect.php');

//identify $id to be deleted, receive values(id) from delete_confirm.php
$id = $_GET['id'];

//formulate a DELETE SQL statement for $query using $id
$query = "DELETE FROM carts WHERE id = $id";

//Execute the query using mysqli_query()
$result = mysqli_query($connection, $query);
if ($result) {
	//if deleted successfully
	echo "<p>The selected item has been deleted.</p>";
} else {
	//if error
	echo "<p>The selected item could not be deleted.</p>";
}
echo "<p><a href=cart.php>Go back to cart</a></p>";
mysqli_close($connection);
?>
