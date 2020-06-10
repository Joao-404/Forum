<?php

	if( isset( $_COOKIE['user'] ) )
	{
		$username = $_COOKIE['user'];
	}
	else
	{
		// Não há um user logado

		// Redireccionar para a página de login
		header('Location: login.php' );
		exit();
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Forum</title>
		<link rel="stylesheet" href="site.css">
	</head>
<body>
	<header>
			<span class="username">
			<?php echo $username; ?>		
			</span>
			<a href="logout.php">Logout</a>
	</header>
	<nav>
		<a href="homepage.php">home</a>
		
	</nav>
<main>

	<h2>HomePage</h2>


	<aside>
		<pre>
			<?php print_r($_COOKIE); ?> 
		</pre>
	</aside>



</main>

	<footer>
		<h2>Homepage</h2>
	</footer>

</body>
</html>