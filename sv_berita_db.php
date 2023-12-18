<?php
// Koneksi ke database
$dbHost = 'localhost';
$dbUser = 'root'; // Ganti dengan username MySQL Anda
$dbPass = ''; // Ganti dengan password MySQL Anda
$dbName = 'berita_db';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Tangkap data dari formulir
$title = $_POST['title'];
$content = $_POST['content'];

// Simpan gambar
$imagePath = 'uploads/' . basename($_FILES['image']['name']);
move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);

// Query SQL untuk menyimpan berita ke database
$sql = "INSERT INTO news (title, content, image_path) VALUES ('$title', '$content', '$imagePath')";

if ($conn->query($sql) === TRUE) {
    echo "Berita berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
