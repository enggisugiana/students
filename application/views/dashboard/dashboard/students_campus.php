<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Students by Campus</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Students by Campus</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">List of Students by Campus</h2>

            <div class="row">
                <?php foreach($students_campus as $sc):?>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <img src="<?= base_url()?>assets/images/<?= $sc['logo']?>" alt="logo_university" class="img-fluid rounded-circle responsive mr-2 shadow" style="height:100px;">
                            <h3><?= $sc['nama']?></h3>
                        </div>
                        <div class="card-body">
                            <p>Alamat, <?=  $sc['alamat']?></p>
                            <button onclick="window.location.href='<?= base_url()?>DashboardController/get_st_campus?id=<?= $sc['id']?>'" class="btn btn-sm btn-primary">See Students</button>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
            </div>

        </div>
    </section>
</div>