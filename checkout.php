<?php
//header included here
include("header2.html");
?>
<br>
<br>
<br>
<br>
<?php
if (isset($_POST['submitted'])) {
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
  if (empty($_POST['country'])) {
    $errors[] = 'You forgot to enter your country';
  } else {
    $country = mysqli_real_escape_string($connection, $_POST['country']);
  }
  if (empty($_POST['state'])) {
    $errors[] = 'You forgot to enter your state.';
  } else {
    $state = mysqli_real_escape_string($connection, $_POST['state']);
  }
  if (empty($_POST['zip'])) {
    $errors[] = 'You forgot to enter your zip.';
  } else {
    $zip = mysqli_real_escape_string($connection, $_POST['zip']);
  }


  if (empty($errors)) {
    $query = "SELECT * FROM orders WHERE email='$email'";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 0) {
      $query = "INSERT INTO orders (first_name, last_name, email, address, country, state, zip)
      VALUES ('$first_name', '$last_name', '$email', '$address', '$country', '$state', '$zip')";
      $result = mysqli_query ($connection, $query);
      if ($result) {
        echo "<p>Thank you! your order has been submitted.</p>";
        echo "<a href=mysite2.php>continue shopping</a>";
        mysqli_close($connection);
        exit();
      } else { 
        $errors[] = 'Your order was not submitted due to a system error. We apologize for any inconvenience.';
        $errors[] = mysqli_error($connection);
      }
    } else {
      $errors[] = 'The email address has already been registered.';
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
}
?>

<center>
<h2>Shipping Address</h2>
<br>
<form action="checkout.php" method="post">
  <p>First Name: <input type="text" name="first_name" size="15" maxlength="20"/></p>
  <p>Last Name: <input type="text" name="last_name" size="15" maxlength="40"/></p>
  <p>Email Address: <input type="text" name="email" size="20" maxlength="60"/></p>
  <p>Address: <input type="text" name="address" size="20" maxlength="60"/></p>
  <p>Country: <input type="text" name="country" size="20" maxlength="60"/></p>
  <p>State: <input type="text" name="state" size="20" maxlength="60"/></p>
  <p>Zip Code: <input type="text" name="zip" size="20" maxlength="60"/></p>
  <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="cashOnDelivery" name="cashOnDelivery" type="radio" class="custom-control-input" checked="" >
                <label class="custom-control-label" for="cashOnDelivery">Cash on Delivery</label>
              </div>
            </div>
  <br>
  <p><input type="submit" name="submitted" value="Place Order"></p>
</form>
</center>

<br>
<br>
<br>
<br>
<br>
<?php include("footer.html"); ?>