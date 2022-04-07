<html>
<!-- I honor Parkland's core values by affirming that I have followed all academic integrity guidelines for this work. 
Juwan Hampton
CSC155-201H -->
<head> 
<title>Login</title>
<?php
require ("lib/phpfunctions.php");

session_start(); 

$message="";
$username= getPost('user_name');
$password= getPost('user_pass');
if (isset($_POST['button']))
{
     if ($_POST['button'] == 'Click to Login')
     {
	if (validate_credentials($username, $password))
	{
	     $_SESSION['user_name'] = $username;
	     header('Location: welcome.php');
	}
	$message = "Invalid username or password! Please try again.";
     }
}
?>
</head>
<body>
<h3><u>Please Login Below</u></h3><br>
<form method='POST'>
Name: <input type='text' name='user_name' value='<?php showPost("user_name");?>'><br>
Password: <input type='text' name='user_pass' value='<?php showPost("user_pass");?>'><br>
<input type='submit' name='button' value='Click to Login'><br>
name is User1, password is Password1<br>
<div style='position: absolute; bottom: 10px;'><p><?php echo $message;?></p></div>

</body>
</html>
