<!doctype html>
<html lang="en">

<head>


    <!-- DataTables -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <meta charset="utf-8" />
        <title>Table Harian | SmartFarm</title>
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
                        <h4 class="page-title mb-0 font-size-18"></h4>
                        
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Table Harian</li>
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

                <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#harian" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home">&nbsp;A</i></span>
                                            <span class="d-none d-sm-block"><h5>Table Harian</h5></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kematian" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home">&nbsp;B</i></span>
                                            <span class="d-none d-sm-block"><h5>Table Kematian</h5></span>
                                        </a>
                                    </li>
                                </ul>

                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane" id="kematian" role="tabpanel">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Kandang A Lantai 1</h4>
                                
                                </div>
                            <div class="card-body">
                                <table id="datatable-buttons-e" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Sekat 1</th>
                                            <th>Sekat 2</th>
                                            <th>Sekat 3</th>
                                            <th>Sekat 4</th>
                                            <th>Sekat 5</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($timbangan_kematian_a_1 as $kematian_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $kematian_data->tanggal;?></td>
                                        <td><?php echo $kematian_data->waktu;?></td>
                                        <td><?php echo $kematian_data->sekat_1;?></td>
                                        <td><?php echo $kematian_data->sekat_2;?></td>
                                        <td><?php echo $kematian_data->sekat_3;?></td>
                                        <td><?php echo $kematian_data->sekat_4;?></td>
                                        <td><?php echo $kematian_data->sekat_5;?></td>
                                        <td><?php echo $kematian_data->total;?></td>
                                        <!-- <td></td> -->
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-kematian-l1">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-kematian-l1">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-kematian-l1" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <a href="<?= base_url('table/kematian_a_lantai_1_delete/'.$kematian_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-kematian-l1" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kematian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/kematian_a_lantai_1_update/'.$kematian_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $kematian_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Waktu</label>
                                                                        <select class="form-select" name="waktu" value="<?= $kematian_data->waktu ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($kematian_data->waktu == 'Pagi'){echo("selected");}?>>Pagi</option>
                                                                            <option <?php if($kematian_data->waktu == 'Sore'){echo("selected");}?>>Sore</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 1</label>
                                                                        <input type="number" name="sekat_1" class="form-control" id="address" value="<?= $kematian_data->sekat_1 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 2</label>
                                                                        <input type="number" name="sekat_2" class="form-control" id="address" value="<?= $kematian_data->sekat_2 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 3</label>
                                                                        <input type="number" name="sekat_3" class="form-control" id="address" value="<?= $kematian_data->sekat_3 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 4</label>
                                                                        <input type="number" name="sekat_4" class="form-control" id="address" value="<?= $kematian_data->sekat_4 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 5</label>
                                                                        <input type="number" name="sekat_5" class="form-control" id="address" value="<?= $kematian_data->sekat_5 ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Total</label>
                                                                        <input type="number" name="pakai" class="form-control" id="address" value="<?= $kematian_data->total ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $kematian_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($kematian_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($kematian_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
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
                                    <h4 class="card-title">Kandang A Lantai 2</h4>
                                
                                </div>
                            <div class="card-body">
                                <table id="datatable-buttons-f" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Sekat 1</th>
                                            <th>Sekat 2</th>
                                            <th>Sekat 3</th>
                                            <th>Sekat 4</th>
                                            <th>Sekat 5</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($timbangan_kematian_a_2 as $kematian_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $kematian_data->tanggal;?></td>
                                        <td><?php echo $kematian_data->waktu;?></td>
                                        <td><?php echo $kematian_data->sekat_1;?></td>
                                        <td><?php echo $kematian_data->sekat_2;?></td>
                                        <td><?php echo $kematian_data->sekat_3;?></td>
                                        <td><?php echo $kematian_data->sekat_4;?></td>
                                        <td><?php echo $kematian_data->sekat_5;?></td>
                                        <td><?php echo $kematian_data->total;?></td>
                                        <!-- <td></td> -->
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-kematian-l2">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-kematian-l2">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-kematian-l2" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <a href="<?= base_url('table/kematian_a_lantai_1_delete/'.$kematian_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-kematian-l2" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Harian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/kematian_a_lantai_1_update/'.$kematian_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $kematian_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Waktu</label>
                                                                        <select class="form-select" name="waktu" value="<?= $kematian_data->waktu ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($kematian_data->waktu == 'Pagi'){echo("selected");}?>>Pagi</option>
                                                                            <option <?php if($kematian_data->waktu == 'Sore'){echo("selected");}?>>Sore</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 1</label>
                                                                        <input type="number" name="sekat_1" class="form-control" id="address" value="<?= $kematian_data->sekat_1 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 2</label>
                                                                        <input type="number" name="sekat_2" class="form-control" id="address" value="<?= $kematian_data->sekat_2 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 3</label>
                                                                        <input type="number" name="sekat_3" class="form-control" id="address" value="<?= $kematian_data->sekat_3 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 4</label>
                                                                        <input type="number" name="sekat_4" class="form-control" id="address" value="<?= $kematian_data->sekat_4 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 5</label>
                                                                        <input type="number" name="sekat_5" class="form-control" id="address" value="<?= $kematian_data->sekat_5 ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Total</label>
                                                                        <input type="number" name="pakai" class="form-control" id="address" value="<?= $kematian_data->total ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $kematian_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($kematian_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($kematian_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
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
                                    <h4 class="card-title">Kandang B Lantai 1</h4>
                                
                                </div>
                            <div class="card-body">
                                <table id="datatable-buttons-g" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Sekat 1</th>
                                            <th>Sekat 2</th>
                                            <th>Sekat 3</th>
                                            <th>Sekat 4</th>
                                            <th>Sekat 5</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($timbangan_kematian_b_1 as $kematian_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $kematian_data->tanggal;?></td>
                                        <td><?php echo $kematian_data->waktu;?></td>
                                        <td><?php echo $kematian_data->sekat_1;?></td>
                                        <td><?php echo $kematian_data->sekat_2;?></td>
                                        <td><?php echo $kematian_data->sekat_3;?></td>
                                        <td><?php echo $kematian_data->sekat_4;?></td>
                                        <td><?php echo $kematian_data->sekat_5;?></td>
                                        <td><?php echo $kematian_data->total;?></td>
                                        <!-- <td></td> -->
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-kematian-b-l1">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-kematian-b-l1">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-kematian-b-l1" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <a href="<?= base_url('table/kematian_b_lantai_1_delete/'.$kematian_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-kematian-b-l1" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Harian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/kematian_b_lantai_1_update/'.$kematian_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $kematian_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Waktu</label>
                                                                        <select class="form-select" name="waktu" value="<?= $kematian_data->waktu ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($kematian_data->waktu == 'Pagi'){echo("selected");}?>>Pagi</option>
                                                                            <option <?php if($kematian_data->waktu == 'Sore'){echo("selected");}?>>Sore</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 1</label>
                                                                        <input type="number" name="sekat_1" class="form-control" id="address" value="<?= $kematian_data->sekat_1 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 2</label>
                                                                        <input type="number" name="sekat_2" class="form-control" id="address" value="<?= $kematian_data->sekat_2 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 3</label>
                                                                        <input type="number" name="sekat_3" class="form-control" id="address" value="<?= $kematian_data->sekat_3 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 4</label>
                                                                        <input type="number" name="sekat_4" class="form-control" id="address" value="<?= $kematian_data->sekat_4 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 5</label>
                                                                        <input type="number" name="sekat_5" class="form-control" id="address" value="<?= $kematian_data->sekat_5 ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Total</label>
                                                                        <input type="number" name="pakai" class="form-control" id="address" value="<?= $kematian_data->total ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $kematian_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($kematian_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($kematian_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
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
                                    <h4 class="card-title">Kandang B Lantai 2</h4>
                                
                                </div>
                            <div class="card-body">
                                <table id="datatable-buttons-h" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Sekat 1</th>
                                            <th>Sekat 2</th>
                                            <th>Sekat 3</th>
                                            <th>Sekat 4</th>
                                            <th>Sekat 5</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($timbangan_kematian_b_2 as $kematian_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $kematian_data->tanggal;?></td>
                                        <td><?php echo $kematian_data->waktu;?></td>
                                        <td><?php echo $kematian_data->sekat_1;?></td>
                                        <td><?php echo $kematian_data->sekat_2;?></td>
                                        <td><?php echo $kematian_data->sekat_3;?></td>
                                        <td><?php echo $kematian_data->sekat_4;?></td>
                                        <td><?php echo $kematian_data->sekat_5;?></td>
                                        <td><?php echo $kematian_data->total;?></td>
                                        <!-- <td></td> -->
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-kematian-b-l2">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-kematian-b-l2">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-kematian-b-l2" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <a href="<?= base_url('table/kematian_b_lantai_1_delete/'.$kematian_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-kematian-b-l2" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Harian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/kematian_b_lantai_1_update/'.$kematian_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $kematian_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Waktu</label>
                                                                        <select class="form-select" name="waktu" value="<?= $kematian_data->waktu ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($kematian_data->waktu == 'Pagi'){echo("selected");}?>>Pagi</option>
                                                                            <option <?php if($kematian_data->waktu == 'Sore'){echo("selected");}?>>Sore</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 1</label>
                                                                        <input type="number" name="sekat_1" class="form-control" id="address" value="<?= $kematian_data->sekat_1 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 2</label>
                                                                        <input type="number" name="sekat_2" class="form-control" id="address" value="<?= $kematian_data->sekat_2 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 3</label>
                                                                        <input type="number" name="sekat_3" class="form-control" id="address" value="<?= $kematian_data->sekat_3 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 4</label>
                                                                        <input type="number" name="sekat_4" class="form-control" id="address" value="<?= $kematian_data->sekat_4 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 5</label>
                                                                        <input type="number" name="sekat_5" class="form-control" id="address" value="<?= $kematian_data->sekat_5 ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Total</label>
                                                                        <input type="number" name="pakai" class="form-control" id="address" value="<?= $kematian_data->total ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $kematian_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($kematian_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($kematian_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
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
            </div>
            <div class="tab-pane active" id="harian" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Kandang A Lantai 1</h4>
                        
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Umur</th>
                                            <th>Waktu</th>
                                            <th>Vaksin</th>
                                            <th>Sekat 1</th>
                                            <th>Sekat 2</th>
                                            <th>Sekat 3</th>
                                            <th>Sekat 4</th>
                                            <!-- <th>Sekat 5</th> -->
                                            <th>BW</th>
                                            <th>Kenaikan Harian</th>
                                            <th>Pakan Masuk</th>
                                            <th>Pakan Pakai</th>
                                            <th>Pakan Sisa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($timbangan_a_lantai_1 as $timbangan_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $timbangan_data->tanggal;?></td>
                                        <td><?php echo $timbangan_data->umur;?></td>
                                        <td><?php echo $timbangan_data->waktu;?></td>
                                        <td><?php echo $timbangan_data->vaksin;?></td>
                                        <td><?php echo $timbangan_data->sekat_1;?></td>
                                        <td><?php echo $timbangan_data->sekat_2;?></td>
                                        <td><?php echo $timbangan_data->sekat_3;?></td>
                                        <td><?php echo $timbangan_data->sekat_4;?></td>
                                        <td><?php echo $timbangan_data->bw;?></td>
                                        <td><?php echo $timbangan_data->kenaikan_harian;?></td>
                                        <td><?php echo $timbangan_data->masuk;?></td>
                                        <td><?php echo $timbangan_data->pakai;?></td>
                                        <td><?php echo $timbangan_data->sisa;?></td>
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-kandang-a-l1">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-kandang-a-l1">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-kandang-a-l1" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <a href="<?= base_url('table/timbangan_a_lantai_1_delete/'.$timbangan_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-kandang-a-l1" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Harian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/timbangan_a_lantai_1_update/'.$timbangan_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $timbangan_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Umur</label>
                                                                        <input type="number" name="umur" class="form-control" id="email" value="<?= $timbangan_data->umur ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Waktu</label>
                                                                        <select class="form-select" name="waktu" value="<?= $timbangan_data->waktu ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->waktu == 'Pagi'){echo("selected");}?>>Pagi</option>
                                                                            <option <?php if($timbangan_data->waktu == 'Sore'){echo("selected");}?>>Sore</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Vaksin</label>
                                                                        <select class="form-select" name="vaksin" value="<?= $timbangan_data->vaksin ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->vaksin == 'Ya'){echo("selected");}?>>Ya</option>
                                                                            <option <?php if($timbangan_data->vaksin == 'Tidak'){echo("selected");}?>>Tidak</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 1</label>
                                                                        <input type="number" name="sekat_1" class="form-control" id="address" value="<?= $timbangan_data->sekat_1 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 2</label>
                                                                        <input type="number" name="sekat_2" class="form-control" id="address" value="<?= $timbangan_data->sekat_2 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 3</label>
                                                                        <input type="number" name="sekat_3" class="form-control" id="address" value="<?= $timbangan_data->sekat_3 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 4</label>
                                                                        <input type="number" name="sekat_4" class="form-control" id="address" value="<?= $timbangan_data->sekat_4 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 5</label>
                                                                        <input type="number" name="sekat_5" class="form-control" id="address" value="<?= $timbangan_data->sekat_5 ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Masuk</label>
                                                                        <input type="number" name="masuk" class="form-control" id="address" value="<?= $timbangan_data->masuk ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Pakai</label>
                                                                        <input type="number" name="pakai" class="form-control" id="address" value="<?= $timbangan_data->pakai ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $timbangan_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($timbangan_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
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
                                <h4 class="card-title">Kandang A Lantai 2</h4>
                        
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons-b" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Umur</th>
                                            <th>Waktu</th>
                                            <th>Vaksin</th>
                                            <th>Sekat 1</th>
                                            <th>Sekat 2</th>
                                            <th>Sekat 3</th>
                                            <th>Sekat 4</th>
                                            <!-- <th>Sekat 5</th> -->
                                            <th>BW</th>
                                            <th>Kenaikan Harian</th>
                                            <th>Pakan Masuk</th>
                                            <th>Pakan Pakai</th>
                                            <th>Pakan Sisa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($timbangan_a_lantai_2 as $timbangan_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $timbangan_data->tanggal;?></td>
                                        <td><?php echo $timbangan_data->umur;?></td>
                                        <td><?php echo $timbangan_data->waktu;?></td>
                                        <td><?php echo $timbangan_data->vaksin;?></td>
                                        <td><?php echo $timbangan_data->sekat_1;?></td>
                                        <td><?php echo $timbangan_data->sekat_2;?></td>
                                        <td><?php echo $timbangan_data->sekat_3;?></td>
                                        <td><?php echo $timbangan_data->sekat_4;?></td>
                                        <td><?php echo $timbangan_data->bw;?></td>
                                        <td><?php echo $timbangan_data->kenaikan_harian;?></td>
                                        <td><?php echo $timbangan_data->masuk;?></td>
                                        <td><?php echo $timbangan_data->pakai;?></td>
                                        <td><?php echo $timbangan_data->sisa;?></td>
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-kandang-a-l2">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-kandang-a-l2">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-kandang-a-l2" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <a href="<?= base_url('table/timbangan_a_lantai_1_delete/'.$timbangan_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-kandang-a-l2" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Harian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/timbangan_a_lantai_1_update/'.$timbangan_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $timbangan_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Umur</label>
                                                                        <input type="number" name="umur" class="form-control" id="email" value="<?= $timbangan_data->umur ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Waktu</label>
                                                                        <select class="form-select" name="waktu" value="<?= $timbangan_data->waktu ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->waktu == 'Pagi'){echo("selected");}?>>Pagi</option>
                                                                            <option <?php if($timbangan_data->waktu == 'Sore'){echo("selected");}?>>Sore</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Vaksin</label>
                                                                        <select class="form-select" name="vaksin" value="<?= $timbangan_data->vaksin ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->vaksin == 'Ya'){echo("selected");}?>>Ya</option>
                                                                            <option <?php if($timbangan_data->vaksin == 'Tidak'){echo("selected");}?>>Tidak</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 1</label>
                                                                        <input type="number" name="sekat_1" class="form-control" id="address" value="<?= $timbangan_data->sekat_1 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 2</label>
                                                                        <input type="number" name="sekat_2" class="form-control" id="address" value="<?= $timbangan_data->sekat_2 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 3</label>
                                                                        <input type="number" name="sekat_3" class="form-control" id="address" value="<?= $timbangan_data->sekat_3 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 4</label>
                                                                        <input type="number" name="sekat_4" class="form-control" id="address" value="<?= $timbangan_data->sekat_4 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 5</label>
                                                                        <input type="number" name="sekat_5" class="form-control" id="address" value="<?= $timbangan_data->sekat_5 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Masuk</label>
                                                                        <input type="number" name="masuk" class="form-control" id="address" value="<?= $timbangan_data->masuk ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Pakai</label>
                                                                        <input type="number" name="pakai" class="form-control" id="address" value="<?= $timbangan_data->pakai ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $timbangan_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($timbangan_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
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
                                <h4 class="card-title">Kandang B Lantai 1</h4>
                        
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons-c" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Umur</th>
                                            <th>Waktu</th>
                                            <th>Vaksin</th>
                                            <th>Sekat 1</th>
                                            <th>Sekat 2</th>
                                            <th>Sekat 3</th>
                                            <th>Sekat 4</th>
                                            <!-- <th>Sekat 5</th> -->
                                            <th>BW</th>
                                            <th>Kenaikan Harian</th>
                                            <th>Pakan Masuk</th>
                                            <th>Pakan Pakai</th>
                                            <th>Pakan Sisa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($timbangan_b_lantai_1 as $timbangan_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $timbangan_data->tanggal;?></td>
                                        <td><?php echo $timbangan_data->umur;?></td>
                                        <td><?php echo $timbangan_data->waktu;?></td>
                                        <td><?php echo $timbangan_data->vaksin;?></td>
                                        <td><?php echo $timbangan_data->sekat_1;?></td>
                                        <td><?php echo $timbangan_data->sekat_2;?></td>
                                        <td><?php echo $timbangan_data->sekat_3;?></td>
                                        <td><?php echo $timbangan_data->sekat_4;?></td>
                                        <td><?php echo $timbangan_data->bw;?></td>
                                        <td><?php echo $timbangan_data->kenaikan_harian;?></td>
                                        <td><?php echo $timbangan_data->masuk;?></td>
                                        <td><?php echo $timbangan_data->pakai;?></td>
                                        <td><?php echo $timbangan_data->sisa;?></td>
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-kandang-b-l1">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-kandang-b-l1">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-kandang-b-l1" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <a href="<?= base_url('table/timbangan_b_lantai_1_delete/'.$timbangan_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-kandang-b-l1" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Harian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/timbangan_b_lantai_1_update/'.$timbangan_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $timbangan_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Umur</label>
                                                                        <input type="number" name="umur" class="form-control" id="email" value="<?= $timbangan_data->umur ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Waktu</label>
                                                                        <select class="form-select" name="waktu" value="<?= $timbangan_data->waktu ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->waktu == 'Pagi'){echo("selected");}?>>Pagi</option>
                                                                            <option <?php if($timbangan_data->waktu == 'Sore'){echo("selected");}?>>Sore</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Vaksin</label>
                                                                        <select class="form-select" name="vaksin" value="<?= $timbangan_data->vaksin ?>">
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->vaksin == 'Ya'){echo("selected");}?>>Ya</option>
                                                                            <option <?php if($timbangan_data->vaksin == 'Tidak'){echo("selected");}?>>Tidak</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 1</label>
                                                                        <input type="number" name="sekat_1" class="form-control" id="address" value="<?= $timbangan_data->sekat_1 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 2</label>
                                                                        <input type="number" name="sekat_2" class="form-control" id="address" value="<?= $timbangan_data->sekat_2 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 3</label>
                                                                        <input type="number" name="sekat_3" class="form-control" id="address" value="<?= $timbangan_data->sekat_3 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 4</label>
                                                                        <input type="number" name="sekat_4" class="form-control" id="address" value="<?= $timbangan_data->sekat_4 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 5</label>
                                                                        <input type="number" name="sekat_5" class="form-control" id="address" value="<?= $timbangan_data->sekat_5 ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Masuk</label>
                                                                        <input type="number" name="masuk" class="form-control" id="address" value="<?= $timbangan_data->masuk ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Pakai</label>
                                                                        <input type="number" name="pakai" class="form-control" id="address" value="<?= $timbangan_data->pakai ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $timbangan_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($timbangan_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
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
                                <h4 class="card-title">Kandang B Lantai 2</h4>
                        
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons-d" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Umur</th>
                                            <th>Waktu</th>
                                            <th>Vaksin</th>
                                            <th>Sekat 1</th>
                                            <th>Sekat 2</th>
                                            <th>Sekat 3</th>
                                            <th>Sekat 4</th>
                                            <!-- <th>Sekat 5</th> -->
                                            <th>BW</th>
                                            <th>Kenaikan Harian</th>
                                            <th>Pakan Masuk</th>
                                            <th>Pakan Pakai</th>
                                            <th>Pakan Sisa</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($timbangan_b_lantai_2 as $timbangan_data){?>
                                        <tr>
                                        <td></td>
                                        <td><?php echo $timbangan_data->tanggal;?></td>
                                        <td><?php echo $timbangan_data->umur;?></td>
                                        <td><?php echo $timbangan_data->waktu;?></td>
                                        <td><?php echo $timbangan_data->vaksin;?></td>
                                        <td><?php echo $timbangan_data->sekat_1;?></td>
                                        <td><?php echo $timbangan_data->sekat_2;?></td>
                                        <td><?php echo $timbangan_data->sekat_3;?></td>
                                        <td><?php echo $timbangan_data->sekat_4;?></td>
                                        <td><?php echo $timbangan_data->bw;?></td>
                                        <td><?php echo $timbangan_data->kenaikan_harian;?></td>
                                        <td><?php echo $timbangan_data->masuk;?></td>
                                        <td><?php echo $timbangan_data->pakai;?></td>
                                        <td><?php echo $timbangan_data->sisa;?></td>
                                        <td>
                                        <button type="button" class="btn btn-warning waves-effect waves-light"  data-bs-toggle="modal"  data-bs-target="#editModal-kandang-b-l2">Edit</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#deleteModal-kandang-b-l2">Delete</button>
                                        </td>   
                                        </tr>
                                        <div class="modal fade" id="deleteModal-kandang-b-l2" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                    <a href="<?= base_url('table/timbangan_b_lantai_1_delete/'.$timbangan_data->id) ?>" class="btn btn-danger waves-effect waves-light">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <!-- Edit Contact Modal -->
                                                <div class="modal fade" data-bs-backdrop="static" id="editModal-kandang-b-l2" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Harian</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </button>
                                                            </div>
                                                            <form action="<?= base_url('table/timbangan_b_lantai_1_update/'.$timbangan_data->id) ?>" method="post">
                                                                <?= csrf_field(); ?>
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name">Tanggal</label>
                                                                        <input type="date" name="tanggal" class="form-control" id="name" value="<?= $timbangan_data->tanggal ?>" placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email">Umur</label>
                                                                        <input type="number" name="umur" class="form-control" id="email" value="<?= $timbangan_data->umur ?>"  placeholder="" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Waktu</label>
                                                                        <select class="form-select" name="waktu" value="<?= $timbangan_data->waktu ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->waktu == 'Pagi'){echo("selected");}?>>Pagi</option>
                                                                            <option <?php if($timbangan_data->waktu == 'Sore'){echo("selected");}?>>Sore</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Vaksin</label>
                                                                        <select class="form-select" name="vaksin" value="<?= $timbangan_data->vaksin ?>">
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->vaksin == 'Ya'){echo("selected");}?>>Ya</option>
                                                                            <option <?php if($timbangan_data->vaksin == 'Tidak'){echo("selected");}?>>Tidak</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 1</label>
                                                                        <input type="number" name="sekat_1" class="form-control" id="address" value="<?= $timbangan_data->sekat_1 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 2</label>
                                                                        <input type="number" name="sekat_2" class="form-control" id="address" value="<?= $timbangan_data->sekat_2 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 3</label>
                                                                        <input type="number" name="sekat_3" class="form-control" id="address" value="<?= $timbangan_data->sekat_3 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 4</label>
                                                                        <input type="number" name="sekat_4" class="form-control" id="address" value="<?= $timbangan_data->sekat_4 ?>"  placeholder="">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Sekat 5</label>
                                                                        <input type="number" name="sekat_5" class="form-control" id="address" value="<?= $timbangan_data->sekat_5 ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Masuk</label>
                                                                        <input type="number" name="masuk" class="form-control" id="address" value="<?= $timbangan_data->masuk ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="address">Pakai</label>
                                                                        <input type="number" name="pakai" class="form-control" id="address" value="<?= $timbangan_data->pakai ?>"  placeholder="" >
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="form-label">Lantai</label>
                                                                        <select class="form-select" name="lantai" value="<?= $timbangan_data->lantai ?>" required>
                                                                            <option>Select</option>
                                                                            <option <?php if($timbangan_data->lantai == '1'){echo("selected");}?>>1</option>
                                                                            <option <?php if($timbangan_data->lantai == '2'){echo("selected");}?>>2</option>
                                                                        </select>
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
                </div>
                </div>

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