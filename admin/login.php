<?php

error_reporting(0);

session_start();
if (isset($_SESSION['username'])) {
    $_SESSION['message'] = "Vous avez besoin de ouvert votre compte";
    header("location: dashboard.php");

}


require("config/config.php");
session_start();
if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE email='$username' AND mdp='$password'");
    $row = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) === 1) {
        // Start a session and redirect to the dashboard
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['username'] = $row['id'];
        $conn->close();
        header("location: dashboard.php");
    } else {
        // Display an error message
        $_SESSION['message'] = "Invalid username/password combination";

    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h1 class="text-center">Connexion</h1>
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur :</label><br>
                        <span style="color: red; font-style: bold;">
                            <?php echo ($_SESSION['message']); ?>
                        </span>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <input type="submit" name="submit" value="Connexion" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
    <?php
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
</body>

</html>