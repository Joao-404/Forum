<?php
	
	include('insertUser.php');
	
	// Testar se o formulário foi submetido 
	if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		
		// Se os valores dos parâmetros não estiverem vazios
		if( !empty($_POST['username']) && !empty($_POST['email'] )
									   && !empty($_POST['password']) )
		{
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];

			// Criar um novo utilizador na Base de Dados
			adicionarUser( $username, $email, $password );

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
	<title>User Register</title>
	<link rel="stylesheet" href="registo.css">
</head>
<body>

	<h1>User Register</h1>

	<section>
		<form method="post">

			<label>Username</label>
			<input type="text" name="username" autofocus>

			<label>Email</label>
			<input type="email" name="email">

			<label>Password</label>
			<input type="password" name="password" >

			<span class="erro">
				<?php echo !empty($msgErro) ? $msgErro : ""; ?> 
			</span>

			<input type="submit" value="Registar User">

		</form>

		
	</section>

</body>
</html>