<?php
include_once "connect.php";
$id = $_GET["id_pembayaran"];
global $connect;
$status = "Barang Diterima";
$query = "UPDATE buktipembayaran SET status='$status' WHERE id_pembayaran= '$id'";
mysqli_query($connect, $query);
echo "<script>document.location.href = 'history.php';</script>";
