<?php
require_once 'models/Agensi.php'; 

class AgensiViewModel
{
    private $agensiModel;

    public function __construct()
    {
        // Inisiasi Model Agensi
        $this->agensiModel = new Agensi(); 
    }

    // --- 1. READ ALL (List) ---
    public function getAgensiList()
    {
        // Memanggil fungsi getAll dari Model Agensi
        return $this->agensiModel->getAll(); 
    }

    // --- 2. READ BY ID (Detail/Edit Form) ---
    public function getAgensiById($id)
    {
        // Memanggil fungsi getById dari Model Agensi
        return $this->agensiModel->getById($id); 
    }

    // --- 3. CREATE (Menambah Agensi Baru) ---
    public function addAgensi($nama_agensi, $tahun_berdiri, $lokasi_kantor)
    {
        // Sesuaikan parameter dengan kolom tabel Agensi
        return $this->agensiModel->create($nama_agensi, $tahun_berdiri, $lokasi_kantor);
    }

    // --- 4. UPDATE (Mengubah Data Agensi) ---
    public function updateAgensi($id, $nama_agensi, $tahun_berdiri, $lokasi_kantor)
    {
        // Sesuaikan parameter dengan kolom tabel Agensi
        return $this->agensiModel->update($id, $nama_agensi, $tahun_berdiri, $lokasi_kantor);
    }

    // --- 5. DELETE (Menghapus Agensi) ---
    public function deleteAgensi($id)
    {
        // Memanggil fungsi delete dari Model Agensi
        return $this->agensiModel->delete($id);
    }
}