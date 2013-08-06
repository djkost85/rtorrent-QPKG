<?php
  require_once('lib/rtorrent.php');
  require_once('config.php');
   $server  = new Rtorrent($config);
   $torrents = $server->Retrieve();
   if($_GET['a']=="list") {
	   foreach($torrents as $tn => $t) {
		   echo $tn."~".$t['name']."~".$t['is_downloading']."~".$t['size']."~".$t['downloaded']."~".$t['uploaded']."~".$t['down_rate']."~".$t['up_rate']."~".$t['is_completed']."~".$t['is_hashing']."\n";
	 }
	 }else if($_GET['a']=="remove") {
		 if(isset($_GET['id'])) {
			 $server->Remove($_GET['id']);
		 }
	}else if($_GET['a']=="torrentl") {
		//It's a url torrent
		$result=0;
		if($server->LoadURL($_POST['url'],true)) $result=1;
		echo "<script language=\"javascript\" type=\"text/javascript\">   window.top.window.stopUpload(".$result.");</script> ";
   }else if($_GET['a']=="torrent") {
	   $destination_path = $config['torrentsDir'];
    $result = 0;
    $target_path = $destination_path . basename( $_FILES['trent']['name']);
    if(@move_uploaded_file($_FILES['trent']['tmp_name'], $target_path)) {
      $result = 1;
   }
 
   sleep(1);
		   echo "<script language=\"javascript\" type=\"text/javascript\">   window.top.window.stopUpload(".$result.");</script> ";
}else if($_GET['a']=="stats") {
	echo "RS~";
	print_r($server->GetMaxMemory());
	echo "~";
	print_r($server->GetMemoryUsage());
	echo "~";
	print($server->GetDownThrottle());
	echo "~";
	print($server->GetUpThrottle());
	echo "~";
	print($server->GetDownRate());
	echo "~";
	print($server->GetUpRate());
	$df = disk_free_space($server->GetDirectory());
	$dt = disk_total_space($server->GetDirectory());
	echo "~";
	print(round(($dt-$df)/pow(10,6)));//In Megabytes
	echo "~";
	print(round(disk_total_space($server->GetDirectory())/pow(10,6)));//In Megabytes
}
  ?>