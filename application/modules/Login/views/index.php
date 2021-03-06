<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
  <title>Tridaya Group - Sistem Informasi Administrasi</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo URL_IMG?>logo/favicon.png">

  <!-- plugins css -->
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>bootstrap/dist/css/bootstrap.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>PACE/themes/blue/pace-theme-minimal.css" />
  <link rel="stylesheet" href="<?php echo URL_PLUGIN?>perfect-scrollbar/css/perfect-scrollbar.min.css" />

  <!-- page plugins css -->

  <!-- core css -->
  <link href="<?php echo URL_CSS?>ei-icon.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>themify-icons.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>animate.min.css" rel="stylesheet">
  <link href="<?php echo URL_CSS?>app.css" rel="stylesheet">
</head>

<body class="header-info">
  <div class="app">
    <div class="authentication">
      <div class="sign-in-2">
        <div class="container-fluid no-pdd-horizon bg" style="background-image: url('assets/images/others/img-30.jpg')">
          <div class="row">
            <div class="col-md-10 mr-auto ml-auto">
              <div class="row">
                <div class="mr-auto ml-auto full-height height-100">
                  <div class="vertical-align full-height">
                    <div class="table-cell">
                      <div class="card">
                        <div class="card-body">
                          <div class="pdd-horizon-30 pdd-vertical-30">
                            <div class="mrg-btm-30">
                              <img class="img-responsive inline-block" src="assets/images/logo/logo.png" alt="">
                              <h2 class="inline-block pull-right no-mrg-vertical pdd-top-15">Login</h2>
                            </div>
                            <p class="mrg-btm-15 font-size-13">Please enter your user name and password to login</p>
                            <form class="ng-pristine ng-valid">
                              <div class="form-group">
                                <input type="email" class="form-control" placeholder="User name">
                              </div>
                              <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password">
                              </div>
                              <div class="checkbox font-size-13 inline-block no-mrg-vertical no-pdd-vertical">
                                <input id="agreement" name="agreement" type="checkbox">
                                <label for="agreement">Keep Me Signed In</label>
                              </div>
                              <div class="pull-right">
                                <a href="">Forgot Password?</a>
                              </div>
                              <div class="mrg-top-20 text-right">
                                <a href="<?php echo base_url()?>dashboard" class="btn btn-info">Login</a>
                                <!-- <button class="btn btn-info">Login</button> -->
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- build:js <?php echo URL_JS?>vendor.js -->
  <!-- plugins js -->
  <script src="<?php echo URL_PLUGIN?>jquery/dist/jquery.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>popper.js/dist/umd/popper.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>bootstrap/dist/js/bootstrap.js"></script>
  <script src="<?php echo URL_PLUGIN?>PACE/pace.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <!-- endbuild -->

  <!-- page plugins js -->

  <!-- build:js <?php echo URL_JS?>app.min.js -->
  <!-- core js -->
  <script src="<?php echo URL_JS?>app.js"></script>
  <!-- endbuild -->

  <!-- page js -->
  

</body>

</html>