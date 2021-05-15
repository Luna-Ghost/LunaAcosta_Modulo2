<?php
    include("../../config.php");
    $conexion=connectdb();

    $name = (isset($_POST["name"]) && $_POST["name"] != "" )?$_POST["name"] : "a";
    $apeP = (isset($_POST["apeP"]) && $_POST["apeP"] != "" )?$_POST["apeP"] : "a";
    $apeM = (isset($_POST["apeM"]) && $_POST["apeM"] != "" )?$_POST["apeM"] : "a";
    $area = (isset($_POST["area"]) && $_POST["area"] != "" )?$_POST["area"] : 0;
    $hidden_num_cu = (isset($_POST["num"]) && $_POST["num"] != "" )?$_POST["num"] : "No me estoy enviando";
    $carrera = (isset($_POST["carrera"]) && $_POST["carrera"] != "" )?$_POST["carrera"] : "a";
    
    echo "Aqui se valida plantel";
    echo '
        <table>
            <tr>
                <td>
                    <form action="../califs.php" method="POST" align="center">
                        <fieldset>
                            <legend><h2><i>Verificar plantel</i></h2></legend>
                            
                            Selecciona la ubicación: <br>
                            <select name="va" required><br>
                            ';
                                $query=mysqli_query($conexion,"SELECT * FROM pase_regla
                                    INNER JOIN Carrera ON pase_regla.clave_carrera=Carrera.clave_carrera
                                    INNER JOIN Ubicacion ON pase_regla.id_ubicacion=Ubicacion.id_ubicacion
                                    WHERE pase_regla.clave_carrera IN($carrera)");
                                while($row=mysqli_fetch_array($query))
                                {
                                    echo "<option value='$row[2]'>$row[8]</option>";
                                }
                            echo '</select><br>';
                            echo "<input type='hidden' value=$hidden_num_cu name='num'>
                            <input type='hidden' value='$name' name='name'>
                            <input type='hidden' value='$apeP' name='apeP'>
                            <input type='hidden' value='$apeM' name='apeM'>
                            <input type='hidden' value=$area name='area'>
                            <input type='hidden' value=$carrera name='carrera'>
                            <br><br>
                            <input type='hidden' value=1 name='ve'><br><br>
                            <input type='submit' value='Verificar' style='background-color:fuchsia'>
                        </fieldset>
                    <form>
                </td>
            </tr>
        </table>";
?>