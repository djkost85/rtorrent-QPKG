<?php
 
function generate_configs() {

  include ("rtorrent.includes.php");
  include ("rtorrent.schedule.includes.php");

	if ($encryption == "1") { $encryption_line = "encryption = allow_incoming,enable_retry,prefer_plaintext"; }
	if ($encryption == "2") { $encryption_line = "encryption = allow_incoming,try_outgoing,enable_retry"; }
	if ($encryption == "3") { $encryption_line = "encryption = enable_retry,require"; }
	if ($encryption == "4") { $encryption_line = "encryption = enable_retry,require_rc4"; }
	
	if ($dht == "0") { $dht = "disable"; }
	if ($dht == "1") { $dht = "off"; }
	if ($dht == "2") { $dht = "auto"; }
	if ($dht == "3") { $dht = "on"; }
	
	if ($umask == "0") { $aumask = "0000"; }
	if ($umask == "1") { $aumask = "0001"; }
	if ($umask == "2") { $aumask = "0002"; }
	if ($umask == "3") { $aumask = "0007"; }
	if ($umask == "4") { $aumask = "0011"; }
	if ($umask == "5") { $aumask = "0012"; }
	if ($umask == "6") { $aumask = "0017"; }
	if ($umask == "7") { $aumask = "0022"; }
	if ($umask == "8") { $aumask = "0027"; }
	if ($umask == "9") { $aumask = "0077"; }
	if ($umask == "10") { $aumask = "0111"; }
	if ($umask == "11") { $aumask = "0122"; }
	if ($umask == "12") { $aumask = "0222"; }
	if ($umask == "13") { $aumask = "0227"; }
	if ($umask == "14") { $aumask = "0277"; }

	if ($watchdir == "yes") { $watchdir_line = 'schedule = watch_directory,5,5,load_start=/share/Download/rtorrent/watch/*.torrent
schedule = untied_directory,5,5,stop_untied='; }

	if ($stopat == "yes") { $stopat_line = 'ratio.enable=
ratio.min.set=' . $sratio . '
ratio.max.set=' . $sratioelse . '
ratio.upload.set=' . $sratiomb . 'M
method.set = group.seeding.ratio.command, d.close='; }

// ----------------------------------------------------------------------------

# save icecast config
    $File = "/usr/bin/rtorrent/etc/rtorrent.conf"; 
    $Handle = fopen($File, 'w');
    $Data1 = '# This is an example resource file for rTorrent. Copy to
# ~/.rtorrent.rc and enable/modify the options as needed. Remember to
# uncomment the options you wish to enable.

# Maximum and minimum number of peers to connect to per torrent.
# throttle.min_peers.normal.set = 40
# throttle.max_peers.normal.set = 100
min_peers = ' . $min_peers . '
max_peers = ' . $max_peers . '

# Same as above but for seeding completed torrents (-1 = same as downloading)
# throttle.min_peers.seed.set = 25
# throttle.max_peers.seed.set = 60
min_peers_seed = ' . $min_peers_seed . '
max_peers_seed = ' . $max_peers_seed . '

# Maximum number of simultanious uploads per torrent.
# throttle.max_uploads.set = 30
max_uploads = ' . $max_uploads . '

# Global upload and download rate in KiB. "0" for unlimited.
# throttle.global_up.max_rate.set_kb = 0
# throttle.global_down.max_rate.set_kb = 0
download_rate = ' . $download_rate . '
upload_rate = ' . $upload_rate . '

# tracker_numwant = -1
trackers.numwant.set = -1

# Max mapped memory
# nb does not refer to physical memory
# max_memory_usage = 768M
pieces.memory.max.set = ' . $pieces_memory_max_set . '

# Max number of files to keep open simultaneously
# max_open_files = 65536
network.max_open_files.set = 65536

# max_open_http = 48
network.http.max_open.set = 48

# Number of sockets to simultaneously keep open
# max_open_sockets = 65023
network.max_open_sockets.set = 65023
network.xmlrpc.size_limit.set = 4M

pieces.preload.type.set = 1


# Default directory to save the downloaded torrents.
# directory.default.set = /share/Download/rtorrent/downloads/
directory = /share/Download/rtorrent/downloads/

# Default session directory. Make sure you don\'t run multiple instance
# of rtorrent using the same session directory. Perhaps using a
# relative path?
# session.path.set = /share/Download/rtorrent/session
session = /share/Download/rtorrent/session

# Schedule syntax: id,start,interval,command call cmd every interval seconds,
#                  starting from start.
# An interval of zero calls the task once while a start of zero calls it immediately.
# Start and interval may optionally use a time format dd:hh:mm:ss
# e.g. to start a task every day at 18:00, use 18:00:00,24:00:00. 
# Commands: stop_untied =, close_untied =, remove_untied =
# Stop, Close or Remove the torrents that are tied to filenames that have been deleted';
	
	$Data_Schedule = '';

	if ($schedule != "") {

      $schedules = explode('#', $schedule);
      $n = 0;
      foreach ($schedules as &$value) {
        $n = $n + 1;
        $dschedules = explode('|', $value);
		if ($dschedules[2] == "enable_trackers=no" or $dschedules[2] == "enable_trackers=yes" or $dschedules[2] == "d.multicall=started,d.stop=" or $dschedules[2] == "d.multicall=stopped,d.start=" or $dschedules[2] == "d.multicall=incomplete,d.stop=" or $dschedules[2] == "d.multicall=incomplete,d.start=" or $dschedules[2] == "d.multicall=complete,d.stop=" or $dschedules[2] == "d.multicall=complete,d.start=") {
			$Data_schedule = $Data_schedule . '
schedule = throttle_' . $n . ',' . $dschedules[0] . ':' . $dschedules[1] . ':00,24:00:00,"' . $dschedules[2] . '"';
		} else {
			$Data_schedule = $Data_schedule . '
schedule = throttle_' . $n . ',' . $dschedules[0] . ':' . $dschedules[1] . ':00,24:00:00,' . $dschedules[2] . '_rate=' . $dschedules[3];
		}
      }

	}

	$Data2 = '


# Watch a directory for new torrents, and stop those that have been
# deleted.
' . $watchdir_line . '

# Close torrents when diskspace is low.
schedule = low_diskspace,5,60,close_low_diskspace=100M

# Stop torrents when reaching upload ratio in percent, when also reaching
# total upload in bytes, or when reaching final upload ratio in percent
# Example: stop at ratio 2.0 with at least 200 MB uploaded, or else ratio 20.0
#schedule = ratio,60,60,stop_on_ratio=200,200M,2000
' . $stopat_line . '

# load = file, load_verbose = file, load_start = file, load_start_verbose = file
# load and possibly start a file, or possibly multiple files by using the wild-card "*"
# this is meant for use with schedule, though ensure that the start is non-zero
# the loaded file will be tied to the filename provided. 

# When the torrent finishes, it executes "mv -n <base_path> ~/Download/"
# and then sets the destination directory to "~/Download/". (0.7.7+)
#on_finished = move_complete,"execute=mv,-f,$d.get_base_path=,/share/Download/rtorrent/complete/ ;d.set_directory=/share/Download/rtorrent/complete/"
#method.set_key = event.download.finished,move_complete,"d.set_directory=/share/Download/rtorrent/complete/; execute=mv,-f,$d.get_base_path=,/share/Download/rtorrent/complete/"

# The ip address reported to the tracker.
# network.local_address.set = rakshasa.no
# network.local_address.set = 127.0.0.1
#ip = 127.0.0.1
#ip = rakshasa.no

# The ip address the listening socket and outgoing connections is
# bound to.
# network.bind_address.set = rakshasa.no
# network.bind_address.set = 127.0.0.1
#bind = 127.0.0.1
#bind = rakshasa.no

# Port range to use for listening.
# network.port_range.set = 6890-6999
port_range = ' . $port_range_low . '-' . $port_range_low . '

# Start opening ports at a random position within the port range.
# network.port_random.set = no
port_random = ' . $port_random . '

# Check hash for finished torrents. Might be usefull until the bug is
# fixed that causes lack of diskspace not to be properly reported.
# pieces.hash.on_completion.set = yes
check_hash = ' . $check_hash . '

# Set whether the client should try to connect to UDP trackers.
# use_udp_trackers = yes
trackers.use_udp.set = ' . $use_udp_trackers . '

# Alternative calls to bind and ip that should handle dynamic ip\'s.
#schedule = ip_tick,0,1800,ip=rakshasa
#schedule = bind_tick,0,1800,bind=rakshasa

# Remove a scheduled event
# schedule_remove = "ip_tick"

# Encryption options, set to none (default) or any combination of the following:
# allow_incoming, try_outgoing, require, require_RC4, enable_retry, prefer_plaintext
#
# The example value allows incoming encrypted connections, starts unencrypted
# outgoing connections but retries with encryption if they fail, preferring
# plaintext to RC4 encryption after the encrypted handshake
#
# protocol.encryption.set =
' . $encryption_line . '

# Enable DHT support for trackerless torrents or when all trackers are down.
# May be set to "disable" (completely disable DHT), "off" (do not start DHT),
# "auto" (start and stop DHT as needed), or "on" (start DHT immediately).
# The default is "off". For DHT to work, a session directory must be defined.
# 
# dht.mode.set = auto
dht = ' . $dht . '

# UDP port to use for DHT. 
# 
# dht_port = 6881
dht.port.set = ' . $dht_port . '

# Enable peer exchange (for torrents not marked private)
#
# protocol.pex.set = yes
peer_exchange = ' . $peer_exchange . '

# network.scgi.open_port = 127.0.0.1:5000
scgi_port = 127.0.0.1:5000
#scgi_local = /var/run/rtorrent-rpc.socket

xmlrpc_dialect=i8
encoding_list = UTF-8

# Hash read-ahead controls how many MB to request the kernel to read ahead ahead
# if the value is too low the disk may not be fully utilized,
# while if too high the kernel might not be able to keep the read pages
# in memory thus end up trashing.
# hash_read_ahead = 8
# system.hash.read_ahead.set = 8

# Interval between attempts to check the hash, in milliseconds
# hash_interval = 50
# system.hash.interval.set = 50

# Number of attempts to check the hash while using the mincore status, before forcing
# overworked systems might need lower values to get a decent hash checking rate
# hash_max_tries = 3
# system.hash.max_tries.set = 3

# SSL certificate name
# http_cacert =
# SSL certificate path
# http_capath =

http_capath = /usr/bin/rtorrent/share/openssl/certs
network.http.ssl_verify_peer.set = 0

# throttle.max_downloads.div.set = 
# max_downloads_div = 

# throttle.max_uploads.div.set =
# max_uploads_div = 

system.file.max_size.set = -1

# preload type 0 = Off, 1 = madvise, 2 = direct paging
pieces.preload.type.set = 1
pieces.preload.min_size.set = 262144
pieces.preload.min_rate.set = 5120
#network.send_buffer.size.set = 1M
#network.receive_buffer.size.set = 131072
network.send_buffer.size.set = 4M
network.receive_buffer.size.set = 4M

pieces.sync.always_safe.set = no
pieces.sync.timeout.set = 600
pieces.sync.timeout_safe.set = 900

# scgi_dont_route =
# network.scgi.dont_route.set =

# session.path.set =
# session.name.set =
session.use_lock.set = yes
session.on_completion.set = yes

system.file.split_size.set = -1
system.file.split_suffix.set = .part

# Use a http proxy. [url] ;an empty string disables this setting
# http_proxy =
# network.http.proxy_address.set =

# Set the umask applied to all files created by rtorrent 
system.umask.set = ' . $aumask . '

# Alternate keyboard mappings
# qwerty | azerty | qwertz | dvorak
# key_layout = dvorak
# keys.layout.set = dvorak

execute={sh,-c,/usr/bin/rtorrent/bin/php /usr/bin/rtorrent/var/www/ui/rutorrent/php/initplugins.php rtorrent &}

log.open_file = "rtorrent.info.log", (cat,/share/Download/rtorrent/logs/rtorrent.info.log)
log.add_output = "info", "rtorrent.info.log"

log.open_file = "rtorrent.dht_debug.log", (cat,/share/Download/rtorrent/logs/rtorrent.dht_debug.log)
log.add_output = "dht_debug", "rtorrent.dht_debug.log"

log.open_file = "rtorrent.tracker_debug.log", (cat,/share/Download/rtorrent/logs/rtorrent.tracker_debug.log)
log.add_output = "tracker_debug", "rtorrent.tracker_debug.log"

log.open_file = "rtorrent.critical.log", (cat,/share/Download/rtorrent/logs/rtorrent.critical.log)
log.add_output = "critical", "rtorrent.critical.log"

log.open_file = "rtorrent.error.log", (cat,/share/Download/rtorrent/logs/rtorrent.error.log)
log.add_output = "error", "rtorrent.error.log"

log.open_file = "rtorrent.warn.log", (cat,/share/Download/rtorrent/logs/rtorrent.warn.log)
log.add_output = "warn", "rtorrent.warn.log"

log.execute = /share/Download/rtorrent/logs/rtorrent.execute.log

';
	$Data = $Data1 . $Data_schedule . $Data2; 
 
	fwrite($Handle, $Data); 
	fclose($Handle); 

    $File2 = "/usr/bin/rtorrent/etc/rtorrent.port"; 
    $Handle2 = fopen($File2, 'w');
    $DataRT = 'CONFIG_RT_PORT=' . $port_range_low . '
UPNP_MAIN=' . $upnp_main .'
UPNP_HTTP=' . $upnp_http;
    fwrite($Handle2, $DataRT);
    fclose($Handle2);


    exec("/usr/bin/rtorrent/bin/lighttpd-setpw.sh $user $pass");

}

?>