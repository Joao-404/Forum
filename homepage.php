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

	include('content.php');
	$threads=getposts();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Forum</title>
		<link rel="stylesheet" href="site.css">
	</head>
<body>
	<header>
	<input type=button onClick="location.href='NewTopic.php'" value='Make New'>
			<span class="username">
			<?php echo $username; ?>		
			</span>
			<a href="logout.php">Logout</a>
	</header>
	
<main>

	<div class="content">

	
	<?php 
			foreach ($threads as $content): 
				$id= $content['id'];
				$title= $content['title'];
				$replies= $content['replies'];
				$author= $content['author'];
				//$posted= $content['posted'];
				$posted = date("Y-m-d",$content['posted']);


		?>
			<div>
			<h3><a href='msg.php' id=<?php echo $id; ?>'><?php echo $title; ?></a> <?php echo $replies; ?></h3><h4>Posted by <?php echo $author ?> on <?php echo $posted ?></h4>
			</div>
		<?php		
			endforeach;
		?>

	</div>


	



</main>

	<footer>
		
	</footer>

</body>
</html>