
<html>

  <head>
    <title>RMA</title>
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

    <div class="container">
        <div class="panel panel-success fromthetop">
            <div class="panel-heading"><h4>Erreur:</h4></div>
            <div class="panel-body">
                <h3> <?php echo $message?> </h3>
                <h4><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">
                Retour >>></a></h4>
            </div>
        </div>
    </div>
</body>
</html>