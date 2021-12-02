<?php

/*
Pasos para conectarme a una BD MySQL con PHP

1) Conectarme a la BD, mysql_connect necesita 3 datos:
    1. Servidor
    2. Usuario de la BD
    3. Password del usuario de la BD
*/

$conexion = mysql_connect("localhost","conflue1_mis_contactos","%U6l56+=qJpr") or die("No se pudo conectar con el servidor de BD");

echo "Estoy conectado a MySQL<br />";

/*
2) Seleccionar la BD con la que vamos a trabajar
*/

mysql_select_db("conflue1_mis_contactos") or die("No se pudo seleccionar la BD 'mis_contactos'");

echo "BD seleccionada: mis_contactos<br />";

/*
3) Crear una consulta SQL
*/

$consulta = "SELECT * FROM pais";

/*
4) Ejecutar la consuta SQL
   mysql_query necesita 2 parámetros:
   1. Qué variable va a ejecutar la consulta
   2. La conexión a la BD
*/

$ejecuta_consulta = mysql_query($consulta, $conexion) or die("No se pudo ejecutar la consulta en la BD");

echo "Se ejecutó la consulta SQL<br />";

/*
5) Mostrar el resultado de ejecutar la consulta
   dentro de un ciclo y en una variable voy a ingresar la función mysql_fetch_array
   Cada uno de los registros se guarda en una posición de ese arreglo.
   Para invocar cada una de las posiciones, lo hacemos con el nombre del campo en la BD.
   Se conoce como "Array Asociativo"  porque no mandamos llamar por su posición sino por un nombre.
*/

while($registro = mysql_fetch_array($ejecuta_consulta)){
    echo $registro["id_pais"]." - ".$registro["pais"]."<br />";
}

/*
6) Cerrar la conexión a la BD
*/

mysql_close($conexion) or die("Ocurrió un error al cerrar la conexión a la BD");

echo "Conexión cerrada";

?>