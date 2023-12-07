<?php
// modifier_projet_process.php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['projetID'])) {
    $projetID = $_POST['projetID'];
    $nom = $_POST['nom'];

    try {
        // Mettre à jour les détails du projet dans la base de données
        $sql = "UPDATE Projets SET Nom = :nom WHERE ProjetID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':id', $projetID, PDO::PARAM_INT);
        $stmt->execute();

        // Rediriger vers la page index.php après la modification
        header('Location: index.php');
        exit();

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    // Rediriger vers la page index.php si les données ne sont pas soumises
    header('Location: index.php');
    exit();
}
?>
