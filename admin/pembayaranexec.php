<?php 
include "conn.php";
if (isset($_POST['submit'])) {

    $id_pesanan = $_REQUEST["id_pesanan"];
    $sales = $_REQUEST["sales"];


//Query input menginput data kedalam tabel anggota
$sql="insert into sales (id_pesanan, sales) values
('$id_pesanan','$sales')";
$sql1="UPDATE pesanan set Status = 'selesai' where id_pesanan = ".$id_pesanan ;

//Mengeksekusi/menjalankan query diatas
$hasil=mysqli_query($kon,$sql);

//Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
if ($hasil) {
    $hasil1=mysqli_query($kon,$sql1);
    if ($hasil1) {
    header("Location:pesanan_pegawai.php");}
}
else {
    echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

}
}?>