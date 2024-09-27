<?php
include 'config.php';

$result = $conn->query("SELECT * FROM mahasiswa");
?>

<!--Halaman Tampilan Utama -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Data Mahasiswa</h2>
        <a href="tambah.php" class="btn btn-primary mb-3">Tambah Mahasiswa</a> <!--Untuk mengarahkan ke halaman tambah-->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jurusan</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                 <!--perulangan mengambil dari setiap data hasil query-->
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['nim']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['jurusan']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <!-- Untuk Link ke sebuah perintah beserta dengan bentuk button-->
                    <td>    
                        <a href="edit.php?nim=<?php echo $row['nim']; ?>" class="btn btn-sm btn-warning">Edit</a> 
                        <a href="hapus.php?nim=<?php echo $row['nim']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
