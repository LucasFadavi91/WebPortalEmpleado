<?php 
	session_start();

	if (isset($_SESSION) && isset($_SESSION["userId"])) {
		// Redireccionar al usuario a otra página, ya se ha iniciado la sesión
		
		require_once("../models/model_login.php");

		$id = $_SESSION["userId"];
		if (filtrarEmpleado($id) ==1){
			header("Location: ../views/menu.php");
		}else{
			header("Location: ../views/menu2.php");
		}
		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8" />
</head>
<body>
<form action="../controllers/controller_login.php" method="POST">

	<label>Usuario:</label><br>
		<input type="text" name="user" required /><br><br>

	<label>Contraseña:</label><br>
		<input type="text" name="password" required /><br><br>

	<input type="submit" name="iniciarSesion" value="Iniciar Sesión" />
	
</form>

</body>
</html>
