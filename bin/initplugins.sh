#!/usr/bin/rtorrent/bin/bash

export PATH="/usr/bin/rtorrent/bin:/usr/bin/rtorrent/sbin"
export LD_LIBRARY_PATH="/usr/bin/rtorrent/lib"
/usr/bin/rtorrent/bin/php /usr/bin/rtorrent/var/www/ui/rtorrent/php/initplugins.php
exit $?


