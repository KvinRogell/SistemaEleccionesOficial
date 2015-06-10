<?php 
	session_start();
	session_destroy();
	header("Location:dui.php");
 ?>