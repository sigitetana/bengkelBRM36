<?php 
	include "../conn/koneksi.php";
    date_default_timezone_set("Asia/Jakarta");

        $id_sper  = $_POST['id_sper'];
        $nama_sper  = $_POST['nama_sper'];
        $stok = $_POST['stok'];
		$tambah = $_POST['tambah'];
        $harga = $_POST['harga'];
		$jual = $_POST['jual'];

        $tgl = date("Y-m-d");

		$hasil = $stok-$tambah;
        $jumlah = $hasil;

        // update stok
        $sql="UPDATE tb_sperpart SET stok ='$jumlah' WHERE id_sper = '$id_sper'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../produk.php");
        }else{
           echo "<script>alert('Gagal Menambah Stok'); window.location = 'tambah_stok.php'</script>";	
        }

        // tambah data pada tabel TB masuk
        $add="INSERT INTO tb_keluar VALUES (NULL,'$id_sper','$jumlah','$tgl')";
        $masuk=mysqli_query($koneksi, $add);
        if ($masuk){
            header("location: ../produk.php");
        }else{
           echo "<script>alert('Produk gagal diubah!'); window.location = 'tambah_stok.php'</script>";	
        }

        // hitung pendapatan
        $hitung = $jual*$tambah;
        $pendapatan = $hitung;
        $status = "Keluar";
        // tambah data pada tabel TB Laporan
        $query="INSERT INTO tb_laporan VALUES (NULL,'$id_sper','$status','$tambah','$pendapatan','$tgl')";
        $xxx=mysqli_query($koneksi, $query);
        if ($xxx){
            header("location: ../produk.php");
        }else{
           echo "<script>alert('Produk gagal diubah!'); window.location = 'tambah_stok.php'</script>";	
        }

?>