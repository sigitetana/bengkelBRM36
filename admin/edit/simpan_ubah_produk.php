<?php 
	include "../conn/koneksi.php";

        $id_sper  = $_POST['id_sper'];
        $nama_sper = $_POST['nama_sper'];
		$kategori = $_POST['kategori'];
		$beli = $_POST['beli'];
		$jual = $_POST['jual'];


        $sql="UPDATE tb_sperpart SET id_kategori ='$kategori', nama_sper='$nama_sper', harga='$beli', jual='$jual'
        WHERE id_sper = '$id_sper'";
        $update=mysqli_query($koneksi, $sql);
        if ($update){
            header("location: ../produk.php");
        }else{
           echo "<script>alert('Produk gagal diubah!'); window.location = 'edit_produk.php'</script>";	
        }

?>