


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
                           <li class="nav-item">
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
                           <li class="nav-item active">
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
      <!--  contact -->
      <?php error_reporting(0);
      if($_GET['ok']=="true"){
         echo '<div class="alert alert-success" role="alert">
         <h4 class="alert-heading">Envoi réussi !</h4>
         <p>Votre message a été envoyé avec succès.</p>
       </div>';
          }else if ($_GET['ok'] == "false") {
             echo '<div class="alert alert-danger" role="alert">
             <h4 class="alert-heading">Erreur d\'envoi!</h4>
             <p id="error-message">Il y a eu une erreur lors de l\'envoi du formulaire. Veuillez réessayer plus tard.</p>
           </div>
           ';
          }
?>
      <div class="contact">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Contact Us</h2>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
 
<script>
   function validateForm() {
  let nom = document.getElementsByName("nom")[0].value;
  let email = document.getElementsByName("email")[0].value;
  let tel = document.getElementsByName("tel")[0].value;
  let sujet = document.getElementById("sujet").value;
  let message = document.getElementsByName("message")[0].value;

  let errorMessages = document.getElementsByClassName("error-message");

  let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  let telPattern = /^\+\d{1,3}\s\d{6,14}$/;

  let isValid = true;

  // Vérifie que tous les champs sont remplis
  if (nom === "") {
    errorMessages[0].textContent = "Veuillez saisir votre nom.";
    isValid = false;
  } else {
    errorMessages[0].textContent = "";
  }
  if (sujet === "") {
    errorMessages[3].textContent = "Veuillez choisir un sujet.";
    isValid = false;
  } else {
    errorMessages[3].textContent = "";
  }
  if (message === "") {
    errorMessages[4].textContent = "Veuillez saisir votre message .";
    isValid = false;
  } else {
    errorMessages[4].textContent = "";
  }

  // Vérifie que l'email a un format valide
  if (!emailPattern.test(email)) {
    errorMessages[1].textContent = "Veuillez saisir une adresse e-mail valide.";
    isValid = false;
  } else {
    errorMessages[1].textContent = "";
  }
/*
  // Vérifie que le numéro de téléphone a un format valide
  if (!telPattern.test(tel)) {
    errorMessages[2].textContent = "Veuillez saisir un numéro de téléphone valide (format : +33 123456789).";
    isValid = false;
  } else {
    errorMessages[2].textContent = "";
  }*/

  return isValid;
}
</script>";

   <form  class="main_form" method="POST" action="admin/insert/contact.php">
    <div class="row">
        <div class="col-md-12 ">
         <span class="error-message" style="color:red"></span>
            <input class="contactus" minlength="3" placeholder="Name" type="type" name="nom" required>
        </div>
        <div class="col-md-12">
         <span class="error-message" style="color:red"></span>
            <input class="contactus" placeholder="Email" type="type" name="email" required>
        </div>
        <div class="col-md-12">
         <span class="error-message" style="color:red"></span>
            <input class="contactus" placeholder="+33" type="type" name="tel" required>

        </div>
        <div class="col-md-12">
         <span class="error-message" style="color:red"></span>
            <select class="contactus" name="sujet" id="sujet" required>
                <option value="">Sélectionnez un sujet</option>
                <option value="Demande générale">Demande générale</option>
                <option value="Rénovation de salle de bain">Rénovation de salle de bain</option>
                <option value="Rénovation de cuisine">Rénovation de cuisine</option>
                <option value="Rénovation de salon">Rénovation de salon</option>
                <option value="Rénovation de chambre à coucher">Rénovation de chambre à coucher</option>
            </select>
        </div>
        <div class="col-md-12">
         <span class="error-message" style="color:red"></span>
            <textarea class="textarea" placeholder="Message" type="type" Name="message" required></textarea>
        </div>
        <div class="col-md-12">
            <button type="submit" name="submit" id="submit" onClick="return validateForm()" class="send_btn">Envoyer</button>
        </div>
    </div>
</form>

               </div>
               <div class="col-md-6">
                  <div class="map_main">
                     <div class="map-responsive">
<iframe
   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d74117.56885959388!2d1.6595289900197596!3d45.268857439234594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f88c9f4be04989%3A0xfd314b232b3c19d8!2s19000%20Tulle%2C%20France!5e0!3m2!1sfr!2stn!4v1673798826886!5m2!1sfr!2stn"
   width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
   referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                           <?php
                                   // Connect to the database
                           require("admin/config/config.php");
                                   // Get the data from the database
                                   $query = "SELECT * FROM `entreprise`;";
                                   $result = mysqli_query($conn, $query);
                                   while ($row = mysqli_fetch_assoc($result)) {
                           ?>
                     <div class="address_main" style="font-size: 20px;">
                        <div class="address">
                           <i class="fa fa-map-marker" aria-hidden="true"></i>
                           <p>Adresse : <?php echo($row['adresse']); ?></p>
                        </div>
                        <div class="address">
                           <i class="fa fa-phone" aria-hidden="true"></i><p>Numéro 1 : <a href="tel:.<?php $row['tel1'] ?>."><?php echo($row['tel1']); ?></a></p>
                           <i class="fa fa-phone" aria-hidden="true"></i><p>Numéro 2 : <a href="tel:.<?php $row['tel2'] ?>."><?php echo($row['tel2']); ?></a></p>
                        </div>
                        <div class="address">
                        <i class=" fa fa-envelope" aria-hidden="true"></i> <a
                              href="mailto:.<?php $row['email'] ?>."><?php echo($row['email']);
                                   $conn->close(); }?></a>
                        </div>
                        
                     </div>
                  </div>
      
               </div>
               </section>
               </div>
               </div>
               </div>
               <!-- end contact -->
      <!-- end contact -->
      <!--  footer -->
      <footer>
         <div class="footer">
            <div class="container">
               <div class="row">
                  <div class=" col-md-3 col-sm-6">
                     <ul class="social_icon">
                        <li><a href="https://www.facebook.com/Entreprisedbpeinture"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.instagram.com/Entreprise_db_peinture"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
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