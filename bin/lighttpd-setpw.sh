#!/bin/sh

if [ -z "$1" ] || [ -z "$2" ] || [ "x$1" == "x" ] || [ "x$2" == "x" ]; then
	echo "Usage: $0 [user] [password]"
	exit 1
fi

BINDIR=/usr/bin/rtorrent/bin
CFGDIR=/usr/bin/rtorrent/etc/lighttpd
PATH=$PATH:$BINDIR


${BINDIR}/lightdigest.sh -d -u $1 -f ${CFGDIR}/lighttpd.digest
${BINDIR}/lightdigest.sh -u $1 -r QPX -p "$2" -f ${CFGDIR}/lighttpd.digest

#echo "$1:$2"