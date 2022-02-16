<?php
$ekspedisi = $_POST["ekspedisi"];
$distrik = $_POST["distrik"];
$berat = $_POST["berat"];

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=289&destination=" . $distrik . "&weight=" . $berat . "&courier=" . $ekspedisi,
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key: f84094ac95ea8f30f0af5afa20ef0250"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $ongkir = json_decode($response, TRUE);
    $dataongkir = $ongkir["rajaongkir"]["results"]["0"]["costs"];
    echo "<option value=''>--Ongkos Kirim --</option>";
    foreach ($dataongkir as $key => $tiap_ongkir) {
        echo "<option
        paket='" . $tiap_ongkir["service"] . "'
        ongkir='" . $tiap_ongkir["cost"]["0"]["value"] . "'
        etd='" . $tiap_ongkir["cost"]["0"]["etd"] . "'
        >";
        echo $tiap_ongkir["service"] . " ";
        echo number_format($tiap_ongkir["cost"]["0"]["value"]) . " ";
        echo $tiap_ongkir["cost"]["0"]["etd"];
        echo "</option>";
    }
}
