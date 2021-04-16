<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Agregamos Bootstrap -->
  <link rel="stylesheet" href="../../resources/css/bootstrap/bootstrap.min.css">
  <!-- Agregamos LibroCSS -->
  <link rel="stylesheet" href="../../resources/css/Estilos/style.css">

  <title>SGC Mega Frio</title>
</head>

<body>

  <header>

    <div class="container-fluid">
      <div class="row ">
        <nav class="navbar">
          <!-- Columna Logo -->
          <div class="col-11 col-xs-11 col-sm-11 d-lg-none text-center">
            <a href="paginaPrincipal.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>
            
          </div>
          <!-- Columna Logo pero para mobile -->
          <div class="col-10 d-none d-lg-block " id="SeccionImagen">

            <a href="paginaPrincipal.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>

          </div>
          <!-- Columna de Boton usuario pero para Pequeños -->
          <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
            <a href="perfil.php"><button class="btn btn-primary ">
              <i class="far fa-user"></i>
            </button></a>
            
          </div>
          <!-- Columna para perfil pero en usuarios de pantalla grande -->
          <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
           <a href="perfil.php">
            <button class="btn ">
              <i class="far fa-user"></i> Perfil
            </button>
           </a>
          </div>
        </nav>
      </div>

    </div>

    <div class="container-fluid ">
      <div class="row">

        <nav class="navbar navbar-expand-lg navbar-light SecBarra">
          <div class="container-fluid">
            <a class="navbar-brand d-lg-none" href="#">Navegacion</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-12 d-lg-none">
              <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav  ">
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="gestion_proveedores.php">Proveedores</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="GestionEquipo.php">Equipo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="gestion_clientes.php">Clientes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="gestion_empleados.php">Empleados</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="agenda.php">Agenda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="bitacora.php">Bitacora</a>
                  </li>

                </ul>
              </div>
            </div>

            <div class="col-12 d-none d-lg-block MenuSec">
              <ul class="nav justify-content-center">
                <li class="nav-item p-2">
                  <button type="button" class="btn btn-info"> <a href="gestion_empleados.php">Empleado</a></button> 
                </li>
                <li class="nav-item p-2">
                  <button type="button" class="btn btn-info"> <a href="gestion_clientes.php">Clientes</a></button> 
                </li>
                <li class="nav-item p-2">
                  <button type="button" class="btn btn-info"> <a href="GestionEquipo.php">Equipo</a></button> 
                </li>
                <li class="nav-item p-2">
                  <button type="button" class="btn btn-info"> <a href="gestion_proveedores.php">Empleado</a></button> 
                </li>
                <li class="nav-item p-2">
                  <button type="button" class="btn btn-info"> <a href="bitacora.php">Bitacora</a></button> 
                </li>
                <li class="nav-item p-2">
                  <button type="button" class="btn btn-info"> <a href="agenda.php">Agenda</a></button> 
                </li>
              </ul>
            </div>

          </div>



      </div>
      </nav>

    </div>
    </div>

  </header>

  <main>