<?php

	session_start();


	if ($_SESSION['ROL']=="Administrador") 
	{
		header("Location: ../views/administrador/indexTheme.php");
		//window.location.replace("http://tuweb.com/pagina.html");
	}
	else
	{
		session_destroy();
		header('Location: ../../index.php');
	}



?>