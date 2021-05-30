<?php
  require '../config.php';
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
    
    <div class="card-body"><canvas id="day_chart" width="100%" height="40"></canvas></div>
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    </script>
    <script>
        var ctx = document.getElementById("day_chart");
        var myLineChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                <?php
                $x = 1;
                while($x <= 31) {
                echo "$x,";
                $x++;
                }
                ?>
            ],
            datasets: [
            {
                label: "Barang Reject",
                lineTension: 0.3,
                backgroundColor: "rgba(255,0,0,0.2)",
                borderColor: "rgba(255,0,0,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(255,0,0,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(255,0,0,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?php
                    $x = 1;
                    while($x <= 31) {
                    $data_reject = mysqli_query($conn, "SELECT SUM(br) AS total_reject FROM barang WHERE DAY(tgl) = $x");
                    $row_reject = mysqli_fetch_assoc($data_reject);
                    $sum_reject = $row_reject['total_reject'];
                    echo $sum_reject == 0 ? "0," : "$sum_reject,"; 
                    $x++;
                    }
                    ?>
                ],
            },
            {
                label: "Barang Bagus",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: [
                    <?php
                    $x = 1;
                    while($x <= 31) {
                    $data_good = mysqli_query($conn, "SELECT SUM(gq) AS total_good FROM barang WHERE DAY(tgl) = $x");  
                    $row_good = mysqli_fetch_assoc($data_good);
                    $sum_good = $row_good['total_good'];
                    echo $sum_good == 0 ? "0," : "$sum_good,"; 
                    $x++;
                    }
                    ?>
                ],
            },
            {
                label: "Barang Reject",
                backgroundColor: "rgba(2,117,216,1)",
                borderColor: "rgba(2,117,216,1)",
                data: [
                   
                ],
            },
            ],
        },
        options: {
            scales: {
            xAxes: [
                {
                time: {
                    unit: "day",
                },
                gridLines: {
                    display: false,
                },
                },
            ],
            yAxes: [
                {
                ticks: {
                    min: 0,
                    max: 15000,
                    maxTicksLimit: 5,
                },
                gridLines: {
                    display: true,
                },
                },
            ],
            },
            legend: {
            display: false,
            },
        },
        });
</script>
</body>
</html>