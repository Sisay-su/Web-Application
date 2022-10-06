<?php
include("header2.html");
require_once('includes/mysqli_connect.php');
?>

<br>
<br>
<br>
<br>
<br>
<link rel="stylesheet" type="text/css" href="css/style.css">

<h1> Product Brand: NIKE </h1>

<form action = "nike.php" method = "post">
	Search: <input name = "query" size = "50">
	<input type = "submit" value = "search">
</form>

<?php

if (!empty($_POST['query'])){
	$query = mysqli_real_escape_string($connection,$_POST['query']);
	$query = "SELECT * FROM items WHERE name LIKE '%$query%'
				OR (price LIKE '%$query%')";
}
else {
	$query = "SELECT * FROM items WHERE id >= 5 AND id <= 6";
}
$result = mysqli_query($connection, $query);
$num = mysqli_num_rows($result);
?>

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

	<section>
<div id="img5">
<p><img src="NIKE1.jpg" border="#" width="450" height="270" /></p>
<h3>NIKE BLAZER 'WHITE BLACK'</h3>
<h3> Price: $100 </h3>
</div>

<div id="img6">
<p><img src="NIKE2.jpg" border="#" width="450" height="270" /></p>
<h3>NIKE AIR FORCE 'OFF-WHITE'</h3>
<h3> Price: $2100 </h3>
</div>
</section>
		<br>

<?php

$result = mysqli_query($connection, $query);
$num = mysqli_num_rows($result);

if ($num > 0)
{
	echo "<table border=1 width = 80%>
		<tr><td>id</td>
			<td>name</td>
			<td>price</td>
			<td>size</td>
		</tr>";
	//print records
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		echo "<tr><td>$row[id]</td>";
		echo "<td>$row[name]</td>";
		echo "<td>$row[price]</td>";
		echo "<td>$row[size]</td>";
		echo "<td><a href=cart.php?id=$row[id]>Add to cart</a></td>";
		/*echo "<p>Title: $row[title] <br></p>";
		echo "<p>Comment: $row[comment]<br></p>";
		echo "<p>URL: <a href = $row[url] target = _blank>$row[url]</a></p>";
		echo "<p><a href = delete_confirm.php?id=$row[id]>Delete</a></p>";
		*/
	}
	echo "</table>";
}
else {
	echo "<p> There is no record.</p>";
}

mysqli_close($connection);
?>