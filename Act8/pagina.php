<?php
    include("./config.php");
    $conexion=connectdb();

    //===============================================================================//
    $hidden_num_cu = (isset($_POST["num"]) && $_POST["num"] != "" )?$_POST["num"] : "";
    $name = (isset($_POST["name"]) && $_POST["name"] != "" )?$_POST["name"] : "";
    $apeP = (isset($_POST["apeP"]) && $_POST["apeP"] != "" )?$_POST["apeP"] : "";
    $apeM = (isset($_POST["apeM"]) && $_POST["apeM"] != "" )?$_POST["apeM"] : "";
    $area = (isset($_POST["area"]) && $_POST["area"] != "" )?$_POST["area"] : "";
    $carrera = (isset($_POST["carrera"]) && $_POST["carrera"] != "" )?$_POST["carrera"] : "a";
    $cuarto = (isset($_POST["cuarto"]) && $_POST["cuarto"] != "" )?$_POST["cuarto"] : "";
    $quinto = (isset($_POST["quinto"]) && $_POST["quinto"] != "" )?$_POST["quinto"] : "";
    $sexto = (isset($_POST["sexto"]) && $_POST["sexto"] != "" )?$_POST["sexto"] : "";
    $plantel = (isset($_POST["va"]) && $_POST["va"] != "" )?$_POST["va"] : "";
    $borrar = (isset($_POST["borrar"]) && $_POST["borrar"] != "" )?$_POST["borrar"] : "";
    //===============================================================================//
    /*var_dump($_POST["cuarto"]);
    var_dump($_POST["quinto"]);
    var_dump($_POST["sexto"]);*/

    if(!$borrar)
    {
        $suma4 = array_sum($cuarto);
        $suma4 /= 12;
        $suma5 = array_sum($quinto);
        $suma5 /= 12;
        $suma6 = array_sum($sexto);
        $cant6 = count($sexto);
        $suma6 /= $cant6;

        $prom = ($suma4 + $suma5 + $suma6) / 3;

        //echo $suma4.", ".$suma5.", ".$suma6.", ".$prom;
        
        echo '<img src="https://http2.mlstatic.com/D_NQ_NP_672618-MLM32520314068_102019-W.jpg" alt="KIKI" width="50px" align="right">';

        echo "<h1 align=\"center\">¡¡Bienvenido a la consultoría de Kiki!!</h1>";
        echo "<h3 align=\"center\">Estos son los resultados</h3>";
        echo '<table align="center" border="1">
                <thead>
                    <tr>
                        <th>Número de cuenta: </th>';
                        echo "<th>$hidden_num_cu</th>
                    </tr>
                    <tr>
                        <th>Nombre completo: </th>
                        <th>$name $apeP $apeM</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Promedio de cuarto:</td>
                        <td>$suma4</td>
                    </tr>
                    <tr>
                        <td>Promedio de quinto:</td>
                        <td>$suma5</td>
                    </tr>
                    <tr>
                        <td>Promedio de sexto:</td>
                        <td>$suma6</td>
                    </tr>
                    <tr>
                        <td>Promedio de preparatoria:</td>
                        <td>$prom</td>
                    </tr>
                    <tr>
                        <td>Carrera elegida:</td>
                        <td>";
                            //$carrera
                            $query=mysqli_query($conexion,"SELECT * FROM Carrera WHERE clave_carrera = $carrera");
                            while($row=mysqli_fetch_array($query))
                            {
                                echo $row[1];
                            }
                        echo "</td>
                    </tr>
                    <tr>
                        <td>Ubicacion:</td>
                        <td>";
                            $query=mysqli_query($conexion,"SELECT Ubicacion FROM Ubicacion
                                WHERE id_ubicacion IN($plantel)");
                                while($row=mysqli_fetch_array($query))
                                {
                                    echo $row[0];
                                    echo "<br>";
                                }
                        echo "</td>
                    </tr>
                    <tr>
                        <td>Modalidad:</td>
                        <td>";
                            $query=mysqli_query($conexion,"SELECT Modalidad FROM pase_regla
                                INNER JOIN Carrera ON pase_regla.clave_carrera=Carrera.clave_carrera
                                INNER JOIN Ubicacion ON Ubicacion.id_ubicacion=pase_regla.id_ubicacion
                                INNER JOIN Modalidad ON pase_regla.id_modalidad=Modalidad.id_modalidad
                                WHERE Ubicacion.id_ubicacion IN($plantel) AND Carrera.clave_carrera IN($carrera)");
                                while($row=mysqli_fetch_array($query))
                                {
                                    echo $row[0];
                                    echo "<br>";
                                }
                        echo "</td>
                    </tr>
                    <tr>
                        <td>Probabilidad de entrar:</td>
                        <td>";
                            $query=mysqli_query($conexion,"SELECT * FROM pase_regla
                                INNER JOIN Carrera ON pase_regla.clave_carrera=Carrera.clave_carrera
                                INNER JOIN Ubicacion ON Ubicacion.id_ubicacion=pase_regla.id_ubicacion
                                INNER JOIN Modalidad ON pase_regla.id_modalidad=Modalidad.id_modalidad
                                WHERE pase_regla.clave_carrera IN($carrera) AND Ubicacion.id_ubicacion IN($plantel)");
                                while($row=mysqli_fetch_array($query))
                                {
                                    //row[4] promedio
                                    if($row[4]>0)
                                    {
                                        if($prom>($row[4]+0.5))
                                        {
                                            echo "Alta";
                                        }elseif($prom<=($row[4]+0.5)&&$prom>=$row[4])
                                        {
                                            echo "Media";
                                        }elseif($prom>=($row[4]-0.5)||$prom>=$row[4])
                                        {
                                            echo "Baja";
                                        }else{
                                            echo "Casi Nula";
                                        }
                                    }else{
                                        echo "Es de acceso indirecto";
                                    }
                                    echo "<br>";
                                }
                        echo "</td>
                    </tr>
                </tbody>
            </table>";
            //echo $hidden_num_cu,$suma4,$suma5,$suma6,$prom,$name,$apeP,$apeM,$area;
            //echo "<br>";
            $insert = "INSERT INTO alumno(Ncuenta,Promedio_cuarto,Promedio_quinto,Promedio_sexto,Nombre,ApellidoP,ApellidoM,Area) VALUES($hidden_num_cu,$suma4,$suma5,$suma6,'$name','$apeP','$apeM',$area)";
            //echo $insert;
            //echo "<br>";
            $add = mysqli_query($conexion,$insert);
            //echo $insert;
    }elseif($borrar)
    {
        $delete = "DELETE FROM alumno WHERE Ncuenta IN($hidden_num_cu)";
        //echo $delete;
        $del = mysqli_query($conexion,$delete);
        echo '  <form action="./inicio.php" method="POST">
                    <input type="submit" value="Iniciar" style="background-color:fuchsia">
                </form>';
    }

    
?>