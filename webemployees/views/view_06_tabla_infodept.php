<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8" />

    <style>
        table{
             background-color: whitesmoke;
             padding-bottom: : 20px;
        }
        body{
           background-color: mediumspringgreen; 
        }

    </style>
</head>
<body>


<a href="../controllers/controller_infodept.php"><button>Volver</button></a>


        <h3> Manager y Lista de Empleados del Departamento: <?php echo htmlspecialchars($nameDepartamento)?></h3>    
     
<?php    
        
        echo "<table border='1' cellpadding='1'>";
            echo "<tr>";
                echo "<th>"."Codigo Manager"."</th>";
                echo "<th>"."Nombre"."</th>";
                echo "<th>"."Apellidos"."</th>";
                echo "<th>"."Nacimiento"."</th>";
                echo "<th>"."Genero"."</th>";
                echo "<th>"."Fecha Contrato"."</th>";
                echo "<th>"."Desde"."</th>";
                echo "<th>"."Hasta"."</th>";
                  
            echo "</tr>";

            foreach($stmt2 as $manager) {
            /*El nombre del departamento se puede visualizar en la tabla porque
            en el select hay un JOIN*/   
            
                $emp_no=$manager['emp_no'];
                $first_name=$manager['first_name'];
                $last_name=$manager['last_name'];
                $from_date=$manager['from_date'];
                $birth_date=$manager['birth_date'];
                $gender=$manager['gender'];
                $hire_date=$manager['hire_date'];
         
                echo "<tr>";
                    echo "<td>".$emp_no."</td>";
                    echo "<td>".$first_name."</td>";
                    echo "<td>".$last_name."</td>";
                    echo "<td>".$birth_date."</td>";
                    echo "<td>".$gender."</td>";
                    echo "<td>".$hire_date."</td>";
                    echo "<td>".$from_date."</td>";
                    echo "<td> Actualmente </td>";
                echo "</tr>";
            }        
                echo "</table";
?>

<br><br><br>

<?php
########################## TABLA DE EMPLEADOS  ######################################


            echo "<table border='1' cellpadding='3'>";
                echo "<tr>";
                    echo "<th>"."Codigo Empleado"."</th>";
                    echo "<th>"."Nombre"."</th>";
                    echo "<th>"."Apellidos"."</th>";
                    echo "<th>"."Nacimiento"."</th>";
                    echo "<th>"."Genero"."</th>";
                    echo "<th>"."Fecha Contrato"."</th>";
                    echo "<th>"."Desde"."</th>";
                    echo "<th>"."Hasta"."</th>";       
                echo "</tr>";

            foreach($stmt1 as $emp) {
            /*El nombre del departamento se puede visualizar en la tabla porque
            en el select hay un JOIN*/   
            
                $emp_no=$emp['emp_no'];
                $first_name=$emp['first_name'];
                $last_name=$emp['last_name'];
                $from_date=$emp['from_date'];
                $birth_date=$emp['birth_date'];
                $gender=$emp['gender'];
                $hire_date=$emp['hire_date'];
         
                echo "<tr>";
                    echo "<td>".$emp_no."</td>";
                    echo "<td>".$first_name."</td>";
                    echo "<td>".$last_name."</td>";
                    echo "<td>".$birth_date."</td>";
                    echo "<td>".$gender."</td>";
                    echo "<td>".$hire_date."</td>";
                    echo "<td>".$from_date."</td>";
                    echo "<td> Actualmente </td>";
                echo "</tr>";
        }        
            echo "</table";
             

################################################################

 
?>

<br>

          
</body>
</html>

