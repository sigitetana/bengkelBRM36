<?php 
	include "../conn/koneksi.php";

        $nama_sper  = $_POST['nama_sper'];
        $kategori  = $_POST['kategori'];
        $beli  = $_POST['beli'];
        $jual  = $_POST['jual'];
        $stok  = 0;

        // tambah data pada tabel TB sperpart
        $add="INSERT INTO tb_sperpart VALUES (NULL,'$kategori','$nama_sper','$beli','$jual','$stok')";
        $sperpart=mysqli_query($koneksi, $add);
        if ($sperpart){
            header("location: ../produk.php");
        }else{
           echo "<script>alert('Gagal Menambah Sperpart!'); window.location = 'produk_tambah.php'</script>";	
        }
?>