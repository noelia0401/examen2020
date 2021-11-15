<?php
session_start();
include 'head.php';
if (isset($_REQUEST['borrar']))
{
    $numero=$_REQUEST['num_incidencia']-1;
    $antes=count($_SESSION['incidencias']);
    unset($_SESSION['incidencias'][$numero]);

    /*foreach ($_SESSION['incidencias'] as $clave => $valor){
   
    if (in_array($numero, $_SESSION['incidencias'][$clave]))
    {
        unset($_SESSION['incidencias'][$clave]);
        echo "borrado<br>";
    }
    }*/

    if ((count($_SESSION['incidencias']))==$antes){
        echo "Numero incorrecto, no se ha borrado na<br>";
    }
    print_r($_SESSION['incidencias']);
}                                             
 print' 
            <strong>INTRODUCE EL IDENTIFICADOR DE LA INCIDENCIA A BORRAR<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="borrar.php" method="post">
            <table align="center" class="content-layout">
              
              
              <tr><td align="right"><strong>Num Incidencia :</strong></td><td>
              <div align="left">
                    <input type="text" name="num_incidencia"/>
              </div></td></tr>
              
              <tr ><td colspan="2"><div align="center"><strong>
            <input name="borrar" type="submit" id="borrar" value="Dar de Baja"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div>';
 include 'pie.php';