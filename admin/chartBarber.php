<?php
	include "conn.php";
	$querprofFik= "SELECT b.nama as 'barber', DATE_FORMAT(p.tanggal, '%b') as 'bulan', SUM(ss.sales) as 'profit' FROM pesanan p JOIN sales ss ON (p.id_pesanan=ss.id_pesanan) JOIN barber b ON (p.id_barber=b.id_barber) WHERE p.id_barber = 12 GROUP BY b.nama, DATE_FORMAT(p.tanggal, '%b') ORDER BY DATE_FORMAT(p.tanggal, '%b') DESC;";
    $querprofHas= "SELECT b.nama as 'barber', DATE_FORMAT(p.tanggal, '%b') as 'bulan', SUM(ss.sales) as 'profit' FROM pesanan p JOIN sales ss ON (p.id_pesanan=ss.id_pesanan) JOIN barber b ON (p.id_barber=b.id_barber) WHERE p.id_barber = 14 GROUP BY b.nama, DATE_FORMAT(p.tanggal, '%b') ORDER BY DATE_FORMAT(p.tanggal, '%b') DESC;";
    $querprofRic= "SELECT b.nama as 'barber', DATE_FORMAT(p.tanggal, '%b') as 'bulan', SUM(ss.sales) as 'profit' FROM pesanan p JOIN sales ss ON (p.id_pesanan=ss.id_pesanan) JOIN barber b ON (p.id_barber=b.id_barber) WHERE p.id_barber = 15 GROUP BY b.nama, DATE_FORMAT(p.tanggal, '%b') ORDER BY DATE_FORMAT(p.tanggal, '%b') DESC;";
    $querprofMau= "SELECT b.nama as 'barber', DATE_FORMAT(p.tanggal, '%b') as 'bulan', SUM(ss.sales) as 'profit' FROM pesanan p JOIN sales ss ON (p.id_pesanan=ss.id_pesanan) JOIN barber b ON (p.id_barber=b.id_barber) WHERE p.id_barber = 16 GROUP BY b.nama, DATE_FORMAT(p.tanggal, '%b') ORDER BY DATE_FORMAT(p.tanggal, '%b') DESC;";
    $querprofRaj= "SELECT b.nama as 'barber', DATE_FORMAT(p.tanggal, '%b') as 'bulan', SUM(ss.sales) as 'profit' FROM pesanan p JOIN sales ss ON (p.id_pesanan=ss.id_pesanan) JOIN barber b ON (p.id_barber=b.id_barber) WHERE p.id_barber = 17 GROUP BY b.nama, DATE_FORMAT(p.tanggal, '%b') ORDER BY DATE_FORMAT(p.tanggal, '%b') DESC;"; 
	$hasilprofFik=mysqli_query($kon,$querprofFik);
    $hasilprofHas=mysqli_query($kon,$querprofHas);
    $hasilprofRic=mysqli_query($kon,$querprofRic);
    $hasilprofMau=mysqli_query($kon,$querprofMau);
    $hasilprofRaj=mysqli_query($kon,$querprofRaj);

	if ($hasilprofFik && $hasilprofHas && $hasilprofRic && $hasilprofMau && $hasilprofRaj){
		$dataprofFik=array();
        $dataprofHas=array();
        $dataprofRic=array();
        $dataprofMau=array();
        $dataprofRaj=array();
        $count = 0;
		while($rowsFik=mysqli_fetch_array($hasilprofFik)){
            
			$dataprofFik[$count]["label"] = $rowsFik['bulan'];
            $dataprofFik[$count]["y"] = $rowsFik['profit'];
			$count=$count+1;
        }
        $count1 = 0;
        while($rowsHas=mysqli_fetch_array($hasilprofHas)){
            
			$dataprofHas[$count1]["label"] = $rowsHas['bulan'];
            $dataprofHas[$count1]["y"] = $rowsHas['profit'];
			$count1=$count1+1;
        }
        $count2 = 0;
        while($rowsRic=mysqli_fetch_array($hasilprofRic)){
            
			$dataprofRic[$count2]["label"] = $rowsRic['bulan'];
            $dataprofRic[$count2]["y"] = $rowsRic['profit'];
			$count2=$count2+1;
        }
        $count3 = 0;
        while($rowsMau=mysqli_fetch_array($hasilprofMau)){
            
			$dataprofMau[$count3]["label"] = $rowsMau['bulan'];
            $dataprofMau[$count3]["y"] = $rowsMau['profit'];
			$count3=$count3+1;
        }
        $count4 = 0;
        while($rowsRaj=mysqli_fetch_array($hasilprofRaj)){
			$dataprofRaj[$count4]["label"] = $rowsRaj['bulan'];
            $dataprofRaj[$count4]["y"] = $rowsRaj['profit'];
			$count4=$count4+1;
        }
	}
	else{
		echo "<p>terjadi kesalahan</p>";
	};

    $querProfBar = "SELECT b.nama as 'barber', SUM(s.sales) as 'profit' FROM pesanan p JOIN sales s on (p.id_pesanan = s.id_pesanan) JOIN barber b ON (p.id_barber = b.id_barber) GROUP BY b.nama; ";
	$hasilProfBar=mysqli_query($kon,$querProfBar);

	if ($hasilProfBar){
		$dataProfBar=array();
		$count = 0;
		while($rowsProfBar=mysqli_fetch_array($hasilProfBar)){
			$dataProfBar[$count]["label"] = $rowsProfBar['barber'];
			$dataProfBar[$count]["y"] = $rowsProfBar['profit'];
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
			<li>
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
			<li class="active">
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
			<div class="flex h-full">
				<div id="barchart-profit" style="height: 370px; width: 45%; display:inline-block"></div>
				<div id="chartprof" style="height: 370px; width: 45%;display:inline-block"></div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
<script>
	window.onload = function () {
        var chartbar = new CanvasJS.Chart("barchart-profit", {
		animationEnabled: true,
		theme: "light2", // "light1", "light2", "dark1", "dark2"
		title: {
			text: "Jumlah Profit Barber"
		},
		axisY: {
			title: "Total"
		},
		data: [{
			type: "column",
			dataPoints: <?php echo json_encode($dataProfBar, JSON_NUMERIC_CHECK); ?>
		}]
	});
	var chartprof = new CanvasJS.Chart("chartprof", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "jumlah profit per bulan"
	},
    axisY:{
        maximum: 1800000,
    },
	data: [{        
		type: "line",
        name: "Fikri",
        showInLegend : true,
		yValueFormatString: "Rp#,##0.##",
		dataPoints: <?php echo json_encode($dataprofFik, JSON_NUMERIC_CHECK); ?>
		},
        {        
		type: "line",
        name: "Hasan",
        showInLegend : true,
		yValueFormatString: "Rp#,##0.##",
		dataPoints: <?php echo json_encode($dataprofHas, JSON_NUMERIC_CHECK); ?>
		},
        {        
		type: "line",
        name: "Richard",
        showInLegend : true,
		yValueFormatString: "Rp#,##0.##",
		dataPoints: <?php echo json_encode($dataprofRic, JSON_NUMERIC_CHECK); ?>
		},
        {        
		type: "line",
        name: "Maulana",
        showInLegend : true,
		yValueFormatString: "Rp#,##0.##",
		dataPoints: <?php echo json_encode($dataprofMau, JSON_NUMERIC_CHECK); ?>
		}, 
        {        
		type: "line",
        name: "Raja",
        showInLegend : true,
		yValueFormatString: "Rp#,##0.##",
		dataPoints: <?php echo json_encode($dataprofRaj, JSON_NUMERIC_CHECK); ?>
		}
    ]
});
chartprof.render();
chartbar.render();
}
</script>
</body>
</html>