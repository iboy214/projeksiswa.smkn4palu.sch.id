import mysql.connector

# Konfigurasi koneksi database
db_config = {
    "host": "https://iboy214.github.io/projeksiswa.smkn4palu.sch.id/",
    "user": "root",
    "password": "",
    "database": "berita_db"
}

# Membuat koneksi
conn = mysql.connector.connect(**db_config)

# Membuat objek cursor
cursor = conn.cursor()

# Contoh data yang akan disimpan
judul = "Judul"
isi = "Ini adalah isi berita."
gambar_path = "path_ke_gambar.jpg"

# Query SQL untuk menyimpan data ke tabel news
sql = "INSERT INTO news (title, content, image_path) VALUES (%s, %s, %s)"

# Eksekusi query dengan data yang disediakan
cursor.execute(sql, (judul, isi, gambar_path))

# Commit perubahan ke database
conn.commit()

# Menutup cursor dan koneksi
cursor.close()
conn.close()
