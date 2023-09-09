<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form Nilai Mahasiswa</title>
</head>
<body>
    <h1>Form Nilai Mahasiswa</h1>
    <form action="crud.php" method="POST">
        <label for="nama">Nama Mahasiswa:</label>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="mata_kuliah">Mata Kuliah:</label>
        <input type="text" id="mata_kuliah" name="mata_kuliah" required><br><br>

        <label for="grade">Grade:</label>
        <select id="grade" name="grade" required>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
        </select><br><br>

        <input type="submit" name="aksi" value="Tambah">
        <input type="hidden" name="id" id="id">
    </form>

    <h2>Data Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>Nama Mahasiswa</th>
            <th>Mata Kuliah</th>
            <th>Grade</th>
            <th>Aksi</th>
        </tr>
        
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM mahasiswa";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["mata_kuliah"] . "</td>";
                echo "<td>" . $row["grade"] . "</td>";
                echo "<td>";
                echo "<button onclick='editMahasiswa(" . $row["id"] . ")'>Edit</button>";
                echo "<button onclick='hapusMahasiswa(" . $row["id"] . ")'>Hapus</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Tidak ada data mahasiswa.</td></tr>";
        }
        ?>
    </table>

    <script>
        function editMahasiswa(id) {
            // Mengisi data ke dalam form untuk diedit
            document.getElementById('id').value = id;
            // Mengganti label tombol
            document.querySelector('input[name="aksi"]').value = "Perbarui";
        }

        function hapusMahasiswa(id) {
            // Konfirmasi penghapusan
            if (confirm('Anda yakin ingin menghapus data mahasiswa ini?')) {
                // Mengatur aksi dan ID untuk dihapus
                document.querySelector('input[name="aksi"]').value = "Hapus";
                document.getElementById('id').value = id;
                // Mengirim form
                document.querySelector('form').submit();
            }
        }
    </script>
</body>
</html>
