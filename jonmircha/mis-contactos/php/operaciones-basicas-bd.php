<?php

$conexion = mysql_connect("localhost","conflue1_mis_contactos","%U6l56+=qJpr") or die("No se pudo conectar con el servidor de BD");
echo "Conectado al servidor de BD MySQL<br />";

mysql_select_db("conflue1_mis_contactos")or die("No se pudo seleccionar la BD<br />");
echo "BD seleccionada: <b>mis_contactos</b><br />";

echo "<h1>Las 4 operaciones básicas a una BD</h1>";
echo "<h2>1) INSERCIÓN DE DATOS</h2>";
// INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_campos)

$consulta = "INSERT INTO contactos (email,nombre,sexo,nacimiento,telefono,id_pais,imagen) VALUES ('jon_mircha@bexlan.com','Jonathan MirCha','M','1984-05-23','525512341234',1,'jonmircha.png')";

$ejecutar_consulta = mysql_query($consulta,$conexion);
echo "Se han insertado los datos<br />";

echo "<h2>2) ELIMINACIÓN DE DATOS</h2>";
// DELETE FROM nombre_tabla WHERE campo = valor

 $consulta = "DELETE FROM contactos WHERE email='jon.mircha@bexlan.com'"; 
 
 $ejecutar_consulta = mysql_query($consulta,$conexion);
 echo "Datos eliminados<br />";
 
 echo "<h2>3) MODIFICACIÓN DE DATOS</h2>";
 // UPDATE nombre_tabla SET nombre_campo=valor_campo, otro_campo=otro_valor WHERE campo=valor;
 
 $consulta = "UPDATE contactos SET email='cursos@bextlan.com', nombre='Bextlan', imagen='bextlan.png' WHERE email='jon_mircha@bexlan.com'";
 
 $ejecutar_consulta = mysql_query($consulta,$conexion);
 echo "Los datos han sido modificados<br />";
 
 echo "<h2>4) CONSULTA(BÚSQUEDA) DE DATOS</h2>";
 // SELECT * FROM nombre_tabla WHERE campo=valor
 
 $consulta = "SELECT * FROM contactos";
 
 $ejecutar_consulta = mysql_query($consulta,$conexion);
 
 echo "<h3>Consulta que trae todos los registros de la tabla</h3>";
 
 while($registro=mysql_fetch_array($ejecutar_consulta)){
     echo $registro["email"]." --- ";
     echo $registro["nombre"]." --- ";
     echo $registro["sexo"]." --- ";
     echo $registro["nacimiento"]." --- ";
     echo $registro["telefono"]." --- ";
     echo $registro["id_pais"]." --- ";
     echo $registro["imagen"]." --- ";
     echo "<br />";
 }
 
 $consulta = "SELECT * FROM contactos WHERE nombre='Bextlan'";
 
 $ejecutar_consulta = mysql_query($consulta,$conexion);
 
 echo "<h3>Consulta que trae los registros de la tabla con el nombre ='Bextlan'</h3>";
 
 while($registro=mysql_fetch_array($ejecutar_consulta)){
     echo $registro["email"]." --- ";
     echo $registro["nombre"]." --- ";
     echo $registro["sexo"]." --- ";
     echo $registro["nacimiento"]." --- ";
     echo $registro["telefono"]." --- ";
     echo $registro["id_pais"]." --- ";
     echo $registro["imagen"]." --- ";
     echo "<br />";
 }
 
 $consulta = "SELECT * FROM contactos WHERE nombre='Jonathan MirCha' AND imagen='jonmircha.png'";
 
 $ejecutar_consulta = mysql_query($consulta,$conexion);
 
 echo "<h3>Consulta que trae todos los registros de la tabla con dos condiciones</h3>";
 
 while($registro=mysql_fetch_array($ejecutar_consulta)){
     echo $registro["email"]." --- ";
     echo $registro["nombre"]." --- ";
     echo $registro["sexo"]." --- ";
     echo $registro["nacimiento"]." --- ";
     echo $registro["telefono"]." --- ";
     echo $registro["id_pais"]." --- ";
     echo $registro["imagen"]." --- ";
     echo "<br />";
 }
 
 mysql_close($conexion);
 echo "<h4>Conexión cerrada</h4>";
 
 
?>