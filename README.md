# `$ robox-wifi-configuration`
RoBox Wifi Configuration -- Forked from raspap-webgui

* This project was forked from raspap-webgui. 
* I need a wifi configuration tool for my own product -- RoBox, raspap-webgui would be perfect to fulfill the purpose.
* However, I need to customize the SSID and UI so that my users can easily understand the web page presented.
* I fixed a few issues on RaspAP that caused problems on my Pi-3.
* I simplified the wifi configuration tool so that only client configuration is available in the menu.
* Finally, I made changes to Connect button, so that it becomes a link and points to a new page rff which concludes the configuration.
## Contents

 - [Installation](#installation)
 - [Customization](#customization)
 - [License](#license)

## Installation
Install raspap-webgui first (https://github.com/billz/raspap-webgui)

## Customization
1. Change SSID and password:
```sh
sudo nano /etc/hostapd/hostapd.conf
```
* SSID: `RoBoX`
* Password: 20171009

2. Change page title, header, etc.
```sh
sudo nano /var/www/html/index.php
```
```sh
line 67:  <title><?php echo _("RoBox WiFi Configuration Portal"); ?></title>
line 110: <a class="navbar-brand" href="index.php"><?php echo _("RoBox Wifi Portal"); ?></a>
line 180: <img class="logo" src="img/raspAP-logo.png" width="45" height="45">RoBox
line 287: <div class="panel-footer"><?php echo _("<strong>Note:</strong> WEP aaccess points appear as 'Open'. RoBox does not currently support ...
```

3. Issues and Fixes
* Issue a. Missing one SSID. See description in https://github.com/billz/raspap-webgui/issues/290
* Fix: Comment out line 134 & 136 in configure_client.php

* Issue b. After entered pass-phrase, raspap-webgui wifi got lost.
* Fix: Comment out line 114, 115, 118, 119 & 120 in configure_client.php.
```sh
line 114: //exec('sudo wpa_cli -i ' . RASPI_WIFI_CLIENT_INTERFACE . ' reconfigure', $reconfigure_out, $reconfigure_return );
line 115: //if ($reconfigure_return == 0) {
line 116:   $status->addMessage('Wifi settings updated successfully', 'success');
line 117:   $networks = $tmp_networks;
line 118: //} else {
line 119:   //$status->addMessage('Wifi settings updated but cannot restart (cannot execute "wpa_cli reconfigure")', 'danger');
line 120: //}
```

4. Simplify the tool.
* Add the following line in index.php before line 188: switch( $page ) {
```sh
$page = "wpa_conf";
```
* Delete line 102-172:
```sh
line 102: <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
...
line 172: </nav>
```
5. Changes to Connect button
* Make the following change in configure_client.php:
```sh
line 271: <a class="col-xs-4 col-md-4 btn btn-info" href="index.php?page=rff&connect=<?php echo htmlentities($ssid, ENT_QUOTES)?>"><?php echo _("Connect"); ?></a>
```
* Add a new file rff.php to includes folder (Refer to the sourse code in this repository).
* Add the following line to index.php
```
line 37: include_once( 'includes/rff.php' );
line 118: if ($page != "rff")
line 157: case "rff":
line 158:   DisplayRff();
line 159:   break;
```
## License
See the [LICENSE](./LICENSE) file.

