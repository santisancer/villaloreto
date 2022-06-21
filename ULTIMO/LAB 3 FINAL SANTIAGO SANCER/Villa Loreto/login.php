<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LOGIN ADMIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
  <link rel="stylesheet" href="vistas.css">
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html"><img src="images/jpg/logo.jpg" alt="logo" height="60px" width="130px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  <section class="d-flex justify-content-center">
    <div class="card col-md-5">
      <div>
        <h4>Login</h4>
      </div>
      <div class="mb-2">
        <form action="validar.php" method="post">

          <div class="mb-2">
            <label for="nombre"></label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" name="Nombre" />
          </div>

          

          <div class="mb-2">

            <label for="contraseña"></label>
            <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="contraseña" name="Contraseña" />
            <br>
          </div>

          </select>
      </div>

      <div>
        <button name="registrar" type="submit" class="btn btn-primary " class="">Enviar</button>
      </div>


      </form>
    </div>
    </div>
  </section>

</body>

</html>