<?php 
  require 'functions.php';
  
  // ambil data dari url masukan ke variable $id
  $id = $_GET["id"];
  
  // kirim kan data url ke function hapus dengan argumen variable $id serta jalankan 
  //jika berhasil atau data lebih dari 0 atau sama dengan satu data berhasil dihapus jika kurang dari 0 atau -1 data gagal dihapus
  // lalu pindahkan halaman ke homepage.php
  if(hapus($id) > 0) {
    echo "<script>
              alert('data berhasil di dihapus!'); 
              document.location.href = 'homepage.php';
            </script>";
  } else {
    echo "<script>
              alert('data gagal di dihapus!'); 
              document.location.href = 'homepage.php';
            </script>";
  }
?>