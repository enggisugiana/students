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
<!-- #Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="addStudent">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="post" class="needs-validation" novalidate="" id="formStudent">
                <div class="modal-header">
                    <h5 class="modal-title">Input Data Mahasiswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kampus</label>
                        <input type="text" name="id_kampus" class="form-control" required="" placeholder="Masukan nama kampus" id="id_kampus">
                        <div class="invalid-feedback">
                            Nama Kampus tidak boleh kosong!
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
                    <div class="form-group mb-0">
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
                        <input type="text" nama="basic_storage" class="form-control" required="" placeholder="Masukan kapasitas storage">
                        <div class="invalid-feedback">
                            Basic storage tidak boleh kosong!
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
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

        $('#formStudent').attr('action', '<?= base_url('DashboardController/submitFormStudent'); ?>');
        $('#formStudent').submit(function() {
            var url = $('#formStudent').attr('action');
            var data = $('#formStudent').serialize();

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: url,
                data: data,
                async: false,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        clearForm();
                        $('#addStudent').modal('toggle');
                        getStudents();
                    } else {
                        alert('Error');
                    }
                },
                error: function() {
                    alert('Data cannot be save');
                }
            });
        });

        function clearForm() {
            $('#id_kampus').val("");
        }

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
    });
</script>