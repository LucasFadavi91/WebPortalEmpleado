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
           background-color: royalblue; 
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


<a href="../controllers/controller_vidalaboral.php"><button>Volver</button></a>

        <h3> Información del empleado </h3>    
     
<?php    


    echo "<br><br><table border='1' cellpadding='3'>";
    echo "<tr>";
        echo "<th>"."Codigo Empleado"."</th>";
        echo "<th>"."Nombre"."</th>";
        echo "<th>"."Apellidos"."</th>";
        echo "<th>"."Fecha de nacimiento"."</th>";
        echo "<th>"."Genero"."</th>";
        echo "<th>"."Fecha de contratación"."</th>";
      
    echo "</tr>";

        foreach($stmt as $emp) {
           
            $emp_no=$emp['emp_no'];
            $birth_date=$emp['birth_date'];
            $first_name=$emp['first_name'];
            $last_name=$emp['last_name'];
            $gender=$emp['gender'];
            $hire_date=$emp['hire_date'];
         
      
                echo "<tr>";
                    echo "<td>".$emp_no."</td>";
                    echo "<td>".$first_name."</td>";
                    echo "<td>".$last_name."</td>";
                    echo "<td>".$birth_date."</td>";
                    echo "<td>".$gender."</td>";
                    echo "<td>".$hire_date."</td>";
                  
                echo "</tr>";
        }        
                echo "</table"; 


################################################################

            echo "<br><br><table border='1' cellpadding='3'>";
            echo "<tr>";
                echo "<th>"."Salarios"."</th>";
                echo "<th>"."Desde"."</th>";
                echo "<th>"."Hasta"."</th>";
                  
            echo "</tr>";

            foreach($stmt1 as $emp) {
      
            $salary=$emp['salary'];
            $from_date=$emp['from_date'];
            $to_date=$emp['to_date'];
         

      
                echo "<tr>";
                    echo "<td>".$salary." € </td>";
                    echo "<td>".$from_date."</td>";
                    echo "<td>".$to_date."</td>";
        
                echo "</tr>";
        }        
                echo "</table"; 
                echo "<br>";
                echo "<br>";

################################################################

            echo "<br><br><table border='1' cellpadding='3'>";
            echo "<tr>";
                echo "<th>"."Titulos"."</th>";
                echo "<th>"."Desde"."</th>";
                echo "<th>"."Hasta"."</th>";
                  
            echo "</tr>";

            foreach($stmt2 as $emp) {
         
            $title=$emp['title'];
            $from_date=$emp['from_date'];
            $to_date=$emp['to_date'];
         

      
                echo "<tr>";
                    echo "<td>".$title."</td>";
                    echo "<td>".$from_date."</td>";
                    echo "<td>".$to_date."</td>";
        
                echo "</tr>";
        }        
                echo "</table"; 
                echo "<br>";
                echo "<br>";

################################################################

            echo "<br><br><table border='1' cellpadding='3'>";
            echo "<tr>";
                echo "<th>"."Codigo Departamento"."</th>";
                echo "<th>"."Departamentos"."</th>";
                echo "<th>"."Desde"."</th>";
                echo "<th>"."Hasta"."</th>";
                  
            echo "</tr>";

            foreach($stmt3 as $emp) {
            /*El nombre del departamento se puede visualizar en la tabla porque
            en el select hay un JOIN*/   
    
            $dept_no=$emp['dept_no'];
            $dept_name=$emp['dept_name'];
            $from_date=$emp['from_date'];
            $to_date=$emp['to_date'];
         
                echo "<tr>";
                    echo "<td>".$dept_no."</td>";
                    echo "<td>".$dept_name."</td>";
                    echo "<td>".$from_date."</td>";
                    echo "<td>".$to_date."</td>";
        
                echo "</tr>";
        }        
                echo "</table"; 
                echo "<br>";
                echo "<br>";


?>

<br>

          
</body>
</html>

