<?php include "../functions/dashboard_stats.php";
include "../settings/connection.php";
include "../settings/core.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Cars | ExotiqueCR</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
		rel="stylesheet">

	<link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
	<link rel="stylesheet" href="../css/animate.css">

	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<link rel="stylesheet" href="../css/aos.css">

	<link rel="stylesheet" href="../css/ionicons.min.css">

	<link rel="stylesheet" href="../css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="../css/jquery.timepicker.css">


	<link rel="stylesheet" href="../css/flaticon.css">
	<link rel="stylesheet" href="../css/icomoon.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/car_listings.css">
	<link rel="stylesheet" href="../css/dropdown.css">

</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
		<div class="container">
			<a class="navbar-brand" href="index.php">EXO<span>TIQUE</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
				aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="oi oi-menu"></span> Menu
			</button>

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
					<li class="nav-item active"><a href="car.php" class="nav-link">Cars</a></li>
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
					<?php navBarElements(); ?>
				</ul>
			</div>
		</div>
	</nav>

	<section class="hero-wrap hero-wrap-2 js-fullheight"
		style="background-image: url('../images/pexels-pixabay-164634.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
				<div class="col-md-9 ftco-animate pb-5">
					<p class="breadcrumbs"><span class="mr-2"><a href="landingpage.php">Home <i
									class="ion-ios-arrow-forward"></i></a></span>
						<span>Cars
							<i class="ion-ios-arrow-forward"></i></span>
					</p>
					<h1 class="mb-3 bread">Choose Your Car</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<form name="sortFilterForm" id="sortFilterForm" action="../view/car.php" method="GET">
						<div class="sidebar">
							<h3>Sort and Filter</h3>
							<div>
								<label for="sort">Sort Price By:</label>
								<select id="sort" name="sort">
									<option value="">Select Sort</option>
									<option value="price_low">Price: Low to High</option>
									<option value="price_high">Price: High to Low</option>
								</select>
							</div>
							<div>
								<label for="make">Make:</label>
								<select id="make" name="make">
									<option value="">Select Make</option>
									<?php selectMake() ?>
								</select>
							</div>
							<div>
								<label for="year">Year:</label>
								<input id="year" name="year" type="number" min=1900 max=<?php echo date('Y') ?>>
							</div>

							<div>
								<label for="cartype">Car Type:</label>
								<select id="cartype" name="cartype">
									<option value="">Select Car Type</option>
									<?php selectCarType() ?>
								</select>
							</div>
							<div>
								<label for="transmission">Transmission:</label>
								<select id="transmission" name="transmission">
									<option value="">Select Transmission</option>
									<?php selectTransmission() ?>
								</select>
							</div>
							<div>
								<label for="fueltype">Fuel:</label>
								<select id="fueltype" name="fueltype">
									<option value="">Select Fuel Type</option>
									<?php selectFuelType() ?>
								</select>
							</div>
							<div>
								<label for="capacity">Capacity:</label>
								<select id="capacity" name="capacity">
									<option value="">Select Capacity</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="6">6</option>
									<option value="8">8</option>
									<option value="10">10</option>
								</select>
							</div>
							<button type="submit">Apply Filters</button>
						</div>
					</form>
				</div>
				<div class="col-md-9">
					<div class="row">
						<?php include "../actions/search_car_action.php" ?>
					</div>
					<!-- <div class="row mt-5">
						<div class="col text-center">
							<div class="block-27">
								<ul class="pagination">
									<li class="page-item"><a class="page-link" href="#">&lt;</a></li>
									<li class="page-item active"><span class="page-link">1</span></li>
									<li class="page-item"><a class="page-link" href="#">2</a></li>
									
									<li class="page-item"><a class="page-link" href="#">&gt;</a></li>
								</ul>
							</div>
						</div>
					</div> -->
				</div>
			</div>
		</div>
	</section>

	<footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
			<div class="row mb-5">
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2"><a href="landingpage.php" class="logo">Exo<span>tique</span></a></h2>
						<p>Experience the
							epitome of automotive excellence with us, and let us turn your ordinary moments into
							extraordinary
							memories.</p>
						<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
							<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4 ml-md-5">
						<h2 class="ftco-heading-2">Information</h2>
						<ul class="list-unstyled">
							<li><a href="about.php" class="py-2 d-block">About</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Customer Support</h2>
						<ul class="list-unstyled">
							<li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain
										View, San
										Francisco, California, USA</span></li>
								<li><a href="contact.php"><span class="icon icon-phone"></span><span class="text">+2 392
											3929
											210</span></a></li>
								<li><a href="contact.php"><span class="icon icon-envelope"></span><span
											class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">

					<p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;
						<script>document.write(new Date().getFullYear());</script> All rights reserved | This template
						is made with
						<i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com"
							target="_blank">Colorlib</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>



	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" />
		</svg></div>


	<script src="../js/jquery.min.js"></script>
	<script src="../js/jquery-migrate-3.0.1.min.js"></script>
	<script src="../js/popper.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/jquery.waypoints.min.js"></script>
	<script src="../js/jquery.stellar.min.js"></script>
	<script src="../js/owl.carousel.min.js"></script>
	<script src="../js/jquery.magnific-popup.min.js"></script>
	<script src="../js/aos.js"></script>
	<script src="../js/jquery.animateNumber.min.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
	<script src="../js/jquery.timepicker.min.js"></script>
	<script src="../js/scrollax.min.js"></script>
	<script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="../js/google-map.js"></script>
	<script src="../js/main.js"></script>

</body>

</html>