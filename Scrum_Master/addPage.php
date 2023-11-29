
<?php
require_once('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset(
            $_POST['idMember'],
            $_POST['nomMembre'],
            $_POST['prenomMembre'],
            $_POST['emailMembre'],
            $_POST['telephoneMembre'],
            $_POST['roleMembre'],
            $_POST['equipeMembre'],
            $_POST['statutMembre']
        )
    ) {
        $idMembre = $_POST['idMember'];
        $nomMembre = $_POST['nomMembre'];
        $prenomMembre = $_POST['prenomMembre'];
        $emailMembre = $_POST['emailMembre'];
        $telephoneMembre = $_POST['telephoneMembre'];
        $roleMembre = $_POST['roleMembre'];
        $equipeMembre = $_POST['equipeMembre'];
        $statutMembre = $_POST['statutMembre'];

        $requete = $connexion->prepare(
            "INSERT INTO membre (Id, Nom, Prenom, Email, Telephone, Role, ID_Equipe, Statut) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $requete->execute([$idMembre, $nomMembre, $prenomMembre, $emailMembre, $telephoneMembre, $roleMembre, $equipeMembre, $statutMembre]);

        header('Location: index.php');
        echo 'Membre ajouté avec succès!';
    }

    if (isset($_POST['nomEquipe'], $_POST['idEquipe'], $_POST['dateCreation'])) {
        $nomEquipe = $_POST['nomEquipe'];
        $idEquipe = $_POST['idEquipe'];
        $dateCreation = $_POST['dateCreation'];

        $requete = $connexion->prepare("INSERT INTO equipe (ID_Equipe, Nom_Equipe, Date_Creation) VALUES (?, ?, ?)");
        $requete->execute([$idEquipe, $nomEquipe, $dateCreation]);

        header('Location: index.php');
        echo 'Équipe ajoutée avec succès!';
    }
}

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="style_add.css">
  <style>
	header{
		position: fixed;
		background-color:#0f0f0f;
		top: 0;
		right: 10px;
		width: 100%;
		z-index: 1000;
		display: flex;
		align-items: center;
		justify-content: space-between;
		padding: 10px 10%;
		transition: ease .40s;
		height: 70px;
	}
	header .logo{
		letter-spacing: 1px;
	color:#ff5741;
	font-weight: 700;
	position: relative;
	top: 20;
	height: 50px;
	font-size: 50px;
	text-decoration: none;
	left: 10px;
	}
	.navbar{
		display: flex;
	}
	.navbar a{
		color: #fff;
		font-size: 2.1rem;
		font-weight: 500;
	margin-left: 20px;
		padding: 5px 12px;
	margin-bottom: 10px;
		border-radius: 4px;
		transition: ease .40s; 
	text-decoration: none;  
	list-style:none;  
	}
	.navbar a:hover{
		
		color: rgb(9, 10, 10);
	background-color: #fff;
		box-shadow: 5px 10px 30px rgb(85 85 85 / 20%);
		border-radius: 4px;
	}
	#menu-icon{
		color: #fff;
		font-size: 35px;
		z-index: 10001;
		cursor: pointer;
		display: none;
	}
  </style>

</head>
<body>
	<header>
		<div class="bx bx-menu" id="menu-icon"></div>
		<a href="#to" class="logo">DataWare</a>
		<ul class="navbar">
			<li style="list-style-type:none;"><a href="index.php">Home</a></li>
			<li style="list-style-type:none;"><a href="addPage.php">Add</a></li>
			<li style="list-style-type:none;"><a href="profiel.php">Profiel</a></li>
			<li style="list-style-type:none;"><a href="../dist/sign.html">LogOut</a></li>
		</ul>
	</header>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="#">
				<div class="bg-white p-6 rounded-md shadow-md my-4 mx-auto max-w-2xl">
					<h2 class="text-xl font-semibold mb-4">Ajouter un Équipe</h2>
			
					<form action="ajouter.php" method="post" class="space-y-4">
						<label for="nomEquipe" class="block text-sm font-medium text-gray-700">Nom Équipe :</label>
						<input type="text" id="nomEquipe" name="nomEquipe" class="w-full border p-2 rounded-md">

						<label for="nomEquipe" class="block text-sm font-medium text-gray-700">L'Objectif D'Équipe :</label>
						<input type="text" id="nomEquipe" name="nomEquipe" class="w-full border p-2 rounded-md">
			
						<label for="idEquipe" class="block text-sm font-medium text-gray-700">ID Équipe :</label>
						<input type="text" id="idEquipe" name="idEquipe" class="w-full border p-2 rounded-md">

						<label for="idEquipe" class="block text-sm font-medium text-gray-700">ID de projet affecter :</label>
						<input type="text" id="idEquipe" name="idEquipe" class="w-full border p-2 rounded-md">
			
						<label for="dateCreation" class="block text-sm font-medium text-gray-700">Date de Création :</label>
						<input type="date" id="dateCreation" name="dateCreation" class="w-full border p-2 rounded-md">
			
						<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter Équipe</button>
					</form>
				</div>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="#">
				<div class="bg-white p-6 rounded-md shadow-md my-4 mx-auto max-w-2xl">
					<h2 class="text-xl font-semibold mb-4">Ajouter un Membre</h2>
			
					<form action="ajouter.php" method="post" class="space-y-4">
					<label for="idMembre" class="block text-sm font-medium text-gray-700">Id :</label>
						<input type="text" id="idMembre" name="idMembre" class="w-full border p-2 rounded-md">
			
						<label for="nomMembre" class="block text-sm font-medium text-gray-700">Nom :</label>
						<input type="text" id="nomMembre" name="nomMembre" class="w-full border p-2 rounded-md">
			
						<label for="prenomMembre" class="block text-sm font-medium text-gray-700">Prénom :</label>
						<input type="text" id="prenomMembre" name="prenomMembre" class="w-full border p-2 rounded-md">
			
						<label for="emailMembre" class="block text-sm font-medium text-gray-700">Email :</label>
						<input type="email" id="emailMembre" name="emailMembre" class="w-full border p-2 rounded-md">
			
						<label for="telephoneMembre" class="block text-sm font-medium text-gray-700">Téléphone :</label>
						<input type="tel" id="telephoneMembre" name="telephoneMembre" class="w-full border p-2 rounded-md">
			
						<label for="equipeMembre" class="block text-sm font-medium text-gray-700">ID Équipe :</label>
						<input type="text" id="equipeMembre" name="equipeMembre" class="w-full border p-2 rounded-md">
			
						<label for="statutMembre" class="block text-sm font-medium text-gray-700">Statut :</label>
						<input type="text" id="statutMembre" name="statutMembre" class="w-full border p-2 rounded-md">
			
						<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter Membre</button>
					</form>
				</div>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Add a new membre!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Add</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Create a new team!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Add</button>
				</div>
			</div>
		</div>
	</div>
	<script  src="./script_add.js"></script>

</body>
</html>
