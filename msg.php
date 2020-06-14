<?php 
	// insertUser.php 
	
	
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

    function obtainpost()
{
	$con = estabelecerConexao();
	$stmt = $con->prepare("SELECT * FROM threads id = '$_GET[id]'");
	$stmt->execute();

    $goal = $stmt->fetchAll();
  
    return $goal;  	
} 

$posted = obtainpost();


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
            <input type=button onClick="location.href='Homepage.php'" value='homepage'>
	</header>
	
</head>
<body>

<?php 
			foreach ($posted as $content): 
				$id= $content['id'];
				$title= $content['title'];
				$replies= $content['replies'];
                $author= $content['author'];
                $message= $content['message'];
				$posted = date("Y-m-d",$content['posted']);


		?>
			<div>
            <h2><?php echo $title; ?></h2>

            <p><?php echo $message; ?></p>
            <h4>Posted by <?php echo $author; ?> on <?php echo $posted; ?></h4><hr>
			</div>
		<?php		
			endforeach;
		?>


</body>
</html>