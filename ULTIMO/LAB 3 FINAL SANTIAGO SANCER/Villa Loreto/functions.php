<?php

function check_login($con){ //funcion para buscar al admin y validarlo

	if(isset($_SESSION['usuario'])){

		$nombre = $_SESSION['usuario'];//busqueda por nombre de usuario
		$query = "SELECT * FROM usuarios WHERE nombre = '$nombre' LIMIT 1";//busqueda a la db 
		$resultado = mysqli_query($con , $query);

		if($resultado && mysqli_num_rows($resultado) > 0){
			$user_data = mysqli_fetch_assoc($resultado);//es usada para regresar una representación
			// asociativa de la siguiente fila en el resultado, representado por el parámetro resultado
			// , donde cada llave en la matriz representa el nombre de las columnas en el resultado.
			return $user_data;
		}
	}

	//redireccion
	header("Location: login.php");
	die();

}

?>