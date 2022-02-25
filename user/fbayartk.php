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

function tambahbukti($data)
{
    global $connect;
    $userid = htmlspecialchars($data["userid"]);
    $gambar = upload();
    $produk = $data["produk"];
    $status = "pengemasan";
    $id_transaksi = $data["idtransaksi"];
    $query2 = "UPDATE buktipembayaran SET gambar= '$gambar' WHERE id_transaksi=$id_transaksi AND uid_bukti=$userid";
    $query3 = "UPDATE buktipembayaran SET status= '$status'WHERE id_transaksi=$id_transaksi AND uid_bukti=$userid";
    mysqli_query($connect, $query2);
    mysqli_query($connect, $query3);
    return mysqli_affected_rows($connect);
}
function upload()
{

    $nfile = $_FILES['image']['name'];
    $ufile = $_FILES['image']['size'];
    $tfile = $_FILES['image']['tmp_name'];
    $gambarvalid = ['jpg', 'jpeg', 'png'];
    $valid = explode('.', '$nfile');
    $valid = strtolower(end($gambarvalid));
    if (!in_array($valid, $gambarvalid)) {
        echo "<script>alert('File yang anda pilih bukan gambar')</script>";
        return false;
    }
    if ($ufile > 30000000) {
        echo "<script>alert('Ukuran file terlalu besar')</script>";
        return false;
    }
    $namabaru = uniqid();
    $namabaru .= '.';
    $namabaru .= $valid;
    move_uploaded_file($tfile, 'buktibayar/' . $namabaru);

    return $namabaru;
}
function tambah($data)
{
    global $connect;
    $userid = htmlspecialchars($data["userid"]);
    $id = $data["produk_id"];
    $ssudah = $data["stokbaru"];
    $jumlah_dipilih = count($id);
    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        $query1 = "UPDATE barang SET stok= '$ssudah[$x]' WHERE id= $id[$x]";
        mysqli_query($connect, $query1);
    }
    $query2 = "DELETE FROM cart WHERE user_id= $userid";
    mysqli_query($connect, $query2);
    $query3 = "DELETE FROM sold WHERE user_id= $userid";
    mysqli_query($connect, $query3);
    $query4 = "DELETE FROM ongkir WHERE uid= $userid";
    mysqli_query($connect, $query4);
    return mysqli_affected_rows($connect);
}
