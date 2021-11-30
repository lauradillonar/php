<?php
//Si esta variable existe, estamos en el formulario cambios-contacto.php
if(!$registro_contacto["id_pais"])
{
    include("conexion.php");
}
$consulta="SELECT * FROM pais ORDER BY pais";
$ejecutar_consulta = $conexion->query($consulta);

while($registro = $ejecutar_consulta->fetch_assoc())
{
    $nombre_pais = utf8_encode($registro["pais"]);
    echo "<option value='".$registro['id_pais']."'";
    if($registro["id_pais"]==$registro_contacto["id_pais"])
    {
        echo " selected";
    }
    echo ">$nombre_pais</option>"; 
}
?>