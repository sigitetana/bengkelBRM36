<?php 
    include "../conn/koneksi.php";
    $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
?>

<!-- Fungsi Menampilkan Data dari Database -->
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM tb_sperpart INNER JOIN tb_kategori ON tb_kategori.`id_kategori` = tb_sperpart.`id_kategori` WHERE id_sper='$_GET[kd]'");
        $d  = mysqli_fetch_array($query);
        ?>
<!-- End -->	

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Edit Produk</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-sm rounded text-light" style="background-color: #212529">

            <form action="simpan_ubah_produk.php" method="POST" enctype="multipart/form-data">
              <div class="text-center">
                <h1 class="text-light">Bengkel Motor Rey 36</h1>
                <p>Edit Produk</p>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">ID Sperpart</label>
                <input readonly="readonly" type="text" class="form-control" id="id_sper" name="id_sper" value="<?php echo $d['id_sper']; ?>" required>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Nama Sperpart</label>
                <input type="text" class="form-control" id="nama_sper" name="nama_sper" value="<?php echo $d['nama_sper']; ?>" required>
              </div>

              <div class="mb-3">
                <label for="lokasi" class="form-label">kategori</label><br>
                <select class="form-select" aria-label="Default select example" name="kategori" id="kategori" required>
                  <option><?php echo $d['id_kategori']; ?></option>
                  <?php while($row = mysqli_fetch_array($kategori)) { ?>
                  <option value="<?=$row['id_kategori']?>"> <?=$row['nama_kategori']?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" id="beli" name="beli" value="<?php echo $d['harga']; ?>" required>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="jual" name="jual" value="<?php echo $d['jual']; ?>" required>
              </div>

              <button type="submit" class="btn btn-info" name="register">update</button>
            </form>

            </div>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>