<?php 
include "conn.php";
$id = $_GET["id_pesanan"];
$updt = "UPDATE pesanan SET Status = 'cancelled' WHERE id_pesanan=$id";
if ($kon->query($updt) === TRUE) {
    header("location: pelanggan.php");
}else{
    echo "gagal update".$kon->error;
}
$kon->close();
?>