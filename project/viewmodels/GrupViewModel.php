<?php
require_once 'models/Grup.php'; 
require_once 'models/Agensi.php';

class GrupViewModel
{
    private $grupModel;
    private $agensiModel;

    public function __construct()
    {
        $this->grupModel = new Grup(); 
        $this->agensiModel = new Agensi();
    }

    // --- 1. READ ALL (List) ---
    public function getGrupList()
    {
        // Memanggil fungsi getAll dari Model Grup (sudah ada JOIN ke Agensi)
        return $this->grupModel->getAll(); 
    }

    // --- 2. READ BY ID (Detail/Edit Form) ---
    public function getGrupById($id)
    {
        // Memanggil fungsi getById dari Model Grup
        return $this->grupModel->getById($id); 
    }
    
    // --- HELPER: Ambil Semua Agensi (Untuk Dropdown Foreign Key) ---
    public function getAllAgensiForDropdown()
    {
        // View membutuhkan daftar Agensi agar pengguna bisa memilih FK (id_agensi)
        return $this->agensiModel->getAll();
    }

    // --- 3. CREATE (Menambah Grup Baru) ---
    public function addGrup($id_agensi, $nama_grup, $tanggal_debut, $tipe)
    {   
        // Panggil Model untuk menyimpan data (sesuaikan parameter dengan kolom grup)
        return $this->grupModel->create( $id_agensi,  $nama_grup,  $tanggal_debut,  $tipe);
    }

    // --- 4. UPDATE (Mengubah Data Grup) ---
    public function updateGrup($id, $id_agensi, $nama_grup, $tanggal_debut, $tipe)
    {
        // Panggil Model untuk update (sesuaikan parameter dengan kolom grup)
        return $this->grupModel->update($id, $id_agensi, $nama_grup, $tanggal_debut, $tipe);
    }

    // --- 5. DELETE (Menghapus Grup) ---
    public function deleteGrup($id)
    {
        return $this->grupModel->delete($id);
    }
}