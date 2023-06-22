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
							
							$qrpesan = "select * from pesanan where id_user = '" .$_SESSION['user_id']."' ";
							$sqlpesan = mysqli_query($kon,$qrpesan);
							if(mysqli_num_rows($sqlpesan)>0){
								$datapesan = mysqli_fetch_assoc($sqlpesan);
								echo "<li>
								<i class='bx bxs-group' ></i>
								<span class='text'>
									<h3>";
										
										if($berhasil){
											echo $datapesan['waktu'];
										};
										
									echo "	
									</h3>
									<h4>";
									if($berhasil){
										echo $datapesan['tanggal'];
									};
									echo "
									</h4>
									<p>Reservasi Terdekat</p>
								</span>
							</li>";
							}?>
				<?php 
				
				$qrreview = "select * from pesanan where id_user = '" .$_SESSION['user_id']."' AND status = 'completed' ";
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
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						<h3>2834</h3>
						<p>Visitors</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>

<!-- tengah tengah  -->
			<div class="table-data">
				<div class="order">
					




</div>
<!-- tengah tengah  -->
				<div class="todo">
					<div class="head">
						
					</div>
					
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>