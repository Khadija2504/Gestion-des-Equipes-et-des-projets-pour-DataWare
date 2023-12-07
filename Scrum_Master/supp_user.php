<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $UtilisateurID = $_GET['id'];

    try {
       
        $sql = "DELETE FROM Utilisateurs WHERE UtilisateurID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $UtilisateurID, PDO::PARAM_INT);
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
