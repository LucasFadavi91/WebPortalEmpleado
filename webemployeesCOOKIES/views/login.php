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