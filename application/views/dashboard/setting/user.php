<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard Master Data</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="#">Dashboard Master Data</a></div>
                <div class="breadcrumb-item active">Input Data User</a></div>
            </div>
        </div>

        <?php if(isset($_SESSION['error_add'])): ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                    x
                </span>
                <span class="sr-only">
                    Close
                </span>
            </button>
            Email has been used!
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
            Successfully add new user admin
        </div>

        <?php elseif(isset($_SESSION['success_del'])) : ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                    x
                </span>
                <span class="sr-only">
                    Close
                </span>
            </button>
            Successfully delete user admin
        </div>

        <?php elseif(isset($_SESSION['success_non'])) : ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                    x
                </span>
                <span class="sr-only">
                    Close
                </span>
            </button>
            User non-active success
        </div>

        <?php elseif(isset($_SESSION['success_act'])) : ?>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">
                    x
                </span>
                <span class="sr-only">
                    Close
                </span>
            </button>
            User active success
        </div>
        <?php endif ?>

        <div class="section-body">
            <h2 class="section-title">Input Data User</h2>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?php echo base_url()?>Management/add_user" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Email User</label>
                                    <input type="text" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
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

    <section>
        <div class="section-body">
            <h2 class="section-title">User Management</h2>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Date Registration</th>
                                        <th>Last Login</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($user as $usr):?>
                                    <tr>
                                        <td><?= $no++?></td>
                                        <td><?= $usr['email']?></td>
                                        <td><?= $usr['role']?></td>
                                        <td><?= $usr['status']?></td>
                                        <td><?= $usr['d_reg']?></td>
                                        <td><?= $usr['lst_login']?></td>
                                        <td>
                                        <?php if($usr['status'] == 'A'):?>
                                            <i onclick="window.location.href='<?= base_url()?>Management/do_non_act/<?= $usr['id']?>'" class="fas fa-eye"></i>
                                        <?php elseif($usr['status'] != 'A'):?>
                                            <i onclick="window.location.href='<?= base_url()?>Management/do_act/<?= $usr['id']?>'" class="fas fa-eye-slash"></i>
                                        <?php endif?>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>