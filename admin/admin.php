<?php
	include "conn.php";



	$quer = "SELECT b.nama as 'barber', SUM(s.sales) as 'profit' FROM barber b JOIN pesanan p ON (b.id_barber = p.id_barber) JOIN sales s ON (s.id_pesanan = p.id_pesanan) GROUP BY p.id_barber; ";
	$hasil=mysqli_query($kon,$quer);

	if ($hasil){
		$databar=array();
		$count = 0;
		while($rows=mysqli_fetch_array($hasil)){
			$databar[$count]["label"] = $rows['barber'];
			$databar[$count]["y"] = $rows['profit'];
			$count=$count+1;
		}
	}
	else{
		echo "<p>terjadi kesalahan</p>";
	};

	$quer1 = "SELECT se.service as 'service', SUM(s.sales) as 'profit' FROM barber b JOIN pesanan p ON (b.id_barber = p.id_barber) JOIN sales s ON (s.id_pesanan = p.id_pesanan) JOIN service se on (p.id_service=se.id_service)  GROUP BY se.id_service; ";
	$quer2 = "SELECT SUM(sales) as 'sum' FROM  sales; ";
	$hasil1=mysqli_query($kon,$quer1);
	$hasil2=mysqli_query($kon,$quer2);
	if ($hasil1){
		if($hasil2){
			$sum=mysqli_fetch_assoc($hasil2);
			$datapie=array();
			$count1 = 0;
			while($rows1=mysqli_fetch_array($hasil1)){
				$datapie[$count1]["label"] = $rows1['service'];
				$datapie[$count1]["y"] = ($rows1['profit']/$sum['sum'])*100;
				$count1=$count1+1;
			}
		}
	}
	else{
		echo "<p>terjadi kesalahan</p>";
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
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <style>
      /* Style CSS untuk menyesuaikan tampilan chart */
      canvas {
        max-width: 100%;
        height: auto;
      }
    </style>

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
				<a href="#">
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

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<?php  
						$data_barang = mysqli_query($kon,"SELECT COUNT(id_sales) as 'jumlah' FROM sales");
						$jumlah_barang = mysqli_fetch_array($data_barang);
						?>
						<h3><?php echo $jumlah_barang['jumlah'];  ?></h3>
						<p>Reservasi selesai</p>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
					<?php  
						$data_penjualan = mysqli_query($kon,"SELECT SUM(sales) as 'total' FROM sales");
						$jumlah_penjualan = mysqli_fetch_array($data_penjualan);
						?>
						<h3><?php echo $jumlah_penjualan['total'];  ?></h3>
						<p>Total Sales</p>
					</span>
				</li>
			</ul>


			<div class="flex h-full">
				<div id="barchart-profit" style="height: 370px; width: 45%; display:inline-block"></div>
				<div id="pie-service" style="height: 370px; width: 45%;display:inline-block"></div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
<script>
	window.onload = function () {
	var chart1 = new CanvasJS.Chart("barchart-profit", {
		animationEnabled: true,
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		title: {
			text: "Peringkat Profit"
		},
		axisY: {
			title: "Rupiah"
		},
		data: [{
			type: "column",
			dataPoints: <?php echo json_encode($databar, JSON_NUMERIC_CHECK); ?>
		}]
	});
var chart2 = new CanvasJS.Chart("pie-service", {
	animationEnabled: true,
	title: {
		text: "Persentase Service"
	},
	subtitles: [{
		text: "Persentase service yang dipilih"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($datapie, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();
chart1.render();
}
</script>
</body>
</html>