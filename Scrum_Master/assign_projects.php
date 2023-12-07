<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_projet = $_POST['id_projet'];
    $id_equipe = $_POST['id_equipe'];

    // Check if the project is not already assigned to any team
    $sqlCheckAssignment = "SELECT * FROM Projets WHERE ProjetID = :id_projet AND EquipeID IS NOT NULL";
    $stmtCheckAssignment = $conn->prepare($sqlCheckAssignment);
    $stmtCheckAssignment->bindParam(':id_projet', $id_projet, PDO::PARAM_INT);
    $stmtCheckAssignment->execute();

    if ($stmtCheckAssignment->rowCount() == 0) {
        // Assign the project to the team
        $sqlAssignProject = "UPDATE Projets SET EquipeID = :id_equipe WHERE ProjetID = :id_projet";
        $stmtAssignProject = $conn->prepare($sqlAssignProject);
        $stmtAssignProject->bindParam(':id_projet', $id_projet, PDO::PARAM_INT);
        $stmtAssignProject->bindParam(':id_equipe', $id_equipe, PDO::PARAM_INT);
        $stmtAssignProject->execute();

        // Redirect to the main page after assignment
        header('Location: index.php');
        exit();
    } else {
        echo "Le projet est déjà affecté à une équipe.";
        // Handle the case where the project is already assigned to a team
    }
} else {
    // Redirect to the main page if the form is not submitted correctly
    header('Location: index.php');
    exit();
}
?>
