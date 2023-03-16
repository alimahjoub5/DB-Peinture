<?php


session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['message'] = "Vous avez besoin de ouvert votre compte";
    header("location: login.php");
    
}
?>

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
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="avis_clients.php">Messages Témoignages</a>
      </li>
      <li class="nav-item">
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

    <?php
    // Check if the image field is not empty
    if (!empty($_FILES['image']['name'])) {
        // Get the file information
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];
        $file_error = $_FILES['image']['error'];

        // Get the file extension
        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        // Allowed file extensions
        $allowed_extensions = array("jpg", "jpeg", "png", "gif");

        // Check if the file extension is allowed
        if (in_array($file_ext, $allowed_extensions)) {
            // Check for errors
            if ($file_error === 0) {
                // Check for file size
                if ($file_size <= 2097152) {
                    // Generate a new file name
                    $file_name_new = uniqid($_POST['services'], false) . '.' . $file_ext;

                    // Set the destination path
                    $file_destination = 'uploads/' . $file_name_new;

                    // Move the file to the destination folder
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        require('config/config.php');
                        $cat = $_POST['services'];
                        $query = "INSERT INTO `image` (`id`, `nom`, `categorie`) VALUES (NULL, '$file_name_new', '$cat')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            echo "L'image a été téléchargée avec succès!";

                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Il y a eu une erreur lors du téléchargement de l'image";
                    }
                } else {
                    echo "L'image est trop lourde. Taille maximum : 2 Mo";
                }
            } else {
                echo "Il y a eu une erreur lors du téléchargement de l'image";
            }
        } else {
            echo "L'extension de fichier n'est pas autorisée. Extensions autorisées : jpg, jpeg, png, gif";
        }
    } else {
        echo "Aucune image n'a été sélectionnée";
    }

    ?>
<form action="dashboard.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="image">Sélectionnez une image à télécharger</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group">
    <label for="services">Sélectionnez un service</label>
    <select class="form-control" id="services" name="services">
        <option value="isolation">Isolation</option>
        <option value="placo">Placo</option>
        <option value="jointeur">Jointeur</option>
        <option value="peinture">Peinture</option>
        <option value="pose_parquet">Pose de parquet</option>
        <option value="carrelage">Carrelage</option>
        <option value="ratissage">Ratissage</option>
        <option value="pose_papier_peint">Pose de papier peint</option>
        <option value="pose_toile_verre">Pose de la toile de verre</option>
        <option value="ragreage">Ragréage</option>
    </select>
</div>
    <button type="submit" class="btn btn-primary">Télécharger</button>
</form>
<br><br>

<table class="table table-striped">
  <thead>
    <?php
// Connect to the database
require("config/config.php");
// Get the data from the database
$query = "SELECT * FROM `image`;";

$result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
    <tr>
      <th>Image</th>
      <th>service</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
    echo '<td><img src="uploads/' . $row['nom'] . '" style="max-width: 350px; max-height: 350px;" class="img-fluid" alt="Image"></td>';
    echo"
      <td> ".$row['categorie']."</td>
      <td>";
    echo "<a href='delete/delete_img.php?id=" . $row['id'] . '&&nom=' . $row['nom'] . "'class='btn btn-danger' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cet élément ?\");'>Supprimer</a>
    </tr>

    ";?>
    <?php }
    $conn->close();?>
  </tbody>
</table>





</body>
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
</html>