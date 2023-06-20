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

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=$_SESSION['nama'];
        $user_id=$_SESSION['user_id'];
        $tanggal=input($_POST["tanggal"]);
        $waktu=input($_POST["waktu"]);
        $barber=input($_POST["barber"]);
        $service=input($_POST["service"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into pesanan (nama,user_id,id_barber,tanggal,waktu,barber,service) values
		('$nama','$user_id','$id_barber','$tanggal','$waktu','$barber','$service')";

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
            <input type="date"  max="<?php echo date('Y-m-d', strtotime(date('Y-m-d').'+ 7 days'))?>" min="<?php echo date('Y-m-d', strtotime(date('Y-m-d').'+ 1 days'))?>" name="tanggal" class="form-control" required/>
        </div>
		<div class="form-group">
            <label>Barber:</label>
            <select name="barber" id="#" class="form-control">
            <option>-- Pilih Barber --</option>
				<?php 
                    $barb = mysqli_query($kon, "SELECT * FROM barber");
                    while($c = mysqli_fetch_array($barb)){ 
                ?>
                <option value="<?php echo $c['nama']?>"><?php echo $c['nama']?></option>
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
            <select name="service" id="#" class="form-control">
                <option>-- Pilih Service --</option>
				<?php 
                    $serv = mysqli_query($kon, "SELECT * FROM service");
                    while($c = mysqli_fetch_array($serv)){ 
                ?>
                <option value="<?php echo $c['service']?>"><?php echo $c['service']?></option>
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










