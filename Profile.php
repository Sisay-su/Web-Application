<?php
//header included here
include("header2.html");
?>
<br>
<html>
<body>
<center>
    <br>
    <br>
    <br>
    <table width="700" cellpadding="10">
        <tr><td align="center">
             <?php
            session_start();
            if(!empty($_SESSION['email'])) {
            	echo "<a href=loggedin.php></a> 
            		  <a href =logout.php></a><br>";

                echo "<h2>Thank you, ". $_SESSION['first_name'] . "<h2><br>";
                echo "<h2> You are logged in!<h2>";
                echo "Your email is ". $_SESSION['email']."</p>";
            }
            ?>
        </td></tr>
    </table>
</center>
</body>
</html>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
//header included here
include("footer.html");
?>  