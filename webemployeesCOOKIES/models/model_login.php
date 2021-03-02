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

function crearCookieLogin($idUsuario) {
	// Javier Gonzalez
	// Dado un $idUsuario, se crea una cookie para mantener iniciada la sesión
	// Se guarda el ID del Usuario (emp_no)

	return setcookie("userId", $idUsuario, time() + (86400 * 10), "/"); // La cookie expira en 10 días
	
}


function filtrarEmpleado($idUsuario) {
	// Javier Gonzalez
	// Ten en cuenta que un emp puede haber trabajado en varios dpts
	// Importante: Filtrar to_date, debido a que necesitamos el ultimo resultado
	// Dado un $idUsuario, filtramos si pertenece a Recursos Humanos o no
	// Devuelve 1 o 0, si pertenece a R.Humanos o no

	//session_start();
	global $conexion;

	$to_date='9999-01-01';

	$stmt = $conexion->prepare("SELECT dept_no FROM dept_emp WHERE emp_no = :user AND to_date=:to_date");
		$stmt->bindParam(":user", $idUsuario);
		$stmt->bindParam(":to_date", $to_date);
		$stmt->execute();

		foreach($stmt->fetchAll() as $row) {
        	$dpto=$row['dept_no'];
    	}

    	//echo "Este es el departamento: ".$dpto;

    if ($dpto == 'd003') {
    	return 1;
    }
    else{
    	return 0;
    }

}


?>
