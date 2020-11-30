<?php

/*
    =================================
    === Leer registros en la BBDD ===
    =================================
*/

// ================================= 
// === 2º parte del CRUD -> READ ===
// =================================

// A partir de la parte del CRUD "READ"
// es donde se van a habilitar las opciones
// de DELETE y de UPDATE
// Para poder eliminar o actualizar un 
// registro antes necesitamos tener un 
// registro el cual poder realizar alguna
// de estas dos acciones
// Por lo tanto si no hacemos el READ
// no tendremos registros en la pantalla


// ===================================
// === Incluir archivo de conexión ===
// ===================================
include 'connect.php';



// ===========================
// === Crear sentencia SQL ===
// ===========================

// === Llamar a los datos que están en la BD ===

// SELECCIONAR todos (*) los registros de la tabla "usuarios"
// y que los ORDENAS por el "id" de manera DESCENDENTE
$sql_read = "SELECT * FROM usuarios ORDER BY id DESC";



// ========================
// === Generar consulta ===
// ========================

// Mediante la función "mysqli_query" le indico que genere una consulta
// Esta instrucción tiene dos parámetros:
//      - Indicar la conexión de la BBDD, conectarnos, mediante la variable "$conn"
//      - Colocar la instrucción SQL, mediante la variable "$sql_read"

// === Guardamos la consulta en la variable "$result" para poder 
// trabajar con la consulta de forma más cómoda
$result = mysqli_query($conn, $sql_read);


// ==============================================================
// Aquí estamos esperando una respuesta (PINTAR DATOS), porque
// le estamos diciendo que nos imprima algo en pantalla.
// Ya tenemos la consulta creada, entonces lo que nos falta es
// dar instrucciones de como vamos a recibir esa respuesta
// ==============================================================

// === Como queremos recibir esa respuesta === 
// Queremos recibir la respuesta en el archivo "index.html",
// que es donde se está mostrando la interfaz, que es donde 
// el usuario va a ver los resultados e interactua con la 
// informacón, y queremos que los datos se pinten
// debajo del formulario

// === Por lo tanto lo que vamos a hacer es CONVERTIR el archivo
// "index.html" en "index.php", le cambiamos la extensión

// === Ya nuestro archivo "index.php" va a poder recibir variables
// y ejecutar funciones de un lenguaje de programación

// === Para trabajar en la parte lógica hay que hacerlo dentro de
// las etiquetas <?php

// === Vamos a mostrar los resultados en una tabla <table></table>
// dentro del archivo "index.php"
// Mostrar los registros de la tabla "usuarios" en una tabla html





?>