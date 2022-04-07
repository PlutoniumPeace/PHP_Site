<html>
<!-- I honor Parkland's core values by affirming that I have followed all academic integrity guidelines for$
Juwan Hampton
CSC155-201H -->
<head>
<title>Welcome</title>
<?php
require("lib/phpfunctions.php");

session_start();
yay_or_nay();

?>
<?php readfile("lib/head.html"); ?>
</head>
<body>

<p> This is the yellow page.</p><br>
<center><img src="images/y-shirt.jpg" width="100" height="100"/></center><br>

<center><label for="shirts">How many shirts?</label>
<select id="shirts" name="shirts">
  <option value="add">Add 1 to Cart</option>
  <option value="minus">Subtract 1 from Cart</option>
  <option value="remove_all">Remove All</option>
</select>
</center>

</body>
<?php readfile("lib/foot.html"); ?>

</html>  
