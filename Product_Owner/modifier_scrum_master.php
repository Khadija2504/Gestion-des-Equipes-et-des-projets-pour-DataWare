<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $scrumMasterID = $_GET['id'];

    try {
        // Récupérer les détails du Scrum Master à modifier
        $sql = "SELECT * FROM Utilisateurs WHERE UtilisateurID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $scrumMasterID, PDO::PARAM_INT);
        $stmt->execute();
        $scrumMasterDetails = $stmt->fetch(PDO::FETCH_ASSOC);

        // Le reste du code pour afficher le formulaire de modification
        // Utilisez $scrumMasterDetails pour remplir les champs du formulaire
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
        <form action="#">
            <div class="bg-white p-6 rounded-md shadow-md my-4 mx-auto max-w-2xl">
                <h2 class="text-xl font-semibold mb-4">Modifier les donnes de Scrum Master</h2>
        
                <form action="modifier_scrum_master_process.php" method="post" class="space-y-4">

                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" value="<?php echo $scrumMasterDetails['Nom']; ?>" required>

                    <label for="prenom">Prenom :</label>
                    <input type="text" name="prenom" value="<?php echo $scrumMasterDetails['Prenom']; ?>" required>

                    <label for="email">Email :</label>
                    <input type="email" name="email" value="<?php echo $scrumMasterDetails['Email']; ?>" required>

                    <label for="date_naissance">Date de Naissance :</label>
                    <input type="date" name="date_naissance" value="<?php echo $scrumMasterDetails['DateNaissance']; ?>" required>

                    <button type="submit">Enregistrer les modifications</button>
                </form>
            </div>
        </form>
    </div>

</body>
</html>
