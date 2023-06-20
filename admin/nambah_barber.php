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
        $email=input($_POST["email"]);
        $pass=md5(input($_POST["pass"]));
        $no_hp=input($_POST["no_hp"]);
        $role = 2;

        //Query input menginput data kedalam tabel anggota
        $sql="insert into users (nama,email,pass,no_hp,role) values
		('$nama','$email','$pass','$no_hp','$role')";
        

        //Mengeksekusi/menjalankan query diatas
        $hasil=mysqli_query($kon,$sql);
            
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil) {
            $qrselect=mysqli_query($kon,"select * from users where nama='".$nama."'");
            $data=mysqli_fetch_assoc($qrselect);
            $id_user = $data['id'];
            $sqlBarber="insert into barber (id_user,nama) values ('$id_user','$nama')";
            $qrbarber = mysqli_query($kon, $sqlBarber);
            header("Location:tampilan_login.php");
        }
        else {
            echo "<div class='alert alert-danger'> Pendaftaran gagal.</div>";

        }

    }
    ?>
    <h2>Pendaftaran</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="text" name="email" class="form-control" placeholder="Masukan Email" required />
        </div>
        <div class="form-group">
            <label>Nomor Handphone:</label>
            <input type="text" name="no_hp" class="form-control" placeholder="Masukan nomor Handphone" required />
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="password" name="pass" class="form-control" placeholder="Masukan Password" required />
        </div>


            
        
       
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>