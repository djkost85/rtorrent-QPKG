#!/bin/sh
#================================================================
# Copyright (C) 2008 QNAP Systems, Inc.
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
# 
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#----------------------------------------------------------------
#
# install.sh
#
#              -- Well nothing to write :) uhm, or maybe...
#              -- !! Bla bla bla :p
#
# rtorrent install program written by: Ken and Silas @ QNAP
# 
#================================================================

##### Util #####
CMD_CHMOD="/bin/chmod"
CMD_CHOWN="/bin/chown"
CMD_CHROOT="/usr/sbin/chroot"
CMD_CP="/bin/cp"
CMD_CUT="/bin/cut"
CMD_ECHO="/bin/echo"
CMD_GETCFG="/sbin/getcfg"
CMD_GREP="/bin/grep"
CMD_IFCONFIG="/sbin/ifconfig"
CMD_LN="/bin/ln"
CMD_MKDIR="/bin/mkdir"
CMD_MV="/bin/mv"
CMD_READLINK="/usr/bin/readlink"
CMD_RM="/bin/rm"
CMD_SED="/bin/sed"
CMD_SETCFG="/sbin/setcfg"
CMD_SLEEP="/bin/sleep"
CMD_SYNC="/bin/sync"
CMD_TAR="/bin/tar"
CMD_TOUCH="/bin/touch"
CMD_WLOG="/sbin/write_log"

##### System #####
UPDATE_PROCESS="/tmp/update_process"
UPDATE_PB=0
UPDATE_P1=1
UPDATE_P2=2
UPDATE_PE=3
SYS_HOSTNAME=`/bin/hostname`
SYS_IP=`$CMD_IFCONFIG eth0 | $CMD_GREP "inet addr" | $CMD_CUT -f 2 -d ':' | $CMD_CUT -f 1 -d ' '`
#SYS_IP=`$CMD_GREP "${SYS_HOSTNAME}" /etc/hosts | $CMD_CUT -f 1`
SYS_CONFIG_DIR="/etc/config" #put the configuration files here
SYS_INIT_DIR="/etc/init.d"
SYS_rcS_DIR="/etc/rcS.d/"
SYS_rcK_DIR="/etc/rcK.d/"
SYS_QPKG_CONFIG_FILE="/etc/config/qpkg.conf" #qpkg infomation file
SYS_QPKG_CONF_FIELD_QPKGFILE="QPKG_File"
SYS_QPKG_CONF_FIELD_NAME="Name"
SYS_QPKG_CONF_FIELD_VERSION="Version"
SYS_QPKG_CONF_FIELD_ENABLE="Enable"
SYS_QPKG_CONF_FIELD_DATE="Date"
SYS_QPKG_CONF_FIELD_SHELL="Shell"
SYS_QPKG_CONF_FIELD_INSTALL_PATH="Install_Path"
SYS_QPKG_CONF_FIELD_CONFIG_PATH="Config_Path"
SYS_QPKG_CONF_FIELD_WEBUI="WebUI"
SYS_QPKG_CONF_FIELD_WEBPORT="Web_Port"
SYS_QPKG_CONF_FIELD_SERVICEPORT="Service_Port"
SYS_QPKG_CONF_FIELD_SERVICE_PIDFILE="Pid_File"
SYS_QPKG_CONF_FIELD_AUTHOR="Author"

##### QPKG #####
# please modify or fill up the following items
#Name of auther or maintainer
QPKG_AUTHOR="Silas Mariusz Grzybacz"
#The directioy where the .tgz file is. (Don't modify this field unless it's necessary.) 
QPKG_SOURCE_DIR="."
#.qpkg file name
QPKG_QPKG_FILE="rtorrent.qpkg"
#Name of the tgz file containing programs/scripts of the package 
QPKG_SOURCE_FILE="rtorrent.rootfs.tar.gz"
#Name of the add-on/package
QPKG_NAME="rtorrent"
QPKG_ALTNAME="rtorrent"
#Version of the add-on/package
QPKG_VER="0.9.3-b0807"
#for rcS and rcK 
QPKG_RC_NUM="101" #(It's usually no need to modify this field.) 
#Port number of the web interface (leave it blank if there was no web interface included in this add-on/package.)
QPKG_WEB_PORT="6009"
#Service port number(leave it blank if this add-on/package had no service port.)
QPKG_SERVICE_PORT=""
#Relative URL path of the web interface of this add-on/package
QPKG_WEBUI="/"
#Where the programs/scripts of this add-on/package to be extracted
QPKG_INSTALL_PATH=""
QPKG_CONFIG_PATH="/usr/bin/rtorrent"
#Where the programs/scripts of this add-on/package is
QPKG_DIR=""
#The start/stop script
QPKG_SERVICE_PROGRAM="rtorrent.sh"
#The start/stop script to be run in chroot mode
QPKG_SERVICE_PROGRAM_CHROOT=""
#The service pid file generated by the service (leave it blank if this add-on/package had no service pid file.)
QPKG_SERVICE_PIDFILE="/var/run/rtorrent-httpsd.pid"
#The directioy of configuration files for the add-on/package. It will be removed during (re)installation.
#QPKG_CONFIG_DIR=$QPKG_CONFIG_PATH
#Path of the root file system with libc2.3.6
QPKG_ROOTFS=""
#leave this field blank
QPKG_INSTALL_MSG=""
QPKG_BASE=""
#####	Func ######

find_base(){
# Determine BASE installation location according to smb.conf

publicdir=`/sbin/getcfg Public path -f /etc/config/smb.conf`
if [ ! -z $publicdir ] && [ -d $publicdir ];then
	publicdirp1=`/bin/echo $publicdir | /bin/cut -d "/" -f 2`
	publicdirp2=`/bin/echo $publicdir | /bin/cut -d "/" -f 3`
	publicdirp3=`/bin/echo $publicdir | /bin/cut -d "/" -f 4`
	if [ ! -z $publicdirp1 ] && [ ! -z $publicdirp2 ] && [ ! -z $publicdirp3 ]; then
		[ -d "/${publicdirp1}/${publicdirp2}/Public" ] && QPKG_BASE="/${publicdirp1}/${publicdirp2}"
	fi
fi

# Determine BASE installation location by checking where the Public folder is.
if [ -z $QPKG_BASE ]; then
	for datadirtest in /share/HDA_DATA /share/HDB_DATA /share/HDC_DATA /share/HDD_DATA /share/HDE_DATA /share/HDF_DATA /share/HDG_DATA /share/HDH_DATA /share/MD0_DATA; do
		[ -d $datadirtest/Public ] && QPKG_BASE="/${publicdirp1}/${publicdirp2}"
	done
fi
if [ -z $QPKG_BASE ] ; then
	echo "The Public share not found."
	_exit 1
fi

#echo ${QPKG_BASE}
#$CMD_MKDIR -p ${QPKG_BASE}/.qpkg
}

_exit(){
	local ret=0

	case $1 in
		0)#normal exit
			ret=0
			if [ "x$QPKG_INSTALL_MSG" != "x" ]; then
				$CMD_WLOG "${QPKG_INSTALL_MSG}" 4
			else
				$CMD_WLOG "${QPKG_NAME} ${QPKG_VER} installation succeeded." 4
			fi
			$CMD_ECHO "$UPDATE_PE" > ${UPDATE_PROCESS}
			;;
		*)
			ret=1
			if [ "x$QPKG_INSTALL_MSG" != "x" ];then
				$CMD_WLOG "${QPKG_INSTALL_MSG}" 1
			else
				$CMD_WLOG "${QPKG_NAME} ${QPKG_VER} installation failed" 1
			fi
			$CMD_ECHO -1 > ${UPDATE_PROCESS}
			;;
	esac

	exit $ret
}

copy_qpkg_icons()
{
	${CMD_RM} -rf /home/httpd/RSS/images/${QPKG_NAME}.gif; ${CMD_CP} -af ${QPKG_DIR}/.qpkg_icon.gif /home/httpd/RSS/images/${QPKG_NAME}.gif
	${CMD_RM} -rf /home/httpd/RSS/images/${QPKG_NAME}_80.gif; ${CMD_CP} -af ${QPKG_DIR}/.qpkg_icon_80.gif /home/httpd/RSS/images/${QPKG_NAME}_80.gif
	${CMD_RM} -rf /home/httpd/RSS/images/${QPKG_NAME}_gray.gif; ${CMD_CP} -af ${QPKG_DIR}/.qpkg_icon_gray.gif /home/httpd/RSS/images/${QPKG_NAME}_gray.gif
}

install()
{
	find_base
	QPKG_INSTALL_PATH="${QPKG_BASE}/.qpkg"
	QPKG_DIR="${QPKG_INSTALL_PATH}/${QPKG_ALTNAME}"
	#QPKG_CONFIG_PATH="${QPKG_DIR}/root/.rtorrent"
	QPKG_CONFIG_DIR="${QPKG_CONFIG_PATH}"
	
	
	if [ -f "${QPKG_SOURCE_DIR}/${QPKG_SOURCE_FILE}" ]; then
		if [ -d ${QPKG_DIR} ] || [ -d ${QPKG_CONFIG_DIR} ]; then
			QPKG_INSTALL_MSG="${QPKG_NAME} ${QPKG_VER} is already installed. ${QPKG_DIR} or ${QPKG_CONFIG_DIR} exist. Please remove it first."
			$CMD_ECHO "$QPKG_INSTALL_MSG"
			_exit 1
		fi

# make directories
		[ ! -d ${QPKG_DIR} ] || $CMD_RM -rf ${QPKG_DIR}
		$CMD_MKDIR -p ${QPKG_DIR}
#install QPKG files 
		$CMD_TAR -xzf "${QPKG_SOURCE_DIR}/${QPKG_SOURCE_FILE}" -C ${QPKG_DIR}
		if [ $? = 0 ]; then
			copy_qpkg_icons
			$CMD_CHMOD 755 ${QPKG_DIR}/bin/rtorrent
			$CMD_CHMOD 755 ${QPKG_DIR}/bin/php
			$CMD_CHMOD 755 ${QPKG_DIR}/sbin/lighttpd
			$CMD_CHMOD 755 ${QPKG_DIR}/${QPKG_SERVICE_PROGRAM}
			$CMD_ECHO "$UPDATE_P2" > ${UPDATE_PROCESS}
		else
			QPKG_INSTALL_MSG="${QPKG_NAME} ${QPKG_VER} installation failed. ${QPKG_SOURCE_DIR}/${QPKG_SOURCE_FILE} file error."
			$CMD_ECHO "$QPKG_INSTALL_MSG"
			_exit 1
		fi
		
#		$CMD_CHMOD 755 "${QPKG_DIR}/root/.rtorrent/www/rtgui"
#		if [ -d /share/Qweb/rtgui ]; then
#		  $CMD_RM -r /share/Qweb/rtgui
#		fi
#		$CMD_MV -f ${QPKG_DIR}/root/.rtorrent/www/rtgui /share/Qweb

#		$CMD_CHMOD 755 "${QPKG_DIR}/root/.rtorrent/www/wTorrent"
#		if [ -d /share/Qweb/wTorrent ]; then
#		  $CMD_RM -r /share/Qweb/wTorrent
#		fi
#		$CMD_MV -f ${QPKG_DIR}/root/.rtorrent/www/wTorrent /share/Qweb
		
#link service start/stop script
		if [ "x${QPKG_SERVICE_PROGRAM}" != "x" ]; then
			$CMD_ECHO "Link service start/stop script: ${SYS_INIT_DIR}/${QPKG_SERVICE_PROGRAM}"
			$CMD_LN -sf "${QPKG_DIR}/${QPKG_SERVICE_PROGRAM}" "${SYS_INIT_DIR}/${QPKG_SERVICE_PROGRAM}"
			$CMD_LN -sf "${SYS_INIT_DIR}/${QPKG_SERVICE_PROGRAM}" "${SYS_rcS_DIR}/QS${QPKG_RC_NUM}${QPKG_NAME}"
			$CMD_LN -sf "${SYS_INIT_DIR}/${QPKG_SERVICE_PROGRAM}" "${SYS_rcK_DIR}/QK${QPKG_RC_NUM}${QPKG_NAME}"
		fi
		
#set QPKG information to $SYS_QPKG_CONFIG_FILE
		$CMD_ECHO "Set QPKG information to $SYS_QPKG_CONFIG_FILE"
		[ -f ${SYS_QPKG_CONFIG_FILE} ] || $CMD_TOUCH ${SYS_QPKG_CONFIG_FILE}
		$CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_NAME} "${QPKG_NAME}" -f ${SYS_QPKG_CONFIG_FILE}
		$CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_VERSION} "${QPKG_VER}" -f ${SYS_QPKG_CONFIG_FILE}
		
		#default value to activate(or not) your QPKG if it was a service/daemon
		$CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_ENABLE} "UNKNOWN" -f ${SYS_QPKG_CONFIG_FILE}

		#set the qpkg file name
		[ "x${SYS_QPKG_CONF_FIELD_QPKGFILE}" = "x" ] && $CMD_ECHO "Warning: ${SYS_QPKG_CONF_FIELD_QPKGFILE} is not specified!!"
		[ "x${SYS_QPKG_CONF_FIELD_QPKGFILE}" = "x" ] || $CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_QPKGFILE} "${QPKG_QPKG_FILE}" -f ${SYS_QPKG_CONFIG_FILE}
		
		#set the date of installation
		$CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_DATE} `date +%F` -f ${SYS_QPKG_CONFIG_FILE}
		
		#set the path of start/stop shell script
		[ "x${QPKG_SERVICE_PROGRAM}" = "x" ] || $CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_SHELL} "${QPKG_DIR}/${QPKG_SERVICE_PROGRAM}" -f ${SYS_QPKG_CONFIG_FILE}
		
		#set path where the QPKG installed, should be a directory
		$CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_INSTALL_PATH} "${QPKG_DIR}" -f ${SYS_QPKG_CONFIG_FILE}

		#set path where the QPKG configure directory/file is
		[ "x${QPKG_CONFIG_PATH}" = "x" ] || $CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_CONFIG_PATH} "${QPKG_CONFIG_PATH}" -f ${SYS_QPKG_CONFIG_FILE}
		
		#set the port number if your QPKG was a service/daemon and needed a port to run.
		[ "x${QPKG_SERVICE_PORT}" = "x" ] || $CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_SERVICEPORT} "${QPKG_SERVICE_PORT}" -f ${SYS_QPKG_CONFIG_FILE}

		#set the port number if your QPKG was a service/daemon and needed a port to run.
		[ "x${QPKG_WEB_PORT}" = "x" ] || $CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_WEBPORT} "${QPKG_WEB_PORT}" -f ${SYS_QPKG_CONFIG_FILE}

		#set the URL of your QPKG Web UI if existed.
		[ "x${QPKG_WEBUI}" = "x" ] || $CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_WEBUI} "${QPKG_WEBUI}" -f ${SYS_QPKG_CONFIG_FILE}

		#set the pid file path if your QPKG was a service/daemon and automatically created a pidfile while running.
		[ "x${QPKG_SERVICE_PIDFILE}" = "x" ] || $CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_SERVICE_PIDFILE} "${QPKG_SERVICE_PIDFILE}" -f ${SYS_QPKG_CONFIG_FILE}

		#Sign up
		[ "x${QPKG_AUTHOR}" = "x" ] && $CMD_ECHO "Warning: ${SYS_QPKG_CONF_FIELD_AUTHOR} is not specified!!"
		[ "x${QPKG_AUTHOR}" = "x" ] || $CMD_SETCFG ${QPKG_NAME} ${SYS_QPKG_CONF_FIELD_AUTHOR} "${QPKG_AUTHOR}" -f ${SYS_QPKG_CONFIG_FILE}
		
		$CMD_SYNC
		QPKG_INSTALL_MSG="${QPKG_NAME} ${QPKG_VER} has been installed in $QPKG_DIR."
		$CMD_ECHO "$QPKG_INSTALL_MSG"
		
		${SYS_INIT_DIR}/${QPKG_SERVICE_PROGRAM} enable
		${SYS_INIT_DIR}/${QPKG_SERVICE_PROGRAM} start
		_exit 0
	else
		QPKG_INSTALL_MSG="${QPKG_NAME} ${QPKG_VER} installation failed. ${QPKG_SOURCE_DIR}/${QPKG_SOURCE_FILE} file not found."
		$CMD_ECHO "$QPKG_INSTALL_MSG"
		_exit 1		
	fi
}

##### Main #####

$CMD_ECHO "$UPDATE_PB" > ${UPDATE_PROCESS}
#stop rtorrent first if rtorrent.sh existed.
[ -f /etc/init.d/rtorrent.sh ] && /etc/init.d/rtorrent.sh stop
$CMD_SLEEP 1
$CMD_SYNC
install
