<?php
session_start();
include_once "connect.php";
include_once "fbayartk.php";
$uid = $_SESSION["uid"];
if (isset($_POST["submit"])) {
    if (tambahsold($_POST) > 0) {
        echo "<script>alert('data berhasil ditambahkan');</script> ";
    } else {
        echo "<script>alert('data gagal ditambahkan');</script> ";
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

        <!-- Header Area Start -->
        <div class="amado_product_area section-padding-100 mx-auto">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="container card shadow overflow-hidden p-5 m-auto" style="width: 100%;">
                            <div class="cart-title text-center">
                                <h2>Form Pembayaran</h2>
                            </div>
                            <form method="POST">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <input type="hidden" class="form-control" id="first_name" value="<?= $uid ?>" placeholder="id" name="userid">
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
                                        <label for="gambar">Kirim Foto Bukti Pembayaran:</label>
                                        <input type="file" class="form-control" id="gambar" name="image" autocomplete="off" onchange="readURL(this);" style="max-width: 150px;">
                                        <img id="blah" src="http://placehold.it/180" alt="your image" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <img src="../qrcode.jpeg" alt="" style="max-width: 100px; display: inline-block;">
                                    </div>
                                    <button type="submit" class="amado-btn" name="submit" style="display: inline-block;">Submit</button>
                                    <div class="col-12">
                                    </div>
                                </div>
                            </form>
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
    <script src="../admin/image.js"></script>

    <!-- Untuk melihat input type password -->
</body>

</html>