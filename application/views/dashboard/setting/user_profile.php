<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile Management</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Profile Management</a></div>
                <div class="breadcrumb-item active">Profile</a></div>
            </div>
        </div>

        <?php if(isset($_SESSION['error_pwd'])): ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                    x
                </span>
                <span class="sr-only">
                    Close
                </span>
            </button>
            Change password failed!
        </div>

        <?php elseif(isset($_SESSION['success_pwd'])) : ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                    x
                </span>
                <span class="sr-only">
                    Close
                </span>
            </button>
            Successfully change password
        </div>
        <?php endif ?>

        <div class="section-body">
            <h2 class="section-title">Profile <?= $profile[0]['email']?></h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?php echo base_url()?>Management/change_password" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" id="password" name="password" class="form-control" style="width:300px;" required>
                                </div>
                                <div class="text-left">
                                    <button class="btn btn-success btn-sm">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </section>

</div>