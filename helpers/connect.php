<?php

/**
*   =====================================
*   === Conexión con la Base de Datos ===
*   =====================================
*/

/*

            ==============================
            === Conexión Procedimental ===
            ==============================

mysqli_connect() -> Cea una nueva conexión al servidor MySQL
                    Función PHP que nos permite conectar con
                    una BBDD

$conn -> Variable que contiene la instrucción para conectar con la BD

Parámetros de la variable:
==========================

    - Dirección del servidor donde está alojada nuestra BBDD
        Puede ser:
            - localhost -> Si usas xampp (servidor local)
            - miWeb.com -> Con hosting comprado, con dominio
    - Usuario: En xampp el usuario por defecto es "root"
                Si tenemos un hosting comprado nos deben de
                facilitar un "ususario" y "contraseña" con los
                datos de acceso a nuestro "CPanel"
    - Contraseña: En xampp por defecto no hay
    - Nombre de la BBDD -> Nombre de la BBDD que hayamos creado
            
*/

// ======================
// === Crear conexión ===
// ======================
$conn = mysqli_connect('localhost','root','','crud');

// ==========================
// === Comprobar conexión ===
// ==========================

// Si no se cumple alguno de los parámetros de $conn
// envia un mensaje de error y no se conecta
// En caso contrario se conecta y envia mensaje de Ok

// Sólo lo comprobamos la primera vez, porque sino,
// en cada consulta volverá a salir el mensaje de 
// conexión con exito

/* ================================================

if(!$conn) {
    echo 'ERROR de conexión. No se ha conectado';
} else {
    echo 'OK. Conexión realizada con éxito';
}

================================================= */ 




?>