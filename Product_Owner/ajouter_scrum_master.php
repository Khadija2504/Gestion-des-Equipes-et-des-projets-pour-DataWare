<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nomScrumMaster'];
    $prenom = $_POST['prenomScrumMaster'];
    $email = $_POST['emailScrumMaster'];

    try {
        // Ajouter le Scrum Master à la base de données
        $sql = "INSERT INTO Utilisateurs (Nom, Prenom, Email, Role) VALUES (:nom, :prenom, :email, 'ScrumMaster')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        // Rediriger vers la page index.php après l'ajout
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
