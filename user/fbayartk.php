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
    $alamat = htmlspecialchars($data["alamat"]);
    $produk = $data["produk"];
    $stokdibeli = $data["stokdibeli"];
    $status = htmlspecialchars($data["status"]);
    $jumlah_dipilih = count($produk);
    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        $query = "INSERT INTO buktipembayaran VALUES ('','$userid','$gambar','$status','$produk[$x]','$stokdibeli[$x]','$alamat')";
        mysqli_query($connect, $query);
    }
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
    $id = $data["produk_id"];
    $sbelum = $data["sbelum"];
    $stambah = $data["stokdibeli"];
    $ssudah = $sbelum + $stambah;
    $jumlah_dipilih = count($stambah);
    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        $query1 = "UPDATE barang SET stok= '$ssudah' WHERE id= $id";
        mysqli_query($connect, $query1);
    }
    return mysqli_affected_rows($connect);
}
