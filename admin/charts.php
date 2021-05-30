<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Charts</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
  </head>
  <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="index.html">Administrator</a>
      <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
            <div class="nav">
              <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
              </a>
              <a class="nav-link" href="tables.php">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Data Barang
              </a>
              <a class="nav-link" href="charts.php">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Charts
              </a>
              <a class="nav-link" href="logout.html">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                Logout
              </a>
            </div>
          </div>
        </nav>
      </div>
      <div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <h1 class="mt-4">Charts</h1>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
              <li class="breadcrumb-item active">Charts</li>
            </ol>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Chart Perhari
              </div>
              <?php include 'day_chart.php';?>
            </div>
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Chart Perbulan
              </div>
              <?php include 'month_chart.php';?>
            </div>
          </div>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <!-- Js chart -->
    <script src="../js/chart-area.js"></script>
    <script src="../js/chart-bar.js"></script>
    <script src="../js/chart-pie.js"></script>
  </body>
</html>
