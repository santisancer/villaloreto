<?php
 include("connection.php");
 

if(!empty($_POST)){
    $nombre =$_POST['nombre'];
    $query = "DELETE FROM `proyectos` WHERE `nombre`='$nombre'";
    $query_delete=mysqli_query($con,$query);
    if($query_delete){
        header("location:homeAdmin.php");
    }else{
        echo "error al eliminar registro";
    }


}


if(empty($_REQUEST['nombre'])){
    header("location:homeAdmin.php");

}else{
    $nombre =$_REQUEST['nombre'];
    $consulta="SELECT * FROM proyectos WHERE nombre='$nombre'";
    $query= mysqli_query($con,$consulta);

    $resultado=mysqli_num_rows($query);

    if($resultado> 0 ){
        while($data = mysqli_fetch_array($query)){
            $nombre = $data['nombre']; 

        }
    }else{
        header("location:homeAdmin.php");

    }
}
?>
  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <section id="container">
        <div class="data delete">
            <h2> Esta seguro que desea Elminar el registro?</h2>
            <p>Nombre <span><?php echo $nombre?></span></p>
            <form method="post" action="">
                <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
                <a href="homeAdmin.php" class="btn_cancel"> Cancelar </a>
                <input type="submit" value="aceptar" class="btn_ok">
            </form>
        </div>
    </section>
</head>
<body>
    
</body>
</html>