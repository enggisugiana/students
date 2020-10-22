<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Campus Master Data</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Campus Master Data</a></div>
                <div class="breadcrumb-item active">Input Data Campus</a></div>
            </div>
        </div>

        <?php if(isset($_SESSION['error_up_foto'])): ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                    x
                </span>
                <span class="sr-only">
                    Close
                </span>
            </button>
            Failed to Upload Logo Logo!
        </div>

        <?php elseif(isset($_SESSION['success_add'])) : ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                    x
                </span>
                <span class="sr-only">
                    Close
                </span>
            </button>
            Successfully add campus!
        </div>
        <?php endif ?>

        <div class="section-body">
            <h2 class="section-title">Input Data Campus</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?php echo base_url()?>DashboardController/submitFormCampus" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Kampus</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Kampus</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control" required>
                                    <!-- <textarea id="alamat" name="alamat" class="form-control" required></textarea> -->
                                </div>
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
                                <div class="form-group">
                                    <label>Kota / Kabupaten</label>
                                    <select class="form-control select2_kota" id="kota_kab" name="kota_kab" value="Palembang" required>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" name="logo" accept="image/*" class="form-control" id="logo" required>
                                </div>
                                <div class="form-group">
                                    <label>Warna</label>
                                    <input type="text" id="warna" name="warna" class="form-control" placeholder="ex : #000000" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<script>
    var data = null;
    var selectedProvinsi = null;

    $(".select2_provinsi").select2({
        placeholder: "Pilih Kota / Kabupaten",
        allowClear: true
    });

    $('#provinsi').on('select2:select', function(e) {
        selectedProvinsi = e.params.data.id;
        showKota(selectedProvinsi);
    });

    $('.select2_kota').select2({
        placeholder: "Pilih Kota / Kabupaten",
        allowClear: true,
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
                    html += '<option value='+data[i]['id_kab']+'>'+ data[i]['nama']+'</option>';
                    // html += '<option>' + data[i]['nama'] + '</option>';
                }
                $('#kota_kab').html(html);
            },
            error: function(status) {

            }
        });
    }

</script>