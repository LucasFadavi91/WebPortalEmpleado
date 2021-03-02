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
	<title>Cambio de Departamento</title>
	<meta charset="utf-8" />
      <style>
        body{
          background-color: lavender; 
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

  <h3> Cambio de Departamento </h3>

   <form class="formulario" action="../controllers/controller_07_cambiodept.php" method="POST">
                <fieldset>  
                    <label for="emp_no">Codigo Empleado:</label>
                    <input type="text" name="emp_no" size="10" required><br><br>


                    <label for="departamento">Departamento:</label>
                    <select name="departamento">
                        <?php foreach($departamentos as $departamento) : ?>
                            <option> <?php echo $departamento ?> </option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <input type="submit" value="Cambiar de Departamento" name="modificar">
                </fieldset>
            </form>   


</body>
</html>