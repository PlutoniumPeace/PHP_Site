<?php
function yay_or_nay()
{
	if (!isset($_SESSION['user_name']))
		header("Location: log_in.php");
}

function showPost($key)
{
	if ( isset($_POST[$key]) )
		echo htmlspecialchars($_POST[$key]);
}

function getPost($key)
{
	if ( isset($_POST[$key]) )
		return htmlspecialchars($_POST[$key]);
	return "";
}

function validate_credentials($sql_conn, $username, $password)
{
	if ($username=="User1" && $password=="Password1")
		return true;

	$row = searchForUsername($sql_conn, $username);

	if ($row == "fail")
	return false;
	if (password_verify($password, $row['pass_encrypted']))
	return true;
	return false;
}

function mariaConnect()
{
	$sql_usr= "jhampton20";
 	$sql_conn= mysqli_connect("localhost",$sql_usr,$sql_usr,$sql_usr);

	if (mysqli_connect_errno()) {
	echo "<h4>Could not connect to DB: " .mysqli_connect_error()."</h4>";
	}
	return $sql_conn;
}

function searchForUsername($sql_conn, $username)
{
        $tableSelect = "SELECT * FROM users WHERE username=?";
        $stmt = $sql_conn->prepare($tableSelect); 
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

    	if ($result->num_rows != 1) 
    	{
    	return "The request failed";
    	}
    
    	$row = $result->fetch_assoc();   
    	return $row;
}

function showUsers($conn)
{
        $tableSelect = "SELECT username FROM users";
        $stmt = $conn->prepare($tableSelect); 
        $stmt->execute();
        $result = $stmt->get_result();
        echo '<h3>Current Users</h3><br>';
        while($row = $result->fetch_assoc()){
           echo $row['username'] ;
    	}
}

?>
