<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
            <h1>Evaluasi Praktikum</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Evaluasi Praktikum</a></div>
            </div>
        </div>
        <?php
												// Load CI instance jika belum di-load di controller
												$ci =& get_instance();

												// Load model
												$ci->load->model('EdomModel'); // Ganti dengan nama model Anda
											?>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Hasil Evaluasi Praktikum</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url('Praktikum'); ?>">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="ta">Tahun Ajaran:</label>
                                            <!-- Dropdown untuk Tahun Ajaran -->
                                            <select class="form-control" id="ta" name="ta">
                                                <option value="">Pilih Tahun Ajaran</option>
                                                <?php
													$tahun_ajaran = $ci->EdomModel->get_tahun_ajaran();
													foreach ($tahun_ajaran as $ta) :
												?>
                                                <option value="<?php echo $ta->id_ta; ?>">
                                                    <?php echo $ta->ta; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <!-- <select class="form-control" id="ta" name="ta">
                                                <option value="">Select Tahun Ajaran</option>
                                                <?php foreach ($ta as $item): ?>
                                                <option value="<?php echo $item->id_ta; ?>"><?php echo $item->ta; ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jurusan">Jurusan:</label>
                                            <select class="form-control" id="jurusan" name="jurusan">
                                                <option value="">Select Jurusan</option>
                                                <?php foreach ($jurusan as $item): ?>
                                                <option value="<?php echo $item->kd_jurusan; ?>">
                                                    <?php echo $item->jurusan; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="matakuliah">Mata Kuliah:</label>
                                            <select class="form-control" id="matakuliah" name="matakuliah">
                                                <option value="">Select Mata Kuliah</option>
                                                <?php foreach ($matakuliah as $item): ?>
                                                <option value="<?php echo $item->kd_mk; ?>">
                                                    <?php echo $item->matakuliah; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="dosen">Dosen:</label>
                                            <select class="form-control" id="dosen" name="dosen">
                                                <option value="">Select Dosen</option>
                                                <?php foreach ($dosen as $item): ?>
                                                <option value="<?php echo $item->id_dosen; ?>">
                                                    <?php echo $item->nama_dosen; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Proses</button>
                            </form>
                            <?php if (!empty($result)): ?>
                            <div class="mt-4" id="resultTable">
                                <h5>Hasil Evaluasi:</h5>
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID Jawaban</th>
                                            <th>Mata Kuliah</th>
                                            <th>Dosen</th>
                                            <th>Jawaban</th>
                                            <th>Pertanyaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($result as $row): ?>
                                        <tr>
                                            <td><?php echo $row->id_jawaban; ?></td>
                                            <td><?php echo $row->kd_mk; ?></td>
                                            <td><?php echo $row->id_dosen; ?></td>
                                            <td><?php echo $row->jawaban; ?></td>
                                            <td><?php echo $row->pertanyaan; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.js"></script>
<script
    src="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
</script>
<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/js/dataTables.select.min.js">
</script>
<script src="<?php echo base_url(); ?>assets-new-look/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-datatables.js"></script>

<script>
$(document).ready(function() {
    // Load dropdown data on page load
    $.ajax({
        url: '<?php echo site_url('praktikum/get_dropdown_data'); ?>',
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Populate Tahun Ajaran dropdown
            $.each(data.ta, function(index, value) {
                $('#ta').append('<option value="' + value.id + '">' + value.ta +
                    '</option>');
            });
            // Populate Jurusan dropdown
            $.each(data.jurusan, function(index, value) {
                $('#jurusan').append('<option value="' + value.id + '">' + value.jurusan +
                    '</option>');
            });
            // Populate Mata Kuliah dropdown
            $.each(data.matakuliah, function(index, value) {
                $('#matakuliah').append('<option value="' + value.id + '">' + value
                    .matakuliah + '</option>');
            });
            // Populate Dosen dropdown
            $.each(data.dosen, function(index, value) {
                $('#dosen').append('<option value="' + value.id + '">' + value.dosen +
                    '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    // Process button click event
    $('#processButton').on('click', function() {
        var ta = $('#ta').val();
        var jurusan = $('#jurusan').val();
        var matakuliah = $('#matakuliah').val();
        var dosen = $('#dosen').val();

        $.ajax({
            url: '<?php echo site_url('praktikum/index'); ?>',
            method: 'POST',
            data: {
                ta: ta,
                jurusan: jurusan,
                matakuliah: matakuliah,
                dosen: dosen
            },
            success: function(response) {
                var data = JSON.parse(response);
                var table = $('#example').DataTable();
                table.clear().draw();
                $.each(data.result, function(index, item) {
                    table.row.add([
                        item.id_jawaban_prak,
                        item.matakuliah,
                        item.nama_dosen,
                        item.jawaban,
                        item.pertanyaan
                    ]).draw(false);
                });
                $('#resultTable').show();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Print button click event
    $('#printButton').on('click', function() {
        window.print();
    });
});
</script>