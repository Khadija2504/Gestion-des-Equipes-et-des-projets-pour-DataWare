<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nomMembre'];
    $prenom = $_POST['prenomMembre'];
    $email = $_POST['emailMembre'];
    $dateNaissance = $_POST['dateNaissanceMembre'];

    try {
        // Ajouter le Scrum Master à la base de données avec un rôle spécifique
        $sql = "INSERT INTO Utilisateurs (Nom, Prenom, Email, Role. dateNaissance) VALUES (:nom, :prenom, :email, 'Membre', :dateNaissanceMembre)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':dateNaissanceMembre', $dateNaissance, PDO::PARAM_STR);
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
