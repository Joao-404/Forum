<?php 


define ( 'HOSTNAME',  'localhost');
define ( 'DATABASE', 'id12738869_base');
define ( 'USERNAME', 'id12738869_master');
define ( 'USER_PASSWORD', 'C]1+iP]mTCx/3[^l');


function estabelecerConexao()
{
    try
    {
    $conexao = new PDO( "mysql:host=".HOSTNAME.";dbname=".DATABASE, USERNAME, USER_PASSWORD );
    }
    catch ( PDOException $e)
    {
        trigger_error($e->getMessage(), E_USER_ERROR);
    }

    // Always set it this way, after creation of PDO instance
    // The only proper error handling modes is PDO::ERRMODE_EXCEPTION. 
    $conexao->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    
    return $conexao;  
}

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
    $time = time();

    if( $_SERVER['REQUEST_METHOD'] == 'POST' )
	{
		
		// Se os valores dos parâmetros não estiverem vazios
		if( !empty($_POST['title']) && !empty($_POST['message'] ))
									   
		{
			$title = $_POST['title'];
			$message = $_POST['message'];

			
			adicionarTopic( $title,$message,$username,$time );

			

			
		}
		else
		{
			$msgErro = "Fill in the boxes!";
		}	
	}

    
    
    $time = time();

    function adicionarTopic( $title, $message,$username,$time )
{
	$con = estabelecerConexao();
	$stmt = $con->prepare("INSERT INTO threads VALUES(NULL,'$_POST[title]','$_POST[message]','$username','0','$time')");
	$stmt->execute( [ 'title' => $title, 
					  'message' => $message
					   	
                    ] );
                    
echo "Thread Posted.<br><a href='homepage.php'>Return</a>";

	
} 

?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Make a new Post</title>
    <header>
	
			<span class="username">
			<?php echo $username; ?>		
			</span>
			<a href="logout.php">Logout</a>
	</header>
	
</head>
<body>

<form  method="POST">
 
 <input type="text" name="title"><br>
 <br><textarea cols="60" rows="5" name="message"></textarea><br>
 <input type="submit" value="Post Thread">
 </form>

</body>
</html>
