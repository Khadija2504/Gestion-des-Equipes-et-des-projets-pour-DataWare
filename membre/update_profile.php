<?php
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: login.php');
    exit();
}

require_once('../config.php');

$userID = $_SESSION['data']['UtilisateurID'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $dateNaissance = $_POST['date_naissance'];

    try {
        // Mettre à jour les informations de l'utilisateur dans la base de données
        $sql = "UPDATE Utilisateurs SET Nom = :nom, Prenom = :prenom, Email = :email, DateNaissance = :dateNaissance WHERE UtilisateurID = :userID";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':dateNaissance', $dateNaissance, PDO::PARAM_STR);
        $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
        $stmt->execute();

        // Rediriger vers la page profile.php après la modification
        header('Location: profile.php');
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    // Rediriger vers la page profile.php si le formulaire n'est pas soumis correctement
    header('Location: profile.php');
    exit();
}
?>
