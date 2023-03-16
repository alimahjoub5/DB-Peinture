<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>DB Peinture</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout in_page">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.php"><img src="images/logo1.png" alt="#" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10 offset-md-1">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                              <a class="nav-link" href="index.php">Accueil</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="about.php">à_propos_de_nous</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="service.php">Services</a>
                           </li>
                           <li class="nav-item active">
                              <a class="nav-link" href="gallery.php">Gallerie</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="testimonial.php"> Témoignages </a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="contact.php">Contact</a>
                           </li>
                        </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- gallery -->
    <div class="gallery">
        <div class="row">
    <?php
    $nom = $_GET["nom"];
// Connect to the database
require("admin/config/config.php");
// Get the data from the database
$query = "SELECT * FROM `image` where categorie='$nom';";
$result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
            echo'<div class="col-md-4 col-sm-6">
                <div class="gallery_img">
                    <figure>
                        <img src="admin/uploads/'.$row['nom'].'" style="max-width: 407px; max-height: 432px;" />
                    </figure>
                </div>
            </div>';
}
    $conn->close();?>


        </div>
    </div>
    </div>
    <!-- end gallery -->
    <!--  footer -->
    <footer>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class=" col-md-3 col-sm-6">
                        <ul class="social_icon"><li><a href="https://www.facebook.com/Entreprisedbpeinture"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/Entreprise_db_peinture"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                     </ul>
                    </ul>
                        <p class="variat pad_roght2">Nous offrons des services de rénovation et du neuf intérieure de qualité pour donner
                     à votre maison un look moderne, contactez-nous
                     pour plus d'informations.
                        </p>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h3>INFORMATION</h3>
               <ul class="link_menu">
                  <li><a href="index.php">Accueil</a></li>
                  <li><a href="about.php"> À propos</a></li>
                  <li><a href="service.php">Services</a></li>
                  <li><a href="gallery.php">Galerie</a></li>
                  <li><a href="testimonial.php">Témoignages</a></li>
                  <li><a href="contact.php">Contact</a></li>
               </ul>
                    </div>
                    <div class="col-md-6 offset-md-6">
                        <!-- <div class="col-md-6 offset-md-6">
                  /*<form id="hkh" class="bottom_form">
                     <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                     <button class="sub_btn">subscribe</button>
                  </form>
               </div>-->
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <p>© 2023 All Rights Reserved. Design by <a href="mailto:alimahjoub047@gmail.com">
                                    Mahjoub</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
</body>

<?php
  // On récupère l'URL de la page actuelle
  $url = $_SERVER['REQUEST_URI'];
  // On enregistre l'URL dans la session
  session_start();
  $_SESSION['previous_url'] = $url;
?>

<!-- ... votre code HTML ... -->

<script>
  // On détecte un changement d'état de l'historique du navigateur
  window.addEventListener('popstate', function(event) {
    // On recharge la page précédente
    location.href = '<?php echo $_SESSION['previous_url']; ?>';
  });
</script>


</html>