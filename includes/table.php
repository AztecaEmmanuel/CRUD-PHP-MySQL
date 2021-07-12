<?php include('../db.php'); ?>
<?php include('header.php'); ?>

        <?php
        
            if(isset($_POST["create-new-user"])) {
                // Una vez echa la consulta redireccionamos a la pagina del index.php
                header('Location: ../index.php');
            }
        
        ?>

        <div class="container-fluid bg-dark text-white">
            <div class="row justify-content-center align-items-center px-2">

                <div class="col col-sm-12 col-md-10 py-3">
                    <h1 class="display-4 text-center mb-4">Registros</h1>

                <?php if(isset( $_SESSION['message'] )) { ?>

                    <div class="alert alert-<?= $_SESSION['color_type']; // Establecemos el color desde la sesion ?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; // Establecemos el mensaje desde la sesion ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php
                    // inicialisamos la session para que los mensajes esten a la espera a volver hacer llamados
                    session_unset();
                    }
                ?>

                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Pais</th>
                                <th scope="col">Genero</th>
                                <th scope="col">Lenguaje</th>
                                <th scope="col">Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                /**
                                 * @var $query -> Preparamos la consulque le aremos a la base de datos
                                */
                                $query = "SELECT * FROM users";

                                /**
                                 * @var $result -> Hacemos la consulta a la vase de datos y le pasamos por parametro la coneccion y la consulta
                                 * 
                                 * @param $conn -> Representa la coneccion a la base de datos
                                 * @param $query -> Reprecenta la consulta que le queremos hacer a la base de datos
                                */
                                $response_user = mysqli_query($conn, $query);

                                /**
                                 * recorremos la respuesta que nos devuelve la consulta a la base de datos
                                 * y almacenamos su valor ya convertido a un array en la variable $row
                                 */
                                while( $row = mysqli_fetch_array($response_user) ) {
                            ?>

                                <tr>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['country'] ?></td>
                                    <td><?php echo $row['gender'] ?></td>
                                    <td><?php echo $row['language'] ?></td>
                                    <td>
                                        <a href="../edit.php?id=<?php echo $row['id']?>" class="d-inline pe-3 text-success">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="../delete.php?id=<?php echo $row['id']?>" class="text-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>

                    <form action="table.php" method="POST">
                    <div class="input-group mb-3 justify-content-center">
                        <button class="btn btn-outline-success px-5" name="create-new-user">Crear nuevo usuario</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<?php include('footer.php'); ?>