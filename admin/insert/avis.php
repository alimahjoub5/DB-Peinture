<?php

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
      // Récupérer les valeurs soumises
      $nom = htmlspecialchars($_POST['nom']);
      $email = htmlspecialchars($_POST['email']);
      $message = htmlspecialchars($_POST['message']);
      $note = htmlspecialchars($_POST['note']);
    
      // Vérifier si les champs sont vides
      if (empty($nom)) {
        header("Location: ../../testimonial.php?ok=false");
        exit;
      }
      if (empty($email)) {
        header("Location: ../../testimonial.php?ok=false");
        exit;
      }
      if (empty($message)) {
        header("Location: ../../testimonial.php?ok=false");
                exit;
      }
      if (empty($note)) {
        header("Location: ../../testimonial.php?ok=false");
                exit;
      }
    
      // Vérifier si l'adresse email est valide
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../../testimonial.php?ok=false");
                exit;
      }
    
      // Enregistrement des données dans la base de données
      // ...
    
      require("../config/config.php");
        $query = "INSERT INTO avis_c VALUES (NULL, '$nom','$email', '$message', '$note', CURRENT_TIMESTAMP, 0)";
        $result = mysqli_query($conn, $query);

        if ($result) {
        require('../config/phpmailer/mail.php');
        $mail->setFrom('dbpeinture1@gmail.com', 'DB Peinture');
        $mail->addAddress('dbpeinture1@gmail.com');
        $mail->Subject = "Nouveau message sur l'administration du site web";
        $mail->Body = "Bonjour,

<p style='text-align:center;font-size:20px;'>Nous aimerions vous informer qu'il y a un <strong>nouveau message</strong> sur la section des témoignages de notre site web.</p>
<a href='https://www.monsite.com/temoignages' style='text-align:center;display:block;'>Cliquez ici pour voir le nouveau message</a>

<p style='text-align:center;'>Cordialement,</p>";
       $mail->send();
        
        //Envoi d'un email de confirmation pour le client
        $mail->setFrom('', 'DB Peinture');
        $mail->addAddress($email);
        $mail->Subject = "Témoignage reçu - DB Peinture";
        $mail->Body = "Cher(e) $nom, <br>
        Nous avons bien reçu votre témoignage. Nous vous remercions pour le temps que vous avez pris pour partager votre expérience avec DB Peinture. <br>
        Nous sommes ravis de savoir que vous êtes satisfait(e) de nos services. <br>
        Merci encore pour votre confiance envers DB Peinture. <br>
        <br>
        Cordialement, <br>
        L'équipe de DB Peinture ";
        $mail->send();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        $conn->close();


      // Rediriger vers une page de confirmation
      header("Location: ../../testimonial.php?ok=true");
      exit;
    }
    
    ?>