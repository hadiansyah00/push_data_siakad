<!-- File: cetak_pdf.php -->

<!DOCTYPE html>
<html>
<head>
    <title>PDF Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Program Studi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $mhs): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $mhs['nama']; ?></td>
                    <td><?php echo $mhs['nim']; ?></td>
                    <td><?php echo $mhs['prodi']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
