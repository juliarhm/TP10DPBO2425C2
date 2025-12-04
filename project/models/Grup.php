<?php
require_once "config/Database.php";

class Grup
{
    private $conn;
    private $table = "grup"; // Nama tabel

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // --- 1. READ: Ambil Semua Grup (dengan JOIN ke Agensi untuk Data Binding) ---
    public function getAll()
    {
        $query = "SELECT 
                    g.id_grup, 
                    g.nama_grup, 
                    g.tanggal_debut, 
                    g.tipe, 
                    g.id_agensi,
                    a.nama_agensi  -- Data dari tabel AGENSI
                  FROM 
                    " . $this->table . " g
                  JOIN 
                    agensi a ON g.id_agensi = a.id_agensi
                  ORDER BY 
                    g.tanggal_debut DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // --- 2. READ: Ambil Grup berdasarkan ID ---
    public function getById($id)
    {
        // Gunakan 'id_grup' sebagai Primary Key
        $query = "SELECT * FROM " . $this->table . " WHERE id_grup = :id_grup";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_grup', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    // --- (Tambahan) READ: Ambil Grup berdasarkan Agensi ID (Berguna untuk filter) ---
    public function getByAgensiId($agensi_id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_agensi = :id_agensi";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_agensi', $agensi_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    // --- 3. CREATE: Tambah Grup Baru ---
    public function create($id_agensi, $nama_grup, $tanggal_debut, $tipe)
    {
        $query = "INSERT INTO " . $this->table . " 
                  (id_agensi, nama_grup, tanggal_debut, tipe) 
                  VALUES 
                  (:id_agensi, :nama_grup, :tanggal_debut, :tipe)";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':id_agensi', $id_agensi);
        $stmt->bindParam(':nama_grup', $nama_grup);
        $stmt->bindParam(':tanggal_debut', $tanggal_debut);
        $stmt->bindParam(':tipe', $tipe);
        
        return $stmt->execute();
    }

    // --- 4. UPDATE: Ubah Data Grup ---
    public function update($id_grup, $id_agensi, $nama_grup, $tanggal_debut, $tipe)
    {
        $query = "UPDATE " . $this->table . " 
                  SET id_agensi = :id_agensi, 
                      nama_grup = :nama_grup, 
                      tanggal_debut = :tanggal_debut, 
                      tipe = :tipe
                  WHERE id_grup = :id_grup";
                  
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':id_grup', $id_grup); // PK
        $stmt->bindParam(':id_agensi', $id_agensi);
        $stmt->bindParam(':nama_grup', $nama_grup);
        $stmt->bindParam(':tanggal_debut', $tanggal_debut);
        $stmt->bindParam(':tipe', $tipe);
        
        return $stmt->execute();
    }

    // --- 5. DELETE: Hapus Grup ---
    public function delete($id_grup)
    {
        // Gunakan 'id_grup' sebagai Primary Key
        $query = "DELETE FROM " . $this->table . " WHERE id_grup = :id_grup";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_grup', $id_grup);
        
        // Catatan: Jika ada Anggota atau Album yang terkait, 
        // pastikan Foreign Key di database disetel ON DELETE CASCADE 
        // atau Anda menghapus data terkait terlebih dahulu.
        
        return $stmt->execute();
    }
}