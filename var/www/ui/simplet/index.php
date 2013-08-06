<?php 
require_once('config.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SimpleT - <?php echo gethostname(); ?></title>
<link rel="stylesheet" type="text/css" href="main.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo $config['theme']; ?>"/>
<script src="js/jquery-1.5.1.min.js"></script>
<script src="js/jquery-ui-1.8.13.custom.min.js" ></script>

</head>

<body>

<div id="topPart" name="topPart" class="topPart">
<div id="info" name="info">
	<img src="images/openIcon.png" title="Add a torrent" width="72" height="72" onclick="openUpload()"/> 
	<div id="diskUsageLabel"><img src="images/hddIcon.png" width="24" height="24" title="Storage Usage" /></div><div id="diskUsageText">0G / 40G </div><div id="diskUsage"></div>
	<div id="memUsageLabel"><img src="images/ramIcon.png" width="24" height="24" title="Memory Usage" /></div><div id="memUsageText">100M / 108M</div><div id="memUsage"></div>
    <div id="uploadStatsLabel"><img src="images/uploadIcon.png" width="24" height="24" title="Upload Rate" /></div><div id="uploadStatsText">2.4 Mbps / 4.8Mbps</div><div id="uploadStats"></div>
    <div id="downloadStatsLabel"><img src="images/downloadIcon.png" width="24" height="24" title="Download Rate" /></div><div id="downloadStatsText">2.4 Mbps / 4.8Mbps</div><div id="downloadStats"></div>
</div>
</div>
<div id="downloads">

</div>
<div id="upload" name="upload" style="visibility:hidden;">
<div id="upload_process">Status: <font color="#82997B">Awaiting File To Upload</font></div>
<form action="remote.php?a=torrent" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
 File: <input name="trent" type="file" />
          <input type="submit" name="submitBtn" value="Upload" />
</form>
Or<br/>
<form action="remote.php?a=torrentl" method="post" enctype="multipart/form-data" target="upload_target" onsubmit="startUpload();" >
 URL: <input name="url" type="text" />
          <input type="submit" name="submitBtn" value="Upload" />
</form>

<div style="position:absolute; right:2px; top:2px; border:none; padding:0px;"><img src="images/close-button.png" onclick="closeUpload()"/><div>
</div>
<script src="simpleT.js"></script>
<iframe id="upload_target" name="upload_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe> 
</body>
</html>
