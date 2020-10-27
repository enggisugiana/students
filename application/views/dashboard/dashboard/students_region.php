<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Students by Region</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Students by Region</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">List of Students by Region</h2>

            <div class="row">
                <?php foreach($students_region as $sc):?>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <h3><?= $sc['nama']?></h3>
                        </div>
                        <div class="card-body">
                            <button onclick="window.location.href='<?= base_url()?>DashboardController/get_st_region?id_prov=<?= $sc['provinsi']?>'" class="btn btn-sm btn-primary">See Students</button>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
            </div>

        </div>
    </section>
</div>