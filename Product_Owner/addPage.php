<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Add</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="./style_add.css">

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
					<h2 class="text-xl font-semibold mb-4">Ajouter un Projet</h2>
			
					<form action="ajouter.php" method="post" class="space-y-4">
						<label for="nomEquipe" class="block text-sm font-medium text-gray-700">Nom Projet :</label>
						<input type="text" id="nomEquipe" name="nomEquipe" class="w-full border p-2 rounded-md">

						<label for="nomEquipe" class="block text-sm font-medium text-gray-700">L'Objectif D'Projet :</label>
						<input type="text" id="nomEquipe" name="nomEquipe" class="w-full border p-2 rounded-md">
			
						<label for="idEquipe" class="block text-sm font-medium text-gray-700">ID Projet :</label>
						<input type="text" id="idEquipe" name="idEquipe" class="w-full border p-2 rounded-md">

						<label for="idEquipe" class="block text-sm font-medium text-gray-700">ID de Scrum Master :</label>
						<input type="text" id="idEquipe" name="idEquipe" class="w-full border p-2 rounded-md">
			
						<label for="dateCreation" class="block text-sm font-medium text-gray-700">Date de Création :</label>
						<input type="date" id="dateCreation" name="dateCreation" class="w-full border p-2 rounded-md">
			
						<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter Projet</button>
					</form>
				</div>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="#">
				<div class="bg-white p-6 rounded-md shadow-md my-4 mx-auto max-w-2xl">
					<h2 class="text-xl font-semibold mb-4">Assigner des Scrum Master a des projets</h2>
			
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
			
						<label for="equipeMembre" class="block text-sm font-medium text-gray-700">ID de projet assigner :</label>
						<input type="text" id="equipeMembre" name="equipeMembre" class="w-full border p-2 rounded-md">
			
						<label for="statutMembre" class="block text-sm font-medium text-gray-700">Statut :</label>
						<input type="text" id="statutMembre" name="statutMembre" class="w-full border p-2 rounded-md">
			
						<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter Scrum Master</button>
					</form>
				</div>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Add a new Scrum Master!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Add</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Create a new Project!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" id="signUp">Add</button>
				</div>
			</div>
		</div>
	</div>
  <script  src="./script_add.js"></script>

</body>
</html>
