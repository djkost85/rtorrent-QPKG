#!/bin/sh

#cd /usr/bin/rtorrent/share/GeoIP

[ -f "GeoIP.dat" ] && rm -f GeoIP.dat
wget http://geolite.maxmind.com/download/geoip/database/GeoLiteCountry/GeoIP.dat.gz
gzip -d GeoIP.dat.gz

[ -f "GeoLiteCity.dat" ] && rm -f GeoLiteCity.dat
wget http://geolite.maxmind.com/download/geoip/database/GeoLiteCity.dat.gz
gzip -d GeoLiteCity.dat.gz