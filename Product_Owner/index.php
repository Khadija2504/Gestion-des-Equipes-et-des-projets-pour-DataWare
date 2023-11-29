<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Product Owner </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="./style.css">
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
	<div class="flex-container">
		<div class="flex-slide home">
			<div class="flex-title flex-title-home">Afficher les projets</div>
			<div class="affichage-des-membres flex-about flex-about-home">
				<div class="container">
					<div class="card">
						<div class="content">
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, perspiciatis mollitia ducimus
								consequuntur harum aspernatur?</p>
								<div class="bottons">
									<a href="#"> M </a>
								    <a href="#">S</a>
								</div>
						</div>
						<div class="circle">
							<h2>01</h2>
							<div class="swiper-container">
								<div class="swiper-wrapper">
								<div class="slider-item swiper-slide">
									<div class="slider-item-content">
									<h1>Exploring Italy's Beauty</h1>
									<p>Discover the breathtaking landscapes, rich history, and delectable cuisine of Italy in this mesmerizing journey.</p>
									</div>
								</div>
								<div class="slider-item swiper-slide">
									<div class="slider-item-content">
									<h1>Exploring Hidden Bunkers</h1>
									<p>Uncover the secrets of underground bunkers and their historical significance in this thrilling adventure.</p>
									</div>
								</div>
								<div class="slider-item swiper-slide">
									
									<div class="slider-item-content">
									<h1>Scaling Small Mountains</h1>
									<p>Embark on an adventurous journey to conquer the challenging peaks of small mountains and embrace the thrill of the climb.</p>
									</div>
								</div>
								<div class="slider-item swiper-slide">
									
									<div class="slider-item-content">
									<h1>Walking On a Dream</h1>
									<p>Experience the dreamlike landscapes and surreal beauty of distant lands in this enchanting expedition.</p>
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
			<div class="flex-title">aficher les Scrum Master</div>
			<div class="flex-about"><div class="affichage-des-equipes">
				<div class="container">
					<div class="card">
						<div class="content">
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, perspiciatis mollitia ducimus
								consequuntur harum aspernatur?</p>
								<div class="bottons">
									<a href="#"> M </a>
								    <a href="#">S</a>
								</div>
						</div>
						<div class="circle">
							<h2>01</h2>
							<div class="swiper-container">
								<div class="swiper-wrapper">
								<div class="slider-item swiper-slide">
									<div class="slider-item-content">
									<h1>Exploring Italy's Beauty</h1>
									<p>Discover the breathtaking landscapes, rich history, and delectable cuisine of Italy in this mesmerizing journey.</p>
									</div>
								</div>
								<div class="slider-item swiper-slide">
									<div class="slider-item-content">
									<h1>Exploring Hidden Bunkers</h1>
									<p>Uncover the secrets of underground bunkers and their historical significance in this thrilling adventure.</p>
									</div>
								</div>
								<div class="slider-item swiper-slide">
									
									<div class="slider-item-content">
									<h1>Scaling Small Mountains</h1>
									<p>Embark on an adventurous journey to conquer the challenging peaks of small mountains and embrace the thrill of the climb.</p>
									</div>
								</div>
								<div class="slider-item swiper-slide">
									
									<div class="slider-item-content">
									<h1>Walking On a Dream</h1>
									<p>Experience the dreamlike landscapes and surreal beauty of distant lands in this enchanting expedition.</p>
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
		</div>
	</div>

	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
	<script src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/769286/jquery.waitforimages.min.js'></script>\
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.5/swiper-bundle.min.js'></script>
	<script  src="./app.js"></script>
	<script  src="./script.js"></script>

</body>
</html>
