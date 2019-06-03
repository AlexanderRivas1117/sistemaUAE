<?php

	session_start();


	if ($_SESSION['ROL']!="Administrador") 
			{
				
			session_destroy();
			header('Location: ../../index.php');
			}
			





?>