<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="2;url=rtorrent.schedule.php">
<title>rtorrent QNAP - schedule deletion</title>
<style type="text/css">
<!--
body {
	background-color: #c8ccd2;
	margin: 2px;
	padding: 2px;
}
body,td,th {
	font-family: Trebuchet MS, Calibri, Arial, Tahoma;
	font-size: 10px;
	color: #1d232b;
}
img {
	border:0px;
}
input.default {
    width:87px;
	height:16px;
	font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	background-color: #cad1d7;
	color: #1d232b;
	border:none;
}
form {
	border:0px;
	padding:0px;
	margin:0px;
}
input.custom1 {
    width:135px;
	height:16px;
	font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	background-color: #cad1d7;
	color: #1d232b;
	border:none;
}
input.custom2 {
    width:36px;
	height:16px;
	font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	background-color: #cad1d7;
	color: #1d232b;
	border:none;
}
input.custom3 {
    width:91px;
	height:16px;
	font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	background-color: #cad1d7;
	color: #1d232b;
	border:none;
}
-->
</style>
</head>
<?php
include ("rtorrent.schedule.includes.php");

$id = $_GET['id'];

if ($schedule != "") {

  $nschedule = "";
  $schedules = explode('#', $schedule);
  $n = 0;
  foreach ($schedules as &$value) {
    $n = $n + 1;
    if ($n != $id) {
	  if ($nschedule != "") {
	    $nschedule = $nschedule . '#';
	  }
	  $nschedule = $nschedule . $value;
	}
  }

}


  $File = "rtorrent.schedule.includes.php"; 
  $Handle = fopen($File, 'w');
  $Data = '<?php
$schedule = "' . $nschedule .'";
?>';
 
  fwrite($Handle, $Data); 
  fclose($Handle); 
  
  include ("rtorrent.functions.php");
  
  generate_configs();
?>
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
      <td><div align="center">Deleting entry from the list...<br /><br /><font color="#ff3333"><strong>After update, remember to restart rtorrent from QPKG section.</strong></font></div></td>
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