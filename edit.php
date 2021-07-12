
<?php

    // Mandamos a llamar la base de datos
    include('db.php');

    if(isset($_GET['id'])) {

        /**
         * @var string $id -> Obtenemos el id desde la url
        */
        $id = $_GET['id'];

        /**
         * @var $query -> Preparamos la consulque le aremos a la base de datos
        */
        $query = "SELECT * FROM users WHERE id = '$id'";

        /**
         * @var $result -> Hacemos la consulta a la vase de datos y le pasamos por parametro la coneccion y la consulta
         * 
         * @param $conn -> Representa la coneccion a la base de datos
         * @param $query -> Reprecenta la consulta que le queremos hacer a la base de datos
         * 
         * @return boolean -> Nos retornara un estado si es que la consulta fue satisfactoria o ocurrio un error
         */
        $query_user = mysqli_query($conn, $query);

        /**
         * @param mysqli_num_rows -> Hace un conteo de las filas que me retorna la consulta a la base de datos 
         * @param $query_user -> Implementa la consulta de la base de datos
         */
        if(mysqli_num_rows($query_user) == 1) {

            /**
             * @var array $row -> Almacena un array que es retornado por el metodo mysqli_fetch_array(@param $query_user -> Implementa la consulta de la base de datos)
             */
            $row = mysqli_fetch_array($query_user);

            /**
             * Extraemos los datos de la consulta a la base de datos
             * 
             * @var string $name -> Nombre de usuario
             * @var string $email -> Correo electronico del usuario
             * @var integer $password -> Contraceña de usuario
             * @var string $country -> Pais de usuario
             * @var string $gender -> Genero de usuario
             * @var string $language -> Lenguajes de programacion de usuario
             * 
            */
            $name = $row['name'];
            $email = $row['email'];
            $password = $row['password'];
            $country = $row['country'];
            $gender = $row['gender'];
            $language = $row['language'];

            
            
        }
    }

    if(isset($_POST['edit-user'])) {

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

        $id = $_GET['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $country = $country[$_POST['country']];
        $gender = $_POST['gender'];
        $language = implode(',',$_POST['language']);


        /**
         * @var $query -> Preparamos la consulque le aremos a la base de datos
        */
        
        $query = "UPDATE users SET name = '$name', email = '$email', password = '$password', country = '$country', gender = '$gender', language = '$language' WHERE id = '$id'";
        
        
        /**
         * @var $result -> Hacemos la consulta a la vase de datos y le pasamos por parametro la coneccion y la consulta
         * 
         * @param $conn -> Representa la coneccion a la base de datos
         * @param $query -> Reprecenta la consulta que le queremos hacer a la base de datos
         */
        mysqli_query($conn,$query);

        /**
         * Creamos las variables que almacenaremos en la sesion y asi poder utilisarlas en toda la aplicasion
         * 
         * @var string $_SESSION['message'] -> Nos muetra que la consulta fue echa correctamente y el usuario ha sido registrado en la base de datos
         * @var string $_SESSION['color_type'] -> Implemeta el nombre del color del cual sera la alerta que mostraremos al usuario 
         */

        $_SESSION['message'] = 'Usuario Actualizado';
        $_SESSION['color_type'] = 'success';

        // Una vez echa la consulta redireccionamos a la pagina de registros table.php
        header('location: includes/table.php ');
    }

?>

<!-- Mandamos a llamar la cabecera del html -->
<?php include('includes/header.php'); ?>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center vh-100 px-2 bg-dark">
            
            <div class="col col-sm-5 col-md-3 py-3 box">
                <h1 class="h1 text-center pb-1 text-white">CRUD PHP y MySQL</h1>

                <form action="edit.php?id=<?php echo $id ?>" method="POST">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" name="name" value="<?php echo $name; ?>" placeholder="Nombre" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-sm" name="email" value="<?php echo $email; ?>" placeholder="Correo electronico" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-sm" name="password" value="<?php echo $password; ?> placeholder="Contraceña" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>

                    <select class="form-select form-select-sm" name="country" aria-label="Default select example">
                        <option>Pais...</option>
                        <option value="MX" <?php echo ($country === 'Mexico') ? 'selected' : '' ?>>Mexico</option>
                        <option value="EEUU" <?php echo ($country === 'Estados Unidos') ? 'selected' : '' ?>>Estados Unidos</option>
                        <option value="UK <?php echo ($country === 'Reino Unido') ? 'selected' : '' ?>">Reino Unido</option>
                        <option value="JP" <?php echo ($country === 'Japon') ? 'selected' : '' ?>>Japon</option>
                    </select>

                    <h2 class="h5 px-4 py-2 text-white">Genero:</h2>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="Mujer" name="gender" id="woman" <?php echo ($gender === 'woman') ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="woman">
                            Mujer
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="Hombre" name="gender" id="man" <?php echo ($gender === 'man') ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="man">
                            Hombre
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="Otro" name="gender" id="other" <?php echo ($gender === 'other') ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="other">
                            Otro
                        </label>
                    </div>

                    <h2 class="h5 py-2 text-center text-white">Lenguajes que te gustaria aprender:</h2>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="language[]" value="python" id="python" <?php echo (strstr($language, 'python')) ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="python">
                            Python
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="language[]" value="js" id="js" <?php echo (strstr($language, 'js')) ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="js">
                            JavaScript
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="language[]" value="php" id="php" <?php echo (strstr($language, 'php')) ? 'checked' : '' ?>>
                        <label class="form-check-label text-white" for="php">
                            PHP
                        </label>
                    </div>

                    <div class="d-grid gap-2 pt-2">
                        <input type="submit" class="btn btn-outline-success" name="edit-user" value="Editar">
                    </div>
                </form>

            </div>
        </div>
    </div>


<?php include('includes/footer.php'); ?>
