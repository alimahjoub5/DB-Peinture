<?php
require('../config/config.php');

// Get the data from the database
$query = "SELECT * FROM `entreprise`;";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

    if (!(($_POST['phone'])==$row['tel1'])){
    $tel1 = $_POST['phone'];
    $sql = "UPDATE `entreprise` SET `tel1` = '$tel1' WHERE `entreprise`.`id` = 1;";
    // Exécution de la requête
    mysqli_query($conn, $sql);
}
if (!(($_POST['phone1']) == $row['tel2'])) {
    $tel1 = $_POST['phone1'];
    $sql = "UPDATE `entreprise` SET `tel2` = '$tel1' WHERE `entreprise`.`id` = 1;";

// Exécution de la requête
    mysqli_query($conn, $sql);
}

if (!(($_POST['address']) == $row['adresse'])) {
    $tel1 = $_POST['address'];
    $sql = "UPDATE `entreprise` SET `adresse` = '$tel1' WHERE `entreprise`.`id` = 1;";

// Exécution de la requête
    mysqli_query($conn, $sql);
    }
if (!(($_POST['email']) == $row['email'])) {
    $tel1 = $_POST['email'];
    $sql = "UPDATE `entreprise` SET `email` = '$tel1' WHERE `entreprise`.`id` = 1;";
// Exécution de la requête
    mysqli_query($conn, $sql);
}
$conn->close();
$previous = $_SERVER['HTTP_REFERER'];
header("Location: $previous");
?>