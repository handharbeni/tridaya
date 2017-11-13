<!DOCTYPE html>
<html>

<?php require('head.php');?>

<body class="header-info">
  <div class="app">
    <div class="layout">
      <!-- Side Nav START -->
      <?php require('sidebar_left.php');?>
      <!-- Side Nav END -->

      <!-- Page Container START -->
      <div class="page-container">
        <!-- Header START -->
        <?php require('header.php');?>
        <!-- Header END -->

        <!-- Side Panel START -->
        <?php require('sidebar_right.php');?>
        <!-- Side Panel END -->

        <!-- theme configurator START -->
        <?php require('theme_config.php');?>
        <!-- theme configurator END -->

        <!-- Content Wrapper START -->
        <div class="main-content">
          <div class="container-fluid">
            <div class="row">
                                   
            </div>
          </div> 
                                
        </div>
        <!-- Content Wrapper END -->

        <!-- Footer START -->
        <footer class="content-footer">
            <div class="footer">
              <div class="copyright">
                <span>Copyright © 2017 <b class="text-dark">Illiyin Studio</b>. All rights reserved.</span>
                <span class="go-right">
      					  <a href="" class="text-gray mrg-right-15">Term &amp; Conditions</a>
      				    <a href="" class="text-gray">Privacy &amp; Policy</a>
      				  </span>
              </div>
            </div>
          </footer>
        <!-- Footer END -->

      </div>
      <!-- Page Container END -->

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
  <script src="<?php echo URL_PLUGIN?>bower-jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo URL_JS?>maps/jquery-jvectormap-us-aea.js"></script>
  <script src="<?php echo URL_PLUGIN?>d3/d3.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>nvd3/build/nv.d3.min.js"></script>
  <script src="<?php echo URL_PLUGIN?>jquery.sparkline/index.js"></script>
  <script src="<?php echo URL_PLUGIN?>chart.js/dist/Chart.min.js"></script>

  <!-- build:js <?php echo URL_JS?>app.min.js -->
  <!-- core js -->
  <script src="<?php echo URL_JS?>app.js"></script>
  <!-- endbuild -->

  <!-- page js -->
  <script src="<?php echo URL_JS?>dashboard/dashboard.js"></script>

</body>

</html>