<?php
    session_start();
	include "conn.php";
    if( ! $_SESSION == 2){
        header("Location: tampilan_login.php");
    }
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
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
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
					<?php  
						$ide = $_SESSION['user_id'];
						$barang = mysqli_query($kon,"SELECT * FROM users u JOIN barber b on (u.id = b.id_user) WHERE u.id=$ide");
						$barang = mysqli_fetch_array($barang);
						$id_barber = $barang['id_barber'];
						?>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Semua Pesanan</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
					<?php


//Cek apakah ada kiriman form dari method post
if (isset($_GET['id_pesanan'])) {
	$id_pesanan=htmlspecialchars($_GET["id_pesanan"]);


	//Kondisi apakah berhasil atau tidak

	}
?>


 <tr class="table-danger">
		<br>
	<thead>
	<tr>
   <table class="my-3 table table-bordered">
		<tr class="table-primary">           
		<th>No</th>
		<th>Nama</th>
		<th>Tanggal</th>
		<th>Waktu</th>
		<th>Service</th>
		<th>Status</th>
		<th>Aksi</th>

	</tr>
	</thead>

	<?php
	$sql="SELECT * FROM pesanan p JOIN customers c ON(p.id_customer = c.id_customer) JOIN service s ON(p.id_service = s.id_service) WHERE id_barber = $id_barber ORDER BY p.tanggal DESC";

	$hasil=mysqli_query($kon,$sql);
	$no=0;
	while ($data = mysqli_fetch_array($hasil)) {
		$no++;

		?>
		<tbody>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $data["nama"]; ?></td>
			<td><?php echo $data["tanggal"];   ?></td>
			<td><?php echo $data["waktu"];   ?></td>
			<td><?php echo $data["service"];   ?></td>
			<td><?php echo $data["Status"];   ?></td>
			<td><a href="pembayaran.php?id_pesanan=<?= $data['id_pesanan']; ?>" class="status process">✅</a></td>
		</tr>
		</tbody>
		<?php
	}
	?>
</table>

</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>