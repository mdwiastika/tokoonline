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
function tambahongkir($data)
{
    global $connect;
    $uid = htmlspecialchars($data["uid"]);
    $idt = htmlspecialchars($data["idt"]);
    $nama = htmlspecialchars($data["namalengkap"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $nohp = htmlspecialchars($data["nohp"]);
    $provinsi = htmlspecialchars($data["provinsi"]);
    $kota = htmlspecialchars($data["tipe"] . " " . $data["distrik"]);
    $tarif = htmlspecialchars($data["ongkir"]);
    $estimasi = htmlspecialchars($data["estimasi"]) . " hari";
    $query = "INSERT INTO ongkir VALUES ('','$idt','$nama','$alamat','$nohp','$provinsi','$kota','$tarif','$estimasi','$uid')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function tambahpembelian($data)
{
    global $connect;
    $uid = htmlspecialchars($data["uid"]);
    $idt = htmlspecialchars($data["idt"]);
    $tanggal = date("D M Y");
    $tarif = htmlspecialchars($data["ongkir"]);
    $sum = htmlspecialchars($data["sum"]);
    $total = $tarif + $sum;
    $query = "INSERT INTO pembelian VALUES ('','$uid','$idt','$tanggal','$total')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
