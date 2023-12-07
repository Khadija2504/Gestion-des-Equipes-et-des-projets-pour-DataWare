<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $nomProjet = $_POST['nomProjet'];
    $idScrumMaster = $_POST['idScrumMaster'];
    $description = $_POST['description'];
    $EquipeID = $_POST['equipeID'];

    try {
        // Insérer le nouveau projet dans la base de données
        $sql = "INSERT INTO Projets (Nom, ScrumMasterID, Description, EquipeID) VALUES (:nom, :idScrumMaster, :description, :equipeID)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nomProjet, PDO::PARAM_STR);
        $stmt->bindParam(':idScrumMaster', $idScrumMaster, PDO::PARAM_INT);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':equipeID', $EquipeID, PDO::PARAM_INT);
        $stmt->execute();

        // Rediriger vers la page index.php après l'ajout du projet
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
