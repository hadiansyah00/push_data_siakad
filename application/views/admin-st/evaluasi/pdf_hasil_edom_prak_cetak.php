		<!DOCTYPE html>
		<html lang="en">

		<head>

		    <meta charset="UTF-8">
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <title> Hasil EDOM <?php echo $dosen_info->nama_dosen ?></title>

		    <style>
		    /* Tambahkan gaya CSS sesuai kebutuhan Anda */
		    body {
		        font-family: 'Times New Roman', Times, serif;
		        font-size: 12px;
		    }

		    img {
		        float: left;
		        margin-right: 50px;
		        /* Optional: Memberikan margin kanan agar teks tidak langsung menempel pada gambar */
		    }

		    .header {
		        text-align: center;
		        margin-bottom: 20px;
		    }

		    .header img {
		        width: 320px;
		        height: auto;
		    }

		    .info {
		        margin-bottom: 20px;
		    }

		    .info h2 {
		        margin-bottom: 10px;
		    }

		    .table-container {
		        margin-bottom: 20px;
		    }

		    table {
		        width: 100%;
		        border-collapse: collapse;
		    }

		    table {
		        border-collapse: collapse;
		    }

		    .info {
		        border-collapse: collapse;
		        width: 100%;
		    }

		    .info th,
		    .info td {
		        border: 1px solid #ddd;
		        /* Atur tampilan border sesuai kebutuhan */
		        padding: 8px;
		        text-align: left;
		    }

		    .info th {
		        background-color: rgba(0, 0, 0, 0.1);
		        /* Atur warna latar belakang dengan tingkat transparansi */
		    }


		    table.info td:first-child {
		        padding-right: 20px;
		    }


		    th,
		    td {
		        border: 1px solid #000;
		        padding: 8px;
		        text-align: left;
		    }

		    .header {
		        text-align: center;
		        margin-bottom: 20px;
		    }

		    .logo {
		        display: inline-block;
		        vertical-align: top;
		    }

		    .title {
		        display: inline-block;
		        vertical-align: top;
		        margin-left: 20px;
		        text-align: center;
		        /* Menengahkan judul */
		    }

		    .date {
		        display: inline-block;
		        vertical-align: top;
		        margin-left: 20px;
		        /* Jarak antara judul dan tanggal */
		    }

		    .table-transparan {
		        width: 100%;
		        border-collapse: collapse;
		        background-color: transparent;
		    }

		    .table-transparan th,
		    .table-transparan td {
		        border: none;
		        padding: 8px;
		        text-align: center;
		        background-color: rgba(255, 255, 255, 0.5);
		    }

		    .table-transparan th {
		        background-color: transparent;
		    }
		    </style>
		</head>

		<body>
		    <div class="header">
		        <img class="logo" src="<?php echo $image_path ?>" alt="Logo">
		        <p>Bogor, <?php echo date('d F Y'); ?></p>
		    </div>

		    <div class="header">

		        <br></br>
		        <h1>Hasil Evaluasi Dosen Mengajar Praktik Oleh Mahasiswa</h1>
		    </div>
		    <table class="info">
		        <tr>
		            <td><strong>Nama Dosen</strong></td>
		            <td><?php echo $dosen_info->nama_dosen; ?></td>
		        </tr>
		        <tr>
		            <td><strong>Program Studi</strong></td>
		            <td><?php echo $info_edom->jurusan; ?></td>
		        </tr>
		        <tr>
		            <td><strong>Nama Matakuliah</strong></td>
		            <td><?php echo $info_edom->matakuliah; ?></td>
		        </tr>
		        <tr>
		            <td><strong>Jumlah Mahasiswa</strong></td>
		            <td><?php echo $listMahasiswa; ?></td>
		        </tr>
		        <tr>
		            <td><strong>Jumlah Responden:</strong></td>
		            <td><?php echo $jumlahMahasiswa; ?></td>
		        </tr>
		        <tr>
		            <td><strong>Tahun Akademik</strong></td>
		            <td><?php echo $tahun['ta'] . ' - ' . $tahun['semester']; ?></td>
		        </tr>
		    </table>
		    <h5>
		        Assalamu’alaykum wr wb
		        Berdasarkan kuesioner Evaluasi Dosen Oleh Mahasiswa (EDOM) dalam proses belajar mengajar,
		        berikut Kami sampaikan hasil EDOM :
		    </h5>
		    <div class="table-container">

		        <table>
		            <thead>


		                <tr>
		                    <th>No</th>
		                    <th>Aspek Penilaian</th>
		                    <th>Rata-rata Nilai</th>
		                    <th>Kriteria</th>
		                </tr>

		            </thead>
		            <tbody>
		                <?php
												$no = 1;
												foreach ($rata_rata as $row) {
													$kriteria = ""; // Variabel untuk menyimpan kriteria penilaian
													$totalNilai += $row->rata_rata; // Menambahkan nilai ke total
												
													if ($row->rata_rata < 1.05) {
														$kriteria = "Sangat Kurang";
													} elseif ($row->rata_rata >= 1.05 && $row->rata_rata <= 2.04) {
														$kriteria = "Kurang";
													} elseif ($row->rata_rata >= 2.05 && $row->rata_rata <= 3.04) {
														$kriteria = "Cukup";
													} elseif ($row->rata_rata >= 3.05 && $row->rata_rata <= 4.04) {
														$kriteria = "Baik";
													} elseif ($row->rata_rata >= 4.05 && $row->rata_rata <= 5) {
														$kriteria = "Sangat Baik";
													} 
													
													
													
									
													echo "<tr>";
													echo "<td>$no</td>";
													echo "<td>$row->pertanyaan</td>";
													echo "<td>" . number_format($row->rata_rata, 2) . "</td>";
													echo "<td>$kriteria</td>";
													echo "</tr>";
									
													$no++;
												}
												?>
		            <tfoot>
		                <tr>
		                    <td colspan="2"><strong>Total Rata-Rata</strong></td>
		                    <td><strong><?php echo number_format($hasil2=$totalNilai / count($rata_rata), 2); ?></strong>
		                    </td>


		                    <td><strong><?php  
											if ($hasil2 >= 4.05 && $hasil2 <= 5.00) {
												echo "Sangat Baik";
											}
											elseif ($hasil2 >= 3.05 && $hasil <= 4.04) {
												echo "Baik";
											}
											elseif ($hasil2 >= 2.05 && $hasil <= 3.04) {
												echo "Cukup";
											}
											elseif ($hasil >= 1.05 && $hasil <= 2.04) {
												echo "Kurang";
											}
											elseif ($hasil < 1.04) {
												echo "Sangat Kurang";
											}
											
											else {
												echo "Null Boss";
											}
											?> </strong>


		                    </td>
		                </tr>
		                <tr>
		                    <th colspan="4">
		                        <h4><strong>Kriteria Penilaian</strong><br>
		                            Kurang Dari 1,05 = Sangat Kurang<br>
		                            1,05 – 2,04 = Kurang<br>
		                            2,05 – 3,04 = Cukup<br>
		                            3,05 – 4,04 = Baik<br>
		                            4,05 – 5 = Sangat Baik<br>
		                        </h4>
		                        <h5></h5>

		                    </th>
		                </tr>
		            </tfoot>
		            </tbody>

		        </table>
		    </div>
		    <div class="saran">
		        <h2>Daftar saran dari mahasiswa :</h2>
		        <table>
		            <thead>
		                <tr>

		                    <th>Saran</th>

		                </tr>

		            </thead>
		            <tbody>
		                <?php
												$no = 1;
												foreach ($saran as $row) {
											
												echo "<tr>";
												
													echo "<td>$row->saran</td>";
													echo "</tr>";
									
													$no++;
												}
												?>

		                </td>
		                </tr>
		                </tfoot>
		            </tbody>

		        </table>
		        <h4>
		            Demikian hasil EDOM dalam proses belajar mengajar, diharapkan dari hasil tersebut dapat digunakan
		            sebagai bahan evaluasi untuk proses pembelajaran selanjutnya. Atas perhatian Bapak/Ibu Kami ucapkan
		            terimakasih.
		            Wassalamu’alaykum wr wb.
		        </h4>

		    </div>
		    <table class="table-transparan">
		        <thead>
		            <tr>
		                <th align="center">Mengetahui,
		                    Wakil Ketua I Bidang Akademik</th>
		                <th><br></th>
		                <th align="center">Ketua UPMI</th>
		                <th><br></th>
		                <th align="center">Ketua STIKes Bogor Husada</th>
		                <th><br></th>
		            </tr>
		            </tbody>
		        <tbody>
		            <tr>
		                <td><br></br><br>Dendy Widianto, M.Kes</td>
		                <td style="width: 50px;"> </td>
		                <td><br></br><br>apt. Rahmadhani Tyas A, M.Farm.Klin </td>
		                <td style="width: 75px;"></td>
		                <td><br></br><br>Lussy Citra Resmi, M.Pd</td>
		                <td></td>
		            </tr>
		        </tbody>
		        </thead>
		    </table>
		    </div>
		</body>

		</html>
