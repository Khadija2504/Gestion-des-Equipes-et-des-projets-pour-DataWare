<?php
session_start();

// if (!isset($_SESSION['nom'])) {
//     header("Location: login.php");
//     exit();
// }

$servername = "localhost";
$username = "root";
$password = '';
$dbname = "datawaresys";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM Utilisateurs";
    $result = $conn->query($sql);

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
</head>
<body>
    <h2>Bienvenue, <?php echo $_SESSION['nom']; ?>, sur le Tableau de Bord</h2>
    
    <h3>Liste des Utilisateurs</h3>
    
    <?php
    if ($result->rowCount() > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nom</th><th>Prenom</th><th>Email</th><th>DateNaissance</th><th>role</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>" . $row["UtilisateurID"] . "</td><td>" . $row["Nom"] . "</td><td>" . $row["Prenom"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["DateNaissance"] . "</td><td>" . $row["Role"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun utilisateur trouvé.";
    }
    ?>
    
    <br>
    
</body>
</html>
