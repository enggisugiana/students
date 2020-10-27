<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Change Password</title>
    <link rel="shortcut icon" href="<?= base_url()?>assets/img/logotel.png" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/components.css'); ?>">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url('assets/img/logotel.png'); ?>" alt="logo" width="150" class="shadow rounded-circle">
                        </div>

                        <div class="card card-primary shadow">

                        <?php if(isset($_SESSION['notfound_email'])): ?>
                            <div class="alert alert-warning" role="alert">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">
                                        x
                                    </span>
                                    <span class="sr-only">
                                        Close
                                    </span>
                                </button>
                                Email not found in system!
                            </div>
                        <?php endif?>

                            <div class="card-header">
                                <h4>Input New Password</h4>
                            </div>
                            
                            <div class="card-body">
                                <form method="POST" action="<?= base_url()?>login/do_change_pass" class="needs-validation" novalidate="">
                                    <input type="hidden" name="email" value="<?= $email?>">
                                    <div class="form-group">
                                        <label for="password">New Passowrd</label>
                                        <input id="password" type="password" class="form-control" name="password" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pass_con">Confirmation Passowrd</label>
                                        <input id="pass_con" type="password" class="form-control" name="pass_con" tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your password
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            CHANGE PASSWORD
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Telkomsigma <?= date('Y')?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<? base_url('assets/js/stisla.js');?>"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<? base_url('assets/js/scripts.js');?>"></script>
    <script src="<? base_url('assets/js/custom.js');?>"></script>

    <!-- Page Specific JS File -->
</body>

</html>