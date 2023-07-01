<?php
	include "conn.php";

	
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
						$data_barang = mysqli_query($kon,"SELECT * FROM pesanan");
						$jumlah_barang = mysqli_num_rows($data_barang);
						?>
						<h3><?php echo $jumlah_barang;  ?></h3>
						<p>New Order</p>
					</span>
				</li>
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
        <!-- Line Chart -->
        <div class="w-1/2 p-2">
          <div class="w-full h-full bg-white shadow-xl rounded-xl">
            <h2 class="text-2xl font-semibold mb-4 px-5 py-3">BBM Terjual Perbulan</h2>
            <div class="max-h-96">
              <canvas id="lineChart" class="w-full h-full"></canvas>
            </div>
          </div>
        </div>

		<!-- Pie Chart -->
        <div class="w-1/2 p-2">
          <div class="w-full h-full bg-white rounded-xl shadow-xl">
            <h2 class="py-3 font-semibold text-3xl text-center">BBM Terjual</h2>
            <div class="w-full h-96 py-5">
              <canvas class="w-full h-full" id="pieChart"></canvas>
            </div>
          </div>
        </div>
      </div>
		
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script>
    const pieChartCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieChartCtx, {
      type: 'pie',
      data: {
		
        labels: ['Pertalite', 'Pertamax', 'Pertamax Turbo', 'Pertamina Dex', 'Dextlite', 'Solar',],
        datasets: [{
          label: 'Rasio Penjualan',
          data: [1000, 2500, 1800, 1200, 900, 3000],
          backgroundColor: ['rgba(0, 123, 255, 0.7)', 'rgba(255, 99, 132, 0.7)', 'rgba(54, 162, 235, 0.7)', 'rgba(255, 206, 86, 0.7)', 'rgba(75, 192, 192, 0.7)', 'rgba(153, 102, 255, 0.7)'],
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
        legend: {
          position: 'right'
        }
      }
      }
    });
  </script>
  <script>
    const ctx = document.getElementById('lineChart').getContext('2d');
    var gradientStroke1 = ctx.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.5)');
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.2)');
  
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        datasets: [{
          label: 'Keuntungan',
          data: [500, 800, 650, 950, 700, 1200],
          borderColor: 'rgba(94, 114, 228)',
          backgroundColor: gradientStroke1,
          borderWidth: 2,
          tension: 0.4,
          fill: true
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            position: 'bottom'
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 100
            }
          }
        }
      }
    });
  </script>

	<script src="js/script.js"></script>
</body>
</html>