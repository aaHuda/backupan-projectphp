<?php 
  require 'functions.php';
  
  $id = $_GET["id"];
  
  $mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];
  
  //cek apakah tombol submit sudah ditekan atau belum
  if(isset($_POST["submit"])) {
   // cek apakah data berhasil ditambahkan atau tidak
    if(ubah($_POST) > 0) {
      echo "<script>
              alert('data berhasil di ubah!'); 
              document.location.href = 'homepage.php';
            </script>";
    } else {
      echo "<script>
              alert('data gagal di ubah!'); 
              document.location.href = 'homepage.php';
            </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah page</title>
</head>
<style>
  .labelGambar {
    position:absolute;
  }
  
  img {
    margin-left: 70px;
  }
  
  ul li {
    list-style-type: none;
  }
</style>
<body>
  <h1>Ubah Data Mahasiswa</h1>
  
  <form method="post" action="" enctype="multipart/form-data">
    <ul>
      <li>
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
      </li>
      <li>
        <label for="nrp">NRP :</label>
        <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
      </li><br>
      <li>
      <label for="nama">Nama :</label>
      <input type="text" name="nama" id="nama" required value="<?= $mhs["Nama"]; ?>">
      </li><br>
      <li>
      <label for="email">Email :</label>
      <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
      </li><br>
      <li>
        <label for="jurusan">jurusan :</label>
        <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
      </li><br>
      <li>
        <label for="gambar" class="labelGambar">Gambar :</label>
        <img src="poto/<?= $mhs["gambar"] ?> "height="100" width="100"><br><br>
        <input type="file" name="gambar" id="gambar">
      </li><br>
      <li>
        <button type="submit" name="submit">kirim</button>
      </li>
    </ul>
  </form>
  
</body>
</html>