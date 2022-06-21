<?php

$usuario = $_POST['nombre']; //nombre de login admin
$contraseña = $_POST['contraseña'];//clave login admin

session_start(); //inicio de sesion
$_SESSION['usuario'] = $usuario; //parametro usuario

include('connection.php');

$consulta = "SELECT*FROM usuarios where nombre='$usuario' and contraseña='$contraseña'"; //consulta a la db de admin
$resultado = mysqli_query($con, $consulta);//alamcenando consulta

$filas = mysqli_num_rows($resultado); //devuelve cantidad de filas de la consulta a la db

if ($filas) { //validacion de las filas buscadas
    header("location:homeAdmin.php"); //redireccion
} else {
    
?>
    <?php
    include("login.php"); //redireccion
    ?>

    <h1 class="bad">Nombre y/o contraseña incorrectas</h1>

<?php
}
mysqli_free_result($resultado);//solo necesita ser llamado si se está preocupado por la cantidad de memoria que está 
//siendo usada por las consultas que devuelven conjuntos de resultados grandes.
mysqli_close($con);//cerrando consulta 
?>

