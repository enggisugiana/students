<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Students, <?= $prov[0]['nama']?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Detail Students</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">List of Student</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>
                                                No
                                            </th>
                                            <th>Logo</th>
                                            <th>Nama Universitas</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Jurusan</th>
                                            <th>Fakultas</th>
                                            <th>Tahun Angkatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($st_reg as $sc):?>
                                        <tr>
                                            <td><?= $no++?></td>
                                            <td class="text-center"><img src="<?= base_url()?>assets/images/<?= $sc['logo']?>" alt="img-univ" class="img-fluid responsive rounded-circle" style="height:30px;"></td>
                                            <td><?= $sc['nama']?></td>
                                            <td><?= $sc['nama_mahasiswa']?></td>
                                            <td><?= $sc['email']?></td>
                                            <td><?= $sc['alamat']?></td>
                                            <td><?= $sc['jurusan']?></td>
                                            <td><?= $sc['fakultas']?></td>
                                            <td><?= $sc['angkatan']?></td>
                                        </tr>
                                        <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        var t = $('#datatable').DataTable({
            buttons: [
                'excel', 'pdf'
            ]
        });
    });
</script>