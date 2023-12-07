<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $UtilisateurID = $_POST['id']; 
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $equipeMembre = $_POST['equipeMembre'];
    $date_naissance = $_POST['date_naissance'];

    try {
        // Mettre à jour les détails du membre dans la base de données
        $sql = "UPDATE Utilisateurs SET Nom = :nom, Prenom = :prenom, Email = :email, EquipeID = :equipeMembre, DateNaissance = :date_naissance WHERE UtilisateurID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $UtilisateurID, PDO::PARAM_INT);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':equipeMembre', $equipeMembre, PDO::PARAM_INT);
        $stmt->bindParam(':date_naissance', $date_naissance, PDO::PARAM_STR);
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
