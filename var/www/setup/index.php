<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>rtorrent QNAP - core settings builder</title>
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
	width: 375px;
	height: 500px;
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
	padding-left: 7px;
	padding-right: 7px;
	padding-top: 2px;
	padding-bottom: 2px;
	text-align: left;
	vertical-align: middle;
}
.note_sub {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #343434;
	background-color: #E0E0E0;
	font-size:11px;
	text-align: left;
	vertical-align: middle;
}
.caption_footer {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #121212;
	font-weight:normal;
	background-color: #ababab;
	font-size:11px;
	text-align: left;
}
.padding2 {
	padding:2px;
}
.margin2 {
	margin:2px;
}
hr {
	height: 0 !important; 
	height: 1px; /* wysokosc pod ie */ 
	color: #8a8a8a; /* kolor pod ie */ 
	background: transparent; 
	border-width: 1px 0 0 0; 
	border-color: #8a8a8a; 
	border-style: dotted; 
}
a {
	color: #ffffff;
}
a.std {
	color: #242424;
}
ul {
	margin: 0px;
}
.tblock {
	margin-left: 7px;
	margin-right: 7px;
	margin-bottom: 5px;
	margin-top: 0px;
	text-align: justify;
	vertical-align: middle;
}
td.aright {
	padding: 0px;
	text-align: right;
	vertical-align: middle;
	color: #343434;
}
td.left {
	padding-left: 7px;
	padding-right: 0px;
	padding-bottom: 3px;
	padding-top: 3px;
	text-align: left;
	vertical-align: middle;
	color: #343434;
}
td.sep { width: 5px; }
td.hsep { height: 5px; }
td.right {
	padding-left: 0px;
	padding-right: 7px;
	padding-bottom: 3px;
	padding-top: 3px;
	text-align: left;
	vertical-align: middle;
	color: #343434;
}
td .top {
	vertical-align: top;
}
td .bottom {
	vertical-align: bottom;
}
td.one {
	padding-left: 7px;
	padding-right: 7px;
	padding-bottom: 3px;
	padding-top: 3px;
	text-align: left;
	vertical-align: middle;
	color: #343434;
}
-->
</style>
</head>
<?php  include ("rtorrent.includes.php"); ?>
<body><form action="rtorrent.saveconfig.php" method="get"><div align="center"><table width="1240" cellpadding="2" cellspacing="0" bordercolor="#000000" class="outside">
  <tr>
    <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td class="caption" align="center">rtorrent configuration build script</td>
      </tr>
    </table>
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
	    <td valign="top"><table width="100%" border="0" cellpadding="2" cellspacing="2">
		  <tr>
		    <!-- begin:column 1 --><td width="50%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="outside">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td class="caption_sub">Connection settings</td>
                  </tr>
                  <tr>
                    <td class="note_sub"><div align="justify" class="tblock"><strong>rtorrent Burning Tip</strong> is recommended only for high-speed internet connection links. Allows to use fully and "overload" to the maximum internet bandwidth.</div>
                	<div class="tblock">Set as described bellow for 10/1 Mbit link or higher:
                	    <ul>
                	    <li>Maximum number of peers = <strong>13312</strong> <i>(def: 200)</i></li>
			    <li>Maximum number of peers for seed = <strong>1331</strong> <i>(def: 50)</i></li>
			    <li>Maximum number of uploads = <strong>171</strong> <i>(def: 30)</i></li>
			    </ul>
			    </div>
			    <div align="justify" class="tblock">Required minimum: 1GB of RAM, recommended: 2GB of RAM.<br />
			    Increased CPU and HDD load.<br />
			    <strong>NOTE</strong>: Please check the performance and speed before and after the changes on a highly shared torrents. Too many open connections at the same time can also result in slower downloads.</div></td>
                  </tr>
                </table><table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td colspan="3" class="one">Maximum and minimum number of peers to connect to per torrent.</td>
                  </tr>
                  <tr>
                    <td class="left">Minimum number of peers</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="min_peers" id="min_peers" value="<?=$min_peers ?>" class="fields" /></label></td>
                  </tr>
                  <tr>
                    <td class="left">Max. number of peers</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="max_peers" id="max_peers" value="<?=$max_peers ?>" class="fields" /> (download speed [kB/s] * 1.3)</label></td>
                  </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Maximum and minimum number of peers for seed to connect to per torrent.</td>
                  </tr>
                  <tr>
                    <td class="left">Minimum number of peers for seed</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="min_peers_seed" id="min_peers_seed" value="<?=$min_peers_seed ?>" class="fields" /></label></td>
                  </tr>
                  <tr>
                    <td class="left">Max. number of peers for seed</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="max_peers_seed" id="max_peers_seed" value="<?=$max_peers_seed ?>" class="fields" /> (upload speed [kB/s] * 1.3)</label></td>
                  </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Maximum number of simultaneous uploads per torrent.</td>
                    </tr>
                  <tr>
                    <td class="left">Max. no. of uploads</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="max_uploads" id="max_uploads" value="<?=$max_uploads ?>" class="fields" /> 1 + ( upload speed / 6 )</label></td>
                  </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Port range to use for listening.</td>
                    </tr>
                  <tr>
                    <td class="left">Port range</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="port_range_low" id="port_range_low" value="<?=$port_range_low ?>" class="fields" /></label> - <label><input type="text" name="port_range_high" id="port_range_high" disabled="disabled" value="<?=$port_range_low ?>" class="fields" /></label></td>
                  </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Auto forward router ports using UPnP.</td>
                    </tr>
                  <tr>
                    <td class="left"><label><input name="upnp_main" type="checkbox" <?php
	
	if ($upnp_main=="yes") {
		echo'checked="checked" ';
	}

	?>/> Listening, DHT, RPC</label></td>
                    <td class="sep"> </td>
                    <td class="right"><label><input name="upnp_http" type="checkbox" <?php
	
	if ($upnp_http=="yes") {
		echo'checked="checked" ';
	}

	?>/> HTTP: 6008 (SSL), 6009</label></td>
                    </tr>
                    <td colspan="3" class="one"><hr />
Set whetever the client should try to connect to UDP trackers.</td>
                    </tr>
                  <tr>
                    <td colspan="3" class="one"><label><input name="use_udp_trackers" type="checkbox" <?php
	
	if ($use_udp_trackers=="yes") {
		echo'checked="checked" ';
	}

	?>/> Use UDP trackers</label></td>
                    </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Enable DHT support for trackerless torrents or when all trackers are down. May be set to "disable" (completely disable DHT), "off" (do not start DHT), "auto" (start and stop DHT as needed), or "on" (start DHT immediately).</td>
                    </tr>
                  <tr>
                    <td class="left">DHT support</td>
                    <td class="sep"> </td>
                    <td class="right"><select name="dht" dir="ltr">
<option value="0" label="disable"<?php
	
	if ($dht == "0") {
		echo' selected=" selected"';
	}

	?> >disable</option>
<option value="1" label="off"<?php
	
	if ($dht == "1") {
		echo' selected=" selected"';
	}

	?> >off</option>
<option value="2" label="auto"<?php
	
	if ($dht == "2") {
		echo' selected=" selected"';
	}

	?> >auto</option>
<option value="3" label="on"<?php
	
	if ($dht == "3") {
		echo' selected=" selected"';
	}

	?> >on</option>
</select></td>
                  </tr>
				  <tr>
                    <td colspan="3" class="one"><br />
UDP port to use for DHT.</td>
                    </tr>
                  <tr>
                    <td class="left">DHT port</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="dht_port" id="dht_port" value="<?=$dht_port ?>" class="fields" /></label></td>
                  </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Enable peer exchange (for torrents not marked private).</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="one"><label><input name="peer_exchange" type="checkbox" <?php
	
	if ($peer_exchange=="yes") {
		echo'checked="checked" ';
	}

	?>/> Peer exchange</label></td>
                    </tr>
          </table></td>
		  </tr>
		</table></td><!-- end:column 1 -->
		    <!-- begin:column 2 -->
			<td width="50%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
		  <tr>
		    <td><!-- begin:bandwidth --><table width="100%" border="0" cellpadding="0" cellspacing="0" class="outside">
		<tr>
		<td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td class="caption_sub">Bandwidth settings</td>
                  </tr>
                  <tr>
                    <td class="note_sub"><div align="justify" class="tblock"><strong>Global</strong> download and upload speed value defines default speed at program startup.</div></td>
                  </tr>
                </table>
				<table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td colspan="3" class="one">Global upload and download rate in kBytes/s. "0" for unlimited.</td>
                  </tr>
                  <tr>
                    <td class="left">Download rate</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="download_rate" id="download_rate" value="<?=$download_rate ?>" class="fields" /> kBytes/s</label></td>
                  </tr>
                  <tr>
                    <td class="left">Upload rate</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="upload_rate" id="upload_rate" value="<?=$upload_rate ?>" class="fields" /> kBytes/s</label></td>
                  </tr>
                </table>
		</td>
		</tr>
		</table><!-- end:bandwidth -->
		</td>
		</tr>
		<tr><td class="hsep"></td></tr>
		<tr>
		<td><!-- begin:general --><table width="100%" border="0" cellpadding="0" cellspacing="0" class="outside">
		<tr>
		<td>
                <table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td class="caption_sub">General settings</td>
                  </tr>
                  <tr>
                    <td class="note_sub"><div align="justify" class="tblock"><strong>umask</strong> value defines downloaded files permission and is set once at the creating file time. Change does not affect already downloaded files.<br />
                    <a class="std" href="http://en.wikipedia.org/wiki/Umask">http://en.wikipedia.org/wiki/Umask</a></div></td>
                  </tr>
                </table><table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td class="left">mode mask</td>
                    <td class="sep"> </td>
                    <td class="right"><select name="umask" dir="ltr">
<option value="0" label="umask:000 = dir:777; file:666"<?php
	
	if ($umask == "0") {
		echo' selected=" selected"';
	}

	?> >umask:000 = dir:777; file:666</option>
<option value="1" label="umask:001 = dir:776; file:665"<?php
	
	if ($umask == "1") {
		echo' selected=" selected"';
	}

	?> >umask:001 = dir:776; file:665</option>
<option value="2" label="umask:002 = dir:775; file:664"<?php
	
	if ($umask == "2") {
		echo' selected=" selected"';
	}

	?> >umask:002 = dir:775; file:664</option>
<option value="3" label="umask:007 = dir:770; file:660"<?php
	
	if ($umask == "3") {
		echo' selected=" selected"';
	}

	?> >umask:007 = dir:770; file:660</option>
<option value="4" label="umask:011 = dir:766; file:655"<?php
	
	if ($umask == "4") {
		echo' selected=" selected"';
	}

	?> >umask:011 = dir:766; file:655</option>
<option value="5" label="umask:012 = dir:765; file:654"<?php
	
	if ($umask == "5") {
		echo' selected=" selected"';
	}

	?> >umask:012 = dir:765; file:654</option>
<option value="6" label="umask:017 = dir:760; file:650"<?php
	
	if ($umask == "6") {
		echo' selected=" selected"';
	}

	?> >umask:017 = dir:760; file:650</option>
<option value="7" label="umask:022 = dir:755; file:644"<?php
	
	if ($umask == "7") {
		echo' selected=" selected"';
	}

	?> >umask:022 = dir:755; file:644</option>
<option value="8" label="umask:027 = dir:750; file:640"<?php
	
	if ($umask == "8") {
		echo' selected=" selected"';
	}

	?> >umask:027 = dir:750; file:640</option>
<option value="9" label="umask:077 = dir:700; file:600"<?php
	
	if ($umask == "9") {
		echo' selected=" selected"';
	}

	?> >umask:077 = dir:700; file:600</option>
<option value="10" label="umask:111 = dir:666; file:555"<?php
	
	if ($umask == "10") {
		echo' selected=" selected"';
	}

	?> >umask:111 = dir:666; file:555</option>
<option value="11" label="umask:122 = dir:655; file:544"<?php
	
	if ($umask == "11") {
		echo' selected=" selected"';
	}

	?> >umask:122 = dir:655; file:544</option>
<option value="12" label="umask:222 = dir:555; file:444"<?php
	
	if ($umask == "12") {
		echo' selected=" selected"';
	}

	?> >umask:222 = dir:555; file:444</option>
<option value="13" label="umask:227 = dir:550; file:440"<?php
	
	if ($umask == "13") {
		echo' selected=" selected"';
	}

	?> >umask:227 = dir:550; file:440</option>
<option value="14" label="umask:277 = dir:500; file:400"<?php
	
	if ($umask == "14") {
		echo' selected=" selected"';
	}

	?> >umask:277 = dir:500; file:400</option>
</select></td>
                  </tr>
				                    <tr>
                    <td colspan="3" class="one"><hr />
Encryption method.</td>
                    </tr>
                  <tr>
                    <td colspan="3" class="one"><select name="encryption" dir="ltr">
<option value="0" label="no encryption"<?php
	
	if ($encryption == "0") {
		echo' selected=" selected"';
	}

	?> >no encryption</option>
<option value="1" label="* preffer plaintext, but allow encryption"<?php
	
	if ($encryption == "1") {
		echo' selected=" selected"';
	}

	?> >* preffer plaintext, but allow encryption</option>
<option value="2" label="* preffer encryption and allow plaintext"<?php
	
	if ($encryption == "2") {
		echo' selected=" selected"';
	}

	?> >* preffer encryption and allow plaintext</option>
<option value="3" label="require encryption and encrypt headers only (rest plaintext)"<?php
	
	if ($encryption == "3") {
		echo' selected=" selected"';
	}

	?> >require encryption and encrypt headers only (rest plaintext)</option>
<option value="4" label="require encryption and encrypt all data"<?php
	
	if ($encryption == "4") {
		echo' selected=" selected"';
	}

	?> >require encryption and encrypt all data</option>
</select><br />
* means it will connect to all possible peers.</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Check hash for finished torrents.</td>
                    </tr>
                  <tr>
                    <td colspan="3" class="one"><label><input name="check_hash" type="checkbox" <?php
	
	if ($check_hash=="yes") {
		echo'checked="checked" ';
	}

	?>/> Check hash</label></td>
                    </tr>
                  <tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Stop torrents when reaching upload ratio in percent, when also reaching total upload in bytes, or when reaching final upload ratio in percent.</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="one"><label><input name="stopat" type="checkbox" <?php
	
	if ($stopat=="yes") {
		echo'checked="checked" ';
	}

	?>/> Stop at ratio </label><select name="sratio" dir="ltr">
<option value="050" label="0.5"<?php
	
	if ($sratio == "050") {
		echo' selected=" selected"';
	}

	?> >0.5</option>
<option value="060" label="0.6"<?php
	
	if ($sratio == "060") {
		echo' selected=" selected"';
	}

	?> >0.6</option>
<option value="070" label="0.7"<?php
	
	if ($sratio == "070") {
		echo' selected=" selected"';
	}

	?> >0.7</option>
<option value="080" label="0.8"<?php
	
	if ($sratio == "080") {
		echo' selected=" selected"';
	}

	?> >0.8</option>
<option value="090" label="0.9"<?php
	
	if ($sratio == "090") {
		echo' selected=" selected"';
	}

	?> >0.9</option>
<option value="100" label="1.0"<?php
	
	if ($sratio == "100") {
		echo' selected=" selected"';
	}

	?> >1.0</option>
<option value="110" label="1.1"<?php
	
	if ($sratio == "110") {
		echo' selected=" selected"';
	}

	?> >1.1</option>
<option value="120" label="1.2"<?php
	
	if ($sratio == "120") {
		echo' selected=" selected"';
	}

	?> >1.2</option>
<option value="130" label="1.3"<?php
	
	if ($sratio == "130") {
		echo' selected=" selected"';
	}

	?> >1.3</option>
<option value="140" label="1.4"<?php
	
	if ($sratio == "140") {
		echo' selected=" selected"';
	}

	?> >1.4</option>
<option value="150" label="1.5"<?php
	
	if ($sratio == "150") {
		echo' selected=" selected"';
	}

	?> >1.5</option>
<option value="160" label="1.6"<?php
	
	if ($sratio == "160") {
		echo' selected=" selected"';
	}

	?> >1.6</option>
<option value="170" label="1.7"<?php
	
	if ($sratio == "170") {
		echo' selected=" selected"';
	}

	?> >1.7</option>
<option value="180" label="1.8"<?php
	
	if ($sratio == "180") {
		echo' selected=" selected"';
	}

	?> >1.8</option>
<option value="190" label="1.9"<?php
	
	if ($sratio == "190") {
		echo' selected=" selected"';
	}

	?> >1.9</option>
<option value="200" label="2.0"<?php
	
	if ($sratio == "200") {
		echo' selected=" selected"';
	}

	?> >2.0</option>
<option value="210" label="2.1"<?php
	
	if ($sratio == "210") {
		echo' selected=" selected"';
	}

	?> >2.1</option>
<option value="220" label="2.2"<?php
	
	if ($sratio == "220") {
		echo' selected=" selected"';
	}

	?> >2.2</option>
<option value="230" label="2.3"<?php
	
	if ($sratio == "230") {
		echo' selected=" selected"';
	}

	?> >2.3</option>
<option value="240" label="2.4"<?php
	
	if ($sratio == "240") {
		echo' selected=" selected"';
	}

	?> >2.4</option>
<option value="250" label="2.5"<?php
	
	if ($sratio == "250") {
		echo' selected=" selected"';
	}

	?> >2.5</option>
<option value="260" label="2.6"<?php
	
	if ($sratio == "260") {
		echo' selected=" selected"';
	}

	?> >2.6</option>
<option value="270" label="2.7"<?php
	
	if ($sratio == "270") {
		echo' selected=" selected"';
	}

	?> >2.7</option>
<option value="280" label="2.8"<?php
	
	if ($sratio == "280") {
		echo' selected=" selected"';
	}

	?> >2.8</option>
<option value="290" label="2.9"<?php
	
	if ($sratio == "290") {
		echo' selected=" selected"';
	}

	?> >2.9</option>
<option value="300" label="3.0"<?php
	
	if ($sratio == "300") {
		echo' selected=" selected"';
	}

	?> >3.0</option>
<option value="350" label="3.5"<?php
	
	if ($sratio == "350") {
		echo' selected=" selected"';
	}

	?> >3.5</option>
<option value="400" label="4.0"<?php
	
	if ($sratio == "400") {
		echo' selected=" selected"';
	}

	?> >4.0</option>
<option value="450" label="4.5"<?php
	
	if ($sratio == "450") {
		echo' selected=" selected"';
	}

	?> >4.5</option>
<option value="500" label="5.0"<?php
	
	if ($sratio == "500") {
		echo' selected=" selected"';
	}

	?> >5.0</option>
<option value="550" label="5.5"<?php
	
	if ($sratio == "550") {
		echo' selected=" selected"';
	}

	?> >5.5</option>
<option value="600" label="6.0"<?php
	
	if ($sratio == "600") {
		echo' selected=" selected"';
	}

	?> >6.0</option>
<option value="650" label="6.5"<?php
	
	if ($sratio == "650") {
		echo' selected=" selected"';
	}

	?> >6.5</option>
<option value="700" label="7.0"<?php
	
	if ($sratio == "700") {
		echo' selected=" selected"';
	}

	?> >7.0</option>
<option value="750" label="7.5"<?php
	
	if ($sratio == "750") {
		echo' selected=" selected"';
	}

	?> >7.5</option>
<option value="800" label="8.0"<?php
	
	if ($sratio == "800") {
		echo' selected=" selected"';
	}

	?> >8.0</option>
<option value="850" label="8.5"<?php
	
	if ($sratio == "850") {
		echo' selected=" selected"';
	}

	?> >8.5</option>
<option value="900" label="9.0"<?php
	
	if ($sratio == "900") {
		echo' selected=" selected"';
	}

	?> >9.0</option>
<option value="950" label="9.5"<?php
	
	if ($sratio == "950") {
		echo' selected=" selected"';
	}

	?> >9.5</option>
<option value="1000" label="10"<?php
	
	if ($sratio == "1000") {
		echo' selected=" selected"';
	}

	?> >10</option>
<option value="2000" label="20"<?php
	
	if ($sratio == "2000") {
		echo' selected=" selected"';
	}

	?> >20</option>
</select> with at least <input type="text" name="sratiomb" id="sratiomb" value="<?=$sratiomb ?>" class="fieldss" /> Mb uploaded, or else ratio <select name="sratioelse" dir="ltr">
<option value="050" label="0.5"<?php
	
	if ($sratioelse == "050") {
		echo' selected=" selected"';
	}

	?> >0.5</option>
<option value="100" label="1.0"<?php
	
	if ($sratioelse == "100") {
		echo' selected=" selected"';
	}

	?> >1.0</option>
<option value="200" label="2.0"<?php
	
	if ($sratioelse == "200") {
		echo' selected=" selected"';
	}

	?> >2.0</option>
<option value="300" label="3.0"<?php
	
	if ($sratioelse == "300") {
		echo' selected=" selected"';
	}

	?> >3.0</option>
<option value="400" label="4.0"<?php
	
	if ($sratioelse == "400") {
		echo' selected=" selected"';
	}

	?> >4.0</option>
<option value="500" label="5.0"<?php
	
	if ($sratioelse == "500") {
		echo' selected=" selected"';
	}

	?> >5.0</option>
<option value="600" label="6.0"<?php
	
	if ($sratioelse == "600") {
		echo' selected=" selected"';
	}

	?> >6.0</option>
<option value="700" label="7.0"<?php
	
	if ($sratioelse == "700") {
		echo' selected=" selected"';
	}

	?> >7.0</option>
<option value="800" label="8.0"<?php
	
	if ($sratioelse == "800") {
		echo' selected=" selected"';
	}

	?> >8.0</option>
<option value="900" label="9.0"<?php
	
	if ($sratioelse == "900") {
		echo' selected=" selected"';
	}

	?> >9.0</option>
<option value="1000" label="10.0"<?php
	
	if ($sratioelse == "1000") {
		echo' selected=" selected"';
	}

	?> >10.0</option>
<option value="1100" label="11.0"<?php
	
	if ($sratioelse == "1100") {
		echo' selected=" selected"';
	}

	?> >11.0</option>
<option value="1200" label="12.0"<?php
	
	if ($sratioelse == "1200") {
		echo' selected=" selected"';
	}

	?> >12.0</option>
<option value="1300" label="13.0"<?php
	
	if ($sratioelse == "1300") {
		echo' selected=" selected"';
	}

	?> >13.0</option>
<option value="1400" label="14.0"<?php
	
	if ($sratioelse == "1400") {
		echo' selected=" selected"';
	}

	?> >14.0</option>
<option value="1500" label="15.0"<?php
	
	if ($sratioelse == "1500") {
		echo' selected=" selected"';
	}

	?> >15.0</option>
<option value="1600" label="16.0"<?php
	
	if ($sratioelse == "1600") {
		echo' selected=" selected"';
	}

	?> >16.0</option>
<option value="1700" label="17.0"<?php
	
	if ($sratioelse == "1700") {
		echo' selected=" selected"';
	}

	?> >17.0</option>
<option value="1800" label="18.0"<?php
	
	if ($sratioelse == "1800") {
		echo' selected=" selected"';
	}

	?> >18.0</option>
<option value="1900" label="19.0"<?php
	
	if ($sratioelse == "1900") {
		echo' selected=" selected"';
	}

	?> >19.0</option>
<option value="2000" label="20.0"<?php
	
	if ($sratioelse == "2000") {
		echo' selected=" selected"';
	}

	?> >20.0</option>
<option value="3000" label="30.0"<?php
	
	if ($sratioelse == "3000") {
		echo' selected=" selected"';
	}

	?> >30.0</option>
<option value="4000" label="40.0"<?php
	
	if ($sratioelse == "4000") {
		echo' selected=" selected"';
	}

	?> >40.0</option>
</select></td>
                    </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Enable or Disable Watch Dir</td>
                  </tr>
                  <tr>
                    <td colspan="3" class="one"><label><input name="watchdir" type="checkbox" <?php
	
	if ($watchdir=="yes") {
		echo'checked="checked" ';
	}

	?>/> Enable Watch Dir</label></td>
                    </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Adjust how much memory rtorrent can use (physical and virtual). (Max. 16384000000) (Experimental option)</td>
                  </tr>
                  <tr>
                    <td class="left">Max memory usage</td>
                    <td class="sep"> </td>
                    <td class="right"><label><input type="text" name="pieces_memory_max_set" id="pieces_memory_max_set" value="<?=$pieces_memory_max_set ?>" class="fields" /></label></td>
                    </tr>
                  <tr>
                    <td colspan="3" class="one"><hr />
Change user/password for UI</td>
                  </tr>
                  <tr>
                    <td class="left">User: <label><input type="text" name="user" id="user" value="<?=$user ?>" class="fields" /></label></td>
                    <td class="sep"> </td>
                    <td class="right">Password: <label><input type="password" name="pass" id="pass" value="<?=$pass ?>" class="fields" /></label></td>
                    </tr>
                  <tr>
                    <td class="aright">Retype &nbsp;&nbsp; --></td>
                    <td class="sep"> </td>
                    <td class="right">Passowrd: <label><input type="password" name="verifypass" id="verifypass" value="<?=$pass ?>" class="fields" /></label></td>
                    </tr>
                </table></td>
            </tr>
          </table><!-- end:general --></td>
		</tr>
		<tr><td class="hsep"></td></tr>
		  <tr>
		    <td><!-- begin:bandwidth --><table width="100%" border="0" cellpadding="0" cellspacing="0" class="outside">
		<tr>
		<td><table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td class="caption_sub">Note</td>
                  </tr>
                  <tr>
                    <td class="note_sub"><div align="justify" class="tblock"><strong>The rtorrent QPKG must be restarted to apply changes.</strong><br />Disable it and Enable it from QNAP NAS Administration WebUI QPKG panel.<br /><br />If rtorrent not starting properly after config changes, then please read log files located under <strong>/Download/rtorrent/settings/logs</strong>:<br />rtorrent(.dump|out|critical.log|error.log), rtorrent-startstop.log</div></td>
                  </tr>
                </table>
		</td>
		</tr>
		</table><!-- end:bandwidth -->
		</td>
		</tr>
		</table></td><!-- end:column 2 -->
		  </tr>
		</table></td>
		<!-- begin:column 3 -->
		<td valign="top" width="400"><table width="100%" border="0" cellpadding="2" cellspacing="2">
		  <tr>
		    <td><!-- begin:schedule --><table width="100%" border="0" cellpadding="0" cellspacing="0" class="outside">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td class="caption_sub">Schedule speed rates</td>
                  </tr>
                </table><iframe src="rtorrent.schedule.php" width="380" height="200"></iframe></td>
            </tr>
          </table><!-- end:schedule --></td>
		  </tr>
		  <tr>
		    <td><!-- begin:config --><table width="100%" border="0" cellpadding="2" cellspacing="0" class="outside">
            <tr>
              <td valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                  <tr>
                    <td class="caption_sub">Real config viewer &nbsp; [ <a href="logout.php">View console output log</a> ]</td>
                  </tr>
                </table><textarea name="viewconfig" id="viewconfig" disabled="disabled"><?php 
	$file = "/usr/bin/rtorrent/etc/rtorrent.conf";
	$Handle = fopen($file, "rb");
	$data = fread($Handle, filesize($file));
	fclose($Handle);
	echo $data;
	?></textarea></td>
            </tr>
          </table><!-- end:config --></td>
		  </tr>
		  </table></td>
		<!-- end:column 3 -->
	  </tr>
	</table><table width="100%" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td class="caption_footer">&nbsp; (c) 2008-2013 Silas Mariusz Grzybacz &nbsp; &nbsp; &nbsp; silas [-_-] qnapclub.pl</td>
        <td width="120"><input type="hidden" name="action" value="send" /><input name="" type="submit" value="Save settings" class="default" /></td>
      </tr>
    </table></td>
  </tr>
</table></div></form></body>
</html>