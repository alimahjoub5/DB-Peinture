<?php
require("admin/config/config.php");
?>


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
                           <li class="nav-item active">
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
   <!-- testimonial -->
   <?php error_reporting(0);
   if ($_GET['ok'] == "true") {
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
   <div class="Testimonial">
      <div class="container-fluid">
         <div class="row d_flex">
              <div class="col-md-8 pad_left0">
    <div id="testimon" class="carousel slide banner_testimonial" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php
        // Connect to the database
require("admin/config/config.php");
        // Get the data from the database
        $query = "SELECT * FROM `avis_c` where etat='1';";
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);

        for ($i = 0; $i < $num_rows; $i++) {
          echo '<li data-target="#testimon" data-slide-to="'.$i.'"></li>';
        }
        ?>
      </ol>
      <div class="carousel-inner">
        <?php
        $active = "active";
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<div class="carousel-item '.$active.'">
            <div class="container">
              <div class="carousel-caption relative">
                <div class="row">
                  <div class="col-md-6">
                    <div class="text_humai">
                      <i><img src="images/avatar.png" alt="#" style="max-width: 130px; max-height: 130px;" /></i>
                      <span>'.$row['nom'].'</span>
                      <span>Notation :</span>
                      <span>'.$row['note'].'/10</span>
                      <p>'.$row['avis'].'</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>';
          $active = "";
        }
        $conn->close();
        ?>
      </div>
     <a class="carousel-control-prev" href="#testimon" role="button" data-slide="prev">
      <i class="fa fa-angle-left" aria-hidden="true"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#testimon" role="button" data-slide="next">
      <i class="fa fa-angle-right" aria-hidden="true"></i>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="col-md-4 ">
  <div class="titlepage">
   <br><br><br><br>
   <h2>Testimonial</h2>
   <br><br><br>
  </div>
</div>


         </div>

      </div>

   </div>

   
   <form id="testimonials-form" method="POST" action="admin/insert/avis.php">
      <div class="banner_testimonial">
        <div class="text_humai">
          <span>Nom</span>
          <input type="text" class="form-control" name="nom" >
          <span class="error-message" style="color:red"></span>
        </div>
        <div class="text_humai">
          <span>Email</span>
          <input type="email" class="form-control" name="email" >
          <span class="error-message" style="color:red"></span>
        </div>
        <div class="text_humai">
          <span>Testimonial</span>
          <textarea class="form-control" name="message" rows="5" ></textarea>
          <span class="error-message" style="color:red"></span>
        </div>
        <div class="text_humai">
          <span>Donnez une note</span>
          <div class="form-group">
            <select class="form-control" name="note" >
              <option value="">-- Sélectionner une note --</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
            <span class="error-message" style="color:red"></span>
          </div>
        </div>
  
        <br><br>
        <button class="read_more" name="submit">Submit</button>
      </div>
    </form>
  echo"
    <script>
      // Récupération du formulaire
      const testimonialsForm = document.getElementById('testimonials-form');
  
      // Récupération des champs du formulaire
      const nomInput = testimonialsForm.elements['nom'];
      const emailInput = testimonialsForm.elements['email'];
      const messageInput = testimonialsForm.elements['message'];
      const noteInput = testimonialsForm.elements['note'];
  
      // Fonction de validation des champs
      function validateFields() {
        let isValid = true;
  
        // Validation du champ nom
        if (nomInput.value.trim() === '') {
          nomInput.nextElementSibling.textContent = 'Le champ Nom est vide';
          isValid = false;
        } else {
          nomInput.nextElementSibling.textContent = '';
        }
  
        // Validation du champ email
        if (emailInput.value.trim() === '') {
          emailInput.nextElementSibling.textContent = 'Le champ Email est vide';
          isValid = false;
        } else if (!isValidEmail(emailInput.value.trim())) {
          emailInput.nextElementSibling.textContent = 'L\'adresse email n\'est pas valide';
          isValid = false;
        } else {
          emailInput.nextElementSibling.textContent = '';
        }
  
        // Validation du champ message
        if (messageInput.value.trim() === '') {
          messageInput.nextElementSibling.textContent = 'Le champ message est vide';
          isValid = false;
        } else {
          messageInput.nextElementSibling.textContent = '';
        }
  
        // Validation du champ note
if (noteInput.value.trim() === '') {
noteInput.nextElementSibling.textContent = 'Le champ note est vide';
isValid = false;
} else if (isNaN(noteInput.value.trim()) || noteInput.value.trim() < 1 || noteInput.value.trim() > 10) {
noteInput.nextElementSibling.textContent = 'La note doit être un nombre entre 1 et 10';
isValid = false;
} else {
noteInput.nextElementSibling.textContent = '';
}

 return isValid;
}

// Fonction de validation de l'adresse email
function isValidEmail(email) {
 const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
 return emailRegex.test(email);
}

// Écouteur d'événement pour soumettre le formulaire
testimonialsForm.addEventListener('submit', function(event) {
 if (!validateFields()) {
   event.preventDefault();
 }
});
 </script>
  
  ";

   <!-- end design -->

   

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