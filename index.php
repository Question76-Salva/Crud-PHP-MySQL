<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>  

    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <!-- NOTA: El "id" puede ser sustituido por "name" -->

    <!-- ================================================= -->
    <!-- === Formularios -> Para ENVIAR y RECIBIR info === -->    
    <!-- ================================================= -->
    <div class="container">

        <h1 class="titulo">CRUD con PHP y MySQL</h1>

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
        <!-- ================================================================== -->
        <form action="helpers/create.php" method="POST">

            <div class="form-reg">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" placeholder="Introduce nombre">
            </div>
            
            <div class="form-reg">
                <label for="edad">Edad</label>
                <input type="text" id="edad" name="edad" placeholder="Introduce edad">
            </div>
            
            <div class="boton">
                <input type="submit" value="Ejecutar">
            </div>
            
        </form>

    </div>

    <hr>

    <!-- ========================================= -->
    <!-- === Tabla HTML para mostrar registros === -->
    <!-- ========================================= -->
    

    <table>

        <!-- Nombres columnas de la tabla -->
        <thead>
            <th>Nombre</th>
            <th>Edad</th>
        </thead>

        <!-- Cuerpo de la tabla -->
        <tbody>
            <!-- Aquí se imprimien los registros de la tabla dinámicamente -->

            <?php
                // === Incluir read.php ===
                include 'helpers/read.php';

                // Para poder trabjar con las
                // instrucciones del read.php

                // === Crear las instrucciones para recibir las respuesta ===
                // Porque aquí "index.php" queremos ver los resultados

                // Creamos un WHILE
                // y dentro creamos una variable para las filas "$row"
                // Y esta fila me va a almacenar
                // en una array especial de mysql
                // y para llamar a este array necestiamos la función
                // "$mysqli_fetch_array()"
                // Almacenamos el array "$mysqli_fetch_array()" en la variable "$row"
                // y el array "$mysqli_fetch_array()" va a contener lo que solicitamos
                // en la consulta del READ, la variable "$result"

                // ==========================================================================
                // === Mientras tenga un resultado en el array "$mysqli_fetch_array()"... ===
                // ==========================================================================

                // Mientras tengamos algún resultado en el array, se va a imprimir una "fila"
                // que va a contener el "nombre" y la "edad" de ese registro de la tabla "usuarios" 
                // de la BBDD                   
                
                while($row = mysqli_fetch_array($result)) { ?>  <!-- Cerar php para poder escribir debajo html -->

                    <tr id="fila">
                        <!-- $row contiene el array "mysqli_fetch_array($result)" -->
                        <!-- Imprime el array $row cuando el índice sea "nombre" y "edad" -->
                        <!-- De la tabla "usuarios" de nuestra BBDD -->
                        <!-- y los pìntamos en la tabla html -->
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['edad']?></td>

                        <!-- ================================== -->
                        <!-- Botones para ACTUALIZAR y ELIMINAR -->
                        <!-- ================================== -->

                        <!-- === Enviar varible por URL para ACTUALIZAR === -->
                        <td><a href="helpers/update.php?id=<?= $row['id']?>">Update</a></td>

                        <!-- === Enviar varible por URL para BORRAR === -->
                        <td><a href="helpers/delete.php?id=<?= $row['id']?>">Delete</a></td>
                    </tr>

            <?php } // cierre del bucle php ?>
                    

            
        </tbody>

    </table>

    

    

    
</body>
</html>