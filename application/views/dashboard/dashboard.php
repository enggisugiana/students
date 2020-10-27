<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Monitoring</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Monitoring</h2>
            <p class="section-lead">
            </p>
            <div class="row">
                <div onclick="window.location.href='<?= base_url()?>DashboardController/list_campus'" class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-university"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Campus</h4>
                            </div>
                            <div class="card-body">
                                <?= $campus?>
                            </div>
                        </div>
                    </div>
                </div>
                <div onclick="window.location.href='<?= base_url()?>DashboardController/students'" class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Students</h4>
                            </div>
                            <div class="card-body">
                                <?= $student?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Transactions Data</h4>
                            </div>
                            <div class="card-body">
                                ?
                            </div>
                        </div>
                    </div>
                </div>
                <div onclick="window.location.href='<?= base_url()?>Management'" class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Admin</h4>
                            </div>
                            <div class="card-body">
                                <?= $user?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-hdd"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Storage Needed for Students</h4>
                            </div>
                            <div class="card-body">
                                ?
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-hdd"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Storage</h4>
                            </div>
                            <div class="card-body">
                                ?
                            </div>
                        </div>
                    </div>
                </div> 
            </div>

            <!-- <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Line Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Bar Chart</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Active Students by Campus</h4>
                            <button onclick="window.location.href='<?= base_url()?>DashboardController/students_campus'" class="btn btn-sm btn-primary">Details</button>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart3"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Active Students by Region</h4>
                            <button onclick="window.location.href='<?= base_url()?>DashboardController/students_region'" class="btn btn-sm btn-primary">Details</button>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>