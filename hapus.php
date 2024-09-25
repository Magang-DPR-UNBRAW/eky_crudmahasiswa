<?php
include 'config.php';

if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];
    
    $sql = "DELETE FROM mahasiswa WHERE nim=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nim);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    header("Location: index.php");
    exit();
}
?>