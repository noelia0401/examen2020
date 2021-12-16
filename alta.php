<?php
include 'head.php';
session_start();
if (isset($_REQUEST['enviar']))
{
      

      include 'clases/Conexion.php';
      try {
          $obj_conexion = new Conexion();  //creo un objeto de tipo conexion
          $con = $obj_conexion -> conectar();  
      
          // Datos Formulario: 
      $numero=count($_SESSION['incidencias']) + 1;
      $tipo=$_REQUEST['tipo'];
      $hoy = date("d-m-Y H:i:s");
      $lugar=$_REQUEST['lugar'];
      $ip_dir= $_SERVER['REMOTE_ADDR'];
      $descripcion=$_REQUEST['descripcion'];
      
      if (isset($_REQUEST['urgente'])){
            $urgente="si";
      }else {
            $urgente="no";
      }

          $sql="INSERT INTO incidencia(urgente, tipo, hoy, lugar, ip_dir, descripcion) VALUES(?,?,?,?,?,?)";
          $stmt = $con->prepare($sql); //preparar sentencia
          $stmt->execute(array($urgente, $tipo, $hoy, $lugar, $ip_dir, $descripcion)); //pasar parámetros
          $filas_afectadas=$stmt->rowCount(); 
          if ($filas_afectadas == 1)
              echo '<h1>Inserción correcta</h1>';
      
      
       
      }
      catch (PDOException $e) {
          echo 'Error conectando con la base de datos: ' . $e->getMessage();
      }



      /*$_SESSION['incidencias'][]=array($numero, $urgente, $tipo, $hoy, $lugar, $ip_dir, $descripcion);
      if (count($_SESSION['incidencias'])==$numero){
            echo "Se ha añadido la incidencia";
      }
      echo "<pre>";
      print_r($_SESSION['incidencias']);
      echo "</pre>";*/
}                            
 print' 
        <h2 class="postheader">FORMULARIO ALTA INCIDENCIA</h2>
                                     
        <div   class="postcontent"><form action="alta.php" method="post">
            <table align="center" class="content-layout">
              <tr>
              <td align="right"><strong>Urgente? :</strong></td>
              <td>

              <input type="checkbox" name="urgente" value="urg"/>Si											  </td></tr>
              <tr><td align="right"><strong>Tipo :</strong></td><td>
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
              </div></td></tr>
              
              <tr><td align="right"><strong>Lugar :</strong></td><td>
              <div align="left">
                    <input type="text" name="lugar" size=35"/>
              </div></td></tr>
              <tr><td align="right"><strong>Descripcion: </strong></td><td>
              <div align="left">
                    <textarea cols=50 rows=4 name="descripcion"></textarea>
              </div></td></tr>
              <tr ><td colspan="2"><div align="center"><strong>
            <input name="enviar" type="submit" id="enviar" value="Dar de alta"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div>
<div id="imagen1">
        

        </div>        
';

 include 'pie.php';
											
                           