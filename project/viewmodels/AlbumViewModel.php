<?php
// Pastikan path ke Model Album benar
require_once 'models/Album.php'; 
// Kita juga butuh Model Grup untuk mengisi dropdown Foreign Key (FK)
require_once 'models/Grup.php'; 

class AlbumViewModel
{
    private $albumModel;
    private $grupModel; // Tambahan untuk Foreign Key

    public function __construct()
    {
        // Inisiasi Model Album dan Grup
        $this->albumModel = new Album();
        $this->grupModel = new Grup();
    }

    // --- 1. READ ALL (List) ---
    public function getAlbumList()
    {
        // Memanggil fungsi getAll dari Model Album (sudah ada JOIN ke Grup)
        return $this->albumModel->getAll(); 
    }

    // --- 2. READ BY ID (Detail/Edit Form) ---
    public function getAlbumById($id)
    {
        // Memanggil fungsi getById dari Model Album
        return $this->albumModel->getById($id); 
    }
    
    // --- HELPER: Ambil Semua Grup untuk Dropdown ---
    public function getAllGrupForDropdown()
    {
        // View membutuhkan daftar Grup agar pengguna bisa memilih FK (id_grup)
        return $this->grupModel->getAll();
    }

    // --- 3. CREATE (Menambah Album Baru) ---
    public function addAlbum($id_grup, $judul_album, $tanggal_rilis, $format)
    {
        // Panggil Model untuk menyimpan data
        return $this->albumModel->create($id_grup, $judul_album, $tanggal_rilis, $format);
    }

    // --- 4. UPDATE (Mengubah Data Album) ---
    public function updateAlbum($id, $id_grup, $judul_album, $tanggal_rilis, $format)
    {
        // Panggil Model untuk update
        return $this->albumModel->update($id, $id_grup,  $judul_album,  $tanggal_rilis, $format);
    }

    // --- 5. DELETE (Menghapus Album) ---
    public function deleteAlbum($id)
    {
        // Hapus record dari database
        return $this->albumModel->delete($id);
    }
}