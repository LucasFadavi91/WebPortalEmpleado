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
  <li><a href="../controllers/controller_minomina.php">Mi Nomina</a></li>
  <li><a href="../controllers/controller_historial.php">Historial Laboral</a></li>
</ul>
</div>



</body>
</html>