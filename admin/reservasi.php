<?php
    session_start();
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
				<a href="histori_reservasi.php">
					<i class='bx bxs-doughnut-chart' ></i>
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
                        <li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="Reservasi.php">Reservasi</a>
						</li>
					</ul>
				</div>
			</div>
            <div class="container">
    <?php
    //Include file koneksi, untuk koneksikan ke database
    include "conn.php";

					$ide = $_SESSION['user_id'];
					$barang = mysqli_query($kon,"SELECT * FROM users u JOIN customers c on (u.id = c.id_user) WHERE u.id=$ide");
					$barang = mysqli_fetch_array($barang);
					$id_cust = $barang['id_customer'];
    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_customer=$id_cust;
        $id_barber=input($_POST['id_barber']);
        $id_service=input($_POST['id_service']);
        $tanggal=input($_POST["tanggal"]);
        $waktu=input($_POST["waktu"]);
		$order_id =rand();

        //Query input menginput data kedalam tabel anggota
        $sql="insert into pesanan (id_customer,id_barber,id_service,tanggal,waktu,order_id) values
		('$id_customer','$id_barber','$id_service','$tanggal','$waktu','$order_id')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:pelanggan.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Reservasi</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        
        <div class="form-group">
            <label>Tanggal:</label>
            <input type="date"  name="tanggal" class="form-control" required/>
        </div>
		<div class="form-group">
            <label>Barber:</label>
            <select name="id_barber" id="#" class="form-control">
            <option>-- Pilih Barber --</option>
				<?php 
                    $barb = mysqli_query($kon, "SELECT * FROM barber");
                    while($databar = mysqli_fetch_array($barb)){ 
                ?>
                <option value="<?php echo $databar['id_barber']?>"><?php echo $databar['nama']?></option>
                <?php } ?>
			</select>
    	</div>
       	<div class="form-group">
            <label>Jam :</label><br>
            <input type="Radio" name="waktu" value="08:00" required/> 08:00 | 
            <input type="Radio" name="waktu" value="10:00" required/> 10:00 | 
            <input type="Radio" name="waktu" value="13:00" required/> 13:00 |
			<input type="Radio" name="waktu" value="13:00" required/> 15:00 |
			<input type="Radio" name="waktu" value="13:00" required/> 17:00 | 
			<input type="Radio" name="waktu" value="13:00" required/> 19:00 | 
        </div>
                </p>
       
        <div class="form-group">
            <label>Service:</label>
            <select name="id_service" id="#" class="form-control">
                <option>-- Pilih Service --</option>
				<?php 
                    $serv = mysqli_query($kon, "SELECT * FROM service");
                    while($c = mysqli_fetch_array($serv)){ 
                ?>
                <option value="<?php echo $c['id_service']?>"><?php echo $c['service']?></option>
                <?php } ?>
			</select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
			

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










