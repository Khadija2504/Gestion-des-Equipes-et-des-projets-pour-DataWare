<?php

session_start();
require_once('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $motDePasse = $_POST['motDePasse'];

    $sql = "SELECT MotDePasse FROM Utilisateurs WHERE Nom = :nom";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':nom', $nom);
	$stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result && password_verify($motDePasse, $result['MotDePasse'])) {
        $_SESSION['nom'] = $nom;
        $_SESSION['data'] = $user;

        echo "Authentification réussie. Bienvenue, $nom!";
    } else {
        echo "Invalid username or password";
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
		<form action="#" method="POST">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" placeholder="Name" name="nom" />
			<input type="text" placeholder="Role" />
			<input type="password" placeholder="Password" name="motDePasse" />
			<button><a href="../Scrum_Master/dashboard/index.php">Sign Up</a></button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="text" placeholder="name" name="nom" />
			<input type="password" placeholder="Password" name="motDePasse" />
			<a href="#">Forgot your password?</a>
			<button name="submit" type="submit">Sign In</button>
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
