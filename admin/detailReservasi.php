<?php 
include "conn.php";
if( ! $_SESSION['role'] == 2){
	header("Location: tampilan_login.php");
}
$id = $_GET["id_pesanan"];
$quer = "SELECT * FROM pesanan p JOIN sales s ON (p.id_pesanan = s.id_pesanan) JOIN barber b ON (p.id_barber = b.id_barber) where p.id_pesanan=$id";
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
			<li >
				<a href="pelanggan.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="reservasi.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Reservasi</span>
				</a>
			</li>
			<li class="active">
				<a href="histori_reservasi.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Histori Reservasi</span>
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
			
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile">
				<img src="img/people.jpeg">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
        <div>
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
							<a class="active" href="histori_reservasi.php">Histori reservasi</a>
						</li>
					</ul>
				</div>
				
			</div>
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" class="form-control" id="tanggal" disabled value=<?php echo $data['tanggal']?>>
                    <input type="hidden" class="form-control" name='id_pesanan' id="id_pesanan" hidden value=<?php echo $data['id_pesanan']?>>
                </div>
                <div class="form-group col-md-6">
                    <label for="pelanggan">Barber</label>
                    <input type="text" class="form-control" id="pelanggan" disabled value=<?php echo $data['nama']?> >
                </div>
            </div>
            <div class="form-group">
                <label for="sales">Harga</label>
                <input type="text" class="form-control" name='sales' id="sales" disabled value=<?php echo $data['sales']?> >
            </div>
        </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>