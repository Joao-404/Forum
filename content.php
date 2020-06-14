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


function getposts()
{
	$con = estabelecerConexao();
	$stmt = $con->prepare("SELECT * FROM threads ORDER BY posted DESC");
	$stmt->execute();

    $threads = $stmt->fetchAll();
  
    return $threads;  	
} 
?>
