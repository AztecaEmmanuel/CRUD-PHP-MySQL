<?php

    // Mandamos a llamar la base de datos
    include('db.php');

     /**  
     * @var array $country -> Esta matriz nos permitira manejar el valor de country que extraigamos del formulario del usuario
     */
    $country = [
        "MX" => "Mexico",
        "EEUU" => "Estados Unidos",
        "UK" => "Reino Unido",
        "JP" => "Japon"
    ];

    /**
     * Verificamos si los datos fueron mandanos
    */
    if ( isset($_POST["save-task"]) ) {

        /**
         * Extraemos los datos del formulario de usuarios
         * 
         * @var string $name -> Nombre de usuario
         * @var string $email -> Correo electronico del usuario
         * @var integer $password -> Contraceña de usuario
         * @var string $country -> Pais de usuario:  Recibimos una clave la cual buscamos en un array y asi obtener el pais de origen del usuario
         * @var string $gender -> Genero de usuario
         * @var array $language -> Lenguajes de programacion de usuario: Recibimos un array el cual es convertido en un string y almacenarlo en la base de datos
         * 
         */
        

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $country = $country[$_POST['country']];
        $gender = $_POST['gender'];
        $language = implode(',',$_POST['language']);

        /**
         * @var $query -> Preparamos la consulque le aremos a la base de datos
        */

        $query = "INSERT INTO users (name, email, password, country, gender, language) VALUES ('$name', '$email', '$password', '$country', '$gender', '$language')";

        /**
         * 
         * @var $result -> Hacemos la consulta a la vase de datos y le pasamos por parametro la coneccion y la consulta
         * 
         * @param $conn -> Representa la coneccion a la base de datos
         * @param $query -> Reprecenta la consulta que le queremos hacer a la base de datos
         * 
         * @return boolean -> Nos retornara un estado si es que la consulta fue satisfactoria o ocurrio un error
         * 
         */
        $result = mysqli_query($conn, $query);

        // Verificamos que la consulta se haya efectuado satisfactoriamente
        if(!$result) {
            die("query error");
        }

        /**
         * Creamos las variables que almacenaremos en la sesion y asi poder utilisarlas en toda la aplicasion
         * 
         * @var string $_SESSION['message'] -> Nos muetra que la consulta fue echa correctamente y el usuario ha sido registrado en la base de datos
         * @var string $_SESSION['color_type'] -> Implemeta el nombre del color del cual sera la alerta que mostraremos al usuario 
         */

        $_SESSION['message'] = 'Usuario registrado satisfactoriamente';
        $_SESSION['color_type'] = 'success';

        // Una vez echa la consulta redireccionamos a la pagina de registros table.php
        header("Location: includes/table.php");

    }


    

?>