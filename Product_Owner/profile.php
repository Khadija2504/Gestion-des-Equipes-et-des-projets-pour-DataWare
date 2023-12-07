<?php
session_start();

if (!isset($_SESSION['data'])) {
    header('Location: login.php');
    exit();
}

require_once('../config.php');

$userID = $_SESSION['data']['UtilisateurID'];

try {
    // Fetch user information
    $sql = "SELECT * FROM Utilisateurs WHERE UtilisateurID = :userID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':userID', $userID);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="./style.css">
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
            <!-- Display user information -->
            <div class="flex-title">Modifier les informations</div>
            <div class="affichage-des-membres flex-about flex-about-home">
                <div class="container">
                    <div class="card">
                        <div class="content"><br>
                            <p>Nom: <?php echo $user['Nom']; ?><br>
                            Prenom: <?php echo $user['Prenom']; ?><br>
                            Email: <?php echo $user['Email']; ?><br>
                            Date de Naissance: <?php echo $user['DateNaissance']; ?><br>
                            Rôle: <?php echo $user['Role']; ?></p><br>
                            <div class="bottons"><br>
                                <a href="#">M</a>
                                <a href="#">S</a>
                            </div>
                        </div>
                        <div class="circle">
                            <h2><?php echo $user['UtilisateurID']; ?></h2>
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="slider-item swiper-slide">
                                        <div class="slider-item-content">
                                        <h1>Description</h1>
                                        <p>Discover the breathtaking landscapes, rich history, and delectable cuisine of Italy in this mesmerizing journey.</p>
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
                </div>
            </div>
        </div>

        <div class="flex-slide about">
            <!-- Modify user information -->
            <div class="flex-title">Modifier les informations</div>
            <div class="flex-about">
                <form action="update_profile.php" method="post">
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom" value="<?php echo $user['Nom']; ?>" required>

                    <label for="prenom">Prenom :</label>
                    <input type="text" name="prenom" value="<?php echo $user['Prenom']; ?>" required>

                    <label for="email">Email :</label>
                    <input type="email" name="email" value="<?php echo $user['Email']; ?>" required>

                    <label for="date_naissance">Date de Naissance :</label>
                    <input type="date" name="date_naissance" value="<?php echo $user['DateNaissance']; ?>" required>

                    <input type="submit" value="Enregistrer les modifications">
                </form>
            </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
	<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/769286/jquery.waitforimages.min.js'></script>\
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.5/swiper-bundle.min.js'></script>
	<script  src="./app.js"></script>
	<script  src="./script.js"></script>

</body>

</html>
