<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8" />

    <style>
        body{
           background-color: lightblue; 
        }
        .formulario{
    padding: 10px;
    
}

label{
    display: inline-block;
    width: 120px;
}
    </style>
</head>
<body>

<a href="../controllers/logout.php"><button>Cerrar Sesión</button></a>
<a href="../controllers/controller_login.php"><button>Volver</button></a>




		<h3>Bienvenido Empleado: <?php echo htmlspecialchars($_SESSION["userId"]) ?></h3>

        <h3> Alta Empleado </h3>
            

            <form class="formulario" action="../controllers/controller_altaempleado.php" method="POST">
                <fieldset>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" required><br><br>
                    
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" required><br><br>

                    <label for="nacimiento">Fecha Nacimiento:</label>
                    <input type="date" name="nacimiento" required><br><br>

                    <label for="modulo">Genero:</label>
                    <select name="genero">
                        <option>M</option>
                        <option>F</option>
                    </select><br><br>

                    <label for="altafecha">Fecha Alta Contrato:</label>
                    <input type="date" name="altafecha" required><br><br>

                    <label for="departamento">Departamento:</label>
                    <select name="departamento">
                        <?php foreach($departamentos as $departamento) : ?>
                            <option> <?php echo $departamento ?> </option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <label for="salario">Salario:</label>
                    <input type="text" name="salario" required><br><br>

                    <label for="cargo">Cargo:</label>
                    <select name="cargo">
                        <?php foreach($cargos as $cargo) : ?>
                            <option> <?php echo $cargo ?> </option>
                        <?php endforeach; ?>
                    </select><br><br>
                    
                    <input type="submit" value="Dar de Alta" name="alta">
                </fieldset>
            </form>   
        <br>

</body>
</html>

