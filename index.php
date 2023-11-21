<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Mahasiswa</h2>

    <form action="cariData.php" method="get">
        <label for="prodi">Pilih Prodi:</label>
        <select name="prodi" id="prodi">
            <option value=""></option>
            <?php
                $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

                $query_prodi = "SELECT DISTINCT prodi FROM datamahasiswa";
                $result_prodi = mysqli_query($koneksi, $query_prodi);

                while ($row_prodi = mysqli_fetch_assoc($result_prodi)) {
                    echo "<option value='{$row_prodi['prodi']}'>{$row_prodi['prodi']}</option>";
                }
                
                mysqli_close($koneksi);
            ?>
        </select>

        <input type="submit" value="Cari">
    </form>

    <form action="tambahData.php" method="post">
        <label for="nim">NIM:</label>
        <input type="text" name="nim" required>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" required>
        <label for="prodi">Prodi:</label>
        <input type="text" name="prodi" required>
        <label for="kode">Kode Prodi:</label>
        <input type="text" name="kode" required>

        <input type="submit" value="Tambahkan">
    </form>

    <form action="editData.php" method="post">
        <label for="nim_edit">NIM:</label>
        <input type="text" name="nim_edit" required>
        <label for="nama_edit">Nama:</label>
        <input type="text" name="nama_edit" required>
        <label for="kode_edit">Kode Prodi:</label>
        <input type="text" name="kode_edit" required>

        <input type="submit" value="Edit">
    </form>

    <form action="hapusData.php" method="get">
        <label for="del">Masukkan NIM :</label>
        <input type="text" name="del" required>

        <input type="submit" value="Hapus">
    </form>
    
    <?php
        $koneksi = mysqli_connect("localhost", "root", "", "mahasiswa");

        $query = "SELECT * FROM datamahasiswa";
        $result = mysqli_query($koneksi, $query);

        echo "<table border='1'>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Kode Prodi</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['nim']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['kode']}</td>
                </tr>";
        }

        echo "</table>";

        mysqli_close($koneksi);
    ?>
</body>
</html>