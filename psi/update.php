<!DOCTYPE html>
<html>
<head>
    <title>Form Pesanan Reservasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <?php

    //Include file koneksi, untuk koneksikan ke database
    include "koneksi.php";

    //Fungsi untuk mencegah inputan karakter yang tidak sesuai
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Cek apakah ada nilai yang dikirim menggunakan methos GET dengan nama id_peserta
    if (isset($_GET['id_pesanan'])) {
        $id_pesanan=input($_GET["id_pesanan"]);

        $sql="select * from pesanan where id_pesanan=$id_pesanan";
        $hasil=mysqli_query($kon,$sql);
        $data = mysqli_fetch_assoc($hasil);


    }

    //Cek apakah ada kiriman form dari method post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_pesanan=htmlspecialchars($_POST["id_pesanan"]);
        $nama=input($_POST["nama"]);
        $tanggal=input($_POST["tanggal"]);
        $waktu=input($_POST["waktu"]);
        $barber=input($_POST["barber"]);
        $service=input($_POST["service"]);

        //Query update data pada tabel anggota
        $sql="update pesanan set
			nama='$nama',
			tanggal='$tanggal',
			waktu='$waktu',
			barber='$barber',
			service='$service'
			where id_pesanan=$id_pesanan";

        //Mengeksekusi atau menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);

        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }

    ?>
    <h2>Update Data</h2>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
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
				<option value="mang">--- Pilih ---</option>
                <?php $sql?>
				<option value="Richardy">Richardy</option>
				<option value="Maulana">Maulana</option>
			</select>
        </div>
        <div class="form-group">
            <label>Service:</label>
            <select name="service" id="#" class="form-control">
				<option value="hiji">--- Pilih ---</option>
				<option value="Cukur">Cukur</option>
				<option value="SPA">SPA</option>
			</select>
        </div>

        <input type="hidden" name="id_pesanan" value="<?php echo $data['id_pesanan']; ?>" />

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>