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
                                <h2 class="text-center">Mahasiswa Kebidanan Tahun 2019 - 2022</h2>
                                </br>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class-"income-dashone-total shadow-reset nt-mg-b-30">
                                    <div class="container-fluid">
                                        <canvas id="chartAngkatanBidan"></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                                    <thead>
                                        <tr>
                                            <th>KEBIDANAN 2019</th>
                                            <td class="counter"><?php echo $bd_2019 ?></td>
                                        </tr>
                                        <tr>
                                            <th>KEBIDANAN 2020</th>
                                            <td class="counter"><?php echo $bd_2020 ?></td>
                                        </tr>
                                        <tr>
                                            <th>KEBIDANAN 2021</th>
                                            <td class="counter"><?php echo $bd_2021 ?></td>
                                        </tr>
                                        <tr>
                                            <th>KEBIDANAN 2022</th>
                                            <td class="counter"><?php echo $bd_2022 ?></td>
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
                            <h2 class="text-center">Status Mahasiswa Kebidanan</h2>
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
                            <H4 class="align-center"><strong>PROG. STUDI<font color="#1E90FF"> KEBIDANAN</font></strong></H4>
                            <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                                <thead>
                                    <tr>
                                        <th> Total Mahasiswa </th>
                                        <td class="counter"><?php echo $bidan ?></td>
                                    </tr>
                                    <tr>
                                        <th> Mahasiswa Aktif </th>
                                        <td class="counter"><?php echo $bd_akt ?></td>
                                    </tr>

                                    <tr>
                                        <th> Mahasiswa Undur Diri </th>
                                        <td class="counter"><?php echo $bd_ud ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mahasiswa Cuti </th>
                                        <td class="counter"><?php echo $bd_cuti ?></td>
                                    </tr>
                                    <tr>
                                        <th>Mahasiswa Lulus </th>
                                        <td class="counter"><?php echo $bd_lulus ?></td>
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
                data: [<?php echo $bd_akt; ?>, <?php echo $bd_cuti; ?>, <?php echo $bd_ud; ?>, <?php echo $bd_lulus ?>]
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
<!--Bidan 2019 s.d Now-->
<script>
    var ctx = document.getElementById('chartAngkatanBidan').getContext('2d');
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
                data: [<?php echo $bd_2019; ?>, <?php echo $bd_2020; ?>, <?php echo $bd_2021; ?>, <?php echo $bd_2022; ?>]
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
