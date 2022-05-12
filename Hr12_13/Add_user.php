<html>
<!--  I honor Parkland's core values by affirming that I have followed all academic
integrity guidelines for this work. 
Juwan Hampton
CSC155-201H -->

<head> 
<title>Add User</title>
<?php

$sql_usr= "jhampton20";
$sql_conn= mysqli_connect("localhost",$sql_usr,$sql_usr,$sql_usr);

	if (mysqli_connect_errno()) {
	echo "<h4>Could not connect to DB: " .mysqli_connect_error()."</h4>";
	}	

	if (isset($_POST['button'])){
	$button= $_POST['button'];
	
	if ($button == "Add User"){
	  $newpass = $_POST['new_pass'];
	  $passcheck = $_POST['pass_check'];
	  if ($newpass == $passcheck && (strlen($newpass) > 6) &&
	  (strlen($_POST['new_user']) > 4)){
	    
	    $stmt=$sql_conn->prepare("INSERT INTO users SET username=?,email=?,usergroup=?,pass_encrypted=?");

	    $stmt->bind_param("ssss", $newuser,$newemail, $usergroup, $passkey);
		$newuser= $_POST['new_user'];
		$newemail= $_POST['new_email'];
		$usergroup= $_POST['usergroup'];
		$passkey= password_hash($newpass, PASSWORD_DEFAULT);

		$stmt->execute();
		echo "User Added Successfully, Returning to Login";
		sleep (2);
		header('Location: log_in.php');
		}
	}
	elseif ($button == "Cancel"){
	  header('Location: log_in.php');
	}
      }
?>
</head>
<body>

<form method='POST'>
<h3>Enter the New User's Info</h3><br>
<b>Password must be greater than 6 characters in length and username must be
greater than or equal to 5...</b>
<br>Username:<input type='text' name='new_user' >
<br>Email:<input type='text' name='new_email' >
<br>Usergroup:<input type='text' name='usergroup' >
<br>Password:<input type='password' name='new_pass' >
<br>Verify Password:<input type='password' name='pass_check' >
<br><input type='submit' name='button' value='Add User'>
<br><input type='submit' name='button' value='Cancel'>
</form>

</body>
</html>
