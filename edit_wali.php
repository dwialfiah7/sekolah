<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id_wali = $_GET['id'];
    
    $query = "SELECT * FROM wali_murid WHERE id_wali = '$id_wali'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_wali = $_POST['id_wali'];
    $nama_wali = $_POST['nama_wali'];
    $kontak = $_POST['kontak'];

    $query = "UPDATE wali_murid SET nama_wali = '$nama_wali', kontak = '$kontak' WHERE id_wali = '$id_wali'";
    if (mysqli_query($koneksi, $query)) {
        header("Location: wali_murid.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wali Murid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="mb-3">Edit Wali Murid</h2>
        <form method="POST">
            <input type="hidden" name="id_wali" value="<?php echo $row['id_wali']; ?>">
            <div class="mb-3">
                <label for="nama_wali" class="form-label">Nama Wali</label>
                <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?php echo $row['nama_wali']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">No. Telepon</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="<?php echo $row['kontak']; ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="wali_murid.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
