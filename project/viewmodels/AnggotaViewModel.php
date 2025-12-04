<?php

require_once 'models/Anggota.php';
require_once 'models/Grup.php'; 

class AnggotaViewModel
{
    private $anggotaModel;
    private $grupModel; 

    public function __construct()
    {
        // Inisiasi Model Anggota dan Grup
        $this->anggotaModel = new Anggota(); 
        $this->grupModel = new Grup(); // Menggunakan nama yang lebih jelas
    }

    // --- 1. READ ALL (List) ---
    public function getAnggotaList()
    {
        // Memanggil fungsi getAll dari Model Anggota (sudah ada JOIN ke Grup)
        return $this->anggotaModel->getAll(); 
    }

    // --- 2. READ BY ID (Detail/Edit Form) ---
    public function getAnggotaById($id)
    {
        // Memanggil fungsi getById dari Model Anggota
        return $this->anggotaModel->getById($id); 
    }
    
    // --- HELPER: Ambil Semua Grup (Untuk Dropdown Foreign Key) ---
    public function getAllGrupForDropdown()
    {
        // View membutuhkan daftar Grup agar pengguna bisa memilih FK (id_grup)
        return $this->grupModel->getAll();
    }

    // --- 3. CREATE (Menambah Anggota Baru) ---
    public function addAnggota($id_grup, $nama_panggung, $nama_asli, $tanggal_lahir, $posisi_utama)
    {
        return $this->anggotaModel->create($id_grup, $nama_panggung, $nama_asli, $tanggal_lahir, $posisi_utama);
    }

    // --- 4. UPDATE (Mengubah Data Anggota) ---
    public function updateAnggota($id, $id_grup, $nama_panggung, $nama_asli, $tanggal_lahir, $posisi_utama)
    {  
        // Panggil Model untuk update (sesuaikan parameter dengan kolom anggota)
        return $this->anggotaModel->update($id, $id_grup, $nama_panggung, $nama_asli, $tanggal_lahir, $posisi_utama);
    }

    // --- 5. DELETE (Menghapus Anggota) ---
    public function deleteAnggota($id)
    {   
        // Hapus record dari database
        return $this->anggotaModel->delete($id);
    }
}