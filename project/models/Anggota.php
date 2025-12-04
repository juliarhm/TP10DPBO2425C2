<?php
require_once "config/Database.php"; // Pastikan path ini benar

class Anggota
{
    private $conn;
    private $table = "anggota"; // Ubah nama tabel menjadi 'anggota'

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // --- 1. READ: Ambil Semua Anggota (dengan JOIN ke Grup untuk Data Binding) ---
    public function getAll()
    {
        $query = "SELECT 
                    a.id_anggota, 
                    a.nama_panggung, 
                    a.nama_asli, 
                    a.tanggal_lahir, 
                    a.posisi_utama,
                    a.id_grup,
                    g.nama_grup  -- Data dari tabel GRUP
                  FROM 
                    " . $this->table . " a
                  JOIN 
                    grup g ON a.id_grup = g.id_grup
                  ORDER BY 
                    a.nama_panggung ASC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // --- 2. READ: Ambil Anggota berdasarkan ID ---
    public function getById($id)
    {
        // Gunakan 'id_anggota' sebagai Primary Key
        $query = "SELECT * FROM " . $this->table . " WHERE id_anggota = :id_anggota";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_anggota', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // --- 3. CREATE: Tambah Anggota Baru ---
    public function create($id_grup, $nama_panggung, $nama_asli, $tanggal_lahir, $posisi_utama)
    {
        $query = "INSERT INTO " . $this->table . " 
                  (id_grup, nama_panggung, nama_asli, tanggal_lahir, posisi_utama) 
                  VALUES 
                  (:id_grup, :nama_panggung, :nama_asli, :tanggal_lahir, :posisi_utama)";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':id_grup', $id_grup);
        $stmt->bindParam(':nama_panggung', $nama_panggung);
        $stmt->bindParam(':nama_asli', $nama_asli);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
        $stmt->bindParam(':posisi_utama', $posisi_utama);
        
        return $stmt->execute();
    }

    // --- 4. UPDATE: Ubah Data Anggota ---
    public function update($id_anggota, $id_grup, $nama_panggung, $nama_asli, $tanggal_lahir, $posisi_utama)
    {
        $query = "UPDATE " . $this->table . " 
                  SET id_grup = :id_grup, 
                      nama_panggung = :nama_panggung, 
                      nama_asli = :nama_asli, 
                      tanggal_lahir = :tanggal_lahir, 
                      posisi_utama = :posisi_utama
                  WHERE id_anggota = :id_anggota";
                  
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':id_anggota', $id_anggota); // PK
        $stmt->bindParam(':id_grup', $id_grup);
        $stmt->bindParam(':nama_panggung', $nama_panggung);
        $stmt->bindParam(':nama_asli', $nama_asli);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
        $stmt->bindParam(':posisi_utama', $posisi_utama);
        
        return $stmt->execute();
    }

    // --- 5. DELETE: Hapus Anggota ---
    public function delete($id_anggota)
    {
        // Gunakan 'id_anggota' sebagai Primary Key
        $query = "DELETE FROM " . $this->table . " WHERE id_anggota = :id_anggota";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_anggota', $id_anggota);
        
        return $stmt->execute();
    }
}