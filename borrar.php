<?php
session_start();
include 'head.php';
include 'clases/Conexion.php';
if (isset($_REQUEST['borrar']))
{
  
    
    try {
    $obj_conexion = new Conexion();  //creo un objeto de tipo conexion
    $con = $obj_conexion -> conectar();  

    // Datos Formulario: 
    $numero=$_REQUEST['num_incidencia'];
    //$antes=count($_SESSION['incidencias']);
    //unset($_SESSION['incidencias'][$numero]); 



    $sql="DELETE from incidencias.incidencia where id_in = ?";
    $stmt = $con->prepare($sql); //preparar sentencia
    $stmt->execute(array($numero)); //pasar parámetros
    
    $filas_afectadas=$stmt->rowCount(); 
    if ($filas_afectadas > 0)
    {
            echo"BORRADO <br>";
    }

    else 
    {
        echo"No existe <br>";
    }



}
catch (PDOException $e) {
    echo 'Error conectando con la base de datos: ' . $e->getMessage();
}
    /*foreach ($_SESSION['incidencias'] as $clave => $valor){
   
    if (in_array($numero, $_SESSION['incidencias'][$clave]))
    {
        unset($_SESSION['incidencias'][$clave]);
        echo "borrado<br>";
    }
    }

    if ((count($_SESSION['incidencias']))==$antes){
        echo "Numero incorrecto, no se ha borrado na<br>";
    }
    print_r($_SESSION['incidencias']);*/
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