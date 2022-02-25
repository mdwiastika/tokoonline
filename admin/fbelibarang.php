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
function hapus($id)
{
    global $connect;
    // untuk memimilih data berdasarkan id
    $query1 = mysqli_query($connect, "SELECT * FROM barang WHERE id= $id");
    $data1 = mysqli_fetch_array($query1);

    // untuk menghapus seluruh data di id yang dipilih
    mysqli_query($connect, "DELETE FROM barang WHERE id= $id");
    // membuat variable untuk data image yang dipilih
    $path = "img/" . $data1["image"];
    // untuk menghapus image dari directory
    unlink($path);
    return mysqli_affected_rows($connect);
}
function ubah($data)
{
    $id = $data["id_pembayaran"];
    global $connect;
    $status = htmlspecialchars($data["status"]);
    $query = "UPDATE buktipembayaran SET status='$status' WHERE id_pembayaran= '$id'";
    mysqli_query($connect, $query);
    return mysqli_affected_rows($connect);
}
