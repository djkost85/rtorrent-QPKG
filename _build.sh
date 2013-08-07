#!/bin/sh
#================================================================
# rtorrent build script (c) 2008-2013 Silas Mariusz Grzybacz
#================================================================

dummy(){
	local _f=$1
	[ -f "$_f" ] && rm "$_f"
	touch "$_f"
	x=0;
	while [ $x -lt 10 ];
	do
		echo "." >> "$_f";
		x=`expr $x + 1`;
	done;
}

# cleanup from old QPKGs
[ ! -d "_build" ] && mkdir -p _build
rm -f _build/*
dummy "_build/dummy"

rm -rf  share/man share/info \
	share/gtk-doc \
	share/doc \
	share/devhelp \
	share/openssl/man \
	share/t1lib/doc \
	perl/html \
	perl/site/man

cd share/GeoIP
./download.sh
cd ../..

echo "  Step 1/3"
tar -cf rtorrent.rootfs.tar .qpkg_icon.gif .qpkg_icon_80.gif .qpkg_icon_80_gray.gif .qpkg_icon_gray.gif .qpx_motd.asc README.md \
				_build _build.sh _qpkg qpx bin com emacs etc home lib libexec locale package perl python \
				root sbin share usr var control rtorrent.sh

echo "  Step 2/3 (this may take a while...)"
gzip -9 rtorrent.rootfs.tar

mv rtorrent.rootfs.tar.gz _qpkg/install
cd _qpkg/install

echo "  Step 3/3"
tar -czf rtorrent_0.9.3.tgz qinstall.sh rtorrent.rootfs.tar.gz

mv rtorrent_0.9.3.tgz ../qpkg
cd ../qpkg

echo "  Building..."
./qpkg_build_QNAP.sh rtorrent rtorrent_0.9.3.tgz built-in.sh -f QNAPQPKG -v 0.9.3

# move QPKGs to output directory
mv *.qpkg ../../_build
cd ../..

qpkg=`ls _build/*.qpkg`
echo "
--------------------------------------------------------------------------------
  Done!
--------------------------------------------------------------------------------
  Output: _build/$qpkg
--------------------------------------------------------------------------------
"
rm _qpkg/install/rtorrent.rootfs.tar.gz
rm _qpkg/qpkg/rtorrent_0.9.3.tgz
