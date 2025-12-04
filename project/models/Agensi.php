<?php
require_once "config/Database.php";

class Agensi
{
    private $conn;
    private $table = "agensi";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_agensi = :id_agensi";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_agensi', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama_agensi, $tahun_berdiri, $lokasi_kantor)
    {
        $query = "INSERT INTO " . $this->table . " (nama_agensi, tahun_berdiri, lokasi_kantor) VALUES (:nama_agensi, :tahun_berdiri, :lokasi_kantor)";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':nama_agensi', $nama_agensi);
        $stmt->bindParam(':tahun_berdiri', $tahun_berdiri);
        $stmt->bindParam(':lokasi_kantor', $lokasi_kantor);
        return $stmt->execute();
    }

    public function update($id, $nama_agensi, $tahun_berdiri, $lokasi_kantor)
    {
        $query = "UPDATE " . $this->table . " SET nama_agensi = :nama_agensi, tahun_berdiri = :tahun_berdiri, lokasi_kantor = :lokasi_kantor WHERE id_agensi = :id_agensi";
        $stmt = $this->conn->prepare($query);
        // Bind parameters
        $stmt->bindParam(':id_agensi', $id);
        $stmt->bindParam(':nama_agensi', $nama_agensi);
        $stmt->bindParam(':tahun_berdiri', $tahun_berdiri);
        $stmt->bindParam(':lokasi_kantor', $lokasi_kantor);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_agensi = :id_agensi";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_agensi', $id);
        return $stmt->execute();
    }
}
