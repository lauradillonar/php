<?php
//Asigno a variables php los valores que vienen del formulario
//Como el campo del email esta deshabilitado en el form php no lo reconoce por eso tengo que guardar su valor en un campo oculto.
$email = $_POST["email_hdn"];
$nombre = $_POST["nombre_txt"];
$sexo = $_POST["sexo_rdo"];
$nacimiento = $_POST["nacimiento_txt"];
$telefono = $_POST["telefono_txt"];
$pais = $_POST["pais_slc"];

include("conexion.php");

//Valida que el usuario exista
//No hay dos usuarios que tengan el mismo correo electrónico
//Verifica que el usuario no esté duplicado

$consulta = "SELECT * FROM contactos WHERE email='$email'";
$ejecutar_consulta = $conexion->query($consulta);

//Traigo el número de registros de la consulta 
//Si arroja 0, el usuario no existe
//Si arroja 1,
//Si arroja 2, hay un error de normalización de bases de datos porque no tengo que tener dos campos de tipo email, porque el email es la llave principal.
$num_regs = $ejecutar_consulta->num_rows;

if($num_regs==1)
{
    //Si la foto viene vacia asignamos el valor del boton oculto de la foto que tiene el valor anterior a la busqueda, sino subo la nueva foto y reemplazo el valor.
    //empty() es una función que valida que algo esté vacío
    if(empty($_FILES["foto_fls"]["tmp_name"]))
    {
        $imagen = $_POST["foto_hdn"];
    }
    else
    {
        //Se ejecuta la funcion para subir la imagen
        include("funciones.php");
        $tipo = $_FILES["foto_fls"]["type"];
        $archivo = $_FILES["foto_fls"]["tmp_name"];
        $imagen = subir_imagen($tipo,$archivo,$email);
    }
    
    //Actualizo los datos en la base de datos
    $consulta = "UPDATE contactos SET nombre='$nombre', sexo='$sexo', nacimiento='$nacimiento', telefono='$telefono', id_pais='$pais', imagen='$imagen' WHERE email='$email'";
    $ejecutar_consulta = $conexion->query($consulta);
    
    if(ejecutar_consulta)
    {
        $mensaje="Se han hecho los cambios en los datos del contacto con el email <b>$email</b>";
    }
    else
    {
        $mensaje="No se pudieron hacer los cambios en los datos del contacto con el email <b>$email</b>";
    }
}
else
{
    $mensaje="No se pudieron hacer los cambios en los datos del contacto con el email <b>$email</b> porque no existe o esta duplicado.";
}

$conexion->close();
//Redirijo el flujo de la página al index.php y le paso por parámetros que estoy en cambios y la variable mensaje.
header("Location: ../index.php?op=cambios&mensaje=$mensaje");

?>