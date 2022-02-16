<?php
$id_provinsi_terpilih = $_POST["id_provinsi"];

use function PHPSTORM_META\type;

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_provinsi_terpilih,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key: f84094ac95ea8f30f0af5afa20ef0250"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    // dijadikan array terlebih dahulu
    $distrik = json_decode($response, TRUE);
    $datadistrik = $distrik["rajaongkir"]["results"];
    echo "<option value=''>--Pilih Distrik --</option>";
    foreach ($datadistrik as $key => $tiap_distrik) {
        echo "<option value=''
        id_distrik= '" . $tiap_distrik["city_id"] . "' 
        nama_provinsi='" . $tiap_distrik["province"] . "' 
        nama_distrik='" . $tiap_distrik["city_name"] . "' 
        tipe_distrik='" . $tiap_distrik["type"] . "' 
        kodepos='" . $tiap_distrik["postal_code"] . "'
        >";
        echo $tiap_distrik["type"] . " ";
        echo $tiap_distrik["city_name"];
        echo "</option>";
    }
}
