<?php
    session_start();
	include "conn.php";
    if( ! $_SESSION == 3){
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
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="team.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
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
			<?php
						$ide = $_SESSION['user_id'];
					$barang = mysqli_query($kon,"SELECT * FROM users u JOIN customers c on (u.id = c.id_user) WHERE u.id=$ide");
					$barang = mysqli_fetch_array($barang);
					$id_cust = $barang['id_customer'];
							$qrpesan = "select * from pesanan where id_customer = $id_cust ";
							$sqlpesan = mysqli_query($kon,$qrpesan);
							if(mysqli_num_rows($sqlpesan)>0){
								$datapesan = mysqli_fetch_assoc($sqlpesan);
								
							}?>
				<?php 
				
				$qrreview = "select * from pesanan where id_customer = $id_cust AND status = 'reserved' ";
				$sqlreview = mysqli_query($kon,$qrreview);
				if(mysqli_num_rows($sqlreview)>0){
					$datablmreview = mysqli_fetch_assoc($sqlreview);
					echo "<li>
					<i class='bx bxs-group' ></i>
					<span class='text'>
						<h3>Review pengalaman anda</h3>
						<p>anda punya"; echo mysqli_num_rows($sqlreview)." pesanan yang belum anda review </p>
					</span>
				</li>";
				}
				?>
			</ul>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Recent Orders</h3>
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
		<th colspan='2'>Aksi</th>

	</tr>
	</thead>

	<?php

	$sql="SELECT * FROM pesanan p JOIN customers c ON(p.id_customer = c.id_customer) JOIN service s ON(p.id_service = s.id_service) WHERE p.id_customer = $id_cust AND NOT p.Status= 'cancelled' ";

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
			<?php 
			if ($data['Status'] == "reserved" && $data['tanggal'] != date('Y-m-d')){ ?>
            <td>
				<a href="cancelPelanggan.php?id_pesanan=<?= $data['id_pesanan']; ?>" class="status pending">❌</a>
            <?php }
			elseif($data['Status'] == "reserved" && $data['tanggal'] == date('Y-m-d')){?>
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