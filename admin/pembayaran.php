<?php 
include "conn.php";
$id = $_GET["id_pesanan"];
$data = "Select * pesanan WHERE id_pesanan=$id";
if ($kon->query($data) === TRUE) {
    header("location: pegawai.php");
}else{
    echo "gagal update".$kon->error;
}
$kon->close();
?>