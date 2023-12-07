<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['EquipeID'])) {
    $EquipeID = $_POST['EquipeID'];
    $nom = $_POST['nom'];

    try {
        $sql = "UPDATE Equipes SET Nom = :nom WHERE EquipeID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':id', $EquipeID, PDO::PARAM_INT);
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
