<?php
require_once('../config.php');
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: login.php');
    exit();
}

try {
    // Fetch all teams
    $sqlTeams = "SELECT * FROM Equipes";
    $stmtTeams = $conn->prepare($sqlTeams);
    $stmtTeams->execute();
    $equipes = $stmtTeams->fetchAll(PDO::FETCH_ASSOC);

    // Fetch all projects
    $sqlProjets = "SELECT * FROM Projets";
    $stmtProjets = $conn->prepare($sqlProjets);
    $stmtProjets->execute();
    $projets = $stmtProjets->fetchAll(PDO::FETCH_ASSOC);

    // Fetch all members
    $sqlMembers = "SELECT Utilisateurs.*, Equipes.Nom AS NomEquipe, Projets.Nom AS NomProjet
                   FROM Utilisateurs
                   LEFT JOIN Equipes ON Utilisateurs.EquipeID = Equipes.EquipeID
                   LEFT JOIN Projets ON Utilisateurs.UtilisateurID = Projets.ScrumMasterID";
    $stmtMembers = $conn->prepare($sqlMembers);
    $stmtMembers->execute();
    $utilisateurs = $stmtMembers->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
	<header>
		<div class="bx bx-menu" id="menu-icon"></div>
		<a href="#to" class="logo">DataWare</a>
		<ul class="navbar">
			<li style="list-style-type:none;"><a href="index.php">Home</a></li>
			<li style="list-style-type:none;"><a href="addPage.php">Add</a></li>
			<li style="list-style-type:none;"><a href="profile.php">Profile</a></li>
			<li style="list-style-type:none;"><a href="../sign/logout.php">LogOut</a></li>
		</ul>
	</header>

    <div class="flex-container">
        <div class="flex-slide home">
            <!-- Display teams -->
				<div class="flex-title">Afficher les equipes</div>
				<div class="affichage-des-membres flex-about flex-about-home">
					<div class="container">
						<?php foreach ($equipes as $equipe) : ?>
							<div class="card">
								<div class="content">
									<p><?php echo $equipe['Nom']; ?><br> Scrum Master ID:
										<?php echo $equipe['ScrumMasterID']; ?></p>
									<div class="bottons">
										<a href="page_modif_equipe.php?id=<?php echo $equipe['EquipeID']; ?>" class="edit-btn">M</a>
										<a href="supp_equipe.php?id=<?php echo $equipe['EquipeID']; ?>" class="delete-btn">S</a>
									</div>
								</div>
								<div class="circle">
									<h2><?php echo $equipe['EquipeID']; ?></h2>
									<div class="swiper-container">
										<div class="swiper-wrapper">
											<?php
											// Fetch projects assigned to the team
											$teamProjects = array_filter($projets, function ($projet) use ($equipe) {
												return $projet['EquipeID'] == $equipe['EquipeID'];
											});

											foreach ($teamProjects as $project) : ?>
												<div class="slider-item swiper-slide">
													<div class="slider-item-content">
														<h1><?php echo $project['Nom']; ?></h1>
														<p><?php echo $project['Description']; ?></p>
													</div>
												</div>
											<?php endforeach; ?>
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

		<div class="flex-slide work">
			<!-- Add projects to teams form -->
			<div class="flex-affect" style="color: antiquewhite;">Affecter des projets à des équipes</div>
			<div class="flex-about">
				<form class="contact-form" method="POST" action="assign_projects.php">
					<br>
					<p>Choisir un projet</p>
					<select name="id_projet">
						<?php
						foreach ($projets as $projet) {
							// Check if the project is not assigned to any team
							$isAssigned = $projet['EquipeID'] !== null;

							// Display only projects that are not assigned
							if (!$isAssigned) {
								echo "<option value='" . $projet['ProjetID'] . "'>" . $projet['Nom'] . "</option>";
							}
						}
						?>
					</select>

					<p>Choisir une équipe</p>
					<select name="id_equipe">
						<?php foreach ($equipes as $equipe) : ?>
							<option value="<?php echo $equipe['EquipeID']; ?>"><?php echo $equipe['Nom']; ?></option>
						<?php endforeach; ?>
					</select>

					<p><input type="submit" name="affecter" value="Affecter"></p>
				</form>
			</div>
		</div>



        <div class="flex-slide about">
            <!-- Display members -->
			<div class="flex-title">Afficher les membres</div>
			<div class="flex-about">
				<div class="affichage-des-equipes">
					<div class="container">
						<?php foreach ($utilisateurs as $utilisateur) : ?>
							<div class="card">
								<div class="content">
									<p><?php echo $utilisateur['Nom'] . ' ' . $utilisateur['Prenom']; ?><br>
										<?php echo $utilisateur['Role']; ?></p>
									<div class="bottons">
										<a href="page_modif_membr.php?id=<?php echo $utilisateur['UtilisateurID']; ?>" class="edit-btn">M</a>
										<a href="supp_user.php?id=<?php echo $utilisateur['UtilisateurID']; ?>" class="delete-btn">S</a>
									</div>
								</div>
								<div class="circle">
									<h2><?php echo $utilisateur['UtilisateurID']; ?></h2>
									<div class="swiper-container">
										<div class="swiper-wrapper">
											<div class="slider-item swiper-slide">
												<div class="slider-item-content">
													<h1>Info</h1>
													<p><?php echo $utilisateur['Email']; ?><br><?php echo $utilisateur['DateNaissance']; ?><br>Equipe : <?php echo $utilisateur['NomEquipe']; ?><br></p>
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
	<script  src="./app.js"></script>
	<script  src="./script.js"></script>
</body>

</html>
