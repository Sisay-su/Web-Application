<?php
include("header1.html");
include("header2.html");
?>
<br>
<br>
<br>
<?php
$id = $_GET['id'];

echo "<p> Are you sure that you want to remove this item from your cart?</p>";
echo "<p><a href=delete.php?id=$id>YES</a></p>";
echo "<p><a href=cart.php>NO</a></p>";
?>

