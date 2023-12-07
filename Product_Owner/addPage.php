<!DOCTYPE html>
<html lang="en">

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
            <li style="list-style-type:none;"><a href="profile.php">Profiel</a></li>
            <li style="list-style-type:none;"><a href="../sign/logout.php">LogOut</a></li>
        </ul>
    </header>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="ajouter_projet.php" method="post" class="bg-white p-6 rounded-md shadow-md my-4 mx-auto max-w-2xl">
                <h2 class="text-xl font-semibold mb-4">Ajouter un Projet</h2>

                <label for="nomProjet" class="block text-sm font-medium text-gray-700">Nom Projet :</label>
                <input type="text" id="nomProjet" name="nomProjet" class="w-full border p-2 rounded-md">

                <label for="idScrumMaster" class="block text-sm font-medium text-gray-700">ID de Scrum Master :</label>
                <input type="text" id="idScrumMaster" name="idScrumMaster" class="w-full border p-2 rounded-md">

                <label for="description" class="block text-sm font-medium text-gray-700">Description de projet :</label>
                <input type="text" id="description" name="description" class="w-full border p-2 rounded-md">

                <label for="equipeID" class="block text-sm font-medium text-gray-700">ID de l'equipe :</label>
                <input type="text" id="equipeID" name="equipeID" class="w-full border p-2 rounded-md">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter Projet</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="ajouter_scrum_master.php" method="post" class="bg-white p-6 rounded-md shadow-md my-4 mx-auto max-w-2xl">
                <h2 class="text-xl font-semibold mb-4">Ajouter un Scrum Master</h2>

                <label for="nomScrumMaster" class="block text-sm font-medium text-gray-700">Nom :</label>
                <input type="text" id="nomScrumMaster" name="nomScrumMaster" class="w-full border p-2 rounded-md">

                <label for="prenomScrumMaster" class="block text-sm font-medium text-gray-700">Prénom :</label>
                <input type="text" id="prenomScrumMaster" name="prenomScrumMaster" class="w-full border p-2 rounded-md">

                <label for="emailScrumMaster" class="block text-sm font-medium text-gray-700">Email :</label>
                <input type="email" id="emailScrumMaster" name="emailScrumMaster" class="w-full border p-2 rounded-md">

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ajouter Scrum Master</button>
            </form>
        </div>

        <div class="overlay-container">
		<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Ajouter un nouveau Scrum Master !</h1>
					<p>Pour rester connecté avec nous, veuillez vous connecter avec vos informations personnelles</p>
					<button class="ghost" id="signIn">Add</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Créer un nouveau Projet !</h1>
					<p>Entrez vos coordonnées personnelles et commencez votre voyage avec nous</p>
					<button class="ghost" id="signUp">Add</button>
				</div>
			</div>
        </div>
    </div>

    <script src="./script_add.js"></script>
</body>

</html>
