<?php 

session_start();

	if(!isset($_SESSION['userLogin'])){
		header("Location: login.php");
	}


	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Logout: login.php");
	}
	

?>

<p>Welcome to index</p>

<a href="index.php?logout=true">Logout</a>