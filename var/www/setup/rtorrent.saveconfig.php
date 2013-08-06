<?php

  if (($_GET['pass'] == $_GET['verifypass']) && ($_GET['pass'] != "")) {
    $pass_is_ok = "yes";
  } else {
    $pass_is_ok = "no";
  }
  
if ($pass_is_ok == "yes") {

  if ($_GET['port_random'] == "on") {
    $port_random = "yes";
  } else {
    $port_random = "no";
  }
	
  if ($_GET['check_hash'] == "on") {
    $check_hash = "yes";
  } else {
    $check_hash = "no";
  }
	
  if ($_GET['use_udp_trackers'] == "on") {
    $use_udp_trackers = "yes";
  } else {
    $use_udp_trackers = "no";
  }
	
  if ($_GET['peer_exchange'] == "on") {
    $peer_exchange = "yes";
  } else {
    $peer_exchange = "no";
  }

  if ($_GET['stopat'] == "on") {
    $stopat = "yes";
  } else {
    $stopat = "no";
  }

  if ($_GET['watchdir'] == "on") {
    $watchdir = "yes";
  } else {
    $watchdir = "no";
  }

  if ($_GET['upnp_main'] == "on") {
    $upnp_main = "yes";
  } else {
    $upnp_main = "no";
  }

  if ($_GET['upnp_http'] == "on") {
    $upnp_http = "yes";
  } else {
    $upnp_http = "no";
  }

  if ($_GET['action'] == "send") {
  $File = "rtorrent.includes.php"; 
  $Handle = fopen($File, 'w');

  $Data = '<?php
$min_peers = "' . $_GET['min_peers'] .'";
$max_peers = "' . $_GET['max_peers'] .'";
$min_peers_seed = "' . $_GET['min_peers_seed'] .'";
$max_peers_seed = "' . $_GET['max_peers_seed'] .'";
$max_uploads = "' . $_GET['max_uploads'] .'";
$port_range_low = "' . $_GET['port_range_low'] .'";
$port_range_high = "' . $_GET['port_range_high'] .'";
$port_random = "' . $port_random .'";
$check_hash = "' . $check_hash .'";
$use_udp_trackers = "' . $use_udp_trackers .'";
$encryption = "' . $_GET['encryption'] .'";
$dht = "' . $_GET['dht'] .'";
$dht_port = "' . $_GET['dht_port'] .'";
$peer_exchange = "' . $peer_exchange .'";
$download_rate = "' . $_GET['download_rate'] .'";
$upload_rate = "' . $_GET['upload_rate'] .'";
$umask = "' . $_GET['umask'] .'";
$stopat = "' . $stopat .'";
$sratio = "' . $_GET['sratio'] .'";
$sratiomb = "' . $_GET['sratiomb'] .'";
$sratioelse = "' . $_GET['sratioelse'] .'";
$watchdir = "' . $watchdir .'";
$pieces_memory_max_set = "' . $_GET['pieces_memory_max_set'] .'";
$user = "' . $_GET['user'] .'";
$pass = "' . $_GET['pass'] .'";
$upnp_main = "' . $upnp_main .'";
$upnp_http = "' . $upnp_http .'";
?>';

  fwrite($Handle, $Data); 
  fclose($Handle);

  }
  
  include ("rtorrent.functions.php");
  generate_configs();
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="2;url=index.php">
<title>rtorrent - Saving config file</title>
<style type="text/css">
<!--
body {
	background-color: #ffffff;
}
body,td,th {
	font-family: Trebuchet MS, Calibri, Arial, Tahoma;
	font-size: 12px;
	color: #000000;
}
-->
</style>
</head>

<body>
<div align="center">
  <table width="400" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
    </tr>
    <tr>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5"><img src="spacer.gif" width="1" height="1" /></td>
      <td height="5"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
    </tr>
    <tr>
      <td width="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5"><img src="spacer.gif" width="1" height="1" /></td>
      <td><div align="center"><? if ($pass_is_ok == "yes") { ?>Saving configuration...<br /><br /><? } ?><font color="#ff3333"><strong><?
      if ($pass_is_ok == "yes") { ?>After update, please restart rtorrent.<?
      } else { ?><strong>PASSWORD MISMATCH!</strong><? } ?></strong></font></div></td>
      <td width="5"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
    </tr>
    <tr>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5"><img src="spacer.gif" width="1" height="1" /></td>
      <td height="5"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
    </tr>
    <tr>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
      <td width="5" height="5" bgcolor="#333333"><img src="spacer.gif" width="1" height="1" /></td>
    </tr>
  </table>
</div>
</body>
</html>
