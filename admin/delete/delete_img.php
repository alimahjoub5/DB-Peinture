<?php
require('../config/config.php');
$id = $_GET['id'];
$sql = "DELETE FROM image WHERE id = $id";
$image_path = "uploads/" . $_GET['nom'];
unlink($image_path);
if ($conn->query($sql) === TRUE) {
    // Fermeture de la connexion
    $conn->close();
    $previous = $_SERVER['HTTP_REFERER'];
    header("Location: $previous");
    exit;

} else {
    echo "Error deleting record: ";
}

?>