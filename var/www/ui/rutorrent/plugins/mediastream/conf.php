<?php

$qnapddns_name = exec('/sbin/getcfg "QNAP DDNS Service" "Host Name" -d MyServer -f /etc/config/qnapddns.conf');
$qnapddns_domain = exec('/sbin/getcfg "QNAP DDNS Service" "Domain Name Server" -d MyCloudNAS.com -f /etc/config/qnapddns.conf');
// path on domain where a symlink to view.php can be found
// change only if you use web AUTH
// example: http://mydomain.com/stream/view.php
//$streampath = 'http://mydomain.com/stream/view.php'; 
$streampath = 'http://$qnapddns_name.$qnapddns_domain:6009/rtorrent/plugins/mediastream/view.php';


?>