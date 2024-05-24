<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard Super Admin</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Akun Kantor</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $kantor; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total Akun Gudang</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <?php echo $gudang; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Penjualan Per Hari Total
                        </div>
                        <div class="card-body">
                        <canvas id="salesChart" width="30px" height="10px"></canvas>
                        </div>
                    </div>
                </div>
            </div>





    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    // Prepare data from PHP
    var salesData = <?php echo json_encode($penjualan); ?>;
    var labels = [];
    var data = [];

    salesData.forEach(function(sale) {
        labels.push(sale.date);
        data.push(sale.count);
    });

    // Render the chart
    var ctx = document.getElementById('salesChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Daily Sales',
                data: data,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
