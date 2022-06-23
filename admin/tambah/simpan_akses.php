<?php 
	include "../conn/koneksi.php";

        $username  = $_POST['username'];
        $password  = $_POST['password'];
        $nama  = $_POST['nama'];

        // tambah data pada tabel TB masuk
        $add="INSERT INTO tb_akses VALUES (NULL,'$username','$password','$nama')";
        $masuk=mysqli_query($koneksi, $add);
        if ($masuk){
            header("location: ../hak_akses.php");
        }else{
           echo "<script>alert('Gagal Tambah Akun!'); window.location = 'akses.php'</script>";	
        }
?>