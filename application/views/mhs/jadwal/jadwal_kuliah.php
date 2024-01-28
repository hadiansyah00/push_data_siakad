<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jadwal Kuliah</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Jadwak Perkuliahan</a></div>
                <div class="breadcrumb-item">Jadwal Kuliah</div>
            </div>
        </div>
        <div class="section-body">
            <!-- <h2 class="section-title">Jadwal Kuliah - STIKES BOGOR HUSADA</h2> -->
            <!-- <p class="section-lead">Example of some Bootstrap table components.</p> -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <h4>Sortable Table</h4> -->
                            <div class="card-header-action">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table table-striped" id="sortable-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <i class="fas fa-th"></i>
                                            </th>

                                            <td class="text-center">Semester</td>
                                            <!-- <td>Tampil</td> -->
                                            <td>Program Studi</td>
                                            <td>File (Berkas)</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
												$i = 1;
												foreach ($getJd as $row) {
													if ($row->semester == $tahun['semester'] && $row->smt == $mhs['semester']) {
												?>

                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td class="text-center"><?php echo $row->smt; ?></td>
                                            <!-- <td>
                                                <embed
                                                    src="<?php echo base_url('./assets/images/uploads/' . $row->nama_berkas); ?>"
                                                    width="400" height="300" type="application/pdf">
                                            </td> -->
                                            <td>
                                                <?php echo $row->jenjang ?><strong><?php echo $row->jurusan ?></strong>
                                            </td>
                                            <td>
                                                <a
                                                    href="<?php echo base_url('admin/UploadJadwal/download_file/' . $row->id_jadwal_pdf); ?>">Download</a>
                                            </td>
                                        </tr>
                                        <?php
										}
									}
								?>

                                    </tbody>
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
<?php $this->load->view('mhs/dist/footer'); ?>