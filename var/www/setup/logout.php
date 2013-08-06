<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>rtorrent QNAP - logs (output viewer)</title>
<style type="text/css">
<!--
body {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #343434;
	font-size: 11px;
}
textarea {
	font-family: Consolas, Courier New;
	color: #121212;
	font-size: 10px;
	width: 775px;
	height: 600px;
}
iframe {
	width:380px;
	height:200px;
	font-family: Trebuchet MS, Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	background-color: #ffffff;
	color: #000000;
	border:none;
}
input.fields {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #121212;
	font-size: 11px;
	width: 50px;
}
input.fieldss {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #121212;
	font-size: 11px;
	width: 25px;
}
input.default {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #121212;
	font-size: 11px;
}
select,option {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #121212;
	font-size: 11px;
}
.main {
	color:#000000;
}
.outside {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	border: 1px dotted #000000;
}
hr {
	border-color:#9a9a9a;
	border-width:1px;
}
.caption {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #ffffff;
	font-weight:bold;
	background-color: #000000;
	font-size:11px;
}
.caption_sub {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #ffffff;
	font-weight:bold;
	background-color: #525252;
	font-size:11px;
}
.caption_footer {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #121212;
	font-weight:normal;
	background-color: #ababab;
	font-size:11px;
}
.padding2 {
	padding:2px;
}
.margin2 {
	margin:2px;
}
a {
	color: #ffffff;
}
-->
</style>
</head>
<body><div align="center"><table width="800" cellpadding="2" cellspacing="0" bordercolor="#000000" class="outside">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td class="caption" align="center">rtorrent | output</td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="100%" valign="top"><textarea name="viewconfig" id="viewconfig"><?php 
		$file = "/share/Download/rtorrent/settings/logs/rtorrent.out";
		$Handle = fopen($file, "rb");
		$data = fread($Handle, filesize($file));
		fclose($Handle);
		echo $data;
		?></textarea></td>
            </tr>
          </table></td>
      </tr></table></div></body>
</html>
