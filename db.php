<?php

    // Iniciamos una session en el servidor
    session_start();

    /**
     * @var $conn -> Nombre de la variable que almacenara la coneccion a la base de datos
     */
    $conn = mysqli_connect(
        'localhost', #servidor en donde esta almacenada la base de datos
        'root', # Nombre de usuario
        '', # Password del usuario
        'php_mysql_crud' # Nombre de la base de datos a la que queremos conectarnos
    );

?>