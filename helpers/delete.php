<?php

/*
    =====================================
    === Eliminar registros en la BBDD ===
    =====================================
*/

// =================================== 
// === 3º parte del CRUD -> DELETE ===
// ===================================


// ===================================
// === Incluir archivo de conexión ===
// ===================================
include 'connect.php';

// =====================================================
// === Capturar variables "id" por URL para ELIMINAR ===
// =====================================================

// $_GET['id']; -> No podemos enviar así directamente

// Tenemos que hacer una comprobación:
// Si existe una variable enviada a través del método GET por URL
// llamada "id", entonces realizas la consulta
if(isset($_GET['id'])) {

    // "$id" va a ser igual a la variable "id" 
    // que estamos capturando con el método $_GET
    $id = $_GET['id'];
}


// ===========================
// === Crear sentencia SQL ===
// ===========================

// === Eliminar datos que están en la BD ===

// Elimina de la tabla "usuarios" el registro 
// que tenga por "id" el valor de la variable
// "$id"
// Elimina de la tabla "usuarios" el registro que tenga
// el "id" (de la tabla bbdd) igual al valor de la 
// variable "$id" (el valor correspondiente a cada registro) 
$sql_delete = "DELETE FROM usuarios WHERE id = $id";


// ========================
// === Generar consulta ===
// ========================

// Mediante la función "mysqli_query" le indico que genere una consulta
// Esta instrucción tiene dos parámetros:
//      - Indicar la conexión de la BBDD, conectarnos, mediante la variable "$conn"
//      - Colocar la instrucción SQL, mediante la variable "$sql_delete"

// === Guardamos la consulta en la variable "$result" para poder 
// trabajar con la consulta de forma más cómoda
$result = mysqli_query($conn, $sql_delete);


// ======================================================
// === Capturar los "id" de cada uno de los registros ===
// ======================================================

// El método "$_GET" nos permite enviar variables 
// a través de la URL, con el botón DELETE (botón/enlace)
// de la tabla <table> del index.php se trabaja con URL,
// Al hacer click en DELETE vamos a apuntar a una "dirección"
// hacia el archivo que contiene nuestras instrucciones 
// de ELIMINAR, pero aparte de eso, le vamos a enviar la 
// variable "$id" para poder capturarla dentro del archivo
// "helpers/delete.php" y poder trabajar ya con el "$id" 

// Entonces para hacer esto vamos al "index.php" 
// Y en el enlace del "DELETE" colocamos la dirección a
// la que queremos que apunte nuestra fila 
// <a hreft="helpers/delete.php"></a>

// Ya le hemos indicado que nos redireccione al archivo "delete.php"
// pero no le estamos enviando ninguna variable, tenemos que
// enviarle mediante esa URL (helpers/delete.php) la variable
// que contenga el "id" de cada uno de nuestros registros

// Esto lo vamos a hacer de la siguiente forma:
// Nos volvemos a situar en <a hreft="helpers/delete.php"></a>, y
// y vamos a enviar variable a través de la URL con el "?" detrás de la extensión .php,
// vamos a crear la variable "id" que va a ser igual al valor de cada registro,
// y para eso hacemos el mismo sistema de antes,
// mediante la variable $row[''], con lo cual la instrucción completa sería:

/*

    <a href="helpers/delete.php?id=<?= $row['id']?>">Delete</a>

*/


// ======================================================
// === Redireccionar al index.php al enviar los datos ===
// ======================================================

// Mediante "header('location:../index.php');"
// Cuando se haya ejecutado el formulario (se ha clickado en Enviar)
// Nos va a redireccionar hacia donde le inidiquemos "index.php"
// Así no se nos queda una pantalla en blanco al enviar y nos vuelve 
// a salir el formulario para seguir enviando datos
header('location:../index.php');



















?>