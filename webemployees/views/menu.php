<?php 
  session_start();

	if (isset($_SESSION) && isset($_SESSION["userId"]) === false) {
	  exit("No estas logueado, datos incorrectos.");
		//header('location: ../views/controller_login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8" />
  <link rel="stylesheet" href="../css/stylemenu.css">
</head>
<body>

<a href="../controllers/logout.php"><button>Cerrar Sesión</button></a>

<div id="menu">
<ul>
  <li><a href="../controllers/controller_altaempleado.php">Alta Empleado</a></li>
  <li><a href="../controllers/controller_altamasiva.php">Alta Masiva Empleados</a></li>
  <li><a href="../controllers/controller_modificar_salario.php">Modificar Salario</a></li>
  <li><a href="../controllers/controller_vidalaboral.php">Vida Laboral</a></li>
  <li><a href="../controllers/controller_infodept.php">Info Departamentos</a></li>
  <li><a href="../controllers/controller_07_cambiodept.php">Cambio Departamento</a></li>
  <li><a href="../controllers/controller_08_nuevojefe.php">Nuevo Jefe Departamento</a></li>
  <li><a href="../controllers/controller_09_bajaempleado.php">Baja Empleado</a></li>
  <li><a href="../controllers/controller_minomina.php">Mi Nomina</a></li>
  <li><a href="../controllers/controller_historial.php">Historial Laboral</a></li>
</ul>
</div>



</body>
</html>