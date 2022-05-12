<html>
<!-- I honor Parkland's core values by affirming that I have followed all academic integrity guidelines for$
Juwan Hampton
CSC155-201H -->
<head>
<title>Welcome</title>
<?php
require("lib/phpfunctions.php");

session_start();

function user_set(){
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
	header('Location: welcome.php');
}
}
?>
<?php readfile("lib/head.html"); ?>
</head>
<body>

<p> Welcome to my site!</p>


</body>
<?php readfile("lib/foot.html"); ?>

</html>
