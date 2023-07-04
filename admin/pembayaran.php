<?php 
include "conn.php";
$id = $_GET['id_pesanan'];
$quer = "SELECT * FROM pesanan p JOIN customers c ON(p.id_customer = c.id_customer) JOIN service s ON(p.id_service = s.id_service) WHERE  p.id_pesanan=$id";
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
							<a class="active" href="pegawai.php">Home</a>
						</li>
					</ul>
				</div>
				
			</div>
            <form action="pembayaranexec.php" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="tanggal">Tanggal</label>
                    <input type="text" class="form-control" id="tanggal" disabled value=<?php echo $data['tanggal']?>>
                    <input type="hidden" class="form-control" name='id_pesanan' id="id_pesanan" hidden value=<?php echo $data['id_pesanan']?>>
                </div>
                <div class="form-group col-md-6">
                    <label for="pelanggan">pelanggan</label>
                    <input type="text" class="form-control" id="pelanggan" disabled value=<?php echo $data['nama']?> >
                </div>
            </div>
            <div class="form-group">
                <label for="sales">Harga</label>
                <input type="text" class="form-control" name='sales' id="sales" <?php if($data['Status'] == 'selesai'){echo 'disabled' ;} ?> value=<?php echo $data['harga']?> >
            </div>
            <button type="submit" name="submit" id="submit" <?php if($data['Status'] == 'selesai'){echo 'disabled' ;}?> class="btn btn-primary">Submit</button>
            </form>
        </div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>