<?php 
  
  // koneksi ke databse
  $conn = mysqli_connect("localhost", "root", "", "phpdasar");
  
  //ambil semua data dari table mahasiswa / query data mahasiswa lalu letakkan di kotak data / array di variable $rows
  function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    
    return $rows;
  }
  
  function tambah($data) {
  // koneksi ke database
  global $conn;
  
  // ambil/tangkap data dari tiap elemen dalam form ke dalam variable
  $nrp = htmlspecialchars($data["nrp"]);
  $nama = htmlspecialchars($data["nama"]);
  $email = htmlspecialchars($data["email"]);
  $jurusan = htmlspecialchars($data["jurusan"]);
  
  // upload gambar
  $gambar = upload();
  if(!$gambar) {
    return false;
  }
    
    //query tambah
    //query insert data
    $query = "INSERT INTO mahasiswa VALUES ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
  }
  function upload() {
    // ambil data gambar beserta data name,size,error,tmp_name dari data gambar tersebut
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];
    
    // cek apakah tidak ada gambar yang di upload
    if( $error === 4 ) {
      echo "<script>
              alert('pilih gambar terlebih dahulu!');
            </script>";
            
            return false;
    }
    
    // cek apakah file yang ditambahkan gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile); 
    $ekstensiGambar = strtolower(end($ekstensiGambar)); 
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>
              alert('yang anda pilih bukan gambar!');
            </script>";
            
            return false;
    }
    
    // cek ukuran file gambar jika terlalu besar
    if($ukuranFile > 1000000 ) {
      echo "<script>
              alert('ukuran gambar yang anda pilih terlalu besar!');
            </script>";
            
            return false;
    }
    
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar; 
    
    // lolos pengecekan gambar siap di upload
    move_uploaded_file($tmpName, 'poto/'.$namaFileBaru);
    
    return $namaFileBaru;
  }
  
  // Ambil argumen dari function hapus di halaman hapus.php tangkap ke parameter $id
  // proses data agar bisa dihapus
  function hapus($id) {
    // koneksi ke koneksi database
    global $conn;
    
    // query hapus
    // query meghapus data dimana field id di table harus sama dengan parameter atau argumen yang diberikan
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    
    // kembalikan nilai 1 jika benar -1 jika salah/error
    return mysqli_affected_rows($conn);
  }
  
  function ubah($data) {
    //koneksi ke database
    global $conn;
    
    // tangkap data dari setiap elemen dalam form
    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    
    // cek apakah user menggunakan gambar baru atau tidak
    if($_FILES["gambar"]["error"] === 4) {
      $gambar = $gambarLama;
    } else {
      $gambar = upload();
    }
    
    //query ubah / update
    // query timpa field yg ada di database dengan data baru yang ditangkap diatas 
    $query = "UPDATE mahasiswa SET
      nrp = '$nrp',
      nama = '$nama',
      email = '$email',
      jurusan = '$jurusan',
      gambar = '$gambar'
      WHERE id = $id
    ";
    
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
  }
  
  // ambil argumen dari function yang ada di homepage.php ke parameter dalam bentuk variable $keyword
  // lalu proses serching 
  function cari($keyword) {
  
    //query serching
    $query = "SELECT * FROM mahasiswa WHERE 
      nama LIKE '%$keyword%' OR
      nrp LIKE '%$keyword%'OR
      email LIKE '%$keyword%'OR
      jurusan LIKE '%$keyword%'
    ";
    return query($query); 
  }
?>