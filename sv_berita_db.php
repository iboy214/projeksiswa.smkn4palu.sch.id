<?php
// Konfigurasi database
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "beritaterkini"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Tangkap data dari formulir
$judul = $_POST['judul'];
$isi = $_POST['isi'];

// Simpan gambar
$gambarPath = 'uploads/' . basename($_FILES['gambar']['name']);
move_uploaded_file($_FILES['gambar']['tmp_name'], $gambarPath);

// Query SQL untuk menyimpan berita ke database
$sql = "INSERT INTO berita (judul, isi, gambar_path) VALUES ('$judul', '$isi', '$gambarPath')";

if ($conn->query($sql) === TRUE) {
    echo "Berita berhasil diunggah!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
