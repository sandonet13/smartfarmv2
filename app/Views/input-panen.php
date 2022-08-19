<!doctype html>
<html lang="en">

<head>

    <!-- <?= $title_meta ?> -->

    <?= $this->include('partials/head-css') ?>

</head>

<?= $this->include('partials/body') ?>

<!-- <body data-layout="horizontal"> -->

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include('partials/menu') ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <?= $page_title ?>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                        <?php if(session()->has("message")){?>                                    
                                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                <i class="mdi mdi-check-all label-icon"></i> <?= session()->get("message") ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    
                                    </div>                
                        <?php }?>
                        <?php if(isset($validation)) { ?>
                            
                                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                <i class="mdi mdi-block-helper label-icon"></i><strong>Error</strong><?php echo $validation->listErrors() ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                        <?php } ?>
                                   
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home">&nbsp;A</i></span>
                                            <span class="d-none d-sm-block">Kandang A</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home">&nbsp;B</i></span>
                                            <span class="d-none d-sm-block">Kandang B</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div>
                                        <form action="/create" method="post">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tanggal</label>
                                                <input class="form-control" type="date" value="" id="example-date-input" name="tanggal" required>                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Umur (hari)</label>
                                                <input class="form-control" type="text" value="" id="example-search-input" name="umur" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">No. DO</label>
                                                <input class="form-control" type="text" value="" id="" name="no_do">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-url-input" class="form-label">Penerima</label>
                                                <input class="form-control" type="text" value="" id="example-url-input" name="penerima">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-tel-input" class="form-label">No. Truk</label>
                                                <input class="form-control" type="text" value="" id="example-tel-input" name="no_truk">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-password-input" class="form-label">Nama Supir</label>
                                                <input class="form-control" type="text" value="" id="example-password-input" name="nama_supir">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-number-input" class="form-label">Jam Tangkap</label>
                                                <input class="form-control" type="time" value="" id="example-time-input" name="jam_tangkap">
                                            </div>
                                            <div>
                                                <label for="example-datetime-local-input" class="form-label">Jam Berangkat</label>
                                                <input class="form-control" type="time" value="" id="example-time-input" name="jam_berangkat">
                                            </div>
                                            
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="example-date-input" class="form-label">Tonase</label>
                                                <input class="form-control" type="number" value="" id="example-date-input" name="tonase" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-month-input" class="form-label">Ekor</label>
                                                <input class="form-control" type="number" value="" id="example-month-input" name="ekor" required>
                                            </div>
                                            <div class="mb-3">
                                            <label class="form-label">Lantai</label>
                                                <select class="form-select" name="lantai" required>
                                                    <option>Select</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                            <label class="form-label">Sekat</label>
                                                <select class="form-select" name="sekat" required>
                                                    <option>Select</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="example-week-input" class="form-label">BW (kg/ekor)</label>
                                                <input class="form-control" type="number" value="" id="example-week-input" name="bw_ekor_kg" required>
                                            </div> -->
                                            <div class="mt-4">
                                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="row">
                                    <div class="col-lg-6">
                                        <div>
                                        <form action="/create_b" method="post">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tanggal</label>
                                                <input class="form-control" type="date" value="" id="example-date-input" name="tanggal2" required>                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Umur (hari)</label>
                                                <input class="form-control" type="text" value="" id="example-search-input" name="umur2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-email-input" class="form-label">No. DO</label>
                                                <input class="form-control" type="text" value="" id="" name="no_do2">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-url-input" class="form-label">Penerima</label>
                                                <input class="form-control" type="text" value="" id="example-url-input" name="penerima2">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-tel-input" class="form-label">No. Truk</label>
                                                <input class="form-control" type="text" value="" id="example-tel-input" name="no_truk2">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-password-input" class="form-label">Nama Supir</label>
                                                <input class="form-control" type="text" value="" id="example-password-input" name="nama_supir2">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-number-input" class="form-label">Jam Tangkap</label>
                                                <input class="form-control" type="time" value="" id="example-time-input" name="jam_tangkap2">
                                            </div>
                                            <div>
                                                <label for="example-datetime-local-input" class="form-label">Jam Berangkat</label>
                                                <input class="form-control" type="time" value="" id="example-time-input" name="jam_berangkat2">
                                            </div>
                                            
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="example-date-input" class="form-label">Tonase</label>
                                                <input class="form-control" type="number" value="" id="example-date-input" name="tonase2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-month-input" class="form-label">Ekor</label>
                                                <input class="form-control" type="number" value="" id="example-month-input" name="ekor2" required>
                                            </div>
                                            <div class="mb-3">
                                            <label class="form-label">Lantai</label>
                                                <select class="form-select" name="lantai2" required>
                                                    <option>Select</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                            <label class="form-label">Sekat</label>
                                                <select class="form-select" name="sekat2" required>
                                                    <option>Select</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="example-week-input" class="form-label">BW (kg/ekor)</label>
                                                <input class="form-control" type="number" value="" id="example-week-input" name="bw_ekor_kg2" required>
                                            </div> -->
                                            <div class="mt-4">
                                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                    </div>
                                </div>

                            </div><!-- end card-body -->
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->


<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<script src="assets/js/app.js"></script>

</body>

</html>