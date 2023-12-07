<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nomEquipe'];
    $prenom = $_POST['idScrumMaster'];

    try {
        $sql = "INSERT INTO equipes (Nom, ScrumMasterID) VALUES (:nomEquipe, :idScrumMaster)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nomEquipe', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':idScrumMaster', $prenom, PDO::PARAM_STR);
        $stmt->execute();

        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    header('Location: index.php');
    exit();
}
?>
