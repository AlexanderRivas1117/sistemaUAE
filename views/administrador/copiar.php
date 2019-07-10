<?php 




if(is_array($_FILES)) {
	// var_dump($_FILES);
// unset($_FILES);
// $file = 'logo_UAE.JPG';
// $newfile = 'logo.jpg';

// if (!copy($file, $newfile)) {
//     echo "failed to copy $file...";
// }else{
//     echo "copied $file into $newfile";
// }



 if( $_FILES['portada']['name'] != "" )
  {
  	$path = $_FILES['portada']['name'];
    if(copy ( $_FILES['portada']['tmp_name'], 
     "../../IMAGENES/" . $_FILES['portada']['name'] ) )
    {
    	
    	require_once '../../app/config.php';
    	$con = conectar();
    	if(!isset($_REQUEST['id']))
		{
			$sql = "SELECT max(id) as max FROM libro";
	    	$max = $con->query($sql);
	    	$max = $max->fetch_assoc();
	    	$max = $max['max'];
		}
		else
		{
			$max = $_REQUEST['id'];
		}
    	
    	$sql = "UPDATE libro set portada = '{$path}' where id = '{$max}'";
    	$r = $con->query($sql);
    	mysqli_close($con);
    }
    else
    {
    	die( "Could not copy file" );
    }

  }
  else
  {
    die( "No file specified" );
  }

}



 ?>