<?php
require_once('../config.php');
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: login.php');
    exit();
}

// Récupérer l'identifiant du projet à partir de la requête GET
$projetId = $_GET['id'];

try {
    // Exécuter la requête de suppression dans la base de données
    $sqlSupprimerProjet = "DELETE FROM Projets WHERE ProjetID = :projetId";
    $stmtSupprimerProjet = $conn->prepare($sqlSupprimerProjet);
    $stmtSupprimerProjet->bindParam(':projetId', $projetId, PDO::PARAM_INT);
    $stmtSupprimerProjet->execute();

    // Rediriger vers la page principale après la suppression
    header('Location: index.php');
    exit();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
