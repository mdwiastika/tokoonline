<?php
include_once "connect.php";
$id = $_GET["id_pembayaran"];
global $connect;
$query = "DELETE FROM buktipembayaran WHERE id_pembayaran= '$id'";
mysqli_query($connect, $query);
echo "<script>document.location.href = 'history.php';</script>";
