<?php 

require_once("../views/login.php"); // Se llama a la Vista

if (isset($_POST) && !empty($_POST) && isset($_POST["user"]) && isset($_POST["password"])) {
	$usuario = $_POST["user"];
	$clave = $_POST["password"];

	require_once("../models/model_login.php"); // Se -insertan- las funciones para comprobar usuario y contraseña

	$idUsuario = comprobarCredenciales($usuario, $clave);

	if ($idUsuario != null) {
		// Si existe un usuario con ese correo y 'LastName', se determina si se ha iniciado sesión o no según se haya creado la cookie o no.
		crearCookieLogin($idUsuario);


		/* header('location: ../views/login.php'); */

		
		$filtrado = filtrarEmpleado($idUsuario);

		if ($filtrado == 1) {
			header('location: ../views/menu.php');
		}else{
			header('location: ../views/menu2.php');
		}
		
		
	}


} else {

		if (isset($_COOKIE) && isset($_COOKIE["userId"])) {
			
		
			require_once("../models/model_login.php");


			$id = $_COOKIE["userId"];
			if (filtrarEmpleado($id) ==1){
				header("Location: ../views/menu.php");
			}else{
				header("Location: ../views/menu2.php");
			}

		}


}




?>