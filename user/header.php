<link rel="stylesheet" href="../fontawesome/css/all.min.css">
<?php
include_once "connect.php";
$uid = $_SESSION["uid"];
$data_barang = mysqli_query($connect, "SELECT * FROM cart AS c INNER JOIN user AS u ON c.user_id=u.id WHERE u.id=$uid");

// menghitung data barang
$jumlah_barang = mysqli_num_rows($data_barang);
?>

<header class="header-area clearfix">
    <!-- Close Icon -->
    <div class="nav-close">
        <i class="fa fa-close" aria-hidden="true"></i>
    </div>
    <!-- Logo -->
    <div class="logo">
        <a href="index.php"><img src="img/core-img/logo.png" alt=""></a>
    </div>
    <!-- Amado Nav -->
    <nav class="amado-nav">
        <ul>
            <li style="letter-spacing: 1px;"><a href="index.php">Home</a></li>
            <li style="letter-spacing: 1px;"><a href="cart.php">Keranjang</a></li>
            <li style="letter-spacing: 1px;"><a href="history.php">History</a></li>
            <li style="letter-spacing: 1px;"><a href="checkout.php">Checkout</a></li>
            <li style="letter-spacing: 1px;"><a href="login.php">Login & Registrasi</a></li>
        </ul>
    </nav>
    <!-- Button Group -->
    <!-- <div class="amado-btn-group mt-30 mb-100">
        <a href="#" class="btn amado-btn mb-15">%Discount%</a>
        <a href="#" class="btn amado-btn active">New this week</a>
    </div> -->
    <!-- Cart Menu -->
    <div class="cart-fav-search mb-100">
        <a href="cart.php" class="cart-nav" style="letter-spacing: 1px;"><i class="fa-solid fa-cart-shopping" style="opacity: .4;"></i> Keranjang (<span><?= $jumlah_barang; ?></span>)</a>
        <a href="history.php" class="fav-nav" style="letter-spacing: 1px;"><i class="fa-solid fa-clock-rotate-left" style="opacity: .4;"></i> History</a>
        <a href="#" class="search-nav" style="letter-spacing: 1px;"><i class="fa-solid fa-magnifying-glass" style="opacity: .4;"></i> Cari</a>
        <a href="logout.php" style="letter-spacing: 1px;"><i class="fa-solid fa-right-from-bracket" style="opacity: .4;"></i> Log Out</a>
    </div>
    <!-- Social Button -->
    <div class="social-info d-flex justify-content-between">
        <a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
    </div>
</header>