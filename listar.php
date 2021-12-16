<?php

include 'head.php';
include 'clases/Conexion.php';

if(isset($_REQUEST['listar'])){
try {
    $obj_conexion = new Conexion();  //creo un objeto de tipo conexion
    $con = $obj_conexion -> conectar();  

    // Datos Formulario: 
    $tipo=$_REQUEST['tipo'];


    $sql="SELECT * from incidencia where tipo=? ";
    $stmt = $con->prepare($sql); //preparar sentencia
    $stmt->execute(array($tipo)); //pasar parámetros
    
    $incidencia = $stmt->fetchAll(); //fetch devuelve una array con las filas de la consulta
    $filas_afectadas=$stmt->rowCount(); 

    if ($filas_afectadas > 0)
    {
        echo '<table border=1> <thead>
                <td>Lugar</td>
                <td>Descripción</td>
                <td>Fecha</td>
            </thead>
            <tbody>';
        foreach ($incidencia as $row){
            echo '<tr>';
                echo '<td>' .$row[4]. '</td>';
                echo '<td>' .$row[6]. '</td>';
                echo '<td>' .$row[3]. '</td>';
            echo '</tr>';
        }

        echo '</tbody></table>';
    } else {echo "no hay<br>"; }


}
catch (PDOException $e) {
    echo 'Error conectando con la base de datos: ' . $e->getMessage();
}
}
                                             
 print' 
         <strong>SELECCIONA EL TIPO DE INCIDENCIA A LISTAR<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="listar.php" method="post">
            <table align="center" class="content-layout">
              										  </td></tr>
              <tr>
                <td align="right"><strong>Tipo :</strong></td><td>
                 <div align="left">
                    <select name="tipo">
                     <option value="Basuras">Basuras</option>
                      <option value="Aseo Urbano">Aseo Urbano</option>
                      <option value="Mobiliario Urbano">Mobiliario Urbano</option>
                      <option value="Vandalismo">Vandalismo</option>
                       <option value="Transporte">Transporte</option>
                      <option value="Señales y Semaforos">Señales y Semaforos</option>
                      <option value="Mobiliario Urbano">Otros</option>
                    </select>
                </div>
               </td>
              </tr>
              <tr >
              <td colspan="2"><div align="center"><strong>
                <input name="listar" type="submit" id="listar" value="Listar"/>
                </strong>
                </div>
              </td>
            </tr>
              
        </table>
    </form>
        </div>';
 include 'pie.php';

