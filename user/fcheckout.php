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
    $id_transaksi = $data["idtransaksi"];
    $query = "INSERT INTO ongkir VALUES ('','$idt','$nama','$alamat','$nohp','$provinsi','$kota','$tarif','$estimasi','$uid','$id_transaksi')";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
function tambahpembelian($data)
{
    global $connect;
    $uid = htmlspecialchars($data["uid"]);
    $idbarang = $data["produk_id"];
    $qty = $data["qty"];
    $tanggal = date("D M Y");
    $status = "proses pengisisan data";
    $alamat = $data["alamat"];
    $tarif = $data["ongkir"];
    $sum = $data["sum"];
    $total = $tarif + $sum;
    $jumlah_dipilih = count($idbarang);
    $id_transaksi = $data["idtransaksi"];
    for ($x = 0; $x < $jumlah_dipilih; $x++) {
        $query = "INSERT INTO pembelian VALUES ('','$uid','$id_transaksi','$idbarang[$x]','$tanggal','$total','$tarif','$qty[$x]','$status','$alamat')";
        mysqli_query($connect, $query);
    }
    $query2 = "INSERT INTO buktipembayaran VALUES ('','','$tanggal','$id_transaksi','$uid','$status')";
    mysqli_query($connect, $query2);
    return mysqli_affected_rows($connect);
}
