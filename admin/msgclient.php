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
      <li class="nav-item active">
        <a class="nav-link" href="msgclient.php">Messages Clients</a>
      </li>
      <li class="nav-item">
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
    <br><br><br>



    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Téléphone</th>
                <th scope="col">Sujet</th>
                <th scope="col">Messages</th>
                <th scope="col">Dates</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>


        <tbody>
            <?php
            require "config/config.php";
            $query = "SELECT * FROM clients ORDER BY dates DESC";
            $result = mysqli_query($conn, $query);
            $page = $_SERVER['PHP_SELF'];
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                
                <th scope='row'>" . $row['id'] . "</th>
                <td>
                    " . $row['nom'] . "
                </td>
                <td>" . $row['email'] . "</td>
                <td>
                    " . $row['tel'] . "
                </td>
                <td>" . $row['sujet'] . "</td>
                <td>
                    " . $row['message'] . "
                </td>
                <td>
                    " . $row['dates'] . "
                </td>
                <td>
<a href='delete/delete_msg.php?id=" . $row['id'] . "' class='btn btn-danger' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet élément ?\");'>Supprimer</a>
                </td>";           
             }
            $conn->close();
            ?>
        </tbody>

    </table>

</body>

</html>