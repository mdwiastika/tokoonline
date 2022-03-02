<?php
session_start();
include_once "connect.php";
include_once "fbeli.php";
$uid = $_SESSION["uid"];
$cart = barang("SELECT p.id_transaksi, b.tanggal_bayar, b.uid_bukti, p.total, b.status, p.id_barang, g.nama,b.id_pembayaran FROM pembelian AS p INNER JOIN buktipembayaran AS b ON b.id_transaksi=p.id_transaksi INNER JOIN barang as g ON g.id=p.id_barang WHERE b.uid_bukti=$uid GROUP BY b.id_transaksi");
$history = barang("SELECT * FROM buktipembayaran WHERE uid_bukti=$uid");
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
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
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
                                        <?php
                                        $transaksisaya = $data["id_transaksi"];
                                        $datasaya = barang("SELECT b.nama, b.id FROM barang AS b INNER JOIN pembelian AS p ON b.id=p.id_barang WHERE p.id_transaksi= '$transaksisaya'")
                                        ?>
                                        <tr>
                                            <input type="hidden" value="<?= $data["id_transaksi"] ?>">
                                            <th scope="row"><?= $a ?></th>
                                            <td><?= $data["id_transaksi"] ?></td>
                                            <td><?= $data["status"] ?></td>
                                            <td><a class="amado-btn-group mr-1" href="ubahdatabeli.php?id_pembayaran=<?= $data["id_pembayaran"]; ?>" role="button" onclick="return confirm('Yakin barang sudah diterima?')"><i class="fa fa-edit"></i></a>
                                                <a class="amado-btn-group mr-1" href="hapusdatabeli.php?id_pembayaran=<?= $data["id_pembayaran"]; ?>" role="button" onclick="return confirm('Yakin ingin menghapus history?')"><i class="fa fa-trash"></i></a>
                                            </td>
                                            <td>

                                                <ul><?php
                                                    foreach ($datasaya as $hiii) :
                                                    ?>
                                                        <li><a href="product-details.php?id=<?= $hiii["id"] ?>" style="font-size: medium;"><?= $hiii["nama"] . " "; ?></a></li>
                                                    <?php
                                                    endforeach;
                                                    ?>
                                                </ul>

                                            </td>

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