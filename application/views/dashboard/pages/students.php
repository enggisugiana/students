<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Students</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Students</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">DataTables</h2>
            <p class="section-lead">
                We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.
            </p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-primary" id="modal-1" data-toggle="modal" data-target="#addStudent">Add Data</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Members</th>
                                            <th>Due Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>Create a mobile app</td>
                                            <td class="align-middle">
                                                <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                    <div class="progress-bar bg-success" data-width="100%"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <img alt="image" src="<?= base_url('assets/img/avatar/avatar-5.png'); ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                            </td>
                                            <td>2018-01-20</td>
                                            <td>
                                                <div class="badge badge-success">Completed</div>
                                            </td>
                                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
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
<!-- #Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addStudent">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate="">
                <div class="modal-header">
                    <h5 class="modal-title">Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kampus</label>
                        <input type="text" class="form-control" required="" placeholder="Masukan nama kampus">
                        <div class="invalid-feedback">
                            What's your name?
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nama Mahasiswa</label>
                        <input type="text" class="form-control" required="" placeholder="Masukan nama mahasiswa">
                        <div class="invalid-feedback">
                            What's your name?
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required="" placeholder="Masukan email">
                        <div class="invalid-feedback">
                            Email yang dimasukan invalid.
                        </div>
                    </div>
                    <div class="form-group mb-0">
                        <label>Alamat</label>
                        <textarea class="form-control" required="" row="10" placeholder="Masukan alamat"></textarea>
                        <div class="invalid-feedback">
                            Alamat tidak boleh kosong?
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" required="" placeholder="Masukan jurusan">
                        <div class="invalid-feedback">
                            What's your name?
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fakultas</label>
                        <input type="text" class="form-control" required="" placeholder="Masukan fakultas">
                        <div class="invalid-feedback">
                            What's your name?
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" class="form-control" required="" placeholder="Masukan angkatan">
                        <div class="invalid-feedback">
                            What's your name?
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Basic Storage</label>
                        <input type="text" class="form-control" required="" placeholder="Masukan kapasitas storage">
                        <div class="invalid-feedback">
                            What's your name?
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>