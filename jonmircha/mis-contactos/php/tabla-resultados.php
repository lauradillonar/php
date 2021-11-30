<?php
if(empty($_GET["pais_slc"]))
{
    include("conexion.php");
}
include("funciones.php");
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;

//echo $num_regs;
if($num_regs==0)
{
    echo "<br /><br /><span class='mensajes'>No se encontraron registros con esta búsqueda.</span><br /><br />";
}
else
{
//Dinámicamente voy a contruir una tabla para tabular los datos
?>
    <br /><br />
    <table>
        <thead>
            <th>Email</th>
            <th>Nombre</th>
            <th>Sexo</th>
            <th>Nacimiento</th>
            <th>Teléfono</th>
            <th>País</th>
            <th>Imagen</th>
        </thead>
        <tbody>
            <?php
            while($registro = $ejecutar_consulta->fetch_assoc())
            {
            ?>
                <tr>
                    <td><?php echo utf8_decode($registro["email"]); ?></td>
                    <td><?php echo utf8_decode($registro["nombre"]); ?></td>
                    <td><?php echo ($registro["sexo"]=="M")?"Masculino":"Femenino"; ?></td>
                    <td><?php echo utf8_decode($registro["nacimiento"]); ?></td>
                    <td><?php echo utf8_decode($registro["telefono"]); ?></td>
                    <td><?php echo utf8_decode($registro["id_pais"]); ?></td>
                    <td><img src="img/fotos/<?php echo utf8_decode($registro["imagen"]); ?>" /></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
<?php    
}
$conexion->close();
?>