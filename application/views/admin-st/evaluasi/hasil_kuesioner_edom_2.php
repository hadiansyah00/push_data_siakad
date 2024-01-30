<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
    <div class="container-fluid">
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="row">

            <div class="col-lg-12">

                <div class="sparkline8-list shadow-reset">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd">
                            <h1>Hasil Penilaian Evaluasi Dosen</h1>

                            <br>
                            <div class="col-lg-9">
                                <hr>
                                <div class="user-profile-content mt-0">

                                    <table class="table small m-b-xs">

                                        <tbody>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>NIDN</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 110px; text-align: left;">
                                                    <strong><?php echo $dosen_info->nidn; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Nama Dosen</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 110px; text-align: left;">
                                                    <strong><?php echo $dosen_info->nama_dosen; ?></strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Program Studi</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 110px; text-align: left;">
                                                    <strong><?php echo $info_dosen[0]->jurusan; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Nama Matakuliah</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 10px; text-align: left;">
                                                    <strong><?php echo $info_dosen[0]->matakuliah; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Jumlah Mahasiswa</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 10px; text-align: left;">
                                                    <strong><?php echo $list_mhs; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Jumlah Responden Mahasiswa</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 10px; text-align: left;">
                                                    <strong><?php echo $jumlah_mahasiswa; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Tahun Ajaran</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="sparkline8-outline-icon">

                                </span>
                                <span title="Hide Table" class="sparkline8-collapse-link"><i
                                        class="fa fa-chevron-up"></i></span>
                                <span title="Close Table" class="sparkline8-collapse-close"><i
                                        class="fa fa-times"></i></span>
                            </div>
                        </div>

                    </div>
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">

                            <table id="table" data-toggle="table" data-pagination="false" data-search="false"
                                data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false"
                                data-key-events="false" data-show-toggle="false" data-resizable="true"
                                data-cookie="false" data-cookie-id-table="saveId" data-show-export="false"
                                data-toolbar="#toolbar">
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
                    
                    
            <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">

                            <table id="table" data-toggle="table" data-pagination="false" data-search="false"
                                data-show-columns="false" data-show-pagination-switch="false" data-show-refresh="false"
                                data-key-events="false" data-show-toggle="false" data-resizable="true"
                                data-cookie="false" data-cookie-id-table="saveId" data-show-export="false"
                                data-toolbar="#toolbar">
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
            
            
                </div>
            </div>
        </div>

    </div>

</div>
