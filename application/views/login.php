<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NCF | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/fontawesome-free/css/all.min.css');?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('adminlte/dist/css/adminlte.min.css');?>">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="<?php echo base_url('Login/process');?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password"  placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success btn-block">Sign In</button>
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?php echo base_url('adminlte/plugins/jquery/jquery.min.js');?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('adminlte/dist/js/adminlte.min.js');?>"></script>
</body>

</html>