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
        <?php if (isset($_SESSION['success_add'])) : ?>
            <script>
                swal({
                    title: 'Data mahasiswa berhasil ditambahkan!',
                    text: '',
                    type: 'success'
                });
            </script>
        <?php elseif (isset($_SESSION['success_edit'])) : ?>
            <script>
                swal({
                    title: 'Data mahasiswa berhasil diubah!',
                    text: '',
                    type: 'success'
                });
            </script>
        <?php endif ?>
        <div class="section-body">
            <h2 class="section-title">List of Student</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-lg btn-primary" id="modal-1" data-toggle="modal" data-target="#addStudent" style="border-radius: .25rem;"><i class="fas fa-plus"></i> Add Data</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                No
                                            </th>
                                            <th>Kampus</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Jurusan</th>
                                            <th>Fakultas</th>
                                            <th>Angkatan</th>
                                            <th>Basic Storage</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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

<!-- #Modal Simpan-->
<div class="modal fade" tabindex="-1" role="dialog" id="addStudent">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('DashboardController/submitFormStudent'); ?>" method="post" class="needs-validation" novalidate="" id="formStudent">
                <div class="modal-header">
                    <h5 class="modal-title">Input Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                        <input type="text" name="nama" class="form-control" required="" placeholder="Masukan nama mahasiswa">
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
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- #Modal Edit -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditStudent">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url('DashboardController/updateKampus'); ?>" method="post" class="needs-validation" novalidate="" id="formStudent">
                <div class="modal-header">
                    <h5 class="modal-title">Input Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id-modal-edit" name="id">
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select class="form-control select2_kampus" id="kampus" name="id_kampus" required="">
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
                        <input type="text" name="nama" class="form-control" required="" placeholder="Masukan nama mahasiswa" id="nama">
                        <div class="invalid-feedback">
                            Nama mahasiswa tidak boleh kosong
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required="" placeholder="Masukan email" id="email">
                        <div class="invalid-feedback">
                            Email yang dimasukan invalid.
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" required="" row="10" placeholder="Masukan alamat" id="alamat"></textarea>
                        <div class="invalid-feedback">
                            Alamat tidak boleh kosong?
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" required="" placeholder="Masukan jurusan" id="jurusan">
                        <div class="invalid-feedback">
                            Jurusan tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fakultas</label>
                        <input type="text" name="fakultas" class="form-control" required="" placeholder="Masukan fakultas" id="fakultas">
                        <div class="invalid-feedback">
                            Fakultas tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" name="angkatan" class="form-control" required="" placeholder="Masukan angkatan" id="angkatan">
                        <div class="invalid-feedback">
                            Angkatan tidak boleh kosong!
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Basic Storage</label>
                        <input type="text" name="basic_storage" class="form-control" required="" placeholder="Masukan kapasitas storage" id="basic_storage">
                        <div class="invalid-feedback">
                            Basic storage tidak boleh kosong!
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

<!-- #Modal Hapus -->
<div id="hapus-modal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Mahasiswa</h5>
            </div>
            <form id="form-hapus" onsubmit="return false;">
                <div class="modal-body">
                    <input type="hidden" id="id-modal-hapus" name="id">
                    <p id="text"></p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" id="btn-hapus">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var t = $('#datatable').DataTable({
            buttons: [
                'excel', 'pdf'
            ]
        });

        getStudents();

        function getStudents() {
            $.ajax({
                url: "<?php echo base_url() ?>DashboardController/get_all_student",
                type: "POST",
                data: null,
                success: function(ajaxData) {
                    t.clear().draw();
                    var result = JSON.parse(ajaxData);

                    for (var i = 0; i < result.length; i++) {
                        var button1 = "<a href='#' class='btn-edit' data-id='" + result[i]['id'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";
                        var button2 = "<a href='#' class='btn-hapus' data-id='" + result[i]['id'] + "' data-nama='" + result[i]['nama'] + "' data-logo='" + result[i]['logo'] + "' title='Hapus' style='color:#bb1a1a;'><span class='fa fa-trash fa-2x'></span></a>";

                        t.row.add([
                            i + 1,
                            result[i]['id_kampus'],
                            result[i]['nama'],
                            result[i]['email'],
                            result[i]['alamat'],
                            result[i]['jurusan'],
                            result[i]['fakultas'],
                            result[i]['angkatan'],
                            result[i]['basic_storage'],
                            "<center>" + button1 + " " + button2 + "</center>",

                        ]).draw();
                    }

                },
                error: function(status) {
                    t.clear().draw();
                }
            });
        }

        function clear() {
            $('#id-modal-edit').val("");
            $('#nama').val("");
            $('#email').val("");
            $('#alamat').val("");
            $('#jurusan').val("");
            $('#fakultas').val("");
            $('#angkatan').val("");
            $('#basic_storage').val("");
        }

        $('#datatable').on('click', '.btn-edit', function() {
            var id = $(this).data("id");
            clear();
            $.ajax({
                url: "<?php echo site_url('DashboardController/get_detail_mahasiswa'); ?>",
                type: "POST",
                data: {
                    id: id
                },
                success: function(ajaxData) {
                    var result = JSON.parse(ajaxData);
                    $('#id-modal-edit').val(id);
                    $('#kampus option[value=' + result[0]['id_kampus'] + ']').attr('selected', 'selected');
                    $('#nama').val(result[0]['nama']);
                    $('#email').val(result[0]['email']);
                    $('#alamat').val(result[0]['alamat']);
                    $('#jurusan').val(result[0]['jurusan']);
                    $('#fakultas').val(result[0]['fakultas']);
                    $('#angkatan').val(result[0]['angkatan']);
                    $('#basic_storage').val(result[0]['basic_storage']);
                    $('#modalEditStudent').modal('show');
                },
                error: function(status) {

                }
            });
        });


        $('#datatable').on('click', '.btn-hapus', function() {
            var id = $(this).data("id");
            var nama = $(this).data("nama");
            var text = "Apakah anda yakin ingin menghapus mahasiswa <b>" + nama + "</b> ?";
            $("#text").last().html(text);
            $('#id-modal-hapus').val(id);
            $('#hapus-modal').modal('show');
        });

        $('#btn-hapus').click(function() {
            var data_hapus = $('#form-hapus').serialize();
            $.ajax({
                url: "<?php echo site_url('DashboardController/delete_mahasiswa'); ?>",
                type: "POST",
                data: data_hapus,
                success: function(ajaxData) {
                    $('#hapus-modal').modal('hide');
                    swal({
                        title: 'Mahasiswa berhasil dihapus!',
                        text: '',
                        type: 'success'
                    });
                    getStudents();
                },
                error: function(status) {
                    swal({
                        title: 'Gagal menghapus mahasiswa',
                        text: '',
                        type: 'error'
                    });
                }
            })
        });
    });
    $(".select2_kampus").select2({
        placeholder: "Pilih Kampus / Universitas",
        allowClear: true
    });
</script>