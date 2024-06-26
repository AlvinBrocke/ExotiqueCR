<?php
include "../functions/dashboard_stats.php";
include "../settings/core.php";
checkUserRoleRedirect();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../css/dashboard.css">
	<link rel="stylesheet" href="../css/style.css">

	<title>Admin Dashboard | Exotique</title>
</head>

<body>
	<section id="sidebar">
		<a href="../view/landingpage.php" class="brand">
			<i class='bx bxs-car'></i>
			<span class="text">EXOTIQUE</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="dashboard.php">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="bookings.php">
					<i class='bx bxs-book'></i>
					<span class="text">Bookings</span>
				</a>
			</li>
			<li>
				<a href="booking-history.php">
					<i class='bx bx-history'></i>
					<span class="text">Booking History</span>
				</a>
			</li>
			<li>
				<a href="brands.php">
					<i class='bx bxs-tag'></i>
					<span class="text">Brands</span>
				</a>
			</li>
			<li>
				<a href="bodytype.php">
					<i class='bx bxs-car-mechanic'></i>
					<span class="text">Vehicle Type</span>
				</a>
			</li>
			<li>
				<a href="cars.php">
					<i class='bx bxs-car'></i>
					<span class="text">Cars</span>
				</a>
			</li>
			<li>
				<a href="users.php">
					<i class='bx bx-user'></i>
					<span class="text">Admin/Users</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="settings.php">
					<i class='bx bxs-cog'></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="../login/logout.php" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<section id="content">
		<nav>
			<i class='bx bx-menu'></i>
			<!-- <a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<a href="#" class="notification">
				<i class='bx bxs-bell'></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="../images/people.png">
			</a> -->
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<ul class="breadcrumb">
						<li>
							<a href="dashboard.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right'></i></li>
						<li>
							<a class="active" href="dashboard.php">Home</a>
						</li>
					</ul>
				</div>
			</div>

			<ul class="box-info">
				<li>
					<a href="bookings.php"><i class='bx bxs-calendar-check'></i></a> <!-- Icon for Total Bookings -->
					<span class="text">
						<h3>
							<?php echo $bookingsCount ?>
						</h3>
						<p>Bookings</p>
					</span>
				</li>
				<li>
					<a href="brands.php"><i class='bx bxs-group'></i></a> <!-- Icon for Brands -->
					<span class="text">
						<h3>
							<?php echo $brandsCount ?>
						</h3>
						<p>Brands</p>
					</span>
				</li>
				<li>
					<a href="bodytypes.php"><i class='bx bxs-car-mechanic'></i></a><!-- Icon for Body Types -->
					<span class="text">
						<h3>
							<?php echo $bodyTypesCount ?>
						</h3>
						<p>Body Types</p>
					</span>
				</li>
				<li>
					<a href="cars.php"><i class='bx bxs-car'></i></a> <!-- Icon for Cars -->
					<span class="text">
						<h3>
							<?php echo $carsCount ?>
						</h3>
						<p>Cars</p>
					</span>
				</li>
				<li>
					<a href="users.php"><i class='bx bxs-user'></i></a> <!-- Icon for Users -->
					<span class="text">
						<h3>
							<?php echo $usersCount ?>
						</h3>
						<p>Users</p>
					</span>
				</li>
			</ul>



		</main>
	</section>



	<script src="../js/dashboard.js"></script>
</body>

</html>