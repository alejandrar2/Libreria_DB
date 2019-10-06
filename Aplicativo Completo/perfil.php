<?php 
    session_start();  
    if (!isset($_SESSION["usuario"]))
        header("Location: no-autorizado.html");
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal Estudiantes</title>
    <link rel="icon" type="img/png" href="img/Logo-unah.jpg" width="100" />

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/freelancer.min.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Perfil</a>
        
        
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><a href="../index.html" >Inicio</a></button>
          </ul>
        </div>
      </div>
    </nav>

   
    <!-- menu estudiantes -->
    <section class="Menu" id="menu-estudiantes">
      <div class="container">
        <div class="row">
          <table class="table table-striped">
            <table class="table" id="estudiantes">
              <tbody>
                <tr>
                      <th scope="row" id="cuenta" >Cuenta:</th>
                      <td><?php echo $_SESSION["cuenta"];  ?></td>
                </tr>
                <tr>
                      <th scope="row" id="usuario" >Nombre:</th>
                      <td><?php echo $_SESSION["usuario"];  ?></td>
                </tr>
                <tr>
                      <th scope="row" id="carrera">Carrera:</th>
                      <td><?php echo $_SESSION["carrera"];  ?></td>
                </tr>
                <tr>
                      <th scope="row" id="centro">Centro:</th>
                      <td><?php echo $_SESSION["centro"];  ?></td>
                </tr>
              </tbody>
            </table>
        

        

    
      </div>

    </section>

    

    <!-- Footer -->
    <footer class="footer text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4"></h4>
            <p class="lead mb-0">Bulevar Suyapa, Tegucigalpa, M.D.C, Honduras, Centroamérica 
                info@unah.edu.hn   
              <br>2216-6100, 2216-5100, 2216-3000, 2216-7000</p>
          </div>
          <div class="col-md-4 mb-5 mb-lg-0">
            <h4 class="text-uppercase mb-4">Contactenos</h4>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a class="btn-1 btn-outline-light btn-social text-center rounded-circle" href="https://facebook.com/unahoficial">
                  <i class="fab fa-fw fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-1 btn-outline-light btn-social text-center rounded-circle" href="https://twitter.com/unahoficial">
                  <i class="fab fa-fw fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-1 btn-outline-light btn-social text-center rounded-circle" href="https://instagram.com/unahoficial">
                  <i class="fab fa-fw fa-instagram"></i>
                </a>
              </li>
              
            </ul>
          </div>
          <div class="col-md-4">
            <h4 class="text-uppercase mb-4"></h4>
            <img class="img-fluid" src="img/logo-unah-blanco.png" alt="">
            
          </div>
        </div>
      </div>
    </footer>

    <div class="copyright py-4 text-center text-black">
      <div class="container">
        <h5>Derechos reservados Universidad Nacional Autónoma de Honduras  &copy; 2018</h5>
      </div>
    </div>

  </body>

</html>
