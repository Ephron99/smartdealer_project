<h1 class="">Welcome to Smart Dealer Ltd<!--<?php echo $_settings->info('name') ?>--></h1>
<hr>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-th-list"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Projects</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `project_list`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-truck-loading"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Services</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `services`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-boxes"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Reports</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `services`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Users</span>
            <!--<span class="info-box-text">Users</span>-->
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `services`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!---->
    <!---->
</div>
<div class="row mt-4">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Projects Overview</h5>
            </div>
            <div class="card-body">
                <canvas id="projectsBarChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card shadow" >
            <div class="card-header bg-primary text-white">
                <h5 class="card-title mb-0">Services Distribution</h5>
            </div>
            <div class="card-body">
                <canvas id="servicesPieChart" ></canvas>

            </div>
        </div>
    </div>
</div>
<?php
$projects = [];
$task_counts = [];

// Get all services
$service_qry = $conn->query("SELECT * FROM `services`");
while ($service = $service_qry->fetch_assoc()) {
    $projects[] = $service['name']; // service name as label

    // Count projects under each service
    $proj_count_qry = $conn->query("SELECT COUNT(*) as total FROM `project_list` WHERE service = {$service['id']}");
    $count_result = $proj_count_qry->fetch_assoc();

    $task_counts[] = (int)$count_result['total'];
}
?>


<script>
    const projectsLabels = <?php echo json_encode($projects); ?>;
    const tasksData = <?php echo json_encode($task_counts); ?>;

    // Bar Chart
    const barCtx = document.getElementById('projectsBarChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: projectsLabels,
            datasets: [{
                label: 'Projects per Service',
                data: tasksData,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            /* responsive: false,
            maintainAspectRatio: false*/
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });

    // Pie Chart
    const pieCtx = document.getElementById('servicesPieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: projectsLabels,
            datasets: [{
                data: tasksData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(54, 162, 235, 0.7)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false
       
        }
    });
</script>


