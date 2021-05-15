<?php
    echo '<img src="https://http2.mlstatic.com/D_NQ_NP_672618-MLM32520314068_102019-W.jpg" alt="KIKI" width="50px" align="right">';
    echo '<h1><i>Consultoría Kiki</i></h1>';
    //session_start();
    echo '
    <table>
        <tr>
            <td>
                <form action="./forms/datos.php" method="POST" align="center">
                    <fieldset>
                        <legend><h2><i>Iniciar</i></h2></legend>
                        <label for="num">Ingresa numero de cuenta:
                            <br> 
                            <input type="number" name="num" minlength="9" maxlength="9" required>
                        </label>
                        <br><br>
                        <input type="submit" value="Iniciar" style="background-color:fuchsia">
                    </fieldset>
                </form>
            </td>
        </tr>
    </table>';
?>