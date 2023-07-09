<?php
	include "conn.php";
	$querprof= "SELECT DISTINCT DATE_FORMAT(p.tanggal, '%b') as 'bulan', SUM(s.sales) as 'profit' FROM pesanan p JOIN sales s ON (p.id_pesanan=s.id_pesanan) GROUP BY DATE_FORMAT(p.tanggal, '%b') DESC; ";
	$hasilprof=mysqli_query($kon,$querprof);

	if ($hasilprof){
		$dataprof=array();
		$count = 0;
		while($rows=mysqli_fetch_array($hasilprof)){
			$dataprof[$count]["label"] = $rows['bulan'];
            $dataprof[$count]["y"] = $rows['profit'];
			$count=$count+1;
        }
	}
	else{
		echo "<p>terjadi kesalahan</p>";
	};


	
	
	

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
		<i class='bx bx-cut' ></i>
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
				<a href="chartService.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Chart Service</span>
				</a>
			</li>
			<li>
				<a href="chartBarber.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Chart Barber</span>
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
			
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>


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
				<div id="chartprof" style="height: 370px; width: 100%; display:inline-block"></div>
				<div id="barchart-profit" style="height: 370px; width: 45%; display:inline-block"></div>
				<div id="pie-service" style="height: 370px; width: 45%;display:inline-block"></div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
<script>
	window.onload = function () {
	var chartprof = new CanvasJS.Chart("chartprof", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "jumlah profit per bulan"
	},  
	data: [{        
		type: "line",
		yValueFormatString: "Rp#,##0.##",
        indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataprof, JSON_NUMERIC_CHECK); ?>
		
	}]
});
chartprof.render();
}
</script>
</body>
</html>