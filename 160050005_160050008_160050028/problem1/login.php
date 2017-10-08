<?php
session_start();
if (($_POST["uname"]=="eval") && ($_POST["pword"]=="eval"))
{
	$_SESSION["user"] = "eval";
	include 'album.php';
}
else
print "Incorrect credentials";
?>