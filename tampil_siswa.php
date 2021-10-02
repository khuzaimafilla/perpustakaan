<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<?php
  include "navbar.php";
?>
    <div class="container">
    <h1>Data Siswa</h1>
    <form action = "tampil_siswa.php" method = "POST">
        <input type = "text" name = "cari" class = "form-control" placeholder = "Mau Cari Siapa?"/>
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID Siswa</th>
      <th scope="col">Nama Siswa</th>
      <th scope="col">Tanggal Lahir</th>
      <th scope="col">Alamat</th>
      <th scope="col">Gender</th>
      <th scope="col">Username</th>
      <th scope="col">PW</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "koneksi.php";
    if (isset($_POST["cari"])){
        //jika ada keyword pencarian
        $cari = $_POST['cari'];
        $query_siswa = mysqli_query($koneksi, "select * from siswa where id_siswa like '%$cari%' or nama_siswa like '%$cari%'");
    } else {
        //jika tidak ada keyword pencarian
        $query_siswa = mysqli_query($koneksi, "select * from siswa");
    }
    while ($data_siswa = mysqli_fetch_array($query_siswa)){?>
        <tr> 
            <td><?php echo $data_siswa["id_siswa"];?></td>
            <td><?php echo $data_siswa["nama_siswa"];?></td>
            <td><?php echo $data_siswa["tanggal_lahir"];?></td>
            <td><?php echo $data_siswa["alamat"];?></td>
            <td><?php echo $data_siswa["gender"];?></td>
            <td><?php echo $data_siswa["username"];?></td>
            <td><?php echo $data_siswa["password"];?></td>
            <td>
            <a href="ubah_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-primary">Ubah</a>
              <a href="hapus_siswa.php?id_siswa=<?=$data_siswa['id_siswa']?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
    <?php
    }
    ?>
  </tbody>
</table>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>