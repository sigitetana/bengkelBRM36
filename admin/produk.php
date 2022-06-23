<!-- Fungsi Session -->
<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "conn/koneksi.php";
?>
<!-- End -->

<?php
    require "conn/koneksi.php";
    error_reporting(0);
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <title>Produk</title>
</head>
      <!-- Fungsi Waktu Session -->
      <?php
            $timeout = 10; // Set timeout minutes
            $logout_redirect_url = "../index.php"; // Set logout URL

            $timeout = $timeout * 60; // Converts minutes to seconds
            if (isset($_SESSION['start_time'])) {
                $elapsed_time = time() - $_SESSION['start_time'];
                if ($elapsed_time >= $timeout) {
                    session_destroy();
                    echo "<script>alert('Sesi Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
                }
            }
            $_SESSION['start_time'] = time();
            ?>
            <?php } ?>
            <!-- End -->
<body>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
                    class="fas fa-user-secret me-2"></i>Rey 36</div>
            <div class="list-group list-group-flush my-3">
                <a href="dashboard.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="produk.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-project-diagram me-2"></i>Barang | Sperpart</a>
                <a href="kategori.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Kategori | Sperpart</a>
                <a href="laporan.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Laporan Penjualan</a>
                <a href="hak_akses.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Hak Akses</a>
                <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Sperpart</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><b><?php echo $_SESSION['nama'];?></b>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">

                <div class="row my-5">
                    <div class="col">
                        <a class="btn btn-primary mb-3" href="tambah/produk_tambah.php"><i class="fa fa-plus-square "></i> Tambah Sperpart</a>
                        <form class="example text-right" method="POST" action="" style="margin:0px;max-width:300px">
                            <input type="text" placeholder="Search" name="cari">
                            <button type="submit"><i class="fa fa-search"></i> cari</button>
                        </form>
                        <?php 
                            $cari = $_POST['cari'];
                        ?>
                        <br>

                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr align="center">
                                    <th scope="col" width="10">No. </th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Kategori</th>
                                    <th scope="col">Harga Beli</th>
                                    <th scope="col">harga Jual</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Proses Stok</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $no=0;
                                    if($cari != ''){
                                        $data = mysqli_query($koneksi,"SELECT * FROM tb_sperpart INNER JOIN tb_kategori ON tb_kategori.`id_kategori` = tb_sperpart.`id_kategori` 
                                        WHERE nama_sper like '%".$cari."%' OR
                                        nama_kategori like '%".$cari."%' OR
                                        stok like '%".$cari."%' ");
                                    }else{
                                        $data = mysqli_query($koneksi,"SELECT * FROM tb_sperpart INNER JOIN tb_kategori ON tb_kategori.`id_kategori` = tb_sperpart.`id_kategori` ");
                                    }
                                    
                                    if(mysqli_num_rows($data)){
                                    while($d = mysqli_fetch_array($data)){
                                        $no++;
                                        ?>
                                <tr align="center">
                                    <td><?php echo "$no" ?></td>                                                    
                                    <td><?php echo $d['nama_sper']; ?></td>                           
                                    <td><?php echo $d['nama_kategori']; ?></td>                           
                                    <td>Rp. <?php echo $d['harga']; ?></td>                           
                                    <td>Rp. <?php echo $d['jual']; ?></td>                           
                                    <td><?php echo $d['stok']; ?></td>
                                    <td><div id="thanks">
                                        <a onclick="return confirm ('Tambah Stok <?php echo $d['nama_sper'];?>.?');" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Tambah Stok Produk" href="edit/tambah_stok.php?hal=tambah&kd=<?php echo $d['id_sper'];?>"><span class="fas fa-arrow-circle-up"> </span></a>
                                        <a onclick="return confirm ('Kurangi Stok <?php echo $d['nama_sper'];?>.?');" class="btn btn-sm btn-warning tooltips" data-placement="bottom" data-toggle="tooltip" title="Kurang Stok Produk" href="edit/kurang_stok.php?hal=kurang&kd=<?php echo $d['id_sper'];?>"><span class="fas fa-arrow-circle-down"> </span></a>
                                    </td>                            
                                    <td><div id="thanks">
                                        <a onclick="return confirm ('Yakin hapus <?php echo $d['nama_sper'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Produk" href="hapus/hapus_produk.php?hal=hapus&kd=<?php echo $d['id_sper'];?>"><span class="fa fa-lg fa-trash"> </span></a>
                                        <a onclick="return confirm ('Yakin Edit <?php echo $d['nama_sper'];?>.?');" class="btn btn-sm btn-primary tooltips" data-placement="bottom" data-toggle="tooltip" title="Edit Produk" href="edit/edit_produk.php?hal=edit&kd=<?php echo $d['id_sper'];?>"><span class="fa fa-lg fa-edit"> </span></a>
                                    </td>                           
                                </tr>
                                <?php
                                    }}else{
                                        echo '<tr><td colspan="6" align="center" style="color: red">Data Produk yang dicari Tidak ditemukan <span style="color: black">klik cari untuk menampilkan semua data<span></td></tr>';
                                    }
			                    ?>
                              </tbody>  
                        </table>
                        <!-- <a target="_blank" class="btn btn-primary mb-3" href="cetak.php?cetak=<?php echo $cari; ?>"><i class="fa fa-print "></i> Cetak</a>
                             -->
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>