<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>NavoiyEco-Create_user</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/fontawesome-free/css/all_min.css')?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/css/sb_admin_2_min.css')?>" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Castoro&display=swap" rel="stylesheet">

</head>
<style type="text/css">
    body
        {
            background-color: #CDF9D1;
            font-family: 'Castoro', serif;
        }
    .exampleFirstName, .exampleLastName, .exampleInputEmail, .exampleInputPassword, .exampleRepeatPassword
        {
            background-color: #DEFCE0;
            border: 0;
            outline: none;
            margin-bottom: 20px;
        }
    .exampleFirstName:focus, .exampleLastName:focus, .exampleInputEmail:focus, .exampleInputPassword:focus, .exampleRepeatPassword:focus
        {
            box-shadow: inset 8px 2px 3px 4px #CFF7D1;
            background-color: #DEFCE0;
        }
    .fa-leaf
        {
            color: #21D81C;
        }
    a 
        {
            color: #606060;
        }
    a:hover
        {
            text-decoration: none;
            color: #5A5959;
        }
</style>
<body class="bg-gradient">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h5>NavoiyEco<sup><i class="fas fa-leaf"></i></sup></h5>
                                <h1 class="h4 text-gray-900 mb-4">Ro'yhatdan o'tish!</h1>
                            </div>
                            
                            <form class="user"
                                  action="<?php echo site_url('auth/creat_user')?>"
                                  method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" 
                                               class="form-control form-control-user exampleFirstName" 
                                               id="first_name"
                                               placeholder="First Name"
                                               name="first_name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" 
                                               class="form-control form-control-user exampleLastName" 
                                               id="last_name"
                                               placeholder="Last Name"
                                               name="last_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" 
                                           class="form-control form-control-user exampleInputEmail" 
                                           id="email"
                                           placeholder="Email Address"
                                           name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" 
                                               class="form-control form-control-user exampleInputPassword"
                                               id="password" 
                                               placeholder="Password"
                                               name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" 
                                               class="form-control form-control-user exampleRepeatPassword"
                                               id="password_confirm" 
                                               placeholder="Repeat Password"
                                               name="password_confirm">
                                    </div>
                                </div>
                                <a href="login.html" 
                                   class="btn btn-success btn-user btn-block"
                                   name="submit">
                                    Register Account
                                </a>
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            <hr>
                            <div class="text-center">
                                <p><a href="forgot_password"
                                      class="small"><?php echo lang('login_forgot_password');?>Forgot Password?</a></p>
                                <a  href="<?php echo base_url('auth/forgot_password');?>"></a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('auth/login');?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/js/jquery.easing.min.js');?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js');?>"></script>

</body>

</html>