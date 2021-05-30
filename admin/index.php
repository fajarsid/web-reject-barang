<?php
  require '../config.php';
  require '../validasi_login.php';


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

<body class="sb-nav-fixed">
    <!-- Navbar -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">Administrator</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
    </nav>
    <!-- Akhir Navbar -->
    <div id="layoutSidenav">
        <!-- Sidebar -->
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="tables.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Data Barang
                        </a>
                        <a class="nav-link" href="charts.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Charts
                        </a>
                        <a class="nav-link" href="../logout.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Akhir Sidebar -->

        <div id="layoutSidenav_content">
            <main>
                <!-- Chart -->
                <div class="container-fluid">
                    <h1 class="mt-4">Dashboard</h1>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-area mr-1"></i>
                                    Area Chart
                                </div>
                                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar mr-1"></i>
                                    Bar Chart
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Chart -->

                    <!-- Tabel -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Data Barang Reject
                        </div>
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
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td class="row justify-content-center">
                                                <a href="#" class="col-lg-4">
                                                    <span class="actionCust"> <i class="far fa-edit"></i> </span></a>
                                                <a href="#" class="col-lg-4">
                                                    <span class="actionCust"> <i class="far fa-trash-alt"></i>
                                                    </span></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- buttton tambah data -->
                        <div>
                            <button class="button btn-primary m-3"><i class="fas fa-download"></i> Export Data</button>
                        </div>
                        <!-- Akhir buttton tambah data -->
                    </div>
                    <!-- Akhir Tabels -->
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../js/chart-area.js"></script>
    <script src="../js/chart-bar.js"></script>
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
                    <input type="text" name="good" placeholder="Good Quality" class="form-control" required />
                    <br />
                    <input type="text" name="reject" placeholder="Barang Reject" class="form-control" required />
                    <br />
                    <select name="jenis" class="form-control">
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