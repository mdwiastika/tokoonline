<?php
function barang($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $array = [];
    while ($hi = mysqli_fetch_assoc($result)) {

        $array[] = $hi;
    }
    return $array;
}
function tambahsold($data)
{
    global $connect;
    $transaksi = htmlspecialchars($data["transaksi"]);
    $uid = htmlspecialchars($data["userid"]);
    $produk = $data["produk"];
    $stokdibeli = $data["stokdibeli"];
    $status = htmlspecialchars($data["status"]);
    $jumlah_dipilih = count($produk);

    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        $query = "INSERT INTO sold VALUES ('','$transaksi','$uid','$produk[$x]','$stokdibeli[$x]','$status')";
        mysqli_query($connect, $query);
    }
    return mysqli_affected_rows($connect);
}
function ubah($data)
{
    $id = $_GET["id_pembayaran"];
    global $connect;
    $status = "Barang Diterima";
    $query = "UPDATE buktipembayaran SET status='$status' WHERE id_pembayaran= '$id'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function batalbeli($data)
{
    global $connect;
    $transaksi = htmlspecialchars($data["transaksi"]);
    $userid = htmlspecialchars($data["userid"]);
    $query3 = "DELETE FROM sold WHERE user_id= $userid";
    mysqli_query($connect, $query3);
    $query4 = "DELETE FROM ongkir WHERE uid= $userid";
    mysqli_query($connect, $query4);
    $query2 = "DELETE FROM buktipembayaran WHERE id_transaksi = $transaksi AND uid_bukti='$userid'";
    mysqli_query($connect, $query2);
    return mysqli_affected_rows($connect);
}
