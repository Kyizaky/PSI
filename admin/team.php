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
				<a href="admin.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="persediaan.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Persediaan</span>
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
			<i class='bx bx-menu' ></i>
			
			<form action="#">
				<div class="form-input">
					
					<button><i class='bx bx-' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a >
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
					<h1>Team</h1>
					<ul class="breadcrumb">
						<li>
							<a href="team.php">Team</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="team.php">My Team</a>
						</li>
					</ul>
				</div>
				
			</div>

			
			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Karyawan</h3>
						<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>
					</div>
 <tr class="table-danger">
		<br>
	<thead>
	<tr>
   <table class="my-3 table table-bordered">
		<tr class="table-primary">           
		<th>No</th>
		<th>Nama</th>
		<th>Posisi</th>
		<th>Masa Kerja</th>
		<th>Gaji per-bulan</th>
		<th colspan='2'>Keterangan</th>

	</tr>
	</thead>

	<?php
	include "conn.php";
	$sql="select * from barber order by id_barber";

	$hasil=mysqli_query($kon,$sql);
	$no=0;
	while ($data = mysqli_fetch_array($hasil)) {
		$no++;

		?>
		<tbody>
		<tr>
			<td><?php echo $no;?></td>
			<td><?php echo $data["nama"]; ?></td>
			<td><?php echo $data["jabatan"];   ?></td>
			<td><?php echo $data["masa_kerja"];   ?></td>
			<td><?php echo $data["Gaji"];   ?></td>
			<td>
            <a href="" class="btn btn-primary" role="button">Data Diri</a>    
			</td>
		</tr>
		</tbody>
		<?php
	}
	?>
</table>


		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>