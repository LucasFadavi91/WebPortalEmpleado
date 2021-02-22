<?php 

require_once("../db/db.php");

function comprobarCredenciales($user, $clave) {
	// Javier Gonzalez
	// Dado un $user y una $clave, se comprueba si existe algún usuario con esos credenciales
	// Devuelve NULL si no existe o hay algún fallo, o el ID del Usuario (emp_no) si existe
	
	global $conexion;

	try {

		$credenciales = $conexion->prepare("SELECT emp_no FROM employees WHERE emp_no = :user AND last_name = :password");
		$credenciales->bindParam(":user", $user);
		$credenciales->bindParam(":password", $clave);
		$credenciales->execute();

		return $credenciales->fetch(PDO::FETCH_ASSOC)["emp_no"];

	} catch (PDOException $ex) {
		return null;
	}

}

function crearSesionLogin($idUsuario) {
	// Javier Gonzalez
	// Dado un $idUsuario, se crea una sesion para mantener iniciada la sesión
	// Se guarda el ID del Usuario (emp_no)

	session_start();

	$_SESSION["userId"] = $idUsuario;
	
}


function filtrarEmpleado($idUsuario) {
	// Javier Gonzalez
	// Dado un $idUsuario, filtramos si pertenece a Recursos Humanos o no
	// Devuelve 1 o 0, si pertenece a R.Humanos o no

	session_start();
	global $conexion;


	$stmt = $conexion->prepare("SELECT dept_no FROM dept_emp WHERE emp_no = :user");
		$stmt->bindParam(":user", $idUsuario);
		$stmt->execute();

		foreach($stmt->fetchAll() as $row) {
        	$dpto=$row['dept_no'];
    	}

    	echo "Este es el departamento: ".$dpto;

    if ($dpto == 'd003') {
    	return 1;
    }
    else{
    	return 0;
    }

}


?>
