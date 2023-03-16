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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout in_page">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#"/></div>
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
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04"
                     aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarsExample04">
                     <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                              <a class="nav-link" href="index.php">Accueil</a>
                           </li>
                           <li class="nav-item active">
                              <a class="nav-link" href="about.php">à_propos_de_nous</a>
                           </li>
                           <li class="nav-item">
                              <a class="nav-link" href="service.php">Services</a>
                           </li>
                           <li class="nav-item">
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
   <section class="service">
      <div class="container">
         <div class="row">
            <div class="col-md-10 offset-md-1">
               <div class="row">
                  <div class="col-md-12">
                        <section class="image-section">
                           <div class="container">
                              <div class="row">
                                 <div class="col-md-12 text-center">
                                    <img src="images/logo1.png" alt="image-description" class="mx-auto d-block img-fluid">
                                 </div>
                              </div>
                           </div>
                        </section>

<div class="service">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="titlepage">
               <h2><span class="green">à propos de nous</span></h2>
            </div>
            </div>
            </div>
            <div class="row">
               <div class="col-md-10 offset-md-1">
                  <div class="row">
                     <div class="col-md-6">
                        <h2>Notre expertise</h2>
                        <p>DB Peinture est une entreprise spécialisée dans les services de rénovation intérieure. Nous offrons une
                           gamme complète de services, allant de l'isolation à la pose de parquet en passant par la plâtrerie, le
                           ragréage, le carrelage, la pose de papier peint et de la toile de verre. Nous avons une équipe de
                           professionnels expérimentés et qualifiés pour garantir un travail de qualité supérieure à chaque projet.
                        </p>
                     </div>
                     <div class="col-md-6">
                        <h2>Notre engagement</h2>
                        <p>En plus de nos compétences professionnelles, nous nous engageons à fournir un service rapide et efficace,
                           tout en veillant à répondre à toutes les demandes et préoccupations de nos clients. Nous comprenons que
                           la rénovation et la décoration de votre maison sont importants pour vous, et nous faisons tout notre
                           possible pour vous assurer un résultat final qui répond à vos attentes.</p>
                     </div>
                     <div class="col-md-6">
                        <h2>Notre disponibilité</h2>
                        <p>Si vous êtes à la recherche d'une entreprise de rénovation fiable et professionnelle, n'hésitez pas à
                           nous contacter pour discuter de vos projets. Nous sommes heureux de mettre à votre disposition notre
                           expertise en matière de rénovation. N'hésitez pas à nous contacter pour toute demande de devis ou pour
                           obtenir plus d'informations sur nos services.</p>
                     </div>
                     <div class="col-md-6">
                        <h2>Comment nous joindre</h2>

                        <?php
                                   // Connect to the database
                           require("admin/config/config.php");
                                   // Get the data from the database
                                   $query = "SELECT * FROM `entreprise`;";
                                   $result = mysqli_query($conn, $query);
                                   while ($row = mysqli_fetch_assoc($result)) {
                           

                        echo'<p>Vous pouvez nous joindre par téléphone au <strong><a href="tel:+33652589635">'.$row['tel1'].'</a></strong>, par e-mail à'; ?> l'adresse
                          <?php echo' <strong><a href="mailto:'.$row['email'].'">'.$row['email'].'</a></strong> ou en remplissant
                           notre formulaire de <strong><a href="contact.php">contact</a></strong> en
                           ligne. Nous sommes impatients de travailler avec vous et de répondre à toutes vos questions.</p>
                        <h3><a href="contact.php">Contactez-nous</a></h3>';
                                   }?>
                     </div>
                  </div>
                        </div>
                        </div>
                        
                        </div>
                        </section>

<!--  footer -->
<br><br>
<footer>
   <div class="footer">
      <div class="container">
         <div class="row">
            <div class=" col-md-3 col-sm-6">
               <ul class="social_icon">
                  <li><a href="https://www.facebook.com/Entreprisedbpeinture"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
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
                  <p>© 2023 All Rights Reserved. Design by <a href="mailto:alimahjoub047@gmail.com"> Mahjoub</a>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</footer>
      <!-- end footer -->
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