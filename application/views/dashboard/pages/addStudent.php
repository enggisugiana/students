<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Students</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item active">Input Data Student</a></div>
            </div>
        </div>

        <?php if (isset($_SESSION['success_add'])) : ?>
            <script>
                swal({
                    title: 'Data mahasiswa berhasil ditambahkan!',
                    text: '',
                    type: 'success'
                });
            </script>
        <?php endif ?>

        <div class="section-body">
            <h2 class="section-title">Input Data Student</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= base_url('DashboardController/submitFormStudent'); ?>" method="post" class="needs-validation" novalidate="" id="formStudent">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <select class="form-control select2_kampus" id="provinsi" name="id_kampus" required="">
                                        <option value=""></option>
                                        <?php
                                        foreach ($campus as $list) :
                                        ?>
                                            <option value="<?= $list["id"]; ?>"><?= $list["nama"]; ?></option>
                                        <?php
                                        endforeach
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Harap memilih kampus / universitas!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nama Mahasiswa</label>
                                    <input type="text" name="nama_mahasiswa" class="form-control" required="" placeholder="Masukan nama mahasiswa">
                                    <div class="invalid-feedback">
                                        Nama mahasiswa tidak boleh kosong
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" required="" placeholder="Masukan email">
                                    <div class="invalid-feedback">
                                        Email yang dimasukan invalid.
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat" required="" row="10" placeholder="Masukan alamat"></textarea>
                                    <div class="invalid-feedback">
                                        Alamat tidak boleh kosong?
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input type="text" name="jurusan" class="form-control" required="" placeholder="Masukan jurusan">
                                    <div class="invalid-feedback">
                                        Jurusan tidak boleh kosong!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Fakultas</label>
                                    <input type="text" name="fakultas" class="form-control" required="" placeholder="Masukan fakultas">
                                    <div class="invalid-feedback">
                                        Fakultas tidak boleh kosong!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Angkatan</label>
                                    <input type="text" name="angkatan" class="form-control" required="" placeholder="Masukan angkatan">
                                    <div class="invalid-feedback">
                                        Angkatan tidak boleh kosong!
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Basic Storage</label>
                                    <input type="text" name="basic_storage" class="form-control" required="" placeholder="Masukan kapasitas storage">
                                    <div class="invalid-feedback">
                                        Basic storage tidak boleh kosong!
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    $(".select2_kampus").select2({
        placeholder: "Pilih Kampus / Universitas",
        allowClear: true
    });
</script>