<?php
include 'config.php';

// Memastikan request method POST untuk mengupdate data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $gender = $_POST['gender'];
    $alamat = $_POST['alamat'];

    // Query untuk update data mahasiswa
    $sql = "UPDATE mahasiswa SET nama=?, jurusan=?, gender=?, alamat=? WHERE nim=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama, $jurusan, $gender, $alamat, $nim);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    // Mengambil data mahasiswa berdasarkan nim untuk ditampilkan di form
    $nim = $_GET['nim'];
    $result = $conn->query("SELECT * FROM mahasiswa WHERE nim='$nim'");
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Mahasiswa</h2>
        <form action="edit.php" method="post">
            <input type="hidden" name="nim" value="<?php echo htmlspecialchars($row['nim']); ?>">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo htmlspecialchars($row['jurusan']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki" <?php if ($row['gender'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php if ($row['gender'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required><?php echo htmlspecialchars($row['alamat']); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
