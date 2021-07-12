<?php

    include('db.php');

    if(isset($_GET['id'])) {

        /**
         * @var string $id -> Obtenemos el id desde la url
        */
        $id = $_GET['id'];

        /**
         * @var $query -> Preparamos la consulque le aremos a la base de datos
        */
        $query = "DELETE FROM users WHERE id = '$id'";

        /**
         * @var $result -> Hacemos la consulta a la vase de datos y le pasamos por parametro la coneccion y la consulta
         * 
         * @param $conn -> Representa la coneccion a la base de datos
         * @param $query -> Reprecenta la consulta que le queremos hacer a la base de datos
         * 
         * @return boolean -> Nos retornara un estado si es que la consulta fue satisfactoria o ocurrio un error
        */
        $query_delete = mysqli_query($conn, $query);

        // Evaluamos que no exista niun error
        if(!$query_delete) {
            die('Query Error');
        }


        /**
         * Creamos las variables que almacenaremos en la sesion y asi poder utilisarlas en toda la aplicasion
         * 
         * @var string $_SESSION['message'] -> Nos muetra que la consulta fue echa correctamente y el usuario ha sido registrado en la base de datos
         * @var string $_SESSION['color_type'] -> Implemeta el nombre del color del cual sera la alerta que mostraremos al usuario 
        */
        $_SESSION['message'] = 'El usuario ha sido eliminado satisfactoriamente';
        $_SESSION['color_type'] = 'danger';

        // Una vez echa la consulta redireccionamos a la pagina de registros table.php
        header('Location: includes/table.php');
    }

?>