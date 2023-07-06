<?php
    session_start();
	include "conn.php";
    if( !$_SESSION == 3){
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
	

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/css/bootstrap.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->


</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">BarberSpot</span>
		</a>
		<ul class="side-menu top">
			<li class="">
				<a href="pelanggan.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
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




		<div id="booking" class="section">
			<div class="section-center">
				<div class="container">
					<div class="row">
						<div class="col-md-7 col-md-push-5">
							<div class="booking-cta">
								<h1>Make your reservation</h1>
								<p>Silahkan isi Formulir disamping. Reservasi anda akan <br>langsung masuk ke antrian kami.								</p>
							</div>
						</div>
						<div class="col-md-4 col-md-pull-7">
							<div class="booking-form">
								<form>
									<div class="form-group">
										<span class="form-label">Tanggal</span>
										<input class="form-control" type="date" required>
									</div>
							
									<div class="form-group">
										<label>Jam :</label><br>
										<input type="Radio" name="waktu" value="08:00" required/> 08:00 | 
										<input type="Radio" name="waktu" value="10:00" required/> 10:00 | 
										<input type="Radio" name="waktu" value="13:00" required/> 13:00 |
										<br>
										<input type="Radio" name="waktu" value="13:00" required/> 15:00 |
										<input type="Radio" name="waktu" value="13:00" required/> 17:00 | 
										<input type="Radio" name="waktu" value="13:00" required/> 19:00 | 
									</div>
									
											
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group">
												<span class="form-label">Barbenman</span>
												<select name="id_barber" id="#" class="form-control">
													<option>-- Pilih Barber --</option>
														<?php 
															$barb = mysqli_query($kon, "SELECT * FROM barber");
															while($databar = mysqli_fetch_array($barb)){ 
														?>
														<option value="<?php echo $databar['id_barber']?>"><?php echo $databar['nama']?></option>
														<?php } ?>
													</select>
												<span class="select-arrow"></span>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<span class="form-label">Services</span>
												<select name="id_service" id="#" class="form-control">
													<option>-- Pilih Service --</option>
													<?php 
														$serv = mysqli_query($kon, "SELECT * FROM service");
														while($c = mysqli_fetch_array($serv)){ 
													?>
													<option value="<?php echo $c['id_service']?>"><?php echo $c['service']?></option>
													<?php } ?>
												</select>
												<span class="select-arrow"></span>
											</div>
										</div>
										
									</div>
									<div class="form-btn">
										
										<button type="submit" name="submit" class="submit-btn">Submit</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>










