<?php
require_once('../config.php');
session_start();

// Traitement de l'inscription
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $dateNaissance = $_POST['dateNaissance'];
    $motDePasse = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    try {
        $sql = "INSERT INTO Utilisateurs (Nom, Prenom, Email, DateNaissance, MotDePasse, Role) VALUES (:nom, :prenom, :email, :dateNaissance, :motDePasse, :role)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dateNaissance', $dateNaissance);
        $stmt->bindParam(':motDePasse', $motDePasse);
        $stmt->bindParam(':role', $role);

        $stmt->execute();

        echo "Inscription réussie !";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}

// Traitement de la connexion
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $nom = $_POST['loginNom'];
    $motDePasse = $_POST['loginMotDePasse'];

    try {
        $sql = "SELECT * FROM Utilisateurs WHERE Nom = :nom";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (count($result) > 0 && password_verify($motDePasse, $result['MotDePasse'])) {
            $_SESSION['data'] = $result;

            // Redirection en fonction du rôle
            if ($_SESSION['data']['Role'] == 'ProductOwner') {
                header('Location: ../Product_Owner/index.php');
                exit();
            } elseif ($_SESSION['data']['Role'] == 'ScrumMaster') {
                header('Location: ../Scrum_Master/index.php');
                exit();
            } else {
                header('Location: ../membre/index.php');
                exit();
            }
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Sign in/up Form</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			<h1>Create Account</h1>
			
			<input type="text" name="nom" placeholder="Nom" required>

			<input type="text" name="prenom" placeholder="Prenom" required>

			<input type="email" name="email" placeholder="Email" required>

			<input type="date" name="dateNaissance" placeholder="Date de naissance" required>

			<input type="password" name="motDePasse" placeholder="Mot de passe" required>
			<select class="select" name="role" required>
				<option value="" selected disabled >Role</option>
				<option value="member">Membre</option>
				<option value="ProductOwner">Product Owner</option>
				<option value="ScrumMaster">Scrum Master</option>
			</select>

			<button type="submit" name="register">S'inscrire</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="text" name="loginNom" placeholder="Nom" required>

			<input type="password" name="loginMotDePasse" placeholder="Mo de passe" required>

			<button type="submit" name="login">Se Connecter</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
  <script  src="./script.js"></script>

</body>
</html>
