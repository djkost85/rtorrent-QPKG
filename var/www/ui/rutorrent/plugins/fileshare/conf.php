<?php

// limits
// 0 = unlimited
$limits['duration'] = 1; 	// maximum duration hours
$limits['links'] = 0; 	//maximum sharing links per user

// path on domain where a symlink to share.php can be found^
// example: http://mydomain.com/share.php^
$qnapddns_name = exec('/sbin/getcfg "QNAP DDNS Service" "Host Name" -d MyServer -f /etc/config/qnapddns.conf');
$qnapddns_domain = exec('/sbin/getcfg "QNAP DDNS Service" "Domain Name Server" -d MyCloudNAS.com -f /etc/config/qnapddns.conf');
$rtWebPort = exec('/sbin/getcfg "rtorrent" "Web_Port" -d 6009 -f /etc/config/qpkg.conf');

//$downloadpath = "http://$qnapddns_name.$qnapddns_domain:6009/share.php";
$downloadpath = "http://$qnapddns_name.$qnapddns_domain:$rtWebPort/share.php";
//$downloadpath = 'http://robits.org/rutorrent/share.php'; ^


?>