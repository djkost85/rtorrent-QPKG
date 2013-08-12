/*                                                                -*- C -*-
   +----------------------------------------------------------------------+
   | PHP Version 5                                                        |
   +----------------------------------------------------------------------+
   | Copyright (c) 1997-2007 The PHP Group                                |
   +----------------------------------------------------------------------+
   | This source file is subject to version 3.01 of the PHP license,      |
   | that is bundled with this package in the file LICENSE, and is        |
   | available through the world-wide-web at the following url:           |
   | http://www.php.net/license/3_01.txt                                  |
   | If you did not receive a copy of the PHP license and are unable to   |
   | obtain it through the world-wide-web, please send a note to          |
   | license@php.net so we can mail you a copy immediately.               |
   +----------------------------------------------------------------------+
   | Author: Stig Sæther Bakken <ssb@php.net>                             |
   +----------------------------------------------------------------------+
*/

/* $Id: build-defs.h.in 292156 2009-12-15 11:17:47Z jani $ */

#define CONFIGURE_COMMAND " './configure'  '--prefix=/usr/bin/rtorrent' '--with-libdir=lib' '--includedir=/usr/bin/rtorrent/include' '--with-config-file-path=/usr/bin/rtorrent/etc/php5' '--with-config-file-scan-dir=/usr/bin/rtorrent/etc/php5/conf.d' '--with-layout=GNU' '--with-pear' '--enable-calendar' '--enable-sysvsem' '--enable-sysvshm' '--enable-sysvmsg' '--enable-bcmath' '--without-gdbm' '--with-iconv' '--enable-exif' '--enable-ftp' '--enable-mbstring' '--with-pcre-regex=/usr/bin/rtorrent' '--enable-shmop' '--enable-sockets' '--with-libxml-dir=/usr/bin/rtorrent' '--with-zlib' '--with-openssl=/usr/bin/rtorrent' '--enable-zip' '--with-mhash' '--without-mm' '--x-libraries=/usr/bin/rtorrent/lib' '--x-includes=/usr/bin/rtorrent/includes' '--with-mcrypt' '--with-xmlrpc' '--with-sqlite' '--enable-soap' '--with-kerberos=/usr/bin/rtorrent' '--enable-wddx' '--with-gettext' '--with-bz2' '--disable-debug' '--with-pic' '--with-regex=php' '--disable-posix' '--enable-ctype' '--with-zlib-dir=/usr/bin/rtorrent' '--enable-dba' '--enable-dom' '--enable-xml' '--enable-xmlreader' '--enable-rpath' '--enable-cli' '--enable-cgi' '--enable-static'"
#define PHP_ADA_INCLUDE		""
#define PHP_ADA_LFLAGS		""
#define PHP_ADA_LIBS		""
#define PHP_APACHE_INCLUDE	""
#define PHP_APACHE_TARGET	""
#define PHP_FHTTPD_INCLUDE      ""
#define PHP_FHTTPD_LIB          ""
#define PHP_FHTTPD_TARGET       ""
#define PHP_CFLAGS		"$(CFLAGS_CLEAN) -prefer-non-pic -static"
#define PHP_DBASE_LIB		""
#define PHP_BUILD_DEBUG		""
#define PHP_GDBM_INCLUDE	""
#define PHP_IBASE_INCLUDE	""
#define PHP_IBASE_LFLAGS	""
#define PHP_IBASE_LIBS		""
#define PHP_IFX_INCLUDE		""
#define PHP_IFX_LFLAGS		""
#define PHP_IFX_LIBS		""
#define PHP_INSTALL_IT		"@echo "Installing PHP CGI binary: $(INSTALL_ROOT)$(bindir)/"; $(INSTALL) -m 0755 $(SAPI_CGI_PATH) $(INSTALL_ROOT)$(bindir)/$(program_prefix)php-cgi$(program_suffix)$(EXEEXT)"
#define PHP_IODBC_INCLUDE	""
#define PHP_IODBC_LFLAGS	""
#define PHP_IODBC_LIBS		""
#define PHP_MSQL_INCLUDE	""
#define PHP_MSQL_LFLAGS		""
#define PHP_MSQL_LIBS		""
#define PHP_MYSQL_INCLUDE	""
#define PHP_MYSQL_LIBS		""
#define PHP_MYSQL_TYPE		""
#define PHP_ODBC_INCLUDE	""
#define PHP_ODBC_LFLAGS		""
#define PHP_ODBC_LIBS		""
#define PHP_ODBC_TYPE		""
#define PHP_OCI8_SHARED_LIBADD 	""
#define PHP_OCI8_DIR			""
#define PHP_OCI8_ORACLE_VERSION		""
#define PHP_ORACLE_SHARED_LIBADD 	"@ORACLE_SHARED_LIBADD@"
#define PHP_ORACLE_DIR				"@ORACLE_DIR@"
#define PHP_ORACLE_VERSION			"@ORACLE_VERSION@"
#define PHP_PGSQL_INCLUDE	""
#define PHP_PGSQL_LFLAGS	""
#define PHP_PGSQL_LIBS		""
#define PHP_PROG_SENDMAIL	"/usr/sbin/sendmail"
#define PHP_SOLID_INCLUDE	""
#define PHP_SOLID_LIBS		""
#define PHP_EMPRESS_INCLUDE	""
#define PHP_EMPRESS_LIBS	""
#define PHP_SYBASE_INCLUDE	""
#define PHP_SYBASE_LFLAGS	""
#define PHP_SYBASE_LIBS		""
#define PHP_DBM_TYPE		""
#define PHP_DBM_LIB		""
#define PHP_LDAP_LFLAGS		""
#define PHP_LDAP_INCLUDE	""
#define PHP_LDAP_LIBS		""
#define PHP_BIRDSTEP_INCLUDE     ""
#define PHP_BIRDSTEP_LIBS        ""
#define PEAR_INSTALLDIR         "/usr/bin/rtorrent/share/pear"
#define PHP_INCLUDE_PATH	".:/usr/bin/rtorrent/share/pear"
#define PHP_EXTENSION_DIR       "/usr/bin/rtorrent/lib/php/20090626"
#define PHP_PREFIX              "/usr/bin/rtorrent"
#define PHP_BINDIR              "/usr/bin/rtorrent/bin"
#define PHP_SBINDIR             "/usr/bin/rtorrent/sbin"
#define PHP_LIBDIR              "/usr/bin/rtorrent/lib/php"
#define PHP_DATADIR             "/usr/bin/rtorrent/share/php"
#define PHP_SYSCONFDIR          "/usr/bin/rtorrent/etc"
#define PHP_LOCALSTATEDIR       "/usr/bin/rtorrent/var"
#define PHP_CONFIG_FILE_PATH    "/usr/bin/rtorrent/etc/php5"
#define PHP_CONFIG_FILE_SCAN_DIR    "/usr/bin/rtorrent/etc/php5/conf.d"
#define PHP_SHLIB_SUFFIX        "so"
