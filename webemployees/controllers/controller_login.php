<?php 

require_once("../views/login.php"); // Se llama a la Vista

if (isset($_POST) && !empty($_POST) && isset($_POST["user"]) && isset($_POST["password"])) {
	$usuario = $_POST["user"];
	$clave = $_POST["password"];

	require_once("../models/model_login.php"); // Se -insertan- las funciones para comprobar usuario y contraseña

	$idUsuario = comprobarCredenciales($usuario, $clave);

	if ($idUsuario != null) {
		// Si existe un usuario con ese correo y 'LastName', se determina si se ha iniciado sesión o no según se haya creado la cookie o no.
		crearSesionLogin($idUsuario);


		/* header('location: ../views/login.php'); */

		
		$filtrado = filtrarEmpleado($idUsuario);

		if ($filtrado == 1) {
			header('location: ../views/menu.php');
		}else{
			header('location: ../views/menu2.php');
		}
		
		
	}


} else {
	// No estoy seguro si esto tiene que ir aqui
		/*header('location: ../views/login.php');*/

		if (isset($_SESSION) && isset($_SESSION["userId"])) {
			// Redireccionar al usuario a otra página, ya se ha iniciado la sesión
			//echo "<p style='color: green;'>Ha iniciado sesión, redireccionando... (NO IMPLEMENTADO AÚN, NO ES QUE NO FUNCIONE. ACORDAOS DE QUITAR ESTE MENSAJE PLS)</p><br>";
		
			require_once("../models/model_login.php");


			$id = $_SESSION["userId"];
			if (filtrarEmpleado($id) ==1){
				header("Location: ../views/menu.php");
			}else{
				header("Location: ../views/menu2.php");
			}

		}


}




?>