#!/bin/sh

args="$@"

if [ "x$args" == "x" ]; then
	_msg="Update description un'def"
else
	_msg="$@"
fi

export LD_LIBRARY_PATH=""

git config --global user.email "silas@syndicat.pl"

#git init
git add .qpkg_icon.gif .qpkg_icon_80.gif .qpkg_icon_80_gray.gif .qpkg_icon_gray.gif .qpx_motd.asc README.md \
	_build _build.sh _qpkg qpx bin com emacs etc home include info lib libexec locale package perl python \
	root sbin share usr var control rtorrent.sh _git-push.sh

git commit -m "$_msg"

#git remote add origin git@github.com:silasmariusz/rtorrent-QPKG.git
git push -u origin master
