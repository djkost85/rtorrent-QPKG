#!/bin/sh
#  2011/06/24  Silas, Mariusz Grzybacz
#  2004/08/22  K. Piche  Find missing library references.
ifs=$IFS
IFS=':'

#source /usr/bin/rtorrent/bin/rtorrent.env

export LD_LIBRARY_PATH="/usr/bin/rtorrent/lib"

bindirs="/usr/bin/rtorrent/bin:/usr/bin/rtorrent/sbin"
libdirs="/usr/bin/rtorrent/lib"
extras=

#  Check ELF binaries in the PATH and specified dir trees.
for tree in $bindirs $libdirs $extras
do
        echo DIR $tree

        #  Get list of files in tree.
        files=$(find $tree -type f)
        IFS=$ifs
        for i in $files
        do
                if [ `./file $i | grep -c 'ELF'` -ne 0 ]; then
                        #  Is an ELF binary.
                        if [ `ldd -r $i 2>/dev/null | grep -c 'not found'` -ne 0 ]; then
                                #  Missing lib.
                                echo "$i:"
                                ldd $i 2>/dev/null | grep 'not found'
                        fi
                        if [ `ldd -r $i 2>/dev/null | grep -c 'missing'` -ne 0 ]; then
                                #  Missing lib.
                                echo "$i:"
                                ldd $i 2>/dev/null | grep 'missing'
                        fi
                fi
        done
done

exit