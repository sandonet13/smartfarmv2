<!doctype html>
<html lang="en">

<head>


    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <meta charset="utf-8" />
        <title>Table Panen | SmartFarm</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/assets/images/favicon.ico">
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
                <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="page-title mb-0 font-size-18">Table Panen</h4>
                        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Table Panen</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
                <!-- end page title -->
                <?php if(session()->has("message")){?>                                    
                                    <div class="alert alert-success alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                                                <i class="mdi mdi-check-all label-icon"></i> <?= session()->get("message") ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    
                                    </div>                
                        <?php }?>
                <!-- start row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kandang A</h4>
                        
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Umur</th>
                                            <th>No. DO</th>
                                            <th>Penerima</th>
                                            <th>No. Truk</th>
                                            <th>Nama Supir</th>
                                            <th>Jam Tangkap</th>
                                            <th>Jam Berangkat</th>
                                            <th>Tonase</th>
                                            <th>Ekor</th>
                                            <th>Lantai</th>
                                            <th>Sekat</th>
                                            <th>BW (kg/ekor)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($panen as $panen_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $panen_data->tanggal;?></td>
                                        <td><?php echo $panen_data->umur;?></td>
                                        <td><?php echo $panen_data->no_do;?></td>
                                        <td><?php echo $panen_data->penerima;?></td>
                                        <td><?php echo $panen_data->no_truk;?></td>
                                        <td><?php echo $panen_data->nama_supir;?></td>
                                        <td><?php echo $panen_data->jam_tangkap;?></td>
                                        <td><?php echo $panen_data->jam_berangkat;?></td>
                                        <td><?php echo $panen_data->tonase;?></td>
                                        <td><?php echo $panen_data->ekor;?></td>
                                        <td><?php echo $panen_data->lantai;?></td>
                                        <td><?php echo $panen_data->sekat;?></td>
                                        <td><?php echo round($panen_data->bw_ekor_kg,2);?></td>
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-<?= $panen_data->id ?>">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $panen_data->id ?>">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-<?= $panen_data->id ?>" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Delete Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apa anda yakin ingin menghapus data ini ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('table/panen_delete/'.$panen_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-<?= $panen_data->id ?>" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Panen</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/panen_update/'.$panen_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $panen_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Umur</label>
                                                                        <input type="number" name="umur" class="form-control" id="email" value="<?= $panen_data->umur ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="phone">No. DO</label>
                                                                        <input type="text" name="no_do" class="form-control" id="phone" value="<?= $panen_data->no_do ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Penerima</label>
                                                                        <input type="text" name="penerima" class="form-control" id="address" value="<?= $panen_data->penerima ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">No. Truk</label>
                                                                        <input type="text" name="no_truk" class="form-control" id="address" value="<?= $panen_data->no_truk ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Nama Supir</label>
                                                                        <input type="text" name="nama_supir" class="form-control" id="address" value="<?= $panen_data->nama_supir ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Jam Tangkap</label>
                                                                        <input type="time" name="jam_tangkap" class="form-control" id="address" value="<?= $panen_data->jam_tangkap ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Jam Berangkat</label>
                                                                        <input type="time" name="jam_berangkat" class="form-control" id="address" value="<?= $panen_data->jam_berangkat ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Tonase</label>
                                                                        <input type="number" name="tonase" class="form-control" id="address" value="<?= $panen_data->tonase ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Ekor</label>
                                                                        <input type="number" name="ekor" class="form-control" id="address" value="<?= $panen_data->ekor ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $panen_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($panen_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($panen_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">Sekat</label>
                                                                            <select class="form-select" name="sekat" value="<?= $panen_data->sekat ?>" required>
                                                                                <option>Select</option>
                                                                                <option <?php if($panen_data->sekat == '1'){echo("selected");}?>>1</option>
                                                                                <option <?php if($panen_data->sekat == '2'){echo("selected");}?>>2</option>
                                                                                <option <?php if($panen_data->sekat == '3'){echo("selected");}?>>3</option>
                                                                                <option <?php if($panen_data->sekat == '4'){echo("selected");}?>>4</option>
                                                                                <option <?php if($panen_data->sekat == '5'){echo("selected");}?>>5</option>
                                                                            </select>
                                                                        </div>
                                                                    <div class="form-group">
                                                                        <label for="address">BW (kg/ekor)</label>
                                                                        <input type="number" name="bw_ekor_kg" class="form-control" id="address" value="<?= round($panen_data->tonase / $panen_data->ekor,2) ?>"  placeholder="" readonly >
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                    </div>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end cardaa -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kandang B</h4>
                        
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons-b" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Umur</th>
                                            <th>No. DO</th>
                                            <th>Penerima</th>
                                            <th>No. Truk</th>
                                            <th>Nama Supir</th>
                                            <th>Jam Tangkap</th>
                                            <th>Jam Berangkat</th>
                                            <th>Tonase</th>
                                            <th>Ekor</th>
                                            <th>Lantai</th>
                                            <th>Sekat</th>
                                            <th>BW (kg/ekor)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($panen_b as $panen_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $panen_data->tanggal;?></td>
                                        <td><?php echo $panen_data->umur;?></td>
                                        <td><?php echo $panen_data->no_do;?></td>
                                        <td><?php echo $panen_data->penerima;?></td>
                                        <td><?php echo $panen_data->no_truk;?></td>
                                        <td><?php echo $panen_data->nama_supir;?></td>
                                        <td><?php echo $panen_data->jam_tangkap;?></td>
                                        <td><?php echo $panen_data->jam_berangkat;?></td>
                                        <td><?php echo $panen_data->tonase;?></td>
                                        <td><?php echo $panen_data->ekor;?></td>
                                        <td><?php echo $panen_data->lantai;?></td>
                                        <td><?php echo $panen_data->sekat;?></td>
                                        <td><?php echo round($panen_data->bw_ekor_kg,2);?></td>
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-<?= $panen_data->id ?>">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $panen_data->id ?>">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-<?= $panen_data->id ?>" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Delete Data</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apa anda yakin ingin menghapus data ini ?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light waves-effect waves-light" data-bs-dismiss="modal">Close</button>
                                                    <a href="<?= base_url('table/panen_delete_b/'.$panen_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-<?= $panen_data->id ?>" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Panen</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/panen_update_b/'.$panen_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $panen_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Umur</label>
                                                                        <input type="number" name="umur" class="form-control" id="email" value="<?= $panen_data->umur ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="phone">No. DO</label>
                                                                        <input type="text" name="no_do" class="form-control" id="phone" value="<?= $panen_data->no_do ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Penerima</label>
                                                                        <input type="text" name="penerima" class="form-control" id="address" value="<?= $panen_data->penerima ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">No. Truk</label>
                                                                        <input type="text" name="no_truk" class="form-control" id="address" value="<?= $panen_data->no_truk ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Nama Supir</label>
                                                                        <input type="text" name="nama_supir" class="form-control" id="address" value="<?= $panen_data->nama_supir ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Jam Tangkap</label>
                                                                        <input type="time" name="jam_tangkap" class="form-control" id="address" value="<?= $panen_data->jam_tangkap ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Jam Berangkat</label>
                                                                        <input type="time" name="jam_berangkat" class="form-control" id="address" value="<?= $panen_data->jam_berangkat ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Tonase</label>
                                                                        <input type="number" name="tonase" class="form-control" id="address" value="<?= $panen_data->tonase ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Ekor</label>
                                                                        <input type="number" name="ekor" class="form-control" id="address" value="<?= $panen_data->ekor ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $panen_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($panen_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($panen_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-label">Sekat</label>
                                                                            <select class="form-select" name="sekat" value="<?= $panen_data->sekat ?>" required>
                                                                                <option>Select</option>
                                                                                <option <?php if($panen_data->sekat == '1'){echo("selected");}?>>1</option>
                                                                                <option <?php if($panen_data->sekat == '2'){echo("selected");}?>>2</option>
                                                                                <option <?php if($panen_data->sekat == '3'){echo("selected");}?>>3</option>
                                                                                <option <?php if($panen_data->sekat == '4'){echo("selected");}?>>4</option>
                                                                                <option <?php if($panen_data->sekat == '5'){echo("selected");}?>>5</option>
                                                                            </select>
                                                                        </div>
                                                                    <div class="form-group">
                                                                        <label for="address">BW (kg/ekor)</label>
                                                                        <input type="number" name="bw_ekor_kg" class="form-control" id="address" value="<?= round($panen_data->tonase / $panen_data->ekor,2) ?>"  placeholder="" readonly >
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                    </div>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end cardaa -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
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

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>

</body>

</html>