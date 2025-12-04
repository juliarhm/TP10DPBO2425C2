<?php
require_once "config/Database.php"; // Pastikan path ini benar

class Album
{
    private $conn;
    private $table = "album";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // --- 1. READ: Ambil Semua Album (dengan JOIN ke Grup untuk Data Binding) ---
    public function getAll()
    {
        $query = "SELECT 
                    a.id_album, 
                    a.judul_album, 
                    a.tanggal_rilis, 
                    a.format,
                    a.id_grup,
                    g.nama_grup  -- Data dari tabel GRUP
                  FROM 
                    " . $this->table . " a
                  JOIN 
                    grup g ON a.id_grup = g.id_grup
                  ORDER BY 
                    a.tanggal_rilis DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // --- 2. READ: Ambil Album berdasarkan ID ---
    public function getById($id)
    {
        // Ubah 'id' menjadi 'id_album' sesuai nama kolom PK
        $query = "SELECT * FROM " . $this->table . " WHERE id_album = :id_album";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_album', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // --- 3. CREATE: Tambah Album Baru ---
    public function create($id_grup, $judul_album, $tanggal_rilis, $format)
    {
        $query = "INSERT INTO " . $this->table . " 
                  (id_grup, judul_album, tanggal_rilis, format) 
                  VALUES 
                  (:id_grup, :judul_album, :tanggal_rilis, :format)";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':id_grup', $id_grup);
        $stmt->bindParam(':judul_album', $judul_album);
        $stmt->bindParam(':tanggal_rilis', $tanggal_rilis);
        $stmt->bindParam(':format', $format);
        
        return $stmt->execute();
    }

    // --- 4. UPDATE: Ubah Data Album ---
    public function update($id_album, $id_grup, $judul_album, $tanggal_rilis, $format)
    {
        $query = "UPDATE " . $this->table . " 
                  SET id_grup = :id_grup, 
                      judul_album = :judul_album, 
                      tanggal_rilis = :tanggal_rilis, 
                      format = :format
                  WHERE id_album = :id_album";
                  
        $stmt = $this->conn->prepare($query);
        
        // Bind parameters
        $stmt->bindParam(':id_album', $id_album); // PK
        $stmt->bindParam(':id_grup', $id_grup);
        $stmt->bindParam(':judul_album', $judul_album);
        $stmt->bindParam(':tanggal_rilis', $tanggal_rilis);
        $stmt->bindParam(':format', $format);
        
        return $stmt->execute();
    }

    // --- 5. DELETE: Hapus Album ---
    public function delete($id_album)
    {
        // Ubah 'id' menjadi 'id_album' sesuai nama kolom PK
        $query = "DELETE FROM " . $this->table . " WHERE id_album = :id_album";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_album', $id_album);
        
        return $stmt->execute();
    }
}