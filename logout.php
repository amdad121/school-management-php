<?php 
	session_start();
	if (isset($_SESSION['id'])) :

	session_destroy();

    endif;
header('location: login.php');
