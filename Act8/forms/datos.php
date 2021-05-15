<?php
    include("../config.php");
    $conexion=connectdb();
    
    $num_cu = (isset($_POST["num"]) && $_POST["num"] != "" )?$_POST["num"] : "No me estoy enviando";
    $query=mysqli_query($conexion,"SELECT Ncuenta FROM alumno WHERE Ncuenta = $num_cu");
    while($row=mysqli_fetch_array($query))
    {
        if($num_cu!=$row[0])
        {
            echo '
            <table>
                <tr>
                    <td>
                        <form action="./califs.php" method="POST" align="center">
                            <fieldset>
                                <legend><h2><i>Datos personales</i></h2></legend>
                                <label for="name">Nombre(s): 
                                    <br><input type="text" name="name" maxlength="40" required>
                                </label>
                                <br><br>
                                <label for="apeP">Apellido Paterno: 
                                    <br><input type="text" name="apeP" required>
                                </label>
                                <br><br>
                                <label for="apeM">Apellido Materno: 
                                    <br><input type="text" name="apeM" required>
                                </label>
                                <br><br>
                                Selecciona tu área: 
                                <br>
                                <select name="area" required>
                                    <br>
                                    <option value="1">Área 1: FÍSICO-MATEMÁTICAS E INGENIERÍAS</option>
                                    <option value="2">Área 2: QUIMICO-BIOLÓGICAS Y DE LA SALUD</option>
                                    <option value="3">Área 3: CIENCIAS SOCIALES</option>
                                    <option value="4">Área 4: HUMANIDADES Y LAS ARTES</option>
                                </select>
                                <br><br>
                                Selecciona la carrera a la que deseas entrar: <br>
                                <select name="carrera" required><br>
                                ';

                                $query=mysqli_query($conexion,"SELECT * FROM Carrera");
                                while($row=mysqli_fetch_array($query))
                                {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                                echo '<br><br>';
                                echo "<input type='hidden' value=$num_cu name='num'><br><br>
                                <input type='submit' value='Enviar' style='background-color:fuchsia'>
                            </fieldset>
                        <form>
                    </td>
                </tr>
            </table>";
        }
        elseif($num_cu==$row[0])
        {
            
            echo "Si te salio este mensaje es porque ya tienes un registro guardado, y aunque podrás seguir probando, tus registros se mantendrán <br>con tus primeros datos. Recomendación...borra los registros actuales dando clic en el botón";
            echo "  <form action='../pagina.php' method='POST'>
                        <input type='hidden' value=$num_cu name='num'>
                        <input type='submit' value='Borrar registro' name='borrar' style='background-color:fuchsia'>
                    </form>";
        }  
    }
    echo '
            <table>
                <tr>
                    <td>
                        <form action="./califs.php" method="POST" align="center">
                            <fieldset>
                                <legend><h2><i>Datos personales</i></h2></legend>
                                <label for="name">Nombre(s): 
                                    <br><input type="text" name="name" maxlength="40" required>
                                </label>
                                <br><br>
                                <label for="apeP">Apellido Paterno: 
                                    <br><input type="text" name="apeP" required>
                                </label>
                                <br><br>
                                <label for="apeM">Apellido Materno: 
                                    <br><input type="text" name="apeM" required>
                                </label>
                                <br><br>
                                Selecciona tu área: 
                                <br>
                                <select name="area" required>
                                    <br>
                                    <option value="1">Área 1: FÍSICO-MATEMÁTICAS E INGENIERÍAS</option>
                                    <option value="2">Área 2: QUIMICO-BIOLÓGICAS Y DE LA SALUD</option>
                                    <option value="3">Área 3: CIENCIAS SOCIALES</option>
                                    <option value="4">Área 4: HUMANIDADES Y LAS ARTES</option>
                                </select>
                                <br><br>
                                Selecciona la carrera a la que deseas entrar: <br>
                                <select name="carrera" required><br>
                                ';

                                $query=mysqli_query($conexion,"SELECT * FROM Carrera");
                                while($row=mysqli_fetch_array($query))
                                {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                                echo '<br><br>';
                                echo "<input type='hidden' value=$num_cu name='num'><br><br>
                                <input type='submit' value='Enviar' style='background-color:fuchsia'>
                            </fieldset>
                        <form>
                    </td>
                </tr>
            </table>";
?>