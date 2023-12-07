
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
			<li style="list-style-type:none;"><a href="profile.php">Profiel</a></li>
			<li style="list-style-type:none;"><a href="../dist/sign.html">LogOut</a></li>
		</ul>
	</header>
	<div class="container" id="container">
		<!-- Form for adding a team -->
		<div class="form-container sign-up-container">
			<form action="ajouter_equipe.php" method="post" class="space-y-4">
				<h2 class="text-xl font-semibold mb-4">Ajouter une Équipe</h2>
				<label for="nomEquipe" class="block text-sm font-medium text-gray-700">Nom Équipe :</label>
				<input type="text" id="nomEquipe" name="nomEquipe" class="w-full border p-2 rounded-md">
				
				<label for="idScrumMaster" class="block text-sm font-medium text-gray-700">ID de Scrum master :</label>
				<input type="text" id="idScrumMaster" name="idScrumMaster" class="w-full border p-2 rounded-md">

				<button type="submit" name="addEquipe" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter Équipe</button>
			</form>
		</div>

		<!-- Form for adding a member -->
		<div class="form-container sign-in-container">
			<form action="ajouter.php" method="post" class="space-y-4">
				<h2 class="text-xl font-semibold mb-4">Ajouter un Membre</h2>
				<label for="nomMembre" class="block text-sm font-medium text-gray-700">Nom :</label>
				<input type="text" id="nomMembre" name="nomMembre" class="w-full border p-2 rounded-md">
				
				<label for="prenomMembre" class="block text-sm font-medium text-gray-700">Prénom :</label>
				<input type="text" id="prenomMembre" name="prenomMembre" class="w-full border p-2 rounded-md">
				
				<label for="emailMembre" class="block text-sm font-medium text-gray-700">Email :</label>
				<input type="email" id="emailMembre" name="emailMembre" class="w-full border p-2 rounded-md">
				
				<label for="equipeMembre" class="block text-sm font-medium text-gray-700">ID Équipe :</label>
				<input type="text" id="equipeMembre" name="equipeMembre" class="w-full border p-2 rounded-md">

				<label for="dateNaissanceMembre" class="block text-sm font-medium text-gray-700">Date de naissance de membre :</label>
				<input type="date" id="dateNaissanceMembre" name="dateNaissanceMembre" class="w-full border p-2 rounded-md">

				<button type="submit" name="addMember" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter Membre</button>
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
