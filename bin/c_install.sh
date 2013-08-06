#!/bin/sh

source /usr/bin/rtorrent/bin/rtorrent.env

### CODE HERE ###

if [ "$1" == "" ] || [ "$2" == "" ]; then
    echo "Run: $0 [host] [port]" 
    exit 1
fi

/${RT_INSTALLDIR}/bin/openssl s_client -connect $1:$2 </dev/null 2>/dev/null | /bin/sed -n '/BEGIN CERTIFICATE/,/END CERTIFICATE/p' > ${RT_CERTS}/${2}.${1}.pem

if [ -s "${RT_CERTS}/${2}.${1}.pem" ]; then
    /${RT_INSTALLDIR}/bin/c_rehash > ${RT_CERTS_LOG}
else
    rm -f "${RT_CERTS}/${2}.${1}.pem"
    echo "Cannot download certificate.";
    exit 1
fi

/${RT_INSTALLDIR}/bin/curl -I --capath ${RT_CERTS} https://${1}:{$2}

exit $?