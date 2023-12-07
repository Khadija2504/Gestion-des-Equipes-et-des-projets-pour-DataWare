<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $scrumMasterID = $_GET['id'];

    try {
        // Supprimer le Scrum Master de la base de données
        $sql = "DELETE FROM Utilisateurs WHERE UtilisateurID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $scrumMasterID, PDO::PARAM_INT);
        $stmt->execute();

        // Rediriger vers la page index.php après la suppression
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    // Rediriger vers la page index.php si l'ID n'est pas défini
    header('Location: index.php');
    exit();
}
?>
