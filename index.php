<?php

class Database {
    private $host = "localhost"; // Ganti dengan host database Anda
    private $username = "root"; // Ganti dengan username database Anda
    private $password = ""; // Ganti dengan password database Anda
    private $database = "tugas8";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        } catch (mysqli_sql_exception $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }

    public function getDaftarMobil() {
        $sql = "SELECT id_mobil, merk, model, tahun_produksi, warna, harga, stok FROM mobil";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function closeConnection() {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}

$db = new Database();
$daftarMobil = $db->getDaftarMobil();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Mobil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Daftar Mobil Tersedia</h1>
        <?php if ($daftarMobil->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Merk</th>
                        <th>Model</th>
                        <th>Tahun Produksi</th>
                        <th>Warna</th>
                        <th>Harga</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $daftarMobil->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["id_mobil"]; ?></td>
                            <td><?php echo $row["merk"]; ?></td>
                            <td><?php echo $row["model"]; ?></td>
                            <td><?php echo $row["tahun_produksi"]; ?></td>
                            <td><?php echo $row["warna"]; ?></td>
                            <td>Rp <?php echo number_format($row["harga"], 0, ',', '.'); ?></td>
                            <td><?php echo $row["stok"]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Tidak ada mobil yang tersedia.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$db->closeConnection();
?>