<!DOCTYPE html>
<?php 
   include "../constant.php";
 ?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Antrian <?php echo $owner_name;?></title>

    <!-- Bootstrap core CSS -->
    <link href="../assert/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../assert/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../assert/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../assert/css/landing-page.min.css" rel="stylesheet">

    <style>
      a:visited 
      {
        color: rgb(0,0,0);
        Text-Decoration: none
      }
      a:link
      {
        color: rgb(0,0,0);
        Text-Decoration: none 
      }
      a:Hover
      {
        color: red;
      } 
      a:active 
      {
        color: rgb(255,153,0);
      }
	  .jumbotron{
		padding:2px;
	  }
      </style>

  </head>

  <body>

    <!-- Navigation -->
    <!-- <nav class="navbar navbar-light bg-light static-top"> -->
      <!-- <div class="container"> -->
        <!-- <a class="navbar-brand" href="#">Sistem Antrian RSUD IMANUDDIN</a> -->
        
      <!-- </div> -->
    <!-- </nav> -->

    <!-- Masthead -->
	
	 <div class="jumbotron jumbotron">
            <div class="container text-center">
                <img src="../assert/img/logorsud.png" width="20%" > 
				<h2>ANTRIAN <?php echo $owner_name;?></h2>
            </div>
        </div>
    

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">          
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <a href="frm_antrian_mandiri.php">
                <div class="features-icons-icon d-flex">
                  <i class="icon-layers m-auto text-primary"></i>
                </div>
              </a>
              <h3><a href="frm_antrian_mandiri.php">Pendaftaran Mandiri</a></h3>
              <p class="lead mb-0"></p>
            </div>
          </div>
		  
		   <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <a href="form_scan_qr.php">
                <div class="features-icons-icon d-flex">
                  <i class="icon-camera m-auto text-primary"></i>
                </div>
              </a>
              <h3><a href="form_scan_qr.php">Konfirmasi Antrian</a></h3>
              <p class="lead mb-0"></p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <a href="index4.php">
                  <div class="features-icons-icon d-flex">
                    <i class="icon-check m-auto text-primary"></i>
                  </div>
              </a>
              <h3><a href="index4.php">Pandaftaran Baru</a></h3>
              <p class="lead mb-0"></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Image Showcases -->
    

    <!-- Testimonials -->
   

    <!-- Call to Action -->
    

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
           
            <p class="text-muted small mb-4 mb-lg-0">&copy; <?php echo $copyright;?> <?php echo date("Y");?>.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../assert/vendor/jquery/jquery.min.js"></script>
    <script src="../assert/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
