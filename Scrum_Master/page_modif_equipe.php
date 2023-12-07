<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $EquipeID = $_GET['id'];

    try {
        $sql = "SELECT * FROM Equipes WHERE EquipeID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $EquipeID, PDO::PARAM_INT);
        $stmt->execute();
        $EquipeDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'Equipe</title>
    <link rel="stylesheet" href="style_add.css">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: linear-gradient(to right, #FF4B2B, #FF416C);">

    <div class="form-container" style="width: 50%">
        <form action="modif_equipe.php" method="post" class="bg-white p-6 rounded-md shadow-md my-4 mx-auto max-w-2xl">
            <h2 class="text-xl font-semibold mb-4">Modifier l'Equipe</h2>
    
            <input type="hidden" name="EquipeID" value="<?php echo $EquipeDetails['EquipeID']; ?>" required>

            <label for="nom">Nom d'Equipe :</label>
            <input type="text" name="nom" value="<?php echo $EquipeDetails['Nom']; ?>" required>

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>

</body>
</html>

