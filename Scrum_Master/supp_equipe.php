<?php
require_once('../config.php');
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: login.php');
    exit();
}

$EquipeId = $_GET['id'];

try {
    $sqlSupprimerEquipe = "DELETE FROM equipes WHERE EquipeID = :EquipeId";
    $stmtSupprimerEquipe = $conn->prepare($sqlSupprimerEquipe);
    $stmtSupprimerEquipe->bindParam(':EquipeId', $EquipeId, PDO::PARAM_INT);
    $stmtSupprimerEquipe->execute();

    header('Location: index.php');
    exit();
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
