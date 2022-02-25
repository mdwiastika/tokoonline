<?php
include_once "fbelibarang.php";
include_once "connect.php";
session_start();
if (!isset($_SESSION["login"])) {
    header("location: ../user/login.php");
}
$id = $_GET["id_pembayaran"];
$ubah = barang("SELECT * FROM buktipembayaran WHERE id_pembayaran = $id")[0];
if (isset($_POST["submit"])) {
    if (ubah($_POST) > 0) {
        echo "<script>alert('data berhasil diubah');
        document.location.href = 'datapembelian.php';</script> ";
    } else {
        echo "<script>alert('data gagal diubah');
        document.location.href = 'datapembelian.php';</script> ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Simple Tables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="image.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include_once "header.php";
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include_once "sidebar.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <div class="container card shadow overflow-hidden mt-5 p-5" style="width: 70%;">
                            <h3 class="text-center">Ubah Data</h3>
                            <hr />
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="hidden" name="id_pembayaran" value="<?= $ubah["id_pembayaran"] ?>">
                                    <label for="nama">ID Transaksi:</label>
                                    <input disabled class="form-control" id="" name="" value="<?= $ubah["id_transaksi"] ?>">
                                    <input type="hidden" name="id_transaksi" id="id_transaksi" value="<?= $ubah["id_transaksi"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="stok">Status:</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="pengemasan">-- Pilih Status --</option>
                                        <option value="Selesai Dikemas">Selesai Dikemas</option>
                                        <option value="Proses Pengiriman">Proses Pengiriman</option>
                                        <option value="Sudah Dikirim">Sudah Dikirim</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include_once "footer.php";
        ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <script src="image.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>