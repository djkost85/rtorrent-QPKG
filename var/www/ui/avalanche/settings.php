<?php
$RPCWD=exec('/sbin/getcfg "RPC" "Random" -d "null" -f /usr/bin/rtorrent/etc/rtorrent.rpc');
$configuration = array(
        "server_type"=>"rtorrent",
        "server_ip"=>"127.0.0.1",
        "server_port"=>"6009",
        "rtorrent_scgi_folder"=>"/RPC2",
        "username"=>"RPC",
        "password"=>"$RPCWD",
								"torrents_folder" => "/share/Download/rtorrent"
);
