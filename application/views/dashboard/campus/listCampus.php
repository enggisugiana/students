<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Campus Master Data</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Campus Master Data</a></div>
                <div class="breadcrumb-item active">list of Campus</a></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Campus</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="datatable">
                                    <thead>
                                        <tr>
                                            <th width="20">
                                                No
                                            </th>
                                            <th>Nama Kampus</th>
                                            <th>Alamat Kampus</th>
                                            <th>Provinsi</th>
                                            <th>Kota / Kabupaten</th>
                                            <th>Logo</th>
                                            <th>Warna</th>
                                            <th>Action</th>
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

<!--------------------------------------- Modal Edit ------------------------------------ -->
<div id="edit-modal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kampus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit" onsubmit="return false;">
                <div class="modal-body">
                    <input type="hidden" id="id-modal-edit" name="id">
                    <input type="hidden" id="logo-modal-edit" name="logo_lama">
                    <div class="form-group">
                        <label>Nama Kampus</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat" name="alamat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select class="form-control select2_provinsi" id="provinsi" name="provinsi" required>
                            <option value=""></option>
                            <option value="DKI Jakarta">DKI Jakarta</option>
                            <option value="Banten">Banten</option>
                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kota / Kabupaten</label>
                        <select class="form-control select2_kota" id="kota_kab" name="kota_kab" required>
                            <option value=""></option>
                            <option value="Tangerang Selatan">Tangerang Selatan</option>
                            <option value="Tangerang Kota">Tangerang Kota</option>
                            <option value="Kab Tangerang">Kab Tangerang</option>
                            <option value="Palembang">Palembang</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo" accept="image/*" class="form-control" id="logo">
                    </div>
                    <div class="form-group">
                        <label>Warna</label>
                        <input type="text" id="warna" name="warna" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-simpan">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--------------------------------------- Modal Hapus ------------------------------------ -->
<div id="hapus-modal" class="modal hide fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Kampus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-hapus" onsubmit="return false;">
                <div class="modal-body">
                    <input type="hidden" id="id-modal-hapus" name="id">
                    <input type="hidden" id="logo-modal-hapus" name="logo_hapus">
                    <p id="text"></p>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" id="btn-hapus">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $(".select2_provinsi").select2({
        placeholder: "Pilih Kota / Kabupaten",
        allowClear: true
    });

    $(".select2_kota").select2({
        placeholder: "Pilih Kota / Kabupaten",
        allowClear: true
    });

    $(document).ready(function() {
        var t = $('#datatable').DataTable({
            buttons: [
                'excel', 'pdf'
            ]
        });

        t.buttons().container().appendTo($('.col-sm-6:eq(0)', t.table().container()));

        function get_all_campus() {
            $.ajax({
                url: "<?php echo base_url()?>DashboardController/get_all_campus",
                type: "POST",
                data: null,
                success: function(ajaxData) {
                    t.clear().draw();
                    var result = JSON.parse(ajaxData);

                    for (var i = 0; i < result.length; i++) {
                        var button1 = "<a href='#' class='btn-edit' data-id='" + result[i]['id'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";
                        var button2 = "<a href='#' class='btn-hapus' data-id='" + result[i]['id'] + "' data-nama='" + result[i]['nama'] + "' data-logo='" + result[i]['logo'] + "' title='Hapus' style='color:#bb1a1a;'><span class='fa fa-trash fa-2x'></span></a>";
                        var logo = "<img src='<?php echo base_url('/assets/images')?>/" + result[i]['logo'] + "' style='height: 40px;' alt=''>";

                        t.row.add([
                            i + 1,
                            result[i]['nama'],
                            result[i]['alamat'],
                            result[i]['provinsi'],
                            result[i]['kota_kab'],
                            "<center>" + logo + "</center>",
                            result[i]['warna'],
                            "<center>" + button1 + " " + button2 + "</center>",

                        ]).draw();
                    }

                },
                error: function(status) {
                    t.clear().draw();
                }
            });
        }

        get_all_campus();

        $('#datatable').on('click', '.btn-edit', function() {
            var id = $(this).data("id");
            clear();
            $.ajax({
                url: "<?php echo site_url('DashboardController/get_detail_kampus'); ?>",
                type: "POST",
                data: {
                    id: id
                },
                success: function(ajaxData) {
                    var result = JSON.parse(ajaxData);
                    $('#id-modal-edit').val(id);
                    $('#nama').val(result[0]['nama']);
                    $('#alamat').val(result[0]['alamat']);
                    $('#provinsi').val(result[0]['provinsi']);
                    $('#kota_kab').val(result[0]['kota_kab']);
                    $('#logo-modal-edit').val(result[0]['logo']);
                    $('#warna').val(result[0]['warna']);
                    $('#edit-modal').modal('show');
                },
                error: function(status) {

                }
            });
        });

        $('#btn-simpan').click(function() {
            var cek = check();
            if (!cek) {
                var update_data = new FormData($("#form-edit")[0]);
                $.ajax({
                    url: "<?php echo site_url('DashboardController/update_detail_kampus'); ?>",
                    type: "POST",
                    data: update_data,
                    processData: false,
                    contentType: false,
                    success: function(ajaxData) {
                        $('#logo').val("");
                        $('#edit-modal').modal('hide');
                        swal({
                            title: 'Edit Kampus Berhasil',
                            text: '',
                            type: 'success'
                        });
                        get_all_campus();
                    },
                    error: function(status) {
                        $('#logo').val("");
                        $('#edit-modal').modal('hide');
                        swal({
                            title: 'Edit Kampus Gagal',
                            text: '',
                            type: 'error'
                        });
                        get_all_campus();
                    }
                });
            }
        });

        $('#datatable').on('click', '.btn-hapus', function() {
            var id = $(this).data("id");
            var nama = $(this).data("nama");
            var logo = $(this).data("logo");
            var text = "Are you sure you want to delete <b>" + nama + "</b> ?";
            $("#text").last().html(text);
            $('#id-modal-hapus').val(id);
            $('#logo-modal-hapus').val(logo);
            $('#hapus-modal').modal('show');
        });

        $('#btn-hapus').click(function() {
            var data_hapus = $('#form-hapus').serialize();
            $.ajax({
                url: "<?php echo site_url('DashboardController/delete_kampus'); ?>",
                type: "POST",
                data: data_hapus,
                success: function(ajaxData) {
                    $('#hapus-modal').modal('hide');
                    swal({
                        title: 'Hapus Kampus Berhasil',
                        text: '',
                        type: 'success'
                    });
                    get_all_campus();
                },
                error: function(status) {
                    swal({
                        title: 'Hapus Kampus Gagal',
                        text: '',
                        type: 'error'
                    });
                }
            })
        });

        function clear() {
            $('#id-modal-edit').val("");
            $('#nama').val("");
            $('#alamat').val("");
            $('#provinsi').val("");
            $('#kota_kab').val("");
            $('#warna').val("");
        }

        function check() {
            return ($('#nama').val() == "" || $('#alamat').val() == "" || $('#provinsi').val() == "" || $('#kota_kab').val() == "" || $('#warna').val() == "")
        }
    });
</script>