<?php
include "../conn/koneksi.php";
$id_sper = $_GET['kd'];

$query = mysqli_query($koneksi, "DELETE FROM tb_sperpart WHERE id_sper='$id_sper'");
if ($query){
	echo "<script>alert('Produk Berhasil dihapus!'); window.location = '../produk.php'</script>";	
} else {
	echo "<script>alert('Produk Gagal dihapus!'); window.location = '../produk.php'</script>";	
}
?>