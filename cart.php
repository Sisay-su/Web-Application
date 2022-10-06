<?php

include("header2.html");
require_once("includes/mysqli_connect.php");
$id = $_GET['id'];
$query = "SELECT * FROM items WHERE id = $id";
$result = mysqli_query($connection, $query);
echo "<p>Your cart:</p>";
?>
<br>
<br>
<br>
<?php



while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

if ($id){
  $query = "INSERT INTO carts (name, price, size) VALUES ('$row[name]','$row[price]','$row[size]')";
  $result = mysqli_query($connection, $query);

  //check if new record is inserted
  if ($result) {
    echo "<p> Item has been added to your cart.</p>";
    
  }
  else{
echo "<p>The item could not be added due to a system error".mysqli_error($connection)."</p>";
}
}
}
$query = "SELECT * FROM carts";
$result = mysqli_query($connection, $query);
$num = mysqli_num_rows($result);
if ($num > 0)
{
  echo "<p>There are $num items in your cart. </p>";
  echo "<table border=1 width = 80%>
    <tr><td>id</td>
      <td>name</td>
      <td>price</td>
      <td>size</td>
      <td>Delete</td>
    </tr>"; 
  //print records
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    echo "<tr><td>$row[id]</td>";
    echo "<td>$row[name]</td>";
    echo "<td>$row[price]</td>";
    echo "<td>$row[size]</td>";
    echo "<td><a href = delete_confirm.php?id=$row[id]>Delete</a></td>";
    }
  echo "</table>";
  echo "<p><a href=checkout.php>Check Out</a></p>";
}
else {
  echo "<p>There are no items in your cart.</p>";
}
echo "<p><a href=mysite2.php>Continue shopping</a></p>";

mysqli_close($connection);
?>