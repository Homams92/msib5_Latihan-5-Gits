<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi'])) {
    if ($_POST['aksi'] === 'Tambah') {
        $nama = $_POST['nama'];
        $mata_kuliah = $_POST['mata_kuliah'];
        $grade = $_POST['grade'];

        $sql = "INSERT INTO mahasiswa (nama, mata_kuliah, grade) VALUES ('$nama', '$mata_kuliah', '$grade')";

        if ($koneksi->query($sql) === TRUE) {
            echo "<script>alert('Data mahasiswa berhasil ditambahkan.'); window.location = 'index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }

    elseif ($_POST['aksi'] === 'Perbarui') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $mata_kuliah = $_POST['mata_kuliah'];
        $grade = $_POST['grade'];

        $sql = "UPDATE mahasiswa SET nama='$nama', mata_kuliah='$mata_kuliah', grade='$grade' WHERE id=$id";

        if ($koneksi->query($sql) === TRUE) {
            echo "<script>alert('Data mahasiswa berhasil diperbarui.'); window.location = 'index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }

    elseif ($_POST['aksi'] === 'delete') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $mata_kuliah = $_POST['mata_kuliah'];
        $grade = $_POST['grade'];

        $sql = "UPDATE mahasiswa SET nama='$nama', mata_kuliah='$mata_kuliah', grade='$grade' WHERE id=$id";

        if ($koneksi->query($sql) === TRUE) {
            echo "<script>alert('Data mahasiswa berhasil dihapus.'); window.location = 'index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    }
}
?>
