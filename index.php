<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vita Sana</title>
     
    <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="./asserts/css/bootstrap.min.css">  
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  -->
    

    <!-- Propio CSS -->
    <link rel="stylesheet" href="./asserts/css/estilos.css" />
    

    <!-- icono -->
    <link rel="shortcut icon" href="./asserts/imagen/icono.jpg" />
</head>
 
<body>
    
  
   <!-- ======= Header ======= -->
  <header>
    <!--boton whatsapp -->    
    <div class="btn-whatsapp">
      <a href="https://api.whatsapp.com/send?phone=+543482268401" target="_blank">
        <img src="./asserts/imagen/btn_whatsapp.png" width="63" height="63" alt="whatsapp">
      </a>
    </div>

      <!--Menu de navegacion -->
      <nav class="navbar navbar-expand-lg navbar-light navbar-custom ">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="./asserts/imagen/logo.png" width="140" height="100" alt="logo">
          </a>
          
		  <!--Menu hamburguesa -->
          <button class="navbar-toggler custom-toggler"type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " href="#">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="#producto">Poductos</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categor??as
                </a>
				<!-- Sub menu de categorias-->
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item " href="#">Cereales</a></li>
                  <li><a class="dropdown-item " href="#">Lacteos</a></li>
                  <li><a class="dropdown-item " href="#">Aceites</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contacto" tabindex="-1">Contacto</a>
              </li>
            </ul>
            <form class="d-flex">
                        <button class="btn btn-success" type="submit">
                          <a class="btn mt-auto link-light" href="login.html">Ingres??</a>
                        </button>
                    </form>
          </div>
         
        </div>
      </nav>
  </header> 

  <main>
	<!--carousel-->
    <div class="carouselContainer">
      <div id="carousel" class="carousel slide"  data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="./asserts/imagen/VitaSana-banners-01.jpg" class="container-fluid w-100" alt="banner1">
          </div>
          <div class="carousel-item">
            <img src="./asserts/imagen/carruselImaen1.jpg" class="d-block w-100 " alt="banner2">
          </div>
          <div class="carousel-item">
            <img src="./asserts/imagen/VitaSana-banners-03.jpg" class="d-block w-100" alt="banner3">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    

      <!-- Section Productos-->
	  <section id = "producto">  
		  <div class="container px-4 px-lg-5 mt-5">
			  <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
          <?php
            
            $conexion = mysqli_connect("127.0.0.1", "root", "");
            mysqli_select_db($conexion, "vita_sana");
            
            $consulta='SELECT * FROM PRODUCTOS';

            
            $datos= mysqli_query($conexion, $consulta);

            
            while ($reg = mysqli_fetch_array($datos)) {?>

              <div class="col mb-5">
                  <div class="card h-100">
                      <!-- Product image-->
                      <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['IMAGEN'])?>" alt="..." />
                      <!-- Product details-->
                      <div class="card-body p-4">
                          <div class="text-center">
                              <!-- Product name-->
                              <h5 class="fw-bolder"><?php echo ucwords($reg['DESCRIPCION']) ?></h5>
                              <h7>Disponible <?php echo $reg['STOCK']; ?></h2>
                              <!-- Product price-->
                            <h3>$<?php echo $reg['PRECIO']; ?></h3>
                          </div>
                      </div>
                      <!-- Product actions-->
                      <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">

                        <!--boton con link de pago que cargu?? en la base de datos-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                          <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Agregar</a></div>
                        </div>
                      </div>
                  </div>
              </div>

            <?php } ?>
				</div>
		  </div>
	  </section>
          
  <!-- seccion de contacto -->
  <section id="contacto" class="contacto">
      <div class="container">
        <div class="section-title">
          <h2>Contacto</h2>
        </div>
        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              
              <div class="ubicacion">
                <i class="bi bi-geo-alt"></i>
                <h4>Nuestra Ubicaci??n:</h4>
                <p>Calle 9 Nro. 663, S3561 Avellaneda, Santa Fe</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>vitasana@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Tel:</h4>
                <p>+543482 26-8401</p>
              </div>
              
              <!--Mapa-->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3485.636272411647!2d-59.658693284432225!3d-29.11641778222937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x944eb12304f2d0cd%3A0x2ea2921a5be49838!2sVITA%20SANA%20NUTRICION%20SALUDABLE!5e0!3m2!1ses-419!2sar!4v1625928715560!5m2!1ses-419!2sar" frameborder="0" style="border:0; width: 100%; height: 290px;"  allowfullscreen="" loading="lazy"></iframe>
            </div>
          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="" method="post" role="form" class="email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Nombre</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">E-mail</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name">Asunto</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Mensaje</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="text-center"><button type="submit">Enviar</button></div>
            </form>
          </div>
        </div>
      </div>
    </section>
</main>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
                <ul class="direccion">
                     <span>CONTACTO</span>    
                     <li>
                        <a>Calle 9 Nro. 663</a>
                      </li>
                           
                      <li>
                        <a>Avellaneda, Santa Fe</a>
                      </li>
                           
                      <li>
                        <a>Tel??fonos: +543482 268401</a>
                      </li>
					            <li>
                        <a>Email:vitasana@gmail.com</a>
                      </li>
                 </ul>
            </div>
            
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <ul class="mpagos ">
                     <span>MEDIOS DE PAGOS</span>    
                     <li>
                        <img src="./asserts/imagen/visa.png" width="50" alt="visa" >
                      </li>
                           
                      <li>
						            <img src="./asserts/imagen/mercadopago.png" width="50" alt="mpago" >
                      </li>
                           
                      <li>
                        <img src="./asserts/imagen/cabal.png" width="50" alt="cabal" >
                      </li>
                           
                      <li>
                        <img src="./asserts/imagen/pagoplus.png" width="50" alt="pagoplus">
                      </li>
                           

                </ul>
            </div>
       
            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                <ul class="social">
                   <span>SEGUINOS</span>    
                   <li>
                      <a href="https://www.facebook.com/vitasanatusalud" target="_blank"></a>
                      <img src="./asserts/imagen/facebook.svg" width="45" alt="facebook" class="d-inline-block">
                   </li>
                   <li>
                      <a href="https://www.instagram.com/vitasanatusalud/" target="_blank"></a>
                      <img src="./asserts/imagen/instagram.svg" width="45" alt="instagram" class="d-inline-block">
                   </li>
                 </ul>
            </div>
       </div> 
	  
    </div>
	
	<div  class="text-center bg-dark text-white">
		<a>Copyright Vita Sana - 2021. Todos los derechos reservados.</a> 
	</div>

</footer>
<!-- 
<footer class="bg-success">
  <div class="container ">
    <div class="row align-items-center">
        <div class="col-xs-12 col-md-6 text-left"> 
            <h6 class="text-white ">CONTACTO:</h6>
            <h6 class="text-white">
              Calle 9 663<br>
              Avellaneda, Santa Fe.<br>
              Tel??fonos: +543482 268401.<br>
            </h6>
        </div>

        <div class="col-xs-12 col-md-4 text-right"> 
			<h6 class="text-white ">Medios de pagos:</h6>
			<a href="https://www.instagram.com/vitasanatusalud/" target="_blank"></a>
				  <img src="./asserts/imagen/mdepago.png" width="60%" alt="instagram" class="d-inline-block">
			 
			  <h6 class="text-white ">Seguinos:</h6>
              <a href="https://www.facebook.com/vitasanatusalud" target="_blank">
                <img src="./asserts/imagen/facebook.svg" width="45" alt="facebook" class="d-inline-block">
              
              <a href="https://www.instagram.com/vitasanatusalud/" target="_blank">
                <img src="./asserts/imagen/instagram.svg" width="45" alt="instagram" class="d-inline-block">
			 
        </div>
    </div>
  </div>
  <div  class="text-center bg-dark text-white">
    <a>Copyright Vita Sana - 2021. Todos los derechos reservados.</a> 

  </div>
</footer> -->

   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
</body>
</html>

