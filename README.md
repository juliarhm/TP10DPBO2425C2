### Janji
Saya Julia Rahmawati dengan NIM 2400742 mengerjakan tugas prkatikum 10 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahannya maka saya tidak melakukan kecurangan seperti yang telah di spesifikasikan. Aamiin.

### Desain Program 
Program ini dibuat menggunakan arsitektur Model-View-ViewModel untuk mengelola data pembalap dan sirkuit. Bahasa pemrograman yang dipakai adalah PHP. MVVM adalah arsitektur yang memisahkan aplikasi menjadi 3 komponen, yaitu:
#### 1. Models
Bertanggung jawab langsung dalam berinteraksi dengan database(DB). Tugasnya antara lain itu, menyimpan data dan berisi semua logika CRUD menggunakan PDO untuk koneksi.
#### 2. Views
Bertanggung jawab untuk menampilkan data kepada user dan menerima input dari user. Tugasnya itu adalah menampilkan data yang diproses oleh ViewModel. DI view hanya ada HTML dan sedikit kode PHP untuk menampilkan variabel. Jadi disini tuh gak ada logika bisnis atau koneksi ke database.
#### 3. ViewModel
Adalah jemabatan untuk Model dan View. Tugasnya itu berisi logika bisnis seperti validasi input, proses data sebelum di simpan dan penggabungan data. Tugas lainnya itu juga sebagai tempan menyimpan data yang siap untuk di tampilkan oleh View. 
#### 4. Desain Database
Database ini memiliki 4 tabel utama yang saling terhubung menggunakan Foreign Keys. Tabel-tabelnya itu antara lain : 
1. Tabel agensi
   Atribut/Kolom : id_agensi, nama_agensi, tahun_agensi, dan lokasi_agensi
2. Tabel grup
   Atribut/kolom : id_grup, nama_grup, tanggal_debut, tipe, id_agensi(Foreign key ke agensi karena setiap grup memiliki 1 agensi).
3. Tabel anggota
   Atribut/kolom : id_anggota, nama_panggung, nama_lahir, tanggal_lahir, dan id_grup(FK ke grup karena setiap anggota terdapat di 1 grup)
4. Tabel album
   Atribut/kolom : id_album, nama_album, tanggal_liris, dan id_grup (FK ke grup karena 1 album di miliki oleh satu grup)
   
### Alur Program
Contohnya itu Daftar Tabel Grup 
1. Permintaan : user mengakses index.php.
2. Index.php : menerima permintaan dan menginisialisai GrupViewModel.
3. ViewModel(GrupViewModel.php) : Memanggil fungsi getGrupList().
4. Model(Grup.php) : mengeksekusi query SELECT dengan JOIN untuk mengambil data Grup dan Nama Agensi sesuai dari Database.
5. Index.php : memuat View/grup_list.php
6. View(grup_list.php) : menampilkan data ke pengguna dalam format tabel HTML.

### Dokumentasi
#### 1. Tabel Agensi
![video](dokumentasi/tabel_agensi.mp4)
#### 2. Tabel Album
![video](dokumentasi/tabel_album.mp4)
#### 3. Tabel Anggota
![vide](dokumentasi/tabel_anggota.mp4)
#### 4. Tabel Album
![Video](dokumentasi/tabel_grup.mp4)
