<script src="<?php echo base_url(); ?>assets/Chart.js"></script>
<div class="income-order-visit-user-area">
    <div class="container-fluid">
        <div class="sparkline8-list shadow-reset">
            <div class="sparkline8-hd">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-lg-12">
                            <div class="income-dashone-total shadow-reset nt-mg-b-30">
                                <br>
                                <h2 class="text-center">Mahasiswa Farmasi Tahun 2019 - 2022</h2>
                                </br>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class-"income-dashone-total shadow-reset nt-mg-b-30">
                                    <div class="container-fluid">
                                        <canvas id="chartFarmasi"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                                    <thead>
                                        <tr>
                                            <th>FARMASI 2019</th>
                                            <td class="counter"><?php echo $frm_2019 ?></td>
                                        </tr>
                                        <tr>
                                            <th>FARMASI 2020</th>
                                            <td class="counter"><?php echo $frm_2020 ?></td>
                                        </tr>
                                        <tr>
                                            <th>FARMASI 2021</th>
                                            <td class="counter"><?php echo $frm_2021 ?></td>
                                        </tr>
                                        <tr>
                                            <th>FARMASI 2022</th>
                                            <td class="counter"><?php echo $frm_2022 ?></td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <h2>
                                <font color="white"><span class="counter"></font>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="income-dashone-total shadow-reset nt-mg-b-30">
                            <br>
                            <h2 class="text-center">Status Mahasiswa Farmasi</h2>
                            </br>
                        </div>
                    </div>
                </div>
                <div class="container-fluid ">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class-"income-dashone-total shadow-reset nt-mg-b-30">
                                <div class="container-fluid">
                                    <canvas id="chartSts"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <H4 class="align-center"><strong>PROG. STUDI<font color="#1E90FF"> FARMASI</font></strong></H4>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                                <thead>
                                    <tr>
                                        <th> Total Mahasiswa </th>
                                        <td class="counter"><?php echo $farmasi_sm ?></td>
                                    </tr>
                                    <tr>
                                        <th> Mahasiswa Aktif </th>
                                        <td class="counter"><?php echo $frm_akt ?></td>
                                    </tr>
                                    <tr>
                                        <th> Mahasiswa Undur Diri </th>
                                        <td class="counter"><?php echo $frm_ud ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mahasiswa Cuti </th>
                                        <td class="counter"><?php echo $frm_cuti ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mahasiswa Lulus </th>
                                        <td class="counter"><?php echo $frm_lulus ?></td>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <h2>
                            <font color="white"><span class="counter"></font>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Jumlah Mahasiswa Berdasarkan PRodin-->


<script>
    var ctx = document.getElementById('chartSts').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
            labels: ["Aktif", "Cuti", "Non Aktif", "Lulus"],
            datasets: [{
                label: 'Data Status Mahasiswa Mahasiswa ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $farmasi_sm; ?>, <?php echo $frm_cuti; ?>, <?php echo $frm_ud; ?>, <?php echo $frm_lulus ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('chartFarmasi').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["2019", "2020", "2021", "2022"],
            datasets: [{
                label: 'Data Status Mahasiswa ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $frm_2019; ?>, <?php echo $frm_2020; ?>, <?php echo $frm_2021; ?>, <?php echo $frm_2022; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
