<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $UtilisateurID = $_GET['id'];

    try {
        // Récupérer les détails du Scrum Master à modifier
        $sql = "SELECT * FROM Utilisateurs WHERE UtilisateurID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $UtilisateurID, PDO::PARAM_INT);
        $stmt->execute();
        $UtilisateurDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        // Le reste du code pour afficher le formulaire de modification
        // Utilisez $UtilisateurDetails pour remplir les champs du formulaire
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    // Rediriger vers la page index.php si l'ID n'est pas défini
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style_add.css">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: linear-gradient(to right, #FF4B2B, #FF416C);">

    <div class="form-container" style="width: 50%">
        <form action="modif_memb.php" method="post">
            <div class="bg-white p-6 rounded-md shadow-md my-4 mx-auto max-w-2xl">
                <h2 class="text-xl font-semibold mb-4">Modifier les données des membres</h2>
        
                <form action="modif_memb.php" method="post" class="space-y-4">

                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" value="<?php echo $UtilisateurDetails['Nom']; ?>" required>

                    <label for="prenom">Prenom :</label>
                    <input type="text" name="prenom" value="<?php echo $UtilisateurDetails['Prenom']; ?>" required>

                    <label for="email">Email :</label>
                    <input type="email" name="email" value="<?php echo $UtilisateurDetails['Email']; ?>" required>

                    <label for="equipeMembre">ID Équipe :</label>
                    <input type="number" name="equipeMembre" value="<?php echo $UtilisateurDetails['EquipeID']; ?>" required>

                    <label for="date_naissance">Date de Naissance :</label>
                    <input type="date" name="date_naissance" value="<?php echo $UtilisateurDetails['DateNaissance']; ?>" required>

                    <input type="hidden" name="id" value="<?php echo $UtilisateurDetails['UtilisateurID']; ?>">

                    <button type="submit">Enregistrer les modifications</button>
                </form>
            </div>
        </form>
    </div>

</body>
</html>
