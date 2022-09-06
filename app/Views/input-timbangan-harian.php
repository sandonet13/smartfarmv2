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
                                        <a class="nav-link active" data-bs-toggle="tab" href="#kandanga" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home">&nbsp;A</i></span>
                                            <span class="d-none d-sm-block">Kandang A</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kandangb" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home">&nbsp;B</i></span>
                                            <span class="d-none d-sm-block">Kandang B</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kematiana" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-skull">&nbsp;A</i></span>
                                            <span class="d-none d-sm-block">Kematian Kandang A</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kematianb" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-skull">&nbsp;B</i></span>
                                            <span class="d-none d-sm-block">Kematian Kandang B</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active" id="kandanga" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div>
                                                    <form action="/create_timbangan_a" method="post">
                                                    <div class="mb-3">
                                                        <label for="example-text-input" class="form-label">Tanggal</label>
                                                        <input class="form-control"   type="date" value="" id="example-date-input" name="tanggal" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-search-input" class="form-label">Umur (hari)</label>
                                                        <input class="form-control" type="number" value="" id="example-search-input" name="umur" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Waktu</label>
                                                            <select class="form-select" name="waktu" required>
                                                                <option>Select</option>
                                                                <option>Pagi</option>
                                                                <option>Sore</option>
                                                            </select>
                                                    </div>
                                                    <div class="mb-3">
                                                                    <label class="form-label">Vaksin</label>
                                                                        <select class="form-select" name="vaksin" value="" required>
                                                                            <option>Select</option>
                                                                            <option>Ya</option>
                                                                            <option selected>Tidak</option>
                                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-tel-input" class="form-label">Sekat 1</label>
                                                        <input class="form-control" type="number" value="" id="example-tel-input" name="sekat_1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-password-input" class="form-label">Sekat 2</label>
                                                        <input class="form-control" type="number" value="" id="example-password-input" name="sekat_2">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-number-input" class="form-label">Sekat 3</label>
                                                        <input class="form-control" type="number" value="" id="example-time-input" name="sekat_3">
                                                    </div>
                                            
                                            
                                                </div>
                                            </div>

                                                <div class="col-lg-6">
                                                    <div class="mt-3 mt-lg-0">
                                                    <div class="mb-3">
                                                        <label for="example-datetime-local-input" class="form-label">Sekat 4</label>
                                                        <input class="form-control" type="number" value="" id="example-time-input" name="sekat_4">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="example-datetime-local-input" class="form-label">Sekat 5</label>
                                                        <input class="form-control" type="number" value="" id="example-time-input" name="sekat_5">
                                                    </div>
                                                        <!-- <div class="mb-3">
                                                            <label for="example-date-input" class="form-label">BW</label>
                                                            <input class="form-control" type="number" value="" id="example-date-input" name="bw" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-month-input" class="form-label">Kenaikan Harian</label>
                                                            <input class="form-control" type="number" value="" id="example-month-input" name="kenaikan_harian" required>
                                                        </div> -->
                                                        <div class="mb-3">
                                                            <label for="example-month-input" class="form-label"> Pakan Masuk</label>
                                                            <input class="form-control" type="number" value="" id="example-month-input" name="masuk" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="example-month-input" class="form-label">Pakan Pakai</label>
                                                            <input class="form-control" type="number" value="" id="example-month-input" name="pakai" required>
                                                        </div>
                                                        <!-- <div class="mb-3">
                                                            <label for="example-month-input" class="form-label">Pakan Sisa</label>
                                                            <input class="form-control" type="number" value="" id="example-month-input" name="sisa" required>
                                                        </div> -->
                                                        <div class="mb-3">
                                                        <label class="form-label">Lantai</label>
                                                            <select class="form-select" name="lantai" required>
                                                                <option>Select</option>
                                                                <option>1</option>
                                                                <option>2</option>
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
                                        </div><!-- end row -->
                                    
                                <div class="tab-pane" id="kandangb" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                            <form action="/create_timbangan_b" method="post">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tanggal</label>
                                                <input class="form-control"   type="date" value="" id="example-date-input" name="tanggal" required>                                            </div>
                                            <div class="mb-3">
                                                <label for="example-search-input" class="form-label">Umur (hari)</label>
                                                <input class="form-control" type="number" value="" id="example-search-input" name="umur" required>
                                            </div>
                                            <div class="mb-3">
                                            <label class="form-label">Waktu</label>
                                                <select class="form-select" name="waktu" required>
                                                    <option>Select</option>
                                                    <option>Pagi</option>
                                                    <option>Sore</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                                    <label class="form-label">Vaksin</label>
                                                                        <select class="form-select" name="vaksin" value="" required>
                                                                            <option>Select</option>
                                                                            <option>Ya</option>
                                                                            <option selected>Tidak</option>
                                                                        </select>
                                                    </div>
                                            <div class="mb-3">
                                                <label for="example-tel-input" class="form-label">Sekat 1</label>
                                                <input class="form-control" type="number" value="" id="example-tel-input" name="sekat_1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-password-input" class="form-label">Sekat 2</label>
                                                <input class="form-control" type="number" value="" id="example-password-input" name="sekat_2">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-number-input" class="form-label">Sekat 3</label>
                                                <input class="form-control" type="number" value="" id="example-time-input" name="sekat_3">
                                            </div>
                                            
                                            
                                            
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="example-datetime-local-input" class="form-label">Sekat 4</label>
                                                <input class="form-control" type="number" value="" id="example-time-input" name="sekat_4">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-datetime-local-input" class="form-label">Sekat 5</label>
                                                <input class="form-control" type="number" value="" id="example-time-input" name="sekat_5">
                                            </div>
                                                <!-- <div class="mb-3">
                                                    <label for="example-date-input" class="form-label">BW</label>
                                                    <input class="form-control" type="number" value="" id="example-date-input" name="bw" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-month-input" class="form-label">Kenaikan Harian</label>
                                                    <input class="form-control" type="number" value="" id="example-month-input" name="kenaikan_harian" required>
                                                </div> -->
                                                <div class="mb-3">
                                                    <label for="example-month-input" class="form-label"> Pakan Masuk</label>
                                                    <input class="form-control" type="number" value="" id="example-month-input" name="masuk" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="example-month-input" class="form-label">Pakan Pakai</label>
                                                    <input class="form-control" type="number" value="" id="example-month-input" name="pakai" required>
                                                </div>
                                                <!-- <div class="mb-3">
                                                    <label for="example-month-input" class="form-label">Pakan Sisa</label>
                                                    <input class="form-control" type="number" value="" id="example-month-input" name="sisa" required>
                                                </div> -->
                                                <div class="mb-3">
                                                <label class="form-label">Lantai</label>
                                                    <select class="form-select" name="lantai" required>
                                                        <option>Select</option>
                                                        <option>1</option>
                                                        <option>2</option>
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
                                    </div> <!-- end row -->
                                </div><!-- end Tab panes -->
                                <div class="tab-pane" id="kematiana" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                            <form action="/create_kematian_a" method="post">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tanggal</label>
                                                <input class="form-control"   type="date" value="" id="example-date-input" name="tanggal" required></div>
                                            <div class="mb-3">
                                            <label class="form-label">Waktu</label>
                                                <select class="form-select" name="waktu" required>
                                                    <option>Select</option>
                                                    <option>Pagi</option>
                                                    <option>Sore</option>
                                                </select>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="example-tel-input" class="form-label">Sekat 1</label>
                                                <input class="form-control" type="number" value="" id="example-tel-input" name="sekat_1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-password-input" class="form-label">Sekat 2</label>
                                                <input class="form-control" type="number" value="" id="example-password-input" name="sekat_2">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-number-input" class="form-label">Sekat 3</label>
                                                <input class="form-control" type="number" value="" id="example-time-input" name="sekat_3">
                                            </div>
                                            
                                            
                                            
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="example-datetime-local-input" class="form-label">Sekat 4</label>
                                                <input class="form-control" type="number" value="" id="example-time-input" name="sekat_4">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-datetime-local-input" class="form-label">Sekat 5</label>
                                                <input class="form-control" type="number" value="" id="example-time-input" name="sekat_5">
                                            </div>
                                               <div class="mb-3">
                                                    <label class="form-label">Lantai</label>
                                                    <select class="form-select" name="lantai" required>
                                                        <option>Select</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </div>
                
                                                <div class="mt-4">
                                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                </div>
                                                </form>
                                         </div>
                                        </div>
                                    </div> <!-- end row -->
                                </div><!-- end Tab panes -->
                                <div class="tab-pane" id="kematianb" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div>
                                            <form action="/create_kematian_b" method="post">
                                            <div class="mb-3">
                                                <label for="example-text-input" class="form-label">Tanggal</label>
                                                <input class="form-control"   type="date" value="" id="example-date-input" name="tanggal" required></div>
                                            <div class="mb-3">
                                            <label class="form-label">Waktu</label>
                                                <select class="form-select" name="waktu" required>
                                                    <option>Select</option>
                                                    <option>Pagi</option>
                                                    <option>Sore</option>
                                                </select>
                                            </div>
                                        
                                            <div class="mb-3">
                                                <label for="example-tel-input" class="form-label">Sekat 1</label>
                                                <input class="form-control" type="number" value="" id="example-tel-input" name="sekat_1">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-password-input" class="form-label">Sekat 2</label>
                                                <input class="form-control" type="number" value="" id="example-password-input" name="sekat_2">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-number-input" class="form-label">Sekat 3</label>
                                                <input class="form-control" type="number" value="" id="example-time-input" name="sekat_3">
                                            </div>
                                            
                                            
                                            
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mt-3 mt-lg-0">
                                            <div class="mb-3">
                                                <label for="example-datetime-local-input" class="form-label">Sekat 4</label>
                                                <input class="form-control" type="number" value="" id="example-time-input" name="sekat_4">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-datetime-local-input" class="form-label">Sekat 5</label>
                                                <input class="form-control" type="number" value="" id="example-time-input" name="sekat_5">
                                            </div>
                                               <div class="mb-3">
                                                    <label class="form-label">Lantai</label>
                                                    <select class="form-select" name="lantai" required>
                                                        <option>Select</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </div>
                
                                                <div class="mt-4">
                                                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                                                </div>
                                                </form>
                                         </div>
                                        </div>
                                    </div> <!-- end row -->
                                </div><!-- end Tab panes -->
                            </div>
                         </div>

                    </div>
                </div><!-- end card-body -->
            </div> <!-- end col -->
        </div>
               

     </div> <!-- container-fluid -->
</div>
        <!-- End Page-content -->


        <?= $this->include('partials/footer') ?>


<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<script src="assets/js/app.js"></script>

</body>

</html>