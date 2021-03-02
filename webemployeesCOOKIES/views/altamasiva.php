<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8" />

    <style>
        body{
           background-color: coral; 
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




		<h3>Bienvenido Empleado: <?php echo htmlspecialchars($_COOKIE["userId"]) ?></h3>

        <h3> Alta Empleado </h3>
            

            <form class="formulario" action="../controllers/controller_altamasiva.php" method="POST">
                <fieldset>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" ><br><br>
                    
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" ><br><br>

                    <label for="nacimiento">Fecha Nacimiento:</label>
                    <input type="date" name="nacimiento" ><br><br>

                    <label for="modulo">Genero:</label>
                    <select name="genero">
                        <option>M</option>
                        <option>F</option>
                    </select><br><br>

                    <label for="altafecha">Fecha Alta Contrato:</label>
                    <input type="date" name="altafecha" ><br><br>

                    <label for="departamento">Departamento:</label>
                    <select name="departamento">
                        <?php foreach($departamentos as $departamento) : ?>
                            <option> <?php echo $departamento ?> </option>
                        <?php endforeach; ?>
                    </select><br><br>

                    <label for="salario">Salario:</label>
                    <input type="text" name="salario" ><br><br>

                    <label for="cargo">Cargo:</label>
                    <select name="cargo">
                        <?php foreach($cargos as $cargo) : ?>
                            <option> <?php echo $cargo ?> </option>
                        <?php endforeach; ?>
                    </select><br><br>
                    
                    <input type="submit" value="Añadir a la lista" name="agregar">
                    <input type="submit" value="Limpiar la lista" name="limpiar">
                    <input type="submit" value="Dar de Alta" name="alta">
                    <br>
                  
                </fieldset>
            </form>   
        <br>

</body>
</html>

