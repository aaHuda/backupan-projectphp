<?php 
  require 'functions.php';
  
  $mahasiswa = query("SELECT * FROM mahasiswa");
  
  // tombol cari ditekan
  if(isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>homepage</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap');
  
  body {
    display:flex;
    background-color: #000;
    flex-wrap:wrap;
    justify-content:center;
    text-align:center;
    color: #fff;
    font-family: 'Quicksand', sans-serif;
  }
  
  span {
    background-color: #181818;
    margin-left:2px;
    margin-bottom:2px;
    z-index: -999;
    position: relative;
    display: flex;
    width: calc(7.5vw - 3px);
    height: calc(7.5vw - 3px);
  }
  
  h1 {
    position: absolute;
    margin-top:45px;
    color: #0f0;
    z-index: 1;
  }
  
  table {
    position: absolute;
    margin-top:155px;
    background-color: #181818;
    border: #eaeaeaea;
  }
  
  th {
    background-color: #0f0;
  }
  
  form {
    position:absolute;
    top:120px;
    left:875px;
  }
  
  .cari {
    position:absolute;
    top:125px;
    right:1060px;
  }
  
  a {
    text-decoration:none;
    color: #0f0;
  }
  
  input {
    border-radius:20px;
    border-color: #0f0;
    outline:none;
    padding:5px;
    width:260px;
    padding-left:15px;
  }
  
  input:hover {
    
  }
  
  button {
    border-radius:20px;
    outline:none;
    border:none;
    height:25px;
    width:50px;
    background-color: #0f0;
    color: #fff;
    cursor: pointer;
  }
  
</style>
<body>
  
  <?php 
    for($i = 1; $i <= 507; $i++) {
      echo '<span></span>';
    }
  ?>
  
  <h1>Daftar Siswa-Siswi SMKN 4 JKT</h1>
  
  <form method="post" action="">
    <input type="text" name="keyword"  placeholder="masukan pencarian..." autofocus autocomplete="off">
    <button name="cari" type="submit">cari</button>
  </form>
  
  <a href="tambah.php" class="cari">Tambah Mahasiswa</a>
  
  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>NRP</th>
      <th>Email</th>
      <th>Jurusan</th>
    </tr>
    
    <?php $i = 1; ?>
    <?php foreach($mahasiswa as $row) : ?>
    <tr>
      <td><?= $i."."; ?></td>
      <td>
        <a href="ubah.php?id=<?= $row["id"] ?>">ubah</a> |
        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin ingin dihapus?');">hapus</a>
      </td>
      <td><img src="poto/<?= $row["gambar"]; ?> "height="50" width="50"></td>
      <td><?= $row["Nama"]; ?></td>
      <td><?= $row["nrp"]; ?></td>
      <td><?= $row["email"]; ?></td>
      <td><?= $row["jurusan"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
  </table>
</body>
</html>