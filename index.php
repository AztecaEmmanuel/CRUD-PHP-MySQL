<?php include('db.php') ?>

<?php include('includes/header.php') ?>



    <div class="container-fluid bg-dark text-white">
        <div class="row justify-content-center align-items-center vh-100 px-2">
            
            <div class="col col-sm-5 col-md-4 py-3 box">
                <h1 class="h1 text-center pb-1">CRUD PHP y MySQL</h1>

                <form action="formulario.php" method="POST">

                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="Nombre" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-sm" name="email" placeholder="Correo electronico" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2">@example.com</span>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" class="form-control form-control-sm" name="password" placeholder="Contraceña" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>

                    <select class="form-select form-select-sm" name="country" aria-label="Default select example">
                        <option selected>Pais...</option>
                        <option value="MX">Mexico</option>
                        <option value="EEUU">Estados Unidos</option>
                        <option value="UK">Reino Unido</option>
                        <option value="JP">Japon</option>
                    </select>

                    <h2 class="h5 px-4 py-2">Genero:</h2>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="Mujer" name="gender" id="woman">
                        <label class="form-check-label" for="woman">
                            Mujer
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="Hombre" name="gender" id="man">
                        <label class="form-check-label" for="man">
                            Hombre
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" value="Otro" name="gender" id="other">
                        <label class="form-check-label" for="other">
                            Otro
                        </label>
                    </div>

                    <h2 class="h5 py-2 text-center">Lenguajes que te gustaria aprender:</h2>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="language[]" value="python" id="python">
                        <label class="form-check-label" for="python">
                            Python
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="language[]" value="js" id="js">
                        <label class="form-check-label" for="js">
                            JavaScript
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="language[]" value="php" id="php">
                        <label class="form-check-label" for="php">
                            PHP
                        </label>
                    </div>

                    <div class="d-grid gap-2 pt-2">
                        <input type="submit" class="btn btn-outline-primary" name="save-task" value="Button">
                    </div>
                </form>

            </div>

        </div>
        
    </div>

<?php include('includes/footer.php') ?>
