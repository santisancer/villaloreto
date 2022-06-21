<?php
session_start();
include("connection.php");
include("functions.php");

$user_data = check_login($con);



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villa Loreto || ADMIN</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--     <link rel="stylesheet" href="css/styles.css">
 -->
</head>

<script type="text/javascript">
    //validacion en js para cierre de sesion
    function ConfirmarCierre() {
        var respuesta = confirm("cerrar la sesion?");
        if (respuesta) {
            return true;
        } else {
            return false;
        }
    }
</script>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php"><img src="images/jpg/logo.jpg" alt="logo" height="60px" width="130px" /></a>


                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="cerrar_sesion.php" onclick="return ConfirmarCierre()"">Cerrar Sesion</a>
                </li>
            
        </nav>
    </header>

    <form action="buscar.php" method="get" class="form_search">
        <input type="text" name="busqueda" placeholder="buscar" >
        <input type="submit" value="buscar" class="btn_search">
    </form>

    <!-- Tabla Cabañas -->
    <section id=" section">
                        <div class="container">


                            <h1>Administracion de Cabañas</h1>

                            <div id="main-container">
                                <table class="table">
                                    <thead class="table-dark">
                                        <tr class="table-active">
                                            <th>Nombre</th>
                                            <th>Cantidad de Personas</th>
                                            <th>Metros Cuadrados</th>
                                            <th>Precio</th>
                                            <th>Descripcion</th>
                                            <th>Opciones</th>
                                            <th>Opciones</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>



                                    <?php
                                    //paginacion
                                    $consulta="SELECT COUNT(*) as total_registro FROM proyectos"; //seleccionar todas los registros
                                    $sql=mysqli_query($con, $consulta); //conexion a db y consulta
                                    $result_register = mysqli_fetch_array($sql); //consulta guardada en array
                                    $total_registro = $result_register['total_registro'];//variable total registro almacenada en array desde la db

                                    $por_pagina = 3;// cantidad de registros por pagina

                                    if(empty($_GET['pagina'])){ //validacion distinto de vacio
                                        $pagina = 1; 

                                    }else
                                    $pagina = $_GET['pagina']; //treae el numero de la pagina

                                    $desde = ($pagina-1) * $por_pagina; //
                                    $total_paginas = ceil($total_registro/$por_pagina);



                                    $query = "SELECT * FROM proyectos LIMIT $desde, $por_pagina";
                                    $ejecutarQuery = mysqli_query($con, $query);
                                    $verFilas = mysqli_num_rows($ejecutarQuery);
                                    $fila = mysqli_fetch_array($ejecutarQuery);


                                    if (!$ejecutarQuery) {
                                        echo 'Error en la consulta.';
                                    } else {
                                        if ($verFilas < 1) {
                                            echo "<tr><th>Sin registros</th><th>...</th><th>...</th><th>...</th></tr>";
                                        } else {
                                            for ($i = 0; $i <= $fila; $i++) {
                                                echo '
                                        <tr>
                                            <th>' . $fila[0] . '</th>
                                            <th>' . $fila[1] . '</th>
                                            <th>' . $fila[2] . '</th>
                                            <th> $' . $fila[3] . '</th>
                                            <th>  ' . $fila[4] . '</th>
                                            

                                            
                                         
                                            <th>
                                            <a href="actualizar.php  ?nombre=' . $fila[0] . '">Actualizar</a>

                                            </th>
                                            <th>
                                            <a href="eliminar.php?nombre=' . $fila[0] . '">Eliminar</a>

                                            </th>

                                        </tr>
                                    ';
                                                $fila = mysqli_fetch_array($ejecutarQuery);
                                            }
                                        }
                                    }


                                    ?>

                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?php 
                                        for($i= 1 ; $i<= $total_paginas; $i++ ){
                                            echo  '<li class="page-item"><a class="page-link" href="?pagina='.$i.'">'.$i.'</a></li>';
                                            

                                        }



                                        ?>
                                        
                                    </ul>
                                </nav>



                            </div>
                        </div>
                        </section>

                        <section>
                            <a href="agregarProyecto.php"><button>Agregar Cabaña</button></a><br><br>
                        </section>

                        <section>
                            <div class="container">
                                <h1 class="">Consulta de Clientes</h1>

                                <div id="main-container">

                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Correo</th>
                                                <th>Consulta</th>
                                            </tr>
                                        </thead>

                                        <?php
                                        $query = "SELECT * FROM contacto";
                                        $ejecutarQuery = mysqli_query($con, $query);
                                        $verFilas = mysqli_num_rows($ejecutarQuery);
                                        $fila = mysqli_fetch_array($ejecutarQuery);

                                        if (!$ejecutarQuery) {
                                            echo 'Error en la consulta.';
                                        } else {
                                            if ($verFilas < 1) {
                                                echo "<tr><th>Sin registros</th><th>...</th><th>...</th></tr>";
                                            } else {
                                                for ($i = 0; $i <= $fila; $i++) {
                                                    echo '
                                        <tr>
                                            <th>' . $fila[0] . '</th>
                                            <th>' . $fila[1] . '</th>
                                            <th>' . $fila[2] . '</th>
                                            <th>' . $fila[3] . '</th>
                                        </tr>
                                    ';
                                                    $fila = mysqli_fetch_array($ejecutarQuery);
                                                }
                                            }
                                        }
                                        ?>

                                    </table>
                                </div>

                            </div>
                        </section>



                        <!-- JS -->
                        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>

</body>

</html>