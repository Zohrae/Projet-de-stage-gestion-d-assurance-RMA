<?php

    require_once('../pages/sessionStagiaire.php');

?>


<html>

  <head>
    <title> Demande de Stage | RMA</title>
    <meta charset="utf-8">
    <!-- icon -->
    <link rel="shortcut icon" type="image/x-icon" href="../theme/images/logolion2.png" />

  </head>
  <!-- CSS
  ================================================== -->
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="../theme/plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <!-- Lightbox.min css -->
  <link rel="stylesheet" href="../theme/plugins/lightbox2/css/lightbox.min.css">
  <!-- animation css -->
  <link rel="stylesheet" href="../theme/plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="../theme/plugins/slick/slick.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../theme/css/style.css">
  <link rel="stylesheet" type = "text/css" href ="../css/COD.css">
  <link rel="stylesheet" type = "text/css" href ="../css/bootstrap.min.css">

    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

<body>
<!-- end panel -->

<div class="container">
    <div class="row">
        <div>
          <h1 class="text-center">Faire une Demande</h1>
          <h3 class="text-center">Veuillez remplir vos informations.</h3>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-6 mt-4 mt-lg-0">
				<img loading="lazy" class="img" src="../theme/images/stagiaire/satagiiiiiiiiii.png" alt="">
			</div>
        <div class="col-md-6 col-md-offset-3">
            <div class="credit-card-div">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <div class="row ">
                        <form method="post" action="addingDemandeOnline.php" class="form">
                            <div class="col-md-12 pad-adjust">
                                <strong>N° CIN:</strong> <input type="text"  name="cinDO"
                                class="form-control" 
                                placeholder="Entrer votre N° CIN" required="" />
                                <br>
                                <strong>Nom Complet:</strong>  <input type="text" name="nomDO"
                                class="form-control" 
                                placeholder="Entrer votre nom complet" required="" /> 
                                <br>
                                <strong>Date:</strong> <input type="text" name="dateDO"
                                class="form-control" 
                                placeholder="Entrer la Date" required="" />
                                <br>                          
                            </div>
                                <div class="form-group mb-4 col-md-12">
                                <textarea rows="6" placeholder="Message"
                                
                                    class="form-control" name="message" id="message" required></textarea>
                                </div>
                                <div class="contact-form col-md-12 " id="cf-submit">
                                <br>

                                    <input type="submit" id="contact-submit" class="btn btn-transparent" value="Submit">
                                </div>
                        </form>  
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

<!-- Main jQuery -->
<script src="../theme/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap4 -->
<script src="../theme/plugins/bootstrap/bootstrap.min.js"></script>
<!-- Parallax -->
<script src="../theme/plugins/parallax/jquery.parallax-1.1.3.js"></script>
<!-- lightbox -->
<script src="../theme/plugins/lightbox2/js/lightbox.min.js"></script>
<!-- Owl Carousel -->
<script src="../theme/plugins/slick/slick.min.js"></script>
<!-- filter -->
<script src="../theme/plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Smooth Scroll js -->
<script src="../theme/plugins/smooth-scroll/smooth-scroll.min.js"></script>

<!-- Custom js -->
<script src="../theme/js/script.js"></script>

<!-- Custom js -->
<script src="js/script.js"></script>
</body>
</html>