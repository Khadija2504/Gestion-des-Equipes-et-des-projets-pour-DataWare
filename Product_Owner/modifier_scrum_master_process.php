<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['scrumMasterID'])) {
    $scrumMasterID = $_POST['scrumMasterID'];

    // Récupérer les valeurs modifiées à partir du formulaire
    // Utilisez $_POST pour récupérer les valeurs des champs du formulaire

    try {
        // Mettre à jour le Scrum Master dans la base de données
        $sql = "UPDATE Utilisateurs SET Nom = :nom, Prenom = :prenom /* autres champs */ WHERE UtilisateurID = :id";
        $stmt = $conn->prepare($sql);
        // Liez les valeurs du formulaire aux paramètres SQL
        $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        // Autres liaisons de paramètres
        $stmt->bindParam(':id', $scrumMasterID, PDO::PARAM_INT);
        $stmt->execute();

        // Rediriger vers la page index.php après la modification
        header('Location: index.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    // Rediriger vers la page index.php si le formulaire n'est pas soumis correctement
    header('Location: index.php');
    exit();
}
?>
