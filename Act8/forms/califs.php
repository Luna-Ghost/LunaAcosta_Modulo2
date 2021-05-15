<?php
    include("../config.php");
    $conexion=connectdb();
    
    $name = (isset($_POST["name"]) && $_POST["name"] != "" )?$_POST["name"] : "a";
    $apeP = (isset($_POST["apeP"]) && $_POST["apeP"] != "" )?$_POST["apeP"] : "a";
    $apeM = (isset($_POST["apeM"]) && $_POST["apeM"] != "" )?$_POST["apeM"] : "a";
    $area = (isset($_POST["area"]) && $_POST["area"] != "" )?$_POST["area"] : 0;
    $hidden_num_cu = (isset($_POST["num"]) && $_POST["num"] != "" )?$_POST["num"] : "No me estoy enviando";
    $carrera = (isset($_POST["carrera"]) && $_POST["carrera"] != "" )?$_POST["carrera"] : "a";
    $plantel = (isset($_POST["va"]) && $_POST["va"] != "" )?$_POST["va"] : "a";
    $verificar = (isset($_POST["ve"]) && $_POST["ve"] != "" )?$_POST["ve"] : "0";

    if($verificar==1){
        echo '
        
        <form action="../pagina.php" method="POST">
            <fieldset style="width: 1300px">
                <legend><h2><i>Calificaciones</i></h2></legend>
                <table border="1">
                    <tr>
                        <td>
                            <h3 align="center">Cuarto año</h3>
                            <br><br>';
                            $query=mysqli_query($conexion,"SELECT * FROM Asignaturas WHERE Anio = 4");
                            while($row=mysqli_fetch_array($query))
                            {
                                echo $row[1].": ";
                                echo "<input type='number' name='cuarto[]' value=6 min=6 max=10 required><br><br>";
                            }
        echo'           </td>
                        <td>
                            <h3 align="center">Quinto año</h3>
                            <br><br>';
                            $query=mysqli_query($conexion,"SELECT * FROM Asignaturas WHERE Anio = 5");
                            while($row=mysqli_fetch_array($query))
                            {
                                echo $row[1].": ";
                                echo "<input type='number' name='quinto[]' value=6 min=6 max=10 required><br><br>";
                            }
        echo'           </td>
                        <td>
                            <h3 align="center">Sexto año</h3>
                            <br><br>';
                            $query=mysqli_query($conexion,"SELECT * FROM Asignaturas WHERE Anio = 6 AND Area IN($area,0) AND Optativa = 'N'");
                            while($row=mysqli_fetch_array($query))
                            {
                                echo $row[1].": ";
                                echo "<input type='number' name='sexto[]' value=6 min=6 max=10 required><br><br>";
                            }
        echo'           </td>
                    </tr>
                </table>
                <br><br>
                <input type="submit" value="Enviar" style="background-color:fuchsia">
            </fieldset>';
            echo" 
            <input type='hidden' value=$hidden_num_cu name='num'>
            <input type='hidden' value='$name' name='name'>
            <input type='hidden' value='$apeP' name='apeP'>
            <input type='hidden' value='$apeM' name='apeM'>
            <input type='hidden' value=$area name='area'>
            <input type='hidden' value=$carrera name='carrera'>
            <input type='hidden' value=$plantel name='va'>
        </form>";
    }else
    {
        $query=mysqli_query($conexion,"SELECT Ubicacion,Modalidad FROM pase_regla
            INNER JOIN Carrera ON pase_regla.clave_carrera=Carrera.clave_carrera
            INNER JOIN Ubicacion ON pase_regla.id_ubicacion=Ubicacion.id_ubicacion
            INNER JOIN Modalidad ON pase_regla.id_modalidad=Modalidad.id_modalidad
            WHERE pase_regla.clave_carrera IN($carrera)");
        while($row=mysqli_fetch_array($query))
        {
            echo $row[0];
            echo "  ----->  ";
            echo $row[1];
            echo "<br>";
        }
        echo "<form action='./validaciones/validar_plantel.php' method='POST'>
                <input type='hidden' value=$hidden_num_cu name='num'>
                <input type='hidden' value='$name' name='name'>
                <input type='hidden' value='$apeP' name='apeP'>
                <input type='hidden' value='$apeM' name='apeM'>
                <input type='hidden' value=$area name='area'>
                <input type='hidden' value=$carrera name='carrera'>
                <input type='submit' value='Verificar plantel' style='background-color:fuchsia'>
            </form>";
    }
?>