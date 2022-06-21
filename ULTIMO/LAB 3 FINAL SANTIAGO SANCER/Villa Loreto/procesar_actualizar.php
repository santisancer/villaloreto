<?php

session_start();//inicio de sesion para recuperar datos
include("connection.php");//coneccion a db
include("functions.php");

$nombre = $_POST['nombre'];
$cantidad_personas = $_POST['cantidad_personas'];
$m2 = $_POST['m2'];
$precio = $_POST['precio'];
$descripcion = $_POST['descripcion'];

$query = "UPDATE proyectos SET nombre= '$nombre', cantidad_personas='$cantidad_personas', m2='$m2', precio='$precio', descripcion='$descripcion' WHERE nombre='$nombre'";

$ejecutarQuery = mysqli_query($con, $query);

if ($ejecutarQuery) { 
    echo "<script>alert('Se han guardado los cambios correctamente, actualice la pagina para ver los cambios'); window.location='homeAdmin.php';</script>";
} else {
    echo "<script>alert('No se pudieron insertar los datos');  window.location='homeAdmin.php';;</script>";
}

?>