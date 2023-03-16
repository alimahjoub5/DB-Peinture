<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['message'] = "Vous avez besoin de ouvert votre compte";
    header("location: login.php");
    
}
  // On récupère l'URL de la page actuelle
  $url = $_SERVER['REQUEST_URI'];
  // On enregistre l'URL dans la session
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

<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="dashboard.php">Dashboard</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="avis_clients.php">Messages Témoignages</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="msgclient.php">Messages Clients</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="param.php">Paramètres</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a class="nav-link" href="modifier.php">Profil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Déconnexion</a>
      </li>
    </ul>
  </div>
</nav>

<?php

// Connection to the database
require("config/config.php");

// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Get the current password, new password and confirm password
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the new password and confirm password match
    if ($new_password != $confirm_password) {
      echo "<p style='color:red;'>Le nouveau mot de passe et la confirmation du mot de passe ne correspondent pas.<p>";
    } else {
        // Get the user's current password from the database
        $query = "SELECT mdp FROM admin WHERE id = '$_SESSION[username]' ;";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        // Compare the current password with the password in the database
        if (!password_verify($current_password, $row['mdp'])) {
            // Update the password in the database
            $query = "UPDATE admin SET mdp = '$new_password' WHERE id = $_SESSION[username];";
            $result = $conn->query($query);

            if ($result) {
                echo "<p style='color:green;'>Mot de passe modifié avec succès.<p>";
            } else {
                echo "<p style='color:red;'>Erreur lors de la modification du mot de passe.<p>";
            }
        } else {
            echo "<p style='color:red;'>Mot de passe actuel incorrect.<p> ";
        }
    }
}

// Close the connection
$conn->close();

?>

<form method="POST" action="param.php" >
  <div class="form-group">
    <label for="phone">Mot de passe Actuel</label>
    <input type="password" placeholder="Mot de passe Actuel" class="form-control" name="current_password">
        
    <label for="phone">Nouveau mot de passe</label>
    <input type="password" placeholder="Nouveau mot de passe" class="form-control" name="new_password">
<label for="phone">Confirmer nouveau mot de passe</label>
    <input type="password" placeholder="Confirmer nouveau mot de passe" class="form-control" name="confirm_password">
<br>
    <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
  </div>
</form>

</body>
</html>