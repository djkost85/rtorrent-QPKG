<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>rtorrent QNAP - schedule builder</title>
<style type="text/css">
<!--
body {
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #343434;
	font-size: 11px;
}
img {
	border: 0px;
}
textarea {
	font-family: Consolas, Courier New;
	color: #121212;
	font-size: 10px;
	width: 375px;
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
input{
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #121212;
	font-size: 11px;
	width: 25px;
}
input.default{
	font-family: Tahoma, Arial, Verdana, Helvetica;
	color: #121212;
	font-size: 11px;
	width: 40px;
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
-->
</style>
</head>
<?php
  include ("rtorrent.schedule.includes.php");
	
  if ($_GET['action'] == "send") {
  $File = "rtorrent.schedule.includes.php"; 
  $Handle = fopen($File, 'w');
  $sepprefix = "";
  if ($schedule != "") {
    $sepprefix = "#";
  }
  $speed = $_GET['speed'];
  if ($_GET['type'] == "enable_trackers=no" or $_GET['type'] == "enable_trackers=yes" or $_GET['type'] == "d.multicall=started,d.stop=" or $_GET['type'] == "d.multicall=stopped,d.start=" or $_GET['type'] == "d.multicall=incomplete,d.stop=" or $_GET['type'] == "d.multicall=incomplete,d.start=" or $_GET['type'] == "d.multicall=complete,d.stop=" or $_GET['type'] == "d.multicall=complete,d.start=") {
    $speed = "-1";
  }
  $nschedule = $schedule . $sepprefix . $_GET['hh'] . '|' . $_GET['mm'] . '|' . $_GET['type'] . '|' . $speed;
  $Data = '<?php
$schedule = "' . $nschedule .'";
?>';
 
  fwrite($Handle, $Data); 
  fclose($Handle); 
  }
  include ("rtorrent.schedule.includes.php");
  include ("rtorrent.functions.php");
  
  generate_configs();
?>
<body><form action="rtorrent.schedule.php" method="get"><div align="center"><table width="360" cellpadding="0" cellspacing="0" border="0"><tr>
<td valign="top" align="left">At <select name="hh" dir="ltr">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
</select>:<select name="mm" dir="ltr">
<option value="00">00</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select> set <select name="type" dir="ltr">
<option value="download">download rate</option>
<option value="upload">upload rate</option>
<option value="enable_trackers=no">disable trackers</option>
<option value="enable_trackers=yes">enable trackers</option>
<option value="d.multicall=started,d.stop=">Stop started</option>
<option value="d.multicall=stopped,d.start=">Start stopped</option>
<option value="d.multicall=incomplete,d.stop=">Stop Incomplete</option>
<option value="d.multicall=incomplete,d.start=">Start Incomplete</option>
<option value="d.multicall=complete,d.stop=">Stop Complete</option>
<option value="d.multicall=complete,d.start=">Start Complete</option>
</select> to <input type="text" name="speed" id="speed" value="0" /> Kbytes/s <input type="hidden" name="action" value="send" /><input name="" type="submit" value="Add" class="default" />
<br /><br /><?php

  if ($_GET['action'] == "send") {
    echo '<font color="#ff3333"><strong>After update, remember to restart rtorrent from QPKG section.</strong></font>';
  }
	
?>
	<table width="340" border="0" cellspacing="2" cellpadding="2">
      <tr>
        <td align="center" valign="middle" bgcolor="#525252"><font color="#ffffff"><strong>D</strong></font></td>
        <td align="center" valign="middle" bgcolor="#525252"><font color="#ffffff"><strong>HH</strong></font></td>
        <td align="center" valign="middle" bgcolor="#525252"><font color="#ffffff"><strong>MM</strong></font></td>
        <td align="center" valign="middle" bgcolor="#525252"><font color="#ffffff"><strong>Type</strong></font></td>
        <td align="center" valign="middle" bgcolor="#525252"><font color="#ffffff"><strong>Rate</strong></font></td>
      </tr>
<?php

if ($schedule != "") {

  $schedules = explode('#', $schedule);
  $n = 0;
  foreach ($schedules as &$value) {
    $n = $n + 1;
    echo '<tr><td align="center" valign="middle" bgcolor="#e2e2e2"><a href="rtorrent.schedule.del.php?id=' . $n .'"><img src="icon_remove.gif" alt="Delete this entry server" /></a></td>';
    $dschedules = explode('|', $value);
	$y = 0;
	foreach ($dschedules as &$dvalue) {
	  $y = $y + 1;
	  if ($y == 3) {
        echo '<td align="left" valign="middle" bgcolor="#e2e2e2">set <strong>' . $dvalue . '</strong></a></td>';
	  } else {
        echo '<td align="left" valign="middle" bgcolor="#e2e2e2">' . $dvalue . '</td>';
	  }
    }
	echo '</tr>';
  }

}
?>
    </table>
</td>
</tr></table></div></form></body>
</html>
