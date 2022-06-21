<?php

include('connection.php');

$alert = '';

if (!empty($_POST)) {//validar que los campos no esten vacios
    if (empty($_POST['nombre']) || empty($_POST['apellido']) || empty($_POST['mail']) || empty($_POST['consulta'])) {
        $alert = 'COMPLETE TODOS LOS CAMPOS PARA ENVIAR SU CONSULTA!';
    } else {
        if (isset($_POST['enviar'])) { 
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $mail = $_POST['mail'];
            $consulta = $_POST['consulta'];

            $query = "INSERT INTO contacto VALUES('$nombre', '$apellido', '$mail', '$consulta')";

            $ejecutarQuery = mysqli_query($con, $query);

            if (!$ejecutarQuery) {
                echo "<script>alert('No se pudieron insertar los datos');  window.location='index.php';;</script>";

            }else{
                echo "<script>alert('Se han guardado los cambios correctamente'); window.location='homeAdmin.php';</script>";

            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Cabañas Villa Loreto!</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="images/jpg/logo.jpg" alt="logo" height="60px" width="130px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="consulta.php">Consultas </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <div>

        <br><br>
        <form action="" method="POST" name="formulario">

            <input type="text" name="nombre" placeholder="Nombre">
            <input type="text" name="apellido" placeholder="Apellido">
            <input type="text" name="mail" placeholder="Email">
            <textarea name="consulta" placeholder="Escriba aquí su consulta..."></textarea>

            <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?> </div>

            <input type="submit" name="enviar" value="ENVIAR" id="button">
        </form>
        <br><br>

    </div>
    





    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>

</body>

</html>