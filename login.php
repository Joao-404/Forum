<?php

	include( 'verifyUser.php' );
	
	// Testar se o formulário foi submetido 
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Testar a correspondência entre o username e a password
		if( isOkUsernamePassword( $username, $password ) )
		{
			// Login efectuado com sucesso

			// Criar um Cookie para o username
			setcookie('user', $username );

			// Redireccionar para a homepage
			header("Location: homepage.php");
			exit();

		}
		else
		{
			$msgErro = "username e password não correspondem!";
		}	
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Login</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>

	<h1>User Login</h1>

	<section>
		<form method="post">

			<label>Username</label>
			<input type="text" name="username" autofocus>

			<label>Password</label>
			<input type="password" name="password" >

			<span class="erro">
				<?php echo !empty($msgErro) ? $msgErro : ""; ?> 
			</span>

			<input type="submit" value="Login">

		</form>
		<input type=button onClick="location.href='registo.php'" value='Register'>

	</section>

</body>
</html>