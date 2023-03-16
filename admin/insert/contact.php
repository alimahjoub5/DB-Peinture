<?php
require("../config/config.php");

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {

        // Récupérer les variables depuis le formulaire POST
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $tel = htmlspecialchars($_POST['tel']);
        $sujet = htmlspecialchars($_POST['sujet']);
        $message = htmlspecialchars($_POST['message']);
    
        // Vérifier que les données sont valides
        if (empty($nom) || empty($email) || empty($tel) || empty($sujet) || empty($message)) {
            // Rediriger vers la page de contact avec un paramètre indiquant qu'il y a eu un problème
            header('Location: ../../contact.php?ok=false');
            exit;
        }
    


    // Préparer la requête d'insertion
    $query = "INSERT INTO `clients` (`id`, `nom`, `email`, `tel`, `sujet`, `message`, `dates`) VALUES (NULL, '$nom', '$email', '$tel', '$sujet', '$message', CURRENT_TIMESTAMP);";
    $result = mysqli_query($conn, $query);

    // Exécuter la requête d'insertion
    if ($result) {
        // Rediriger vers la page de confirmation si l'insertion a réussi
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
            $mail->Subject = "Confirmation de réception de votre message";
            $mail->Body = "
                <p>Bonjour $nom,</p>
                <p>Nous avons bien reçu votre message et nous vous en remercions. Nous allons étudier votre demande avec attention et nous vous répondrons dans les meilleurs délais.</p>
                <p>Voici un récapitulatif des informations que vous avez envoyées :</p>
                <ul>
                  <li><strong>Nom :</strong> $nom</li>
                  <li><strong>Email :</strong> $email</li>
                  <li><strong>Objet :</strong> $sujet</li>
                  <li><strong>Message :</strong> $message</li>
                </ul>
                <p>Si vous avez d'autres questions ou si vous souhaitez apporter des précisions à votre demande, n'hésitez pas à nous contacter à nouveau.</p><br>
            Cordialement, <br>
            L'équipe de DB Peinture. ";
            $mail->send();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            $conn->close();
        header("Location: ../../contact.php?ok=true");
        exit();
    } else {
        header("Location: ../../contact.php?ok=false");
        exit();
    }
}

// Fermer la connexion à la base de données
?>
