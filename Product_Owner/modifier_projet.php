<?php
// modifier_projet.php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $projetID = $_GET['id'];

    try {
        // Récupérer les détails du projet à modifier
        $sql = "SELECT * FROM Projets WHERE ProjetID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $projetID, PDO::PARAM_INT);
        $stmt->execute();
        $projetDetails = $stmt->fetch(PDO::FETCH_ASSOC);

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
    <title>Modifier le projet</title>
    <link rel="stylesheet" href="style_add.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="form-container" style="width: 50%">
        <form action="modifier_projet_process.php" method="post" class="bg-white p-6 rounded-md shadow-md my-4 mx-auto max-w-2xl">
            <h2 class="text-xl font-semibold mb-4">Modifier le projet</h2>
    
            <input type="hidden" name="projetID" value="<?php echo $projetDetails['ProjetID']; ?>" required>

            <label for="nom">Nom du projet :</label>
            <input type="text" name="nom" value="<?php echo $projetDetails['Nom']; ?>" required>

            

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>

</body>
</html>
