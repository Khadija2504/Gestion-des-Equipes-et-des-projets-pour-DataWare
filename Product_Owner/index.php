<?php
require_once('../config.php');
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: login.php');
    exit();
}

try {
    // Fetch all projects
    $sqlProjects = "SELECT * FROM Projets";
    $stmtProjects = $conn->prepare($sqlProjects);
    $stmtProjects->execute();
    $projets = $stmtProjects->fetchAll(PDO::FETCH_ASSOC);

    // Fetch all Scrum Masters
    $sqlScrumMasters = "SELECT * FROM Utilisateurs WHERE Role = 'ScrumMaster'";
    $stmtScrumMasters = $conn->prepare($sqlScrumMasters);
    $stmtScrumMasters->execute();
    $scrumMasters = $stmtScrumMasters->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Owner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./style.css">
    <!-- Add your additional CSS links if needed -->
</head>

<body>
    <header>
        <div class="bx bx-menu" id="menu-icon"></div>
        <a href="#to" class="logo">DataWare</a>
        <ul class="navbar">
            <li style="list-style-type:none;"><a href="index.php">Home</a></li>
            <li style="list-style-type:none;"><a href="addPage.php">Add</a></li>
            <li style="list-style-type:none;"><a href="profile.php">Profiel</a></li>
            <li style="list-style-type:none;"><a href="../sign/logout.php">LogOut</a></li>
        </ul>
    </header>

    <div class="flex-container">
        <div class="flex-slide home">
		<div class="flex-title">Afficher les projets</div>
            <div class="affichage-des-membres flex-about flex-about-home">
                <div class="container">
                    <?php foreach ($projets as $projet) : ?>
                        <div class="card">
                            <div class="content">
                                <p><?php echo $projet['Nom']; ?><br><b> Scrum Master ID : </b><?php echo $projet['ScrumMasterID']; ?><br> <b>Equipe ID : </b><?php echo $projet['EquipeID']; ?></p>
                                <div class="bottons">
									<a href="modifier_projet.php?id=<?php echo $projet['ProjetID']; ?>" class="edit-btn">M</a>
                                    <a href="supprimer_projet.php?id=<?php echo $projet['ProjetID']; ?>" class="delete-btn">S</a>
                                </div>
                            </div>
                            <div class="circle">
                                <h2><?php echo $projet['ProjetID']; ?></h2>
                                
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="slider-item swiper-slide">
                                            <div class="slider-item-content">
                                                <h1>lorem 1</h1>
                                                <p>Discover the breathtaking landscapes, rich history, and delectable cuisine of Italy in this mesmerizing journey.</p>
                                            </div>
                                        </div>
                                        <div class="slider-item swiper-slide">
                                            <div class="slider-item-content">
                                                <h1>lorem 2</h1>
                                                <p>Uncover the secrets of underground bunkers and their historical significance in this thrilling adventure.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slider-buttons">
                                        <button class="swiper-button-prev">Prev</button>
                                        <button class="swiper-button-next">Next</button>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="flex-slide about">
            <div class="flex-title">Afficher les Scrum Master</div>
            <div class="flex-about">
                <div class="affichage-des-equipes">
                    <div class="container">
                        <?php foreach ($scrumMasters as $scrumMaster) : ?>
                            <div class="card">
                                <div class="content">
                                    <p><?php echo $scrumMaster['Nom'] . ' ' . $scrumMaster['Prenom']; ?><br>
                                        <?php echo $scrumMaster['Role']; ?><br></p>
                                    <div class="bottons">
										<a href="modifier_scrum_master.php?id=<?php echo $scrumMaster['UtilisateurID']; ?>" class="edit-btn">M</a>
										<a href="supprimer_scrum_master.php?id=<?php echo $scrumMaster['UtilisateurID']; ?>" class="delete-btn">S</a>
                                    </div>
                                </div>
                                <div class="circle">
                                    <h2><?php echo $scrumMaster['UtilisateurID']; ?></h2>
                                    <!-- Add your Scrum Master details here -->
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <div class="slider-item swiper-slide">
                                                <div class="slider-item-content">
                                                    <h1>Info</h1>
                                                    <p> <b>Prenom: </b><?php echo $scrumMaster['Prenom']; ?><br>
														<b>Email: </b><?php echo $scrumMaster['Email']; ?><br>
														<b>Date de Naissance: </b><?php echo $scrumMaster['DateNaissance']; ?><br>
													</p>
                                                </div>
                                            </div>
                                            <div class="slider-item swiper-slide">
                                                <div class="slider-item-content">
                                                    <h1>lorem 2</h1>
                                                    <p>Uncover the secrets of underground bunkers and their historical significance in this thrilling adventure.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider-buttons">
                                            <button class="swiper-button-prev">Prev</button>
                                            <button class="swiper-button-next">Next</button>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
    <script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/769286/jquery.waitforimages.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.5/swiper-bundle.min.js'></script>
    <script src="./app.js"></script>
    <script src="./script.js"></script>
	<script>
		function confirmDelete() {
			return confirm("Êtes-vous sûr de vouloir supprimer ce Scrum Master ?");
		}
    </script>

</body>

</html>
