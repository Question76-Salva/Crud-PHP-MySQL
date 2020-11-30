<?php

/*
    =======================================
    === Actualizar registros en la BBDD ===
    =======================================
*/

// =================================== 
// === 4º parte del CRUD -> UPDATE ===
// ===================================

// ===================================
// === Incluir archivo de conexión ===
// ===================================
include 'connect.php';


// === Vamos a crear un formulario para el "helpers/update.php" ===
// Cuando hagamos click en el botón del UPDATE del index.php nos
// envie al formulario de "helpers/update.php"

// Lo siguiente a hacer es en el index.php, apuntar a este fichero
// En el enlace  <td><a href="">Update</a></td>
// y vamos a enviar variable a través de la URL con el "?" detrás de la extensión .php,
// vamos a crear la variable "id" que va a ser igual al valor de cada registro,
// y para eso hacemos el mismo sistema de antes,
// mediante la variable $row[''], con lo cual la instrucción completa sería:    

/*

    <a href="helpers/update.php?id=<?= $row['id']?>">Update</a>

*/

// Esto lo hacemos para que nos capture y muestre los datos 
// del registro el cual queremos actualizar y nos lo muestre 
// en el nuevo formulario del "update" para modificarlos

// Al hacer click en el botón UPDATE vemos que está enviando
// mediante la URL el valor del "id", por lo tanto, 
// lo siguiente que tenemos que hacer es capturar ese valor
// para poder manipularlo


// ======================================================
// === Capturar los "id" de cada uno de los registros ===
// ======================================================

// === Lo capturamos mediante el método "$_GET" ===
// Obtener el valor de la variable "$id"?
// Mediante una condición:
// Si existe un dato enviado al través del método "$_GET" llamado "id",
// Captura el valor que se envia por URL y ejecuta la consulta

if(isset($_GET['id'])) {

    // =====================================================
    // Capturar el valor de la variable que se envia por URL
    // =====================================================
    $id = $_GET['id'];

    // ===========================================================================
    // PRIMERA CONSULTA -> Nos va a permitir LEER los resultados en el campo INPUT
    // ===========================================================================
    // Crear sentencia SQL
    // Selecciona todo de la tabla "usuarios" donde ese registro
    // tenga el "id" igual al contenido de la variable "$id"
    $sql_read_update = "SELECT * FROM usuarios WHERE id = $id";

    // =================
    // Crear la consulta
    // =================
    $result_update = mysqli_query($conn, $sql_read_update);

    // ==========================================
    // Indicar como queremos recibir la respuesta 
    // ==========================================
    // Mediante la función -> mysqli_num_rows() 
    // Esta función tiene como parámetro lo consulta "$result_update"
    // Devuelve el número de filas de un conjunto de resultados
    // La función "mysqli_num_rows()" devuelve el número de filas
    // de un conjunto de resultados, y como parámetro pasamos
    // la consulta

    // Si la respuesta "mysqli_num_rows($result_update)" coincide
    // con la consulta al menos en 1 registro, devuelve al menos
    // un registro

    if (mysqli_num_rows($result_update) == 1) {

        // Si se cumple la respuesta anterior que
        // lo guarde en un array
        $row = mysqli_fetch_array($result_update);

        // Lo que nos hace falta es imprimir 
        // el resultado de esta respuesta
        // Pero esta vez no lo vamos a visualizar 
        // en una <table></table>, sino dentro de
        // los inputs del formulario para el UPDATE

        // Tenemos que indicar que este array (valores)
        // "$row = mysqli_fetch_array($result_update);"
        // se nos muestre dentro de cada "input", con
        // su índice correspondiente
        // Entonces en los "value" de los "inputs"
        // del formulario de abajo incluimos:
        /*
            
            value="<?= $row['nombre']?>">
            value="<?= $row['edad']?>">
        
            Y nos mostrará los valores de los dos registros
            en los dos campos del input del formulario
        */ 

        // Ahora lo que tenemos que hacer es una vez que modifiquemos los
        // valores que nos reflejan los inputs, al darle click al botón
        // Enviar que esos datos se guarden en nuestra tabla de la BBDD
    }


}


// ===================================================================
// SEGUNDA CONSULTA -> Nos va a permitir ACTUALIZAR datos del registro
// ===================================================================

// El botón tipo "submit" le vamos a dar un nombre con el atributo "name"
// que es el identificador con el cual el servidor reconoce esos datos
// Le vamos a llamar "update", con lo cual vamos al formulario de abajo
// y añadimos name="update" en el input del botón

// Crear una condición:
// Si estamos recibiendo mediante el método POST un dato llamado "update"
// (que en efecto lo estamos recibiendo), me vas a ejecutar lo siguiente

if(isset($_POST['update'])) {

    // =======================================================
    // Capturar el valor de las variables $nombre, $edad y $id
    // por el método POST
    // =======================================================
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];

    // ===================================================
    // El "id" se envia en el formulario por el método GET
    // ===================================================
    $id = $_GET['id'];


    // ==========================
    // == Crear sentencia SQL ===
    // ==========================
    // Actualiza la tabla "usuarios" y reemplaza el campo "nombre"
    // por el valor de la variable "$nombre", (como el gestor de la BD no reconoce
    // variables tenemos que ponerlo entre comillas y convertirlo
    // en un String, y de esta manera el gesto de BD lo procesa), 
    // y también reemplaza el campo "edad" por el valor de la variable
    // "$edad", donde esos registros tengan el "id" igual al valor de
    // la variable "$id"
    $sql_update = "UPDATE usuarios SET nombre = '$nombre', edad = '$edad' WHERE id = $id";

    // =========================
    // === Crear la consulta ===
    // =========================

    // Dos parámetros: Variable de conexión y variable de sentencia
    $result_update = mysqli_query($conn, $sql_update);

    // ======================================================
    // === Redireccionar al index.php al enviar los datos ===
    // ======================================================

    // Mediante "header('location:../index.php');"
    // Cuando se haya ejecutado el formulario (se ha clickado en Enviar)
    // Nos va a redireccionar hacia donde le inidiquemos "index.php"
    // Así no se nos queda una pantalla en blanco al enviar y nos vuelve 
    // a salir el formulario para seguir enviando datos
    header('location:../index.php');

    
}


?>




    <!-- =========================================================== -->
    <!-- === Ponemos fuera del .php el formulario para el UPDATE === -->
    <!-- =========================================================== -->

    <!-- ================================================================== -->
    <!-- "action" Acción a realizar después de pulsar botón enviar (submit) -->
    <!-- Ruta del archivo que contiene las instrucciones que se van  a      -->
    <!-- realizar después de haber recibido la información,                 -->
    <!-- en este caso "helpers/create.php"                                  -->
    <!--                                                                    -->
    <!-- Métodos de envio de información al servidor con "method":          -->
    <!-- POST : Se envía la información de forma Visible                    -->
    <!-- GET : Se envía la información de forma NO visible                  -->
    <!--                                                                    -->
    <!-- Atritubo "name" es como va a reconocer el servidor nuestros inputs -->
    <!--                                                                    -->
    <!-- Atributo "for" especifica a qué elemento de formulario está        -->
    <!-- vinculada una etiqueta                                             -->
    <!--                                                                    -->
    <!-- Atributo "value" especifica el valor de un elemento <input>        -->
    <!-- ================================================================== -->
    
    <!-- La acción transcurre dentro de este archivo "update.php" -->
    <!-- NO tenemos que saltar a otro archivo -->
    <!-- 

        Tambíen tenmos que indicarle a nuestra URL "action="update.php" que también
        vamos a trabajar con el "id" correspondiente a cada registro, porque sino,
        nuestro gestor de BBDD no podrá saber a que registro le corresponde cada
        dato que estamos enviando a través del método POST, por eso tenemos que
        indicarle también el "id"
        
        Por lo que quedaría:

        update.php?id=... Mirar linea de abajo!!! - form

    -->
    <form action="update.php?id=<?= $row['id']?>" method="POST">

        <div class="form-reg">
            <label for="nombre">Nombre</label>
            <!-- Añadido el value="" -->
            <input type="text" id="nombre" name="nombre" placeholder="Introduce nombre" value="<?= $row['nombre']?>">
        </div>
        
        <div class="form-reg">
            <label for="edad">Edad</label>
            <!-- Añadido el value="" -->
            <input type="text" id="edad" name="edad" placeholder="Introduce edad" value="<?= $row['edad']?>">
        </div>
        
        <div class="boton">
            <!-- Añadido el name="update" -->
            <input type="submit" value="Actualizar" name="update">
        </div>
        
    </form>