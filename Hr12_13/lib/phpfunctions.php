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

function validate_credentials($username, $password)
{
	if ($username=="User1" && $password=="Password1")
		return true;
	return false;
}

?>
