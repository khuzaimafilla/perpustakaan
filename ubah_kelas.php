<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Ubah Kelas</title>
</head>
<body>
    <?php
    include "navbar.php";
    include "koneksi.php";
    $qry_get_kelas=mysqli_query($koneksi, "select * from kelas where id_kelas = '".$_GET['id_kelas']."'");
    $dt_kelas=mysqli_fetch_array($qry_get_kelas);
    ?>
    <h3>Ubah Kelas</h3>
    <form action="proses_ubah_kelas.php" method="post">
        <input type="hidden" name="id_kelas" value="<?=$dt_kelas['id_kelas']?>">
        Nama Kelas :
        <input type="text" name="nama_kelas" value="<?=$dt_kelas['nama_kelas']?>" class="form-control">
        Kelompok :
        <input type="text" name="kelompok" value="<?=$dt_kelas['kelompok']?>" class="form-control">
        <input type="submit" name="simpan" value="Ubah Kelas" class="btn btn-primary">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>