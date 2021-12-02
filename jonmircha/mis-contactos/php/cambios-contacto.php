<script>
    window.onload = function()
    {
        var lista = document.getElementById("contacto-lista");
        lista.onchange = seleccionarContacto;
        
        function seleccionarContacto()
        {
            //Cuando haya un cambio en ese formulario, aplica window.location, lo que hace es redirigir el flujo o refrescar mi documento.
            //Recordar que toda la aplicación se está procesando en el index, entonces le voy a pasar variables por la url.
            //La variable op dice en qué zona de la aplicación estoy.
            //La variable contacto_slc es el nombre del campo de nuestro select. Va a ser igual al valor de la variable lista. Eso va a hacer que en la url me refresque el valor de la lista.
            window.location="?op=cambios&contacto_slc="+lista.value;
        }
    }
</script>
<form id="cambio-contacto" name="cambio_frm" action="php/modificar-contacto.php" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Cambio de contacto</legend>
        <div>
            <label for="contacto-lista">Contacto: </label>
            <select id="contacto-lista" class="cambio" name="contacto_slc" required>
                <option value="">- - -</option>
                <?php include("select-email.php"); ?>
            </select>
        </div>
        <?php
            //Que nos traiga los datos
           
            //Recordar que lista se está enviando por la url, entonces genero el objeto global de tipo GET.
             //Si la variable $_GET tiene cualquer valor pero no es nula, creamos una variable conexion2. La necesito para que una vez que haya hecho el cambio de usuario, me traiga los datos y en un formulario me muestre los datos y yo pueda actualizarlo.
             if($_GET["contacto_slc"]!=null)
             {
                 //El include de la conexión no lo tengo en este archivo pero no hay problema porque ya había incluído el archivo del select-email.php
                 //Si vuelvo a hacer un include a la conexión va a mandar un error de que estoy redeclarando la función conectarse.
                 $conexion2=conectarse();
                 $contacto = $_GET["contacto_slc"];
                 
                 //Construyo el query. Quiero buscar en la base de datos cuando el email coincida con lo que viene en la variable contacto.
                 $consulta_contacto = "SELECT * FROM contactos WHERE email='$contacto'";
                 //echo $consulta_contacto;
                 
                 //Ejecuto la consulta
                 $ejecutar_consulta_contacto = $conexion2->query($consulta_contacto);
                 
                 //Como me va a traer un solo registro, no tengo que hacer un while para hacer una búsqueda de varios.
                 //El método se llama fetch_assoc porque voy a mandar a llamar, a la base de datos, los elementos a través de su nombre de campo. Me trae un array asociativo.
                 $registro_contacto = $ejecutar_consulta_contacto->fetch_assoc();
                 
                 //Vamos a generar un formulario dinámico.
                 //Tiene que aparecer un formulario similar al alta-contacto.php pero con los datos que se puedan seleccionar.
                 //Solo copio las div con los campos del formulario.
                 include("php/cambio-form.php");
                 
                 
             }
             //Esto lo va a ejecutar cuando el archivo no tenga nada
             //Después de que haga su show, incluye el mensajes.php
             include("php/mensajes.php");
        ?>
    </fieldset>
</form>