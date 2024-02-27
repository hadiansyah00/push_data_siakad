<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Lihat KRS (Kartu Rencana Studi)</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Akademik</a></div>
                <div class="breadcrumb-item">Lihat KRS</div>
            </div>
        </div>



        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tahun Akadedmik <?php echo $tahun['ta'] ?> /
                                <?php echo$tahun['semester']?></h4>

                            <div class="card-header-form">

                                <a href="<?php echo base_url('mhs/Transkrip/printKRS/' . $mhs['id_mahasiswa']); ?>"
                                    target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> BAAK</a>
                                &nbsp;
                                <a href="<?php echo base_url('mhs/Transkrip/printKRS_kapro/' . $mhs['id_mahasiswa']); ?>"
                                    target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    KAPRODI</a>&nbsp;
                                <a href="<?php echo base_url('mhs/Transkrip/printKRS_dospem/' . $mhs['id_mahasiswa']); ?>"
                                    target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    DPA</a>&nbsp;

                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</td>
                                        <th>Semester</td>
                                        <th>Dosen 1</th>
                                        <th>Dosen 2</th>
                                        <th>Aksi KRS</td>
                                    </tr>
                                    <tbody>
                                        <?php
										
										$i = 1;
										foreach ($viewKrs as $row) { ?>
                                        <?php if ($row->semester == $tahun['semester']) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->kd_mk; ?></td>
                                            <td><?php echo $row->matakuliah; ?></td>
                                            <td><?php echo $row->sks; ?></td>
                                            <td><?php echo $row->smt; ?></td>
                                            <?php echo 
											$dosen1 = $this->KurikulumModel->getDosenNameById_peran($row->id_perdos);
										// Di sini kita dapat menambahkan kode untuk mengambil nama dosen berdasarkan $row->id_peran
										$dosen2 = $this->KurikulumModel->getDosenNameById($row->id_peran);
											?>
                                            <td><?php echo $dosen1 ?></td>
                                            <td><?php echo $dosen2 ?></td>
                                            <td><a href="<?php echo base_url('mhs/krs/delete/' . $row->id_krs); ?>"
                                                    class="btn btn-sm btn-sm btn-danger"
                                                    onclick="return confirm('Yakin akan dihapus?')">
                                                    <i class="fa fa-trash-alt"></i></a></td>


                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                    <?php } ?>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</div>
</section>
</div>
<?php $this->load->view('mhs/dist/footer'); ?>
