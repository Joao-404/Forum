<?php

	setcookie('user', "", time() - 3600 );

	// Redirecção para o login
	header('Location: login.php'); 
	exit();
?>