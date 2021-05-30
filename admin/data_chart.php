<?php
    require '../config.php';
    require 'function.php';
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>



<body>

    <!-- buttton tambah data -->
    <div>
        <button class="button btn-primary m-3" data-toggle="modal" data-target="#myModal"><i
                class="fas fa-plus-circle"></i> Tambah Data</button>
    </div>
    <!-- Akhir buttton tambah data -->
        
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Hasil Produksi</th>
                        <th>Quality Control</th>
                        <th>Good Quality</th>
                        <th>Barang Reject</th>
                        <th>Jenis Reject</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $TotalItemsOrdered = "";
                        $data_barang = mysqli_query($conn, "SELECT * FROM barang");
                        
                        $i = 1;
                        $hide = '';
                        while($data = mysqli_fetch_array($data_barang)){
                            $idb = $data['idbarang'];
                            $hasil_produksi = $data['hasil'];
                            $quality_control = $data['qc'];
                            $good_quality = $data['gq'];
                            $barang_reject = $data['br'];
                            $jenis_reject = $data['jr'];
                            $tanggal = $data['tgl'];

                        ?>
                    <tr>

                        <td><?=$i++?></td>
                        <td><?=$hasil_produksi;?></td>
                        <td><?=$quality_control;?></td>
                        <td><?=$good_quality;?></td>
                        <td><?=$barang_reject;?></td>
                        <td><?=$jenis_reject;?></td>
                        <td><?=$tanggal;?></td>
                        <td class="row justify-content-center">
                            <a href="#" class="col-lg-4">
                                <span class="actionCust"> <i class="far fa-edit" data-toggle="modal" data-target="#edit<?=$idb;?>"></i> </span></a>
                            <a href="#" class="col-lg-4">
                                <span class="actionCust"> <i class="far fa-trash-alt" data-toggle="modal" data-target="#delete<?=$idb;?>"></i>
                                </span></a>
                        </td>
                    </tr>
                    <!-- Edit Modal -->
                    <div class="modal fade" id="edit<?=$idb;?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Barang</h4>
                                    <button type="button" class="close"
                                        data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <form method="post">
                                    <div class="modal-body">
                                    <input type="text" name="hasil" placeholder="Hasil Produksi" class="form-control" 
                                    value="<?=$hasil_produksi;?>" required />
                                    <br />
                                    <input type="text" name="qc" placeholder="Quality Control" class="form-control" 
                                    value="<?=$quality_control;?>" required />
                                    <br />
                                    <input type="text" name="gq" placeholder="Good Quality" class="form-control" 
                                    value="<?=$good_quality;?>" required />
                                    <br />
                                    <input type="text" name="br" placeholder="Barang Reject" class="form-control"
                                    value="<?=$barang_reject;?>" required />
                                    <br />
                                    <select name="jr" class="form-control" value="<?=$jenis_reject;?>">
                                        <option value="<?=$jenis_reject;?>"><?=$jenis_reject;?></option>
                                        <option value="jahit">Jahitan Tidak Rapi</option>
                                        <option value="sobek">Bahan Sobek</option>
                                        <option value="jahit">Jahitan Tidak Rapi</option>
                                        <option value="jahit">Jahitan Tidak Rapi</option>
                                        <option value="jahit">Jahitan Tidak Rapi</option>
                                    </select>
                                    <br>
                                    <input type="date" name="tgl" class="form-control" 
                                    value="<?=$tanggal;?>" required />
                                    <br>
                                    <input type="hidden" name="idb" value="<?=$idb;?>">
                                    <button type="submit" class="btn btn-primary"
                                        name="updatebarang">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="delete<?=$idb;?>">
                        <div class="modal-dialog">
                            <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Hapus Barang ?</h4>
                                <button type="button" class="close"
                                    data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <form method="post">
                                <div class="modal-body">
                                    Apakah Anda yakin ingin menghapus barang tanggal <?=$tanggal;?>
                                    dengan jenis reject nya <?=$jenis_reject;?>?
                                    <input type="hidden" name="idb"
                                        value="<?=$idb;?>">
                                    <br> <br>
                                    <button type="submit" class="btn btn-danger"
                                        name="hapusbarang">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <?php
                };
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- buttton tambah data -->
    <div>
        <button class="button btn-primary m-3"><i class="fas fa-download"></i> Export Data</button>
    </div>
    <!-- Akhir buttton tambah data -->
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

    <!-- Datatabels -->
    <script>
    $(document).ready(function() {
        $("#dataTable").DataTable();
    });
    </script>
</body>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post">
                <div class="modal-body">
                    <input type="text" name="hasil" placeholder="Hasil Produksi" class="form-control" required />
                    <br />
                    <input type="text" name="qc" placeholder="Quality Control" class="form-control" required />
                    <br />
                    <input type="text" name="gq" placeholder="Good Quality" class="form-control" required />
                    <br />
                    <input type="text" name="br" placeholder="Barang Reject" class="form-control" required />
                    <br />
                    <select name="jr" class="form-control">
                        <option value="">- Jenis Reject -</option>
                        <option value="jahit">Jahitan Tidak Rapi</option>
                        <option value="sobek">Bahan Sobek</option>
                        <option value="jahit">Jahitan Tidak Rapi</option>
                        <option value="jahit">Jahitan Tidak Rapi</option>
                        <option value="jahit">Jahitan Tidak Rapi</option>
                    </select>
                    <br>
                    <input type="date" name="tgl" class="form-control" required />
                    <br />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" name="tambahbarang">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</html>