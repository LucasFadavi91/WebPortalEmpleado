<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8" />

    <style>
        table{
             background-color: whitesmoke; 
        }
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


<a href="../controllers/controller_altamasiva.php"><button>Volver</button></a>

        <h3> Lista de empleados </h3>     
     
<?php    


    echo "<br><br><table border='1' cellpadding='3'>";
    echo "<tr>";
        echo "<th>"."Nombre"."</th>";
        echo "<th>"."Apellidos"."</th>";
        echo "<th>"."Fecha de nacimiento"."</th>";
        echo "<th>"."Genero"."</th>";
        echo "<th>"."Fecha de contratación"."</th>";
        echo "<th>"."Salario"."</th>";
        echo "<th>"."Titulo"."</th>";
        echo "<th>"."Departamento"."</th>";
    echo "</tr>";

        foreach($_SESSION['cesta'] as $emp) {
            //var_dump($emp); 
            $birth_date=$emp['birth_date'];
            $first_name=$emp['first_name'];
            $last_name=$emp['last_name'];
            $gender=$emp['gender'];
            $hire_date=$emp['hire_date'];
            $salary=$emp['salary'];
            $title=$emp['title'];
            $dept_no=$emp['dept_no'];

      
                echo "<tr>";
                    echo "<td>".$first_name."</td>";
                    echo "<td>".$last_name."</td>";
                    echo "<td>".$birth_date."</td>";
                    echo "<td>".$gender."</td>";
                    echo "<td>".$hire_date."</td>";
                    echo "<td>".$salary."</td>";
                    echo "<td>".$title."</td>";
                    echo "<td>".$dept_no."</td>";
                echo "</tr>";
        }        
                echo "</table"; 

?>

<br>
<b><p>Estos empleados han sido dados de alta correctamente.</p></b>
          
</body>
</html>

