<?php

session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

if (!empty($_POST)) {// validacion de campos vacios
    if (empty($_POST['nombre']) || empty($_POST['cantidad_personas']) || empty($_POST['m2']) || empty($_POST['precio']) || empty($_POST['descripcion'])) {
?>
        <h1 class="bad">COMPLETE TODOS LOS CAMPOS PARA AGREGAR UN PROYECTO!</h1>
<?php
    } else {
        if (isset($_POST['agregar_cabaña'])) {
            $nombre = $_POST['nombre'];
            $cantidad_personas = $_POST['cantidad_personas'];
            $m2 = $_POST['m2'];
            $precio = $_POST['precio'];
            $descripcion = $_POST['descripcion'];




             //inserta datos  en la db
            $query = "INSERT INTO proyectos VALUES('$nombre', '$cantidad_personas', '$m2', '$precio', '$descripcion')";
            //
            $ejecutarQuery = mysqli_query($con, $query);
                 //js
            if (!$ejecutarQuery) {
                echo "<script>alert('No se pudieron insertar los datos');  window.location='homeAdmin.php';;</script>";
            } else {
                echo "<script>alert('Se han guardado los cambios correctamente, actualice la pagina para ver los cambios'); window.location='homeAdmin.php';</script>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Loreto || Agregar Cabaña</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- CSS -->
    <!--<link rel="stylesheet" href="css/admin_styles.css">-->
</head>

<body>

    <form method="post">

        <section class="d-flex justify-content-center">
            <div class="card col-md-5">
                <div>
                    <h4>Agregar Cabaña</h4>
                </div>

                <div class="mb-2">
                    <label for="nombre"></label>
                    <h4>Nombre</h4>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-2">
                    <label for="cantidad_personas"></label>
                    <h4>Cantidad de Personas</h4>
                    <input type="text" class="form-control" name="cantidad_personas">
                </div>
                <div class="mb-2">
                    <label for="m2"></label>
                    <h4>Metros Cuadrados</h4>
                    <input type="text" class="form-control" name="m2">
                </div>
                <div class="mb-2">
                    <label for="precio"></label>
                    <h4>Precio</h4>
                    <input type="text" class="form-control" name="precio">
                </div>
                <div class="mb-2">
                    <label for="descripcion"></label>
                    <h4>Descripcion</h4>
                    <textarea name="descripcion" placeholder="Escriba aquí una descripción..."></textarea>

                </div>


                <div>
                    <input type="submit" name="agregar_cabaña" value="Crear Cabaña">

                </div>


    </form>
    <form action="homeAdmin.php"><button>Volver</button></form>

    </div>
    </div>
    </section>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>

</body>

</html>