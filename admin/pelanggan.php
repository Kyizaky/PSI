<?php
    session_start();
	include "conn.php";
	if($_SESSION['roles']!=3){
		header("Location:logout.php");
	}

	$ide = $_SESSION['user_id'];
	$barang = mysqli_query($kon,"SELECT * FROM users u JOIN customers c on (u.id = c.id_user) WHERE u.id=$ide");
	$barang = mysqli_fetch_array($barang);
	$id_cust = $barang['id_customer'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<!-- My CSS -->
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

	<title>BarberSpot</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
		<i class='bx bx-cut' ></i>
			<span class="text">BarberSpot</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
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
			<li>
				<a href="histori_reservasi.php">
				<i class='bx bxs-time'></i>
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
			
			<a href="#" class="text-end">
				<h5 class="text-end">Halo <?php echo $_SESSION['nama']; ?></h5>
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
							<a href="pelanggan.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="pelanggan.php">Home</a>
						</li>
					</ul>
				</div>
			</div>
			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<?php  
						$data_pesan = mysqli_query($kon,"SELECT COUNT(id_pesanan) as 'jumlah' FROM pesanan WHERE id_customer = '$id_cust' AND Status = 'reserved'");
						$jumlah_pesan = mysqli_fetch_array($data_pesan);
						?>
						<h3><?php echo $jumlah_pesan['jumlah'];  ?></h3>
						<p>Reservasi aktif anda</p>
					</span>
				</li>
			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Reservation</h3>

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
		<th>Nama barber</th>
		<th>Tanggal</th>
		<th>Waktu</th>
		<th>Service</th>
		<th>Status</th>
		<th colspan='2'>Aksi</th>

	</tr>
	</thead>

	<?php

	$sql="SELECT  p.id_pesanan, b.nama as 'nama', p.tanggal as 'tanggal', p.waktu as 'waktu', s.service as 'service', p.Status as 'status' FROM pesanan p JOIN customers c ON(p.id_customer = c.id_customer) JOIN service s ON(p.id_service = s.id_service) JOIN barber b ON (p.id_barber=b.id_barber) WHERE p.id_customer = $id_cust AND NOT p.Status= 'selesai' ORDER BY p.tanggal DESC limit 5   ";

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
			<td><?php echo $data["status"];   ?></td>
            <td>
			<?php 
			if ($data['status'] == "reserved" && $data['tanggal'] != date('Y-m-d')){ ?>
				<a href="cancelPelanggan.php?id_pesanan=<?= $data['id_pesanan']; ?>" class="status pending">❌</a>
            <?php }
			elseif($data['status'] == "reserved" && $data['tanggal']==date('Y-m-d')){?>
				tidak dapat dibatalkan <?php }?>
            </td>
		</tr>
		</tbody>
		<?php
	}
	?>
</table>

</div>
		</main>
		<!-- MAIN -->
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>