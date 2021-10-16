<?php
    if($_GET['id_siswa']){
        include "koneksi.php";
        $query_hapus=mysqli_query($koneksi,"delete from siswa where id_siswa='".$_GET['id_siswa']."'");
    if($query_hapus){
        echo "<script>alert('Sukses hapus siswa');location.href='tampil_siswa.php';</script>";
    } else {
        echo "<script>alert('Gagal hapus siswa');location.href='tampil_siswa.php';</script>";
        }
    } 
?>