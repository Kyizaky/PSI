<?php 
include "conn.php";
$id = $_GET["id_pesanan"];
$quer = "SELECT * FROM pesanan p JOIN customers c ON(p.id_customer = c.id_customer) JOIN service s ON(p.id_service = s.id_service)  p.id_pesanan=$id";
$sqli = mysqli_query($kon, $quer);
$data = mysqli_fetch_assoc($sqli);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">

	<title>BarberSpot</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">BarberSpot</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="pegawai.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="pesanan_pegawai.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Semua pesanan</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				<img src="img/people.jpeg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
        <div>
			<div class="head-title">
				<div class="left">
					<h1>Detail Pesanan</h1>
					<ul class="breadcrumb">
						<li>
							<a href="admin.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="admin.php">Home</a>
						</li>
					</ul>
				</div>
				
			</div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" class="form-control" id="tanggal">
                </div>
                <div class="form-group col-md-6">
                    <label for="pelanggan">pelanggan</label>
                    <input type="text" class="form-control" id="pelanggan" >
                </div>
            </div>
            <div class="form-group">
                <label for="barber">barber</label>
                <input type="text" class="form-control" id="barber" >
            </div>
            <div class="form-group">
                <label for="sales">Address 2</label>
                <input type="text" class="form-control" id="sales" >
            </div>
        </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>