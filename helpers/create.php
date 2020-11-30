<?php

/*
    =========================================
    === Crear nuevos registros en la BBDD ===
    =========================================
*/

// =================================== 
// === 1º parte del CRUD -> CREATE ===
// ===================================

// ===================================
// === Incluir archivo de conexión ===
// ===================================

// Obtener las variables e instrucciones que contenga
// el archivo de conexión
include 'connect.php';

// ===================================================
// Capturar en dos varibles los valores que nos llegan                
// desde los dos "inputs" del formulario 
// ===================================================

// Capturar valor del input "nombre" que recibimos del formulario 
$nombre = $_POST['nombre'];

// Capturar valor del input "edad" que recibimos del formulario
$edad = $_POST['edad'];

// Comprobar si se están guardando los datos
// echo $nombre;
// echo $edad;

// ===========================
// === Crear sentencia SQL ===
// ===========================

// Para crear un nuevo registro, hacermos el "CREATE" del CRUD 
// Esta sentencia indica al sistema gestor de BD que cree un nuevo registro
// y la guardo en la variable "$sql_create"

// Inserta en la tabla "usuarios" en los campos "columnas" (nombre, edad)
// los valores de las variables que contienen los inputs que vienen del formulario
$sql_create = "INSERT INTO usuarios(nombre, edad) VALUES('$nombre','$edad')";

// ========================
// === Generar consulta ===
// ========================

// Mediante la función "mysqli_query" le indico que genere una consulta
// Esta instrucción tiene dos parámetros:
//      - Indicar la conexión de la BBDD, conectarnos, mediante la variable "$conn"
//      - Colocar la instrucción SQL, mediante la variable "$sql_create"
mysqli_query($conn, $sql_create);


// ======================================================
// === Redireccionar al index.php al enviar los datos ===
// ======================================================

// Mediante "header('location:../index.html');"
// Cuando se haya ejecutado el formulario (se ha clickado en Enviar)
// Nos va a redireccionar hacia donde le inidiquemos "index.html"
// Así no se nos queda una pantalla en blanco al enviar y nos vuelve 
// a salir el formulario para seguir enviando datos
header('location:../index.php');



?>