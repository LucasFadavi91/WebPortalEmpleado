<?php 
  //session_start();

	if (isset($_SESSION) && isset($_SESSION["userId"]) === false) {
	  exit("No estas logueado, datos incorrectos.");
		//header('location: ../views/controller_login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Informacion Departamentos</title>
	<meta charset="utf-8" />
      <style>
        body{
           background-color: mediumspringgreen; 
        }
        .formulario{
          padding: 10px;
        }
        label{
          display: inline-block;
          width: 150px;
        }
    </style>
</head>
<body>

<a href="../controllers/controller_login.php"><button>Volver</button></a>
  <h3>Informacion de Departamentos</h3>

   <form class="formulario" action="../controllers/controller_infodept.php" method="POST">
                <fieldset>  
                    <label for="departamento">Departamento:</label>
                    <select name="departamento">
                        <?php foreach($departamentos as $departamento) : ?>
                            <option> <?php echo $departamento ?> </option>
                        <?php endforeach; ?>
                    </select><br><br>
                
                    <input type="submit" value="Consultar" name="consultar">
                </fieldset>
            </form>   


</body>
</html>