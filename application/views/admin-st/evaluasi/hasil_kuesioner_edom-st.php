<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin-st/dist/header');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hasil Penilaian Evaluasi Dosen</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td style="width: 60px;">
                                                <strong>NIDN</strong>
                                            </td>

                                            <td style="width: 110px; text-align: left;">
                                                <strong><?php echo $dosen_info->nidn; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60px;">
                                                <strong>Nama Dosen</strong>
                                            </td>

                                            <td style="width: 110px; text-align: left;">
                                                <strong><?php echo $dosen_info->nama_dosen; ?></strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 130px;">
                                                <strong>Program Studi</strong>
                                            </td>

                                            <td style="width: 110px; text-align: left;">
                                                <strong><?php echo $info_dosen[0]->jurusan; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60px;">
                                                <strong>Nama Matakuliah</strong>
                                            </td>

                                            <td style="width: 10px; text-align: left;">
                                                <strong><?php echo $info_dosen[0]->matakuliah; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60px;">
                                                <strong>Jumlah Mahasiswa</strong>
                                            </td>

                                            <td style="width: 10px; text-align: left;">
                                                <strong><?php echo $list_mhs; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60px;">
                                                <strong>Jumlah Responden Mahasiswa</strong>
                                            </td>

                                            <td style="width: 10px; text-align: left;">
                                                <strong><?php echo $jumlah_mahasiswa; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 60px;">
                                                <strong>Tahun Ajaran</strong>
                                            </td>

                                            <td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>


                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan</th>
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
                                    </tfoot>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
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
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-body col-md-6">
                                <div class="card-header">
                                    <h4>Mahasiswa yang sudah Mengisi KRS</h4>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Mahasiswa</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
									$no = 1;
									foreach ($mahasiswa_krs as $mahasiswa) {
										echo "<tr>";
										echo "<td>$no</td>";
										echo "<td>$mahasiswa->nama_mhs</td>";
										echo "</tr>";
										$no++;
									}
									?>
                                        </tbody>
                                        <tr>
                                            <th colspan="2">
                                                <p><i>Mahasiswa sudah mengisi KRS tapi belum mengisi EDOM</i>
                                                </p>
                                            </th>
                                        </tr>
                                    </table>

                                </div>
                            </div>
                            <div class="card-body col-md-6">
                                <div class="card-header">
                                    <h4>Mahasiswa yang sudah Mengisi EDOM </h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Mahasiswa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
									$no = 1;
									foreach ($mahasiswa_evaluasi as $mahasiswa) {
										echo "<tr>";
										echo "<td>$no</td>";
										echo "<td>$mahasiswa->nama_mhs</td>";
										echo "</tr>";
										$no++;
									}
									?>
                                            <tr>
                                                <th colspan="2">
                                                    <p><i>Mahasiswa sudah mengisi EDOM</i>
                                                    </p>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    </section>
</div>
<?php $this->load->view('admin-st/dist/footer'); ?>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.js"></script>
<script
    src="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
</script>

<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/js/dataTables.select.min.js">
</script>

<script src="<?php echo base_url(); ?>assets-new-look/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-datatables.js"></script>
<script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js">
</script>
<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js">
</script>
