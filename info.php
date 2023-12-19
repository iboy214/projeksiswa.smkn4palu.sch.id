<?php
$servername = "192.168.1.1";
$username = "berita";
$password = "sevenlight";
$dbname = "berita_smk4palu";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari formulir
$title = $_POST['title'];
$content = $_POST['content'];
$category = $_POST['category'];

// Menyimpan data ke database
$sql = "INSERT INTO news (title, content, category) VALUES ('$title', '$content', '$category')";

if ($conn->query($sql) === TRUE) {
  echo "Berita berhasil ditambahkan!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
