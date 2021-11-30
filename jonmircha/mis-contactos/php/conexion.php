<?php
function conectarse()
{
    $servidor="localhost";
    $usuario="conflue1_mis_contactos";
    $password="%U6l56+=qJpr";
    $bd="conflue1_mis_contactos";
    
    $conectar = new mysqli($servidor,$usuario,$password,$bd);

    return $conectar;
}

$conexion = conectarse();
?>