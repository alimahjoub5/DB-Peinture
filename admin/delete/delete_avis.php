<?php
require('../config/config.php');
$id = $_GET['id'];
$page = $_GET['page'];
if ($page == "avis") {
    $sql = "DELETE FROM avis_c WHERE id='$id'";
    // Exécution de la requête
    if ($conn->query($sql) === TRUE) {
        // Fermeture de la connexion
        $conn->close();
        $previous = $_SERVER['HTTP_REFERER'];
        header("Location: $previous");
        exit;
    } else {
        echo "Error deleting record: ";
    }
} else {
    $sql = "UPDATE `avis_c` SET `etat` = '1' WHERE `avis_c`.`id` = '$id'";
    if ($conn->query($sql) === TRUE) {
        // Fermeture de la connexion
        $conn->close();
        $previous = $_SERVER['HTTP_REFERER'];
        header("Location: $previous");
        exit;

    } else {
        echo "Error deleting record: ";
    }
}
?>