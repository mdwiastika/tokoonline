<?php
include_once "connect.php";
include_once "fcheckout.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: login.php");
}
$uid = $_SESSION["uid"];
$tgl = date('dmY');
$uit = $tgl . $uid;
$res = mysqli_query($connect, "SELECT SUM(harga * qty) FROM user AS u INNER JOIN cart AS c ON c.user_id=u.id INNER JOIN barang AS b ON b.id=c.id_produk WHERE u.id='$uid'");
$row = mysqli_fetch_row($res);
$sum = $row[0];
$resb = mysqli_query($connect, "SELECT SUM(berat * qty) FROM user AS u INNER JOIN cart AS c ON c.user_id=u.id INNER JOIN barang AS b ON b.id=c.id_produk WHERE u.id='$uid'");
$rowb = mysqli_fetch_row($resb);
$sumb = $rowb[0];
$cart = barang("SELECT b.nama, c.qty, b.image, b.harga, b.id, b.stok FROM user AS u INNER JOIN cart AS c ON c.user_id=u.id INNER JOIN barang AS b ON b.id=c.id_produk WHERE u.id='$uid'");
if (isset($_POST["submit"])) {
    if (tambahongkir($_POST) > 0 & tambahpembelian($_POST) > 0) {
        echo "<script>alert('data berhasil ditambahkan');
        document.location.href = 'nota.php';</script> ";
    } else {
        echo "<script>alert('data gagal ditambahkan');
        document.location.href = 'index.php';</script> ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Amado - Furniture Ecommerce Template | Checkout</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <?php
        include_once "navbar.php";
        ?>

        <!-- Header Area Start -->
        <?php
        include_once "header.php";
        ?>
        <!-- Header Area End -->

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Sub Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $a = 1;
                                    ?>
                                    <?php
                                    foreach ($cart as $data) :
                                    ?>
                                        <?php
                                        $total = $data["qty"] * $data["harga"];
                                        ?>
                                        <tr>
                                            <input type="hidden" value="<?= $uid ?>" name="userid">
                                            <input type="hidden" value="proses" name="status">
                                            <input type="hidden" value="<?= $id_transaksi ?>" name="transaksi">
                                            <input type="hidden" value="<?= $data["nama"] ?>" name="produk[]">
                                            <input type="hidden" value="<?= $data["qty"] ?>" name="stokdibeli[]">
                                            <td><?= $a ?></td>
                                            <td><?= $data["nama"] ?></td>
                                            <td><?= $data["qty"] ?></td>
                                            <td>Rp <?= number_format($total); ?></td>
                                        </tr>
                                        <?php
                                        $a++;
                                        ?>
                                    <?php
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <div class=" cart-title">
                                <h2>Formulir</h2>
                            </div>

                            <form method="POST">
                                <div class="row">
                                    <div class="col-md-12">

                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="first_name" value="" placeholder="Nama Lengkap" required name="namalengkap">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="nohp" value="" placeholder="No. Hp" required name="nohp">
                                    </div>
                                    <style>
                                        .halo .w-100 {
                                            background-color: #F5F7FA;
                                            border: none;
                                            height: 60px;
                                            color: #676A94;
                                            padding-left: 30px;
                                            font-size: 14px;
                                            border-radius: none;
                                            outline-style: hidden;
                                        }

                                        .halo .w-100:focus {
                                            outline: none !important;
                                            border-color: aqua;
                                            box-shadow: 0 0 0 2px #BFDEFF;
                                        }
                                    </style>
                                    <div class="col-md-12 mb-3 halo">
                                        <select name="nama_provinsi" id="nama_provinsi" class="w-100">

                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3 halo">
                                        <select name="nama_distrik" id="nama_distrik" class="w-100">

                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3 halo">
                                        <select name="nama_ekspedisi" id="nama_ekspedisi" class="w-100">

                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3 halo">
                                        <select name="nama_paket" id="nama_paket" class="w-100">

                                        </select>
                                    </div>
                                    <div class="col-md-4 mb-3 halo">
                                        <input type="text" class="form-control" id="ekspedisi" placeholder="Estimasi" readonly name="estimasi">
                                    </div>
                                    <?php
                                    foreach ($cart as $data) :
                                    ?>
                                        <input type="hidden" value="<?= $data["id"] ?>" name="produk_id[]">
                                        <input type="hidden" value="<?= $data["qty"] ?>" name="qty[]">
                                    <?php
                                    endforeach;
                                    ?>
                                    <?php
                                    date_default_timezone_set('Asia/Jakarta');
                                    $id_transaksi = date("dmyHis") . $uid;

                                    ?>
                                    <input type="hidden" name="idtransaksi" id="idtransaksi" value="<?= $id_transaksi ?>">
                                    <input type="hidden" name="total_berat" value="<?= $sumb ?>">
                                    <input type="hidden" name="provinsi">
                                    <input type="hidden" name="distrik">
                                    <input type="hidden" name="tipe">
                                    <input type="hidden" name="kodepos">
                                    <input type="hidden" name="ekspedisi">
                                    <input type="hidden" name="paket">
                                    <input type="hidden" name="ongkir">
                                    <input type="hidden" name="estimasi">
                                    <input type="hidden" name="idt" value="<?= $uit ?>">
                                    <input type="hidden" name="uid" value="<?= $uid ?>">
                                    <input type="hidden" name="sum" value="<?= $sum ?>">
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="street_address" placeholder="Alamat Lengkap" value="" required name="alamat">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Catatan untuk barang yang ingin di beli"></textarea>
                                    </div>
                                    <button type="submit" class="amado-btn" name="submit">Submit</button>
                                    <div class="col-12">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Metode Pembayaran</h5>

                            <div class="payment-method">
                                <!-- Cash on delivery -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="cod" checked>
                                    <label class="custom-control-label" for="cod">Cash on Delivery</label>
                                </div>
                                <!-- Paypal -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="paypal">
                                    <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="img/core-img/paypal.png" alt=""></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->
    <?php
    include_once "info.php";
    ?>
    <!-- ##### Newsletter Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <?php
    include_once "footer.php";
    ?>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <!-- Active js -->
    <script>
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: "dataprovinsi.php",
                success: function(hasil_provinsi) {
                    $("select[name=nama_provinsi]").html(hasil_provinsi);
                }
            });
            $("select[name=nama_provinsi]").on("change", function() {
                // ambil id provinsi yang dipilih
                var id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
                $.ajax({
                    type: "POST",
                    url: "datadistrik.php",
                    data: 'id_provinsi=' + id_provinsi_terpilih,
                    success: function(hasil_distrik) {
                        $("select[name=nama_distrik]").html(hasil_distrik);
                    }
                });
            });
            $.ajax({
                type: "POST",
                url: "ekspedisi.php",
                success: function(hasil_ekspedisi) {
                    $("select[name=nama_ekspedisi]").html(hasil_ekspedisi);
                }
            });
            $("select[name=nama_ekspedisi]").on("change", function() {
                // mendapatkan ekspedisi terpilih
                var ekspedisi_terpilih = $("select[name=nama_ekspedisi]").val();
                // alert(ekspedisi_terpilih);
                // mendapatkan id_distrik yang dipilih pengguna
                var distrik_terpilih = $("option:selected", "select[name=nama_distrik]").attr("id_distrik");
                // mendapatkan total berat dalam inputan yang di hidden
                var total_berat = $("input[name=total_berat]").val();
                $.ajax({
                    type: "POST",
                    url: "datapaket.php",
                    data: "ekspedisi=" + ekspedisi_terpilih + "&distrik=" + distrik_terpilih + "&berat=" + total_berat,
                    success: function(hasil_paket) {
                        $("select[name=nama_paket]").html(hasil_paket);
                        // meletakan nama ekspedisi terpilih di input ekspedisi
                        $("input[name=ekspedisi]").val(ekspedisi_terpilih);
                    }
                })
            });
            $("select[name=nama_distrik]").on("change", function() {
                var prov = $("option:selected", this).attr("nama_provinsi");
                var dis = $("option:selected", this).attr("nama_distrik");
                var tipe = $("option:selected", this).attr("tipe_distrik");
                var kodepos = $("option:selected", this).attr("kodepos");
                $("option:selected", this).attr("kodepos");
                $("input[name=provinsi]").val(prov);
                $("input[name=distrik]").val(dis);
                $("input[name=tipe]").val(tipe);
                $("input[name=kodepos]").val(kodepos);
            });
            $("select[name=nama_paket]").on("change", function() {
                var paket = $("option:selected", this).attr("paket");
                var ongkir = $("option:selected", this).attr("ongkir");
                var etd = $("option:selected", this).attr("etd");
                $("input[name=paket]").val(paket);
                $("input[name=ongkir]").val(ongkir);
                $("input[name=estimasi]").val(etd);
            })
        });
    </script>
</body>

</html>