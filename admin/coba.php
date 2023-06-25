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

        $username=input($_POST['username']);
        $email=input($_POST['email']);
        $pass=md5(input($_POST["pass"]));
        $role= 2;
        $nama=input($_POST["nama"]);
        $jk=input($_POST["jk"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);

        //Query input menginput data kedalam tabel anggota
        $sql1="insert into users (username,email,pass,role) values ('$username','$email','$pass','$role')";
        $hasil1=mysqli_query($kon,$sql1);
        $rows = mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM users ORDER BY id DESC"));
        $sql2="insert into barber (id_user,nama,jk,no_hp,alamat) values ('$rows[id]','$nama','$jk','$no_hp','$alamat')";

        //Mengeksekusi/menjalankan query diatas
        $hasil2=mysqli_query($kon,$sql2);
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil1) {
            if($hasil2){
                header("location:coba.php");
            }
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }
    }
    ?>
    <h2>Daftar akun pegawai</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        
        <div class="form-group">
            <label>Username: </label>
            <input type="text" name="username" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Email: </label>
            <input type="email" name="email" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Password: </label>
            <input type="password" name="pass" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Nama: </label>
            <input type="text" name="nama" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>jenis kelamin: </label>
            <input type="text" name="jk" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>No HP: </label>
            <input type="number" name="no_hp" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Alamat: </label>
            <input type="text" name="alamat" class="form-control" required/>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>