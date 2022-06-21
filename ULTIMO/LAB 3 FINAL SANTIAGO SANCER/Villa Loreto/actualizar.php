<?php

session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);

$nombre = $_GET["nombre"];
$query = "SELECT * FROM proyectos WHERE nombre = '$nombre'";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Loreto || Editar Cabañas </title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!--  -->
    
</head>

<body class="body_edit">

    <div id="main-container-edit">
        <form class="form-edit" action="procesar_actualizar.php" method="post">
            <table class="table">
                <thead class="table-dark">

                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad_personas</th>
                        <th>m2</th>
                        <th>Precio</th>
                        <th>Descripción</th>
                        <th>Operacion</th>
                    </tr>
                </thead>

                <?php
                $ejecutarQuery = mysqli_query($con, $query);
                $verFilas = mysqli_num_rows($ejecutarQuery);
                $fila = mysqli_fetch_array($ejecutarQuery);

                if (!$ejecutarQuery) {
                    echo 'Error en la consulta.';
                } else {
                    if ($verFilas < 1) {
                        echo "<tr><th>Sin registros</th><th>...</th><th>...</th><th>...</th></tr>";
                    } else {
                        echo '
                    
                            <th><input type="text" value="' . $fila[0] . '" name="nombre"></th>
                            <th><input type="text" value="' . $fila[1] . '" name="cantidad_personas"></th>
                            <th><input type="text" value="' . $fila[2] . '" name="m2"></th>
                            <th><input type="text" value="' . $fila[3] . '" name="precio"></th>
                            <th><input type="text" value="' . $fila[4] . '" name="descripcion"></th>
                            <th><input type="submit" value="Actualizar"></th>
                        </tr>
                    ';
                    }
                }
                ?>

            </table>
        </form>
    </div>

    <form action="homeAdmin.php"><button>Volver</button></form>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>

</body>

</html>