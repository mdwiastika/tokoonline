<?php
session_start();
include_once "connect.php";
include_once "fbeli.php";
$uid = $_SESSION["uid"];
$cart = barang("SELECT p.id_transaksi, b.tanggal_bayar, b.uid_bukti, p.total, b.status, p.id_barang, g.nama FROM pembelian AS p INNER JOIN buktipembayaran AS b ON b.id_transaksi=p.id_transaksi INNER JOIN barang as g ON g.id=p.id_barang WHERE b.uid_bukti=$uid");
$history = barang("SELECT * FROM buktipembayaran WHERE uid_bukti=$uid");
$dsn = '';
$harga = '';
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
    <title>Amado - Furniture Ecommerce Template | Shop</title>

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
        <?php
        include_once "header.php";
        ?>
        <!-- Header Area Start -->
        <div class="amado_product_area section-padding-100 mx-auto">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="container card shadow overflow-hidden p-5 m-auto" style="width: 100%;">

                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Transaksi</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Barang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $a = 1;
                                    ?>
                                    <?php
                                    foreach ($cart as $data) :
                                    ?>
                                        <tr>
                                            <input type="hidden" value="<?= $data["id_transaksi"] ?>">
                                            <?php
                                            if ($dsn != $data['id_transaksi']) {
                                            ?>
                                                <th scope="row"><?= $a ?></th>
                                                <td><?= $data["id_transaksi"] ?></td>
                                                <td>Rp <?= number_format($data["total"], 0, "", ".")  ?></td>
                                                <td><?= $data["status"] ?></td>
                                            <?php
                                            } else {
                                                $a--;
                                            ?>
                                                <th></th>
                                                <td> </td>
                                                <td></td>
                                                <td></td>
                                            <?php };
                                            $dsn = $data['id_transaksi'];
                                            ?>
                                            <td><?= $data["nama"] ?></td>
                                        </tr>
                                        <?php
                                        $a++;
                                        ?>
                                    <?php
                                    endforeach;
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>
    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### Newsletter Area Start ##### -->

    <!-- ##### Footer Area End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

    <!-- Untuk melihat input type password -->
</body>

</html>