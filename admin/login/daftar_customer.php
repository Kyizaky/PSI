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
        $role= 3;
        $nama=input($_POST["nama"]);
        $jk=input($_POST["jk"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);

        //Query input menginput data kedalam tabel anggota
        $sql1="insert into users (username,email,pass,role) values ('$username','$email','$pass','$role')";
        $hasil1=mysqli_query($kon,$sql1);
        $rows = mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM users ORDER BY id DESC"));
        $sql2="insert into customers (id_user,nama,jk,no_hp,alamat) values ('$rows[id]','$nama','$jk','$no_hp','$alamat')";

        //Mengeksekusi/menjalankan query diatas
        $hasil2=mysqli_query($kon,$sql2);
        //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
        if ($hasil1) {
            if($hasil2){
                header("location:login_form.php");
            }
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Daftar Customer</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body class="img js-fullheight" style="background-image: url(images/bg1.jpg)">
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Sign Up</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">
              <form action="<?php echo $_SERVER["PHP_SELF"];?>" class="signin-form"  method="post">
                <div class="form-group">
                  <input
                    placeholder="Username"
                    type="text"
                    name="username"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    placeholder="Name"
                    type="text"
                    name="nama"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    placeholder="Email"
                    type="email"
                    name="email"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    placeholder="Password"
                    type="password"
                    name="pass"
                    class="form-control"
                    required
                  />
                </div>
 
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jk" value="Laki-laki">Laki-Laki
                </div>
                <div style="margin-left: 100px;" class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="jk"  value="Perempuan">Perempuan
                </div>
                </div>
                <div class="form-group">
                  <input
                    placeholder="Phone Number"
                    type="number"
                    name="no_hp"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <input
                    placeholder="Address"
                    type="text"
                    name="alamat"
                    class="form-control"
                    required
                  />
                </div>
                <div class="form-group">
                  <button
                    type="submit"
                    class="form-control btn btn-primary submit px-3"
                    name="submit"
                  >
                    Sign In
                  </button>
                </div>
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
