<!DOCTYPE html>
<html lang="en">

<head>

    <?= $title_meta ?>

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <?= $page_title ?>

                <div class="row">
                <div class="col-xl-4 col-md-4">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="text-muted mb-3 lh-1 d-block text-truncate">Total Panen</h5>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php echo $hasil_panen_a + $hasil_panen_b?>"></span>&nbsp;Ekor
                                        </h4>
                                    </div>
                                </div>
                                
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-4 col-md-4">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="text-muted mb-3 lh-1 d-block text-truncate">Total Berat</h5>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php echo round($berat_total_a + $berat_total_b,2)?>"></span>&nbsp;Kg
                                        </h4>
                                    </div>
                                </div>
                        
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-4 col-md-4">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <h5 class="text-muted mb-3 lh-1 d-block text-truncate">Berat Rata</h5>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php if($hasil_panen_a > 0 && $hasil_panen_b > 0 && $berat_total_a > 0 && $berat_total_b > 0) {echo round(($hasil_panen_a + $hasil_panen_b) / ($berat_total_a + $berat_total_b),2);}?>"></span>&nbsp;Kg
                                        </h4>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-6 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Panen Kandang A</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php echo $hasil_panen_a?>"></span>&nbsp;Ekor
                                        </h4>
                                    </div>

                                    <div class="col-6">
                                        <div id="mini-chart1" data-colors='["#9156ba"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                                
                                <div class="text-nowrap">
                                    <span class="badge bg-soft-success text-success"><?php echo round($berat_total_a,2)?></span>
                                    <span class="ms-1 text-muted font-size-13">Kg Berat Total</span>
                                </div>
                                <div class="text-nowrap">
                                    <span class="badge bg-soft-success text-success"><?php echo round($berat_rata,2)?></span>
                                    <span class="ms-1 text-muted font-size-13">Kg Berat Rata - Rata</span>
                                </div>
                                <div class="text-nowrap">
                                    <span class="badge bg-soft-success text-success"><?php echo round($panen_akhir_a,2)?></span>
                                    <span class="ms-1 text-muted font-size-13">Ekor Seminggu Terakhir</span>
                                </div>
                                <!-- </div> -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->

                    <div class="col-xl-6 col-md-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-6">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Panen Kandang B</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="<?php echo $hasil_panen_b?>">0&nbsp;</span>&nbsp;Ekor
                                        </h4>
                                    </div>

                                    <div class="col-6">
                                        <div id="mini-chart2" data-colors='["#9156ba"]' class="apex-charts mb-2"></div>
                                    </div>
                                </div>
                               
                                <div class="text-nowrap">
                                    <span class="badge bg-soft-success text-success"><?php echo round($berat_total_b,2)?></span>
                                    <span class="ms-1 text-muted font-size-13">Kg Berat Total</span>
                                </div>
                                <div class="text-nowrap">
                                    <span class="badge bg-soft-success text-success"><?php echo round($berat_rata_b,2)?></span>
                                    <span class="ms-1 text-muted font-size-13">Kg Berat Rata - Rata</span>
                                </div>
                                <div class="text-nowrap">
                                    <span class="badge bg-soft-success text-success"><?php echo round($panen_akhir_b,2)?></span>
                                    <span class="ms-1 text-muted font-size-13">Ekor Seminggu Terakhir</span>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                </div><!-- end row-->
                <div class="row">
                    <div class="col-xl-6">
                        <!-- card -->
                        <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="col-6">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">BW (Gram)</span>

                            </div>
                            <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th style="vertical-align : middle;text-align:center;" colspan="2">Kandang A</th>
                                            <th style="vertical-align : middle;text-align:center;" colspan="2">Kandang B</th>
                                        </tr>
                                        <tr>
                                                <th></th>
                                                <th>Lantai 1</th>
                                                <th>Lantai 2</th>
                                                <th>Lantai 1</th>
                                                <th>Lantai 2</th>
                                            </tr>
                                            <tr>
                                                <th>Umur</th>
                                                <td><?php echo $timbangan_harian_a_1[6]?></td>
                                                <td><?php echo $timbangan_harian_a_2[6]?></td>
                                                <td><?php echo $timbangan_harian_b_1[6]?></td>
                                                <td><?php echo $timbangan_harian_b_2[6]?></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Sekat 1</th>
                                                <td><?php echo $timbangan_harian_a_1[0]?></td>
                                                <td><?php echo $timbangan_harian_a_2[0]?></td>
                                                <td><?php echo $timbangan_harian_b_1[0]?></td>
                                                <td><?php echo $timbangan_harian_b_2[0]?></td>
                                            </tr>
                                            <tr>
                                                <th>Sekat 2</th>
                                                <td><?php echo $timbangan_harian_a_1[1]?></td>
                                                <td><?php echo $timbangan_harian_a_2[1]?></td>
                                                <td><?php echo $timbangan_harian_b_1[1]?></td>
                                                <td><?php echo $timbangan_harian_b_2[1]?></td>
                                            </tr>
                                            <tr>
                                                <th>Sekat 3</th>
                                                <td><?php echo $timbangan_harian_a_1[2]?></td>
                                                <td><?php echo $timbangan_harian_a_2[2]?></td>
                                                <td><?php echo $timbangan_harian_b_1[2]?></td>
                                                <td><?php echo $timbangan_harian_b_2[2]?></td>
                                            </tr>
                                            <tr>
                                                <th>Sekat 4</th>
                                                <td><?php echo $timbangan_harian_a_1[3]?></td>
                                                <td><?php echo $timbangan_harian_a_2[3]?></td>
                                                <td><?php echo $timbangan_harian_b_1[3]?></td>
                                                <td><?php echo $timbangan_harian_b_2[3]?></td>
                                            </tr>
                                            <tr>
                                                <th>Sekat 5</th>
                                                <td><?php echo $timbangan_harian_a_1[4]?></td>
                                                <td><?php echo $timbangan_harian_a_2[4]?></td>
                                                <td><?php echo $timbangan_harian_b_1[4]?></td>
                                                <td><?php echo $timbangan_harian_b_2[4]?></td>
                                            </tr>
                                            <tr>
                                                <th>Average</th>
                                                <td><?php echo $timbangan_harian_a_1[5]?></td>
                                                <td><?php echo $timbangan_harian_a_2[5]?></td>
                                                <td><?php echo $timbangan_harian_b_1[5]?></td>
                                                <td><?php echo $timbangan_harian_b_2[5]?></td>
                                            </tr>
                                            <!-- <tr>
                                                <th>Pakan (bag)</th>
                                                <td><?php echo $timbangan_harian_a_1[7]?></td>
                                                <td><?php echo $timbangan_harian_a_2[7]?></td>
                                                <td><?php echo $timbangan_harian_b_1[7]?></td>
                                                <td><?php echo $timbangan_harian_b_2[7]?></td>
                                            </tr>
                                            <tr>
                                                <th>Stock (bag)</th>
                                                <td><?php echo $timbangan_harian_a_1[8]?></td>
                                                <td><?php echo $timbangan_harian_a_2[8]?></td>
                                                <td><?php echo $timbangan_harian_b_1[8]?></td>
                                                <td><?php echo $timbangan_harian_b_2[8]?></td>
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-6">
                    <div class="card card-h-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="col-6">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Kematian (Ekor)</span>

                            </div>
                            <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th></th>
                                            <th style="vertical-align : middle;text-align:center;" colspan="2">Kandang A</th>
                                            <th style="vertical-align : middle;text-align:center;" colspan="2">Kandang B</th>
                                        </tr>
                                        <tr>
                                                <th></th>
                                                <th>Lantai 1</th>
                                                <th>Lantai 2</th>
                                                <th>Lantai 1</th>
                                                <th>Lantai 2</th>
                                            </tr>
                                            <tr>
                                                <th>Umur</th>
                                                <td><?php echo $kematian_a_1[6]?></td>
                                                <td><?php echo $kematian_a_2[6]?></td>
                                                <td><?php echo $kematian_b_1[6]?></td>
                                                <td><?php echo $kematian_b_2[6]?></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Sekat 1</th>
                                                <td><?php echo $kematian_a_1[0]?></td>
                                                <td><?php echo $kematian_a_2[0]?></td>
                                                <td><?php echo $kematian_b_1[0]?></td>
                                                <td><?php echo $kematian_b_2[0]?></td>
                                            </tr>
                                            <tr>
                                                <th>Sekat 2</th>
                                                <td><?php echo $kematian_a_1[1]?></td>
                                                <td><?php echo $kematian_a_2[1]?></td>
                                                <td><?php echo $kematian_b_1[1]?></td>
                                                <td><?php echo $kematian_b_2[1]?></td>
                                            </tr>
                                            <tr>
                                                <th>Sekat 3</th>
                                                <td><?php echo $kematian_a_1[2]?></td>
                                                <td><?php echo $kematian_a_2[2]?></td>
                                                <td><?php echo $kematian_b_1[2]?></td>
                                                <td><?php echo $kematian_b_2[2]?></td>
 
                                            </tr>
                                            <tr>
                                                <th>Sekat 4</th>
                                                <td><?php echo $kematian_a_1[3]?></td>
                                                <td><?php echo $kematian_a_2[3]?></td>
                                                <td><?php echo $kematian_b_1[3]?></td>
                                                <td><?php echo $kematian_b_2[3]?></td>

                                            </tr>
                                            <tr>
                                                <th>Sekat 5</th>
                                                <td><?php echo $kematian_a_1[4]?></td>
                                                <td><?php echo $kematian_a_2[4]?></td>
                                                <td><?php echo $kematian_b_1[4]?></td>
                                                <td><?php echo $kematian_b_2[4]?></td>

                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td><?php echo $kematian_a_1[5]?></td>
                                                <td><?php echo $kematian_a_2[5]?></td>
                                                <td><?php echo $kematian_b_1[5]?></td>
                                                <td><?php echo $kematian_b_2[5]?></td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                </div><!-- end row-->
</div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                        <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Pakan Kandang A</h4>
                                <div class="flex-shrink-0">
                                    <ul class="nav nav-tabs-custom card-header-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#lantai-1-tab" role="tab">Lantai 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#lantai-2-tab" role="tab">Lantai 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="lantai-1-tab" role="tabpanel">
                                        <div id="column_chart" data-colors='["#2ab57d", "#5156be", "#fd625e"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                <div class="tab-pane" id="lantai-2-tab" role="tabpanel">
                                    <div id="column_chart_2" data-colors='["#2ab57d", "#5156be", "#fd625e"]' class="apex-charts" dir="ltr"></div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <div class="col-xl-6">
                        <div class="card">
                        <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Pakan Kandang B</h4>
                                <div class="flex-shrink-0">
                                    <ul class="nav nav-tabs-custom card-header-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#lantai-1b-tab" role="tab">Lantai 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#lantai-2b-tab" role="tab">Lantai 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="lantai-1b-tab" role="tabpanel">
                                        <div id="column_chart_b" data-colors='["#2ab57d", "#5156be", "#fd625e"]' class="apex-charts" dir="ltr"></div>
                                    </div>
                                <div class="tab-pane" id="lantai-2b-tab" role="tabpanel">
                                    <div id="column_chart_b_2" data-colors='["#2ab57d", "#5156be", "#fd625e"]' class="apex-charts" dir="ltr"></div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                </div>
                <!-- end row -->
                
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('partials/right-sidebar') ?>

<?= $this->include('partials/vendor-scripts') ?>

<!-- apexcharts -->
<script src="assets/libs/apexcharts/apexcharts.min.js"></script>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<!-- dashboard init -->
<script src="assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

<!-- apexcharts init -->
<script src="assets/js/pages/apexcharts.init.js"></script>
</body>

</html>