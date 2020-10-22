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
                        <div class="card-header">
                            <h4>Form Data</h4>
                        </div>
                        <form action="<?php echo base_url()?>DashboardController/submitFormCampus" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Kampus</label>
                                            <input type="text" id="nama" name="nama" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Alamat Kampus</label>
                                            <textarea type="text" id="alamat" name="alamat" class="form-control" required></textarea>
                                            <!-- <textarea id="alamat" name="alamat" class="form-control" required></textarea> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <select class="form-control select2_provinsi" id="provinsi" name="provinsi" required>
                                                <option value=""></option>
                                                <?php
                                          foreach($list_provinsi as $row)
                                          {
                                            echo "<option value='".$row['id_prov']."'>".$row['nama']."</option>";
                                          }
                                        ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Kota / Kabupaten</label>
                                            <select class="form-control select2_kota" id="kota_kab" name="kota_kab" value="Palembang" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Logo</label>
                                            <input type="file" name="logo" accept="image/*" class="form-control" id="logo" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Warna</label>
                                            <input type="text" id="warna" name="warna" class="form-control" placeholder="ex : #000000" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <select class="form-control select2_filter_provinsi" id="filterProvinsi" name="filterProvinsi" required>
                                        <option value=""></option>
                                        <?php
                                            foreach($list_provinsi as $row)
                                            {
                                                echo "<option value='".$row['id_prov']."'>".$row['nama']."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-control select2_filter_kota" id="filterKota" name="filterKota" required>
                                        <option value=""></option>
                                        <?php
                                          foreach($list_kota as $row)
                                          {
                                            echo "<option value='".$row['id_kab']."'>".$row['nama']."</option>";
                                          }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <br>
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
                        <input type="text" id="nama-modal" name="nama-modal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" id="alamat-modal" name="alamat-modal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select class="form-control select2_provinsi" id="provinsi-modal" name="provinsi-modal" required>
                            <option value=""></option>
                            <?php
                                foreach($list_provinsi as $row)
                                {
                                echo "<option value='".$row['id_prov']."'>".$row['nama']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kota / Kabupaten</label>
                        <select class="form-control select2_kota" id="kota_kab-modal" name="kota_kab-modal" required>
                            <option value=""></option>
                            <?php
                                foreach($list_kota as $row)
                                {
                                echo "<option value='".$row['id_kab']."'>".$row['nama']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" name="logo-modal" accept="image/*" class="form-control" id="logo"-modal>
                    </div>
                    <div class="form-group">
                        <label>Warna</label>
                        <input type="text" id="warna-modal" name="warna-modal" class="form-control" required>
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
    var dataKampus = null;
    var dataKampusReal = null;

    var t = $('#datatable').DataTable();

    function get_all_campus() {
        $.ajax({
            url: "<?php echo base_url()?>DashboardController/get_all_campus",
            type: "POST",
            data: null,
            success: function(ajaxData) {
                dataKampus = JSON.parse(ajaxData);
                dataKampusReal = dataKampus;

                createTable();

            },
            error: function(status) {
                t.clear().draw();
            }
        });
    }

    function createTable() {
        t.clear().draw();
        for (var i = 0; i < dataKampus.length; i++) {
            var button1 = "<a href='#' class='btn-edit' data-id='" + dataKampus[i]['id'] + "' data-prov='" + dataKampus[i]['id_prov'] + "' title='Edit' style='color:#1ABB9C;'><span class='fa fa-edit fa-2x'></span></a>";
            var button2 = "<a href='#' class='btn-hapus' data-id='" + dataKampus[i]['id'] + "' data-nama='" + dataKampus[i]['nama'] + "'  data-logo='" + dataKampus[i]['logo'] + "' title='Hapus' style='color:#bb1a1a;'><span class='fa fa-trash fa-2x'></span></a>";
            var logo = "<img src='<?php echo base_url('/assets/images')?>/" + dataKampus[i]['logo'] + "' style='height: 40px;' alt=''>";

            t.row.add([
                i + 1,
                dataKampus[i]['nama'],
                dataKampus[i]['alamat'],
                dataKampus[i]['nama_provinsi'],
                dataKampus[i]['nama_kota'],
                "<center>" + logo + "</center>",
                dataKampus[i]['warna'],
                "<center>" + button1 + " " + button2 + "</center>",

            ]).draw();
        }
    }

    get_all_campus();

    $('#datatable').on('click', '.btn-edit', function() {
        var id = $(this).data("id");
        var id_prov = $(this).data("prov");
        $.ajax({
            url: "<?php echo site_url('DashboardController/get_detail_kampus'); ?>",
            type: "POST",
            data: {
                id: id
            },
            success: function(ajaxData) {
                clear();
                var result = JSON.parse(ajaxData);
                // showKota(id_prov);
                // showProv();
                $('#id-modal-edit').val(id);
                $('#nama').val(result[0]['nama']);
                $('#alamat').val(result[0]['alamat']);
                $('#provinsi').val(result[0]['provinsi']);
                $('#kota_kab').val(result[0]['kota_kab']);
                $('#logo-modal-edit').val(result[0]['logo']);
                $('#warna').val(result[0]['warna']);
                // $('#edit-modal').modal('show');
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

    function filterProvinsi(id) {
        if (id !== "All") {
            dataKampus = dataKampusReal;
            dataKampus = dataKampus.filter(project =>
                id.includes(project.id_prov)
            );
        } else {
            dataKampus = dataKampusReal
        }
        createTable();
    }

    function filterKota(id) {
        if (id !== "All") {
            dataKampus = dataKampusReal;
            dataKampus = dataKampus.filter(project =>
                id.includes(project.id_kab)
            );
        } else {
            dataKampus = dataKampusReal
        }
        createTable();
    }

    function clear() {
        $('#id-modal-edit').val("");
        $('#nama').val("");
        $('#alamat').val("");
        $('#provinsi').val(null);
        $('#kota_kab').val(null);
        $('#warna').val("");
    }

    function check() {
        return ($('#nama').val() == "" || $('#alamat').val() == "" || $('#provinsi').val() == "" || $('#kota_kab').val() == "" || $('#warna').val() == "")
    }

    $(".select2_filter_provinsi").select2({
        placeholder: "Filter by Provinsi"
    });

    $('#filterProvinsi').on('select2:select', function(e) {
        var selectedProvinsi = e.params.data;
        filterProvinsi(selectedProvinsi.id);
    });

    $(".select2_filter_kota").select2({
        placeholder: "Filter by Kota"
    });

    $('#filterKota').on('select2:select', function(e) {
        var selectedKota = e.params.data;
        filterKota(selectedKota.id);
    });

    $(".select2_provinsi").select2({
        placeholder: "Pilih Kota / Kabupaten"
    });

    $(".select2_kota").select2({
        placeholder: "Pilih Kota / Kabupaten"
    });

    $('#provinsi').on('select2:select', function(e) {
        selectedProvinsi = e.params.data.id;
        showKota(selectedProvinsi);
    });

    function showKota(id) {
        var studentSelect = $(".select2_kota");
        $.ajax({
            url: "<?php echo site_url('DashboardController/get_kota_by_id'); ?>",
            type: "POST",
            data: {
                id: id
            },
            success: function(ajaxData) {
                data = JSON.parse(ajaxData);
                var html = '';
                html += "<option value=''></option>";
                for (var i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i]['id_kab'] + '>' + data[i]['nama'] + '</option>';
                    // html += '<option>' + data[i]['nama'] + '</option>';
                }
                $('#kota_kab').html(html);
            },
            error: function(status) {

            }
        });
    }

    function showProv() {
        $.ajax({
            url: "<?php echo site_url('DashboardController/get_all_provinsi'); ?>",
            type: "POST",
            data: null,
            success: function(ajaxData) {
                data = JSON.parse(ajaxData);
                var html = '';
                html += "<option value=''></option>";
                for (var i = 0; i < data.length; i++) {
                    html += '<option value=' + data[i]['id_prov'] + '>' + data[i]['nama'] + '</option>';
                    // html += '<option>' + data[i]['nama'] + '</option>';
                }
                $('#provinsi').html(html);
            },
            error: function(status) {

            }
        });
    }
</script>