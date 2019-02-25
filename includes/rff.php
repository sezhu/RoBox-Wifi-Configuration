<?php
function DisplayRff() {
    exec('sleep 1; ' . 
         'sudo wpa_cli -i ' . RASPI_WPA_CTRL_INTERFACE . ' select_network ' . strval($_GET['connect']) . ';' .
         'sudo wpa_cli -i ' . RASPI_WIFI_CLIENT_INTERFACE . ' reconfigure');
?>
  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-primary"> 
        <div class="panel-heading">Done!</div>
        <div class="panel-body">
          <h4>Congratulations! You have finished WiFi setting for RoBox!</h4>
          <h4>Please log in to your account in <a href="http://www.RFF.com">www.RFF.com</a> to start using your RoBox.</h4>
          <a class="col-xs-4 col-md-4 btn btn-info" href="http://www.RFF.com">Continue on www.RFF.com</a>
        </div>
      </div>
    </div>
  </div>
<?php
