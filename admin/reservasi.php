<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
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

        $nama=input($_POST["nama"]);
        $tanggal=input($_POST["tanggal"]);
        $waktu=input($_POST["waktu"]);
        $barber=input($_POST["barber"]);
        $service=input($_POST["service"]);

        //Query input menginput data kedalam tabel anggota
        $sql="insert into pesanan (nama,tanggal,waktu,barber,service) values
		('$nama','$tanggal','$waktu','$barber','$service')";

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:pegawai.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Reservasi</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Tanggal:</label>
            <input type="date" name="tanggal" class="form-control" required/>
        </div>
       <div class="form-group">
            <label>Jam :</label><br>
            <input type="Radio" name="waktu" value="08:00" required/> 08:00 | 
            <input type="Radio" name="waktu" value="10:00" required/> 10:00 | 
            <input type="Radio" name="waktu" value="13:00" required/> 13:00 | 
        </div>
                </p>
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
</body>
</html>