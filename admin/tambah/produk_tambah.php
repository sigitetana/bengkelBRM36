<?php 
    include "../conn/koneksi.php";
    $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Tambah Produk</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-sm rounded text-light" style="background-color: #212529">
            
            <form action="simpan_produk.php" method="POST" enctype="multipart/form-data">
              <div class="text-center">
                <h1 class="text-light">Bengkel Rey Motor 36</h1>
                <p>Tambah Sperpart</p>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Nama Sperpart</label>
                <input type="text" class="form-control" id="nama_sper" name="nama_sper" required>
              </div>

              <div class="mb-3">
                <label for="lokasi" class="form-label">kategori</label><br>
                <select class="form-select" aria-label="Default select example" name="kategori" id="kategori" required>
                  <option disabled selected> pilih kategori Sperpart </option>
                  <?php while($row = mysqli_fetch_array($kategori)) { ?>
                  <option value="<?=$row['id_kategori']?>"> <?=$row['nama_kategori']?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Harga Beli</label>
                <input type="number" class="form-control" id="beli" name="beli" required>
              </div>

              <div class="mb-3">
                <label for="nama" class="form-label">Harga Jual</label>
                <input type="number" class="form-control" id="jual" name="jual" required>
              </div>

              <button type="submit" class="btn btn-info" name="register">Tambah</button>
              <button type="reset" class="btn btn-warning" name="register">reset</button>
            </form>

          </div>
        </div>
      </div>
    </div>
    <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>