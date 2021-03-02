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
           background-color: mediumspringgreen; 
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


<a href="../controllers/controller_historial.php"><button>Volver</button></a>

        <h3> Historial del empleado </h3>    
     
<?php    

            echo "<br><br><table border='1' cellpadding='3'>";
            echo "<tr>";
                echo "<th>"."Codigo Empleado"."</th>";
                echo "<th>"."Codigo Departamento"."</th>";
                echo "<th>"."Departamentos"."</th>";
                echo "<th>"."Desde"."</th>";
                echo "<th>"."Hasta"."</th>";
                  
            echo "</tr>";

            foreach($stmt1 as $emp) {
            /*El nombre del departamento se puede visualizar en la tabla porque
            en el select hay un JOIN*/   
            
            $emp_no=$emp['emp_no'];
            $dept_no=$emp['dept_no'];
            $dept_name=$emp['dept_name'];
            $from_date=$emp['from_date'];
            $to_date=$emp['to_date'];
         
                echo "<tr>";
                    echo "<td>".$emp_no."</td>";
                    echo "<td>".$dept_no."</td>";
                    echo "<td>".$dept_name."</td>";
                    echo "<td>".$from_date."</td>";
                    echo "<td>".$to_date."</td>";
        
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

            foreach($stmt as $emp) {
  
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


?>

<br>

          
</body>
</html>

