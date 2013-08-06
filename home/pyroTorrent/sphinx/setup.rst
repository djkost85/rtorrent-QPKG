.. _introduction:

Setting up πϱTorrent
====================

Requirements
------------

πϱTorrent is written in Python. Aside from Python (2.6 or 2.7),
you'll need the following python packages, depending on your setup:

    -   flask (with all the dependencies, (werkzeug, jinja, etc)
    -   decorator

as well as rtorrent with XMLRPC support. πϱTorrent has only been tested on
GNU/Linux, so this would be an advantage as well.

.. TERRIBLE NAME vvvvvv

Deciding on your setup
----------------------

πϱTorrent supports two ways of connecting to rTorrent. Through a HTTPD (such
as `lighttpd <http://www.lighttpd.net/>`_ or directly via SCGI.

To run the web interface, πϱTorrent can either serve pages using a FastCGI-aware
HTTPD (`lighttpd`_, but also Apache and Nginx) or it can simply run it's
own built-in *basic* HTTPD. A professional HTTPD such as `lighttpd`_ is
recommended, but the built-in HTTPD works well if you don't need extreme
performance and is a lot easier to set up.

Now that all the option have been layed out, you have a few options.

HTTPD for everything
~~~~~~~~~~~~~~~~~~~~

This approach uses a professional-grade HTTPD for
everything: Serving web pages and providing a HTTP XMLRPC interface to rTorrent.

HTTPD for serving webpages, πϱTorrent for SCGI
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

This uses a HTTPD to serve πϱTorrent pages,
and uses πϱTorrent's direct SCGI capabilities to communicate with rTorrent.

πϱTorrent for everything (serving webpages and SCGI)
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

This uses πϱTorrent's built-in HTTPD to serve web pages and uses πϱTorrent's
direct SCGI ability to talk to rTorrent.

πϱTorrent for serving webpages, HTTPD for communication
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

This uses a HTTPD to talk to rTorrent, but use πϱTorrent's built-in HTTPD to
serve web pages.

Notes
~~~~~

Personally I suggest using a professional HTTPD (like `lighttpd`_) to serve
the pages and using πϱTorrent's direct SCGI capabilities to talk to rTorrent
directly over a unix socket file. But really, there's not a huge difference. If
you just want to try out pyroTorrent, the built-in HTTPD is fine.

Alternatively you can use `lighttpd`_'s SCGI capabilities to act as middle man
for the communication between rtorrent and πϱTorrent.
(πϱTorrent will then talk over HTTP using XMLRPC instead of SCGI)

Getting started
---------------

Throughout the entire setup manual we will make the following assumptions:

    -   You know your way around the terminal - at least a bit.
    -   You are smart enough to adjust exemplary paths to your own.

Our setup is as follows: (Compare it to your own, or how you will be wanting to
set it up)

    -   The *user* ``rtorrent`` runs ``rtorrent``.
    -   The *user* ``rtorrent`` has a folder called ``pyroTorrent`` in it's home
        directory, (*/home/rtorrent*) this is the directory containing the
        pyroTorrent source code.

Now, depending on your setup, you may or may not use a professional HTTPD:

    -   The HTTPD users and groups are *lighttpd* (at least in the lighttpd
        example)
    -   You know how to configure your HTTPD (lighttpd in our case); your
        webroot directory is assumed to be */var/www*. It doesn't matter to
        πϱTorrent but the examples use this directory.

AT ALL TIMES make sure you use the appropriate paths.

The setup process can be divided chronologically into a few parts:

    -   Configuring rTorrent.
    -   Configuring communication for rTorrent.
    -   Testing a basic πϱTorrent.
    -   Configuring how to serve the πϱTorrent webpages.

rTorrent configuration
----------------------

To communicate with rTorrent, rTorrent needs to expose a XMLRPC interface.
Most likely this feature is already compiled into your rTorrent, and you only
need to enable it.

SCGI
~~~~

In your *.rtorrent.rc* file, you need at least this line:

.. code-block:: bash

    scgi_local = /tmp/rtorrent.sock

Where */tmp/rtorrent.sock* is the path to the socket file rtorrent will
create for communication. If you want to use the HTTPD as a *middle man* for
communication, you'll need to make sure the socket is writable by the HTTPD as
well. An interesting problem is that you have to make it writable every time
you restart rTorrent. (or find a nice way to set up the permissions)

Or, if you prefer a network socket to a unix socket:

.. code-block:: bash

    scgi_port = localhost:5000

Although this is typically not the most safe way, as any local user can connect
to rTorrent now.

Encoding
~~~~~~~~

Having this option in your *.rtorrent.rc* is also recommended:

.. code-block:: bash

    encoding_list = UTF-8

to ensure all the encoding is in UTF-8.

Wrapping up
~~~~~~~~~~~

Restart rtorrent once you've changed the configuration.

If the socket file is created (and you're using the ``scgi_local`` option)
then you've set up your *.rtorrent.rc* correctly.

Now, don't forget to make it writable by the web server if you want to use the
HTTPD to communicate.

Further reading
~~~~~~~~~~~~~~~

rTorrent also has a page on how to `Set up XMLRPC
<http://libtorrent.rakshasa.no/wiki/RTorrentXMLRPCGuide>`_.

SCGI communication
------------------

If you are going to use πϱTorrent to directly to talk rTorrent instead of via
a HTTPD, you can skip this chapter.

Lighttpd
~~~~~~~~

Lighttpd is known to work well with πϱTorrent.

Setting up SCGI
```````````````

We need ``mod_scgi`` for the rtorrent <-> HTTPD connection.

We need to include ``mod_scgi``, so put this in your configuration file:

.. code-block:: lua

    server.modules += ("mod_scgi")

Add this to your configuration file:

.. code-block:: lua

        scgi.server = (
          "/RPC2" =>
                ( "127.0.0.1" =>
                  (
                  "socket" => "/home/rtorrent/rtorrentsock/rpc.socket",
                  "disable-time" => 0,
                  "check-local" => "disable"
                  )
                )
        )

Again, make notice of the path */home/rtorrent/rtorrentsock/rpc.socket* that you
set in `rTorrent configuration`_ (or, alternatively a host + port, have a look
at lighttpd's official documentation on how to set this up, it'll be very
similar)

Now we can test your SCGI setup. Don't forget to restart lighttpd to make sure
the configuration changes have been loaded.

Apache
~~~~~~

TODO.

Nginx
~~~~~

TODO.

Testing SCGI
------------

Onto the testing of the communication.
πϱTorrent offers a little test file called ``test.py``:

.. code-block:: python

    from model.rtorrent import RTorrent
    import socket
    import sys

    from config import rtorrent_config
    from lib.config_parser import parse_config_part, RTorrentConfigException

    targets = []
    for x in rtorrent_config:
        try:
            info = parse_config_part(rtorrent_config[x], x)
        except RTorrentConfigException, e:
            print 'Invalid config: ', e
            sys.exit(1)

        targets.append(info)

    for x in targets:
        r = RTorrent(x)

        try:
            print '[', x['name'], '] libTorrent version:', r.get_libtorrent_version()
        except socket.error, e:
            print 'Failed to connect to libTorrent:', str(e)

Which should return your rTorrent version on success, and otherwise will tell
you what went wrong. However, we cannot yet test our connection with πϱTorrent
since we did not yet create a basic πϱTorrent configuration file.
See `Basic πϱTorrent configuration`_ on how to do this.

Once you've done this, verify that πϱTorrent works:

.. code-block:: bash

    $ python test.py
    [ sheeva ] libTorrent version: 0.12.6

Serving webpages
----------------

To actually view any content, we still need to set up the page serving.

Using the built-in HTTPD
~~~~~~~~~~~~~~~~~~~~~~~~

Anyway, you'll typically have to select that you want to use the built-in HTTPD
in the config file, and just run ``πϱtorrent.py``.

To enable the built-in HTTPD, make sure the value ``USE_OWN_HTTPD`` in
``config.py`` is set to ``True``:

.. code-block:: python

    USE_OWN_HTTPD = True

Lighttpd
~~~~~~~~

Serving the webpages with `lighttpd`_ is recommended, as it has recieved a lot
more testing than the built-in HTTPD, along with many other reasons.
It is however, more complicated to set up.

Setting up FCGI
```````````````

We need to include ``mod_fastcgi``, so put this in your configuration file:

.. code-block:: lua

    server.modules += ("mod_fastcgi")

Somewhere on top, but below the *server.modules =* line, (or just add it to your
standard set of modules). In some cases a mod_fastcgi.conf file is shipped with
your distribution instead. You can use this file by including it, but make sure
it doesn't do any weird stuff like set up PHP. (Who would want that anyway?)

.. code-block:: lua

    include "mod_fastcgi.conf"

There. Now we should have fastcgi support for lighttpd. If this went too fast,
have a look at the lighttpd documentation.

Setting up FCGI to talk to πϱTorrent
````````````````````````````````````

This is the tricky part. You'll need to ensure that a couple of things work:

    -   An empty file is required in your document root to prevent 404's before
        the FCGI contact is made.
    -   You have the appropriate *rewrite-once* rule.
    -   You have the correct *fastcgi.server* line.

.. code-block:: lua

    url.rewrite-once = (
             "^/torrent(/.*)?$" => "torrent.tfcgi"
    )

    fastcgi.server += ( ".tfcgi" =>
       ( "torrentfcgi" =>
         (
             "socket"        => "/tmp/torrent.sock-1",
             "docroot"       => "/home/rtorrent/pyrotorrent"
         )
       )
     )

And don't forget to create the empty file:

.. code-block:: lua

    touch /var/www/torrent.tfcgi

Where */var/www* is my *var.basedir* in the lighttpd configuration file.

Using spawn-fcgi
````````````````

To spawn an instance of πϱTorrent, we use the program called *spawn-fcgi*.
It's probably in your package manager; install it. Run the following command as
root, obviously again adjust whatever parameters you need to adjust.

.. code-block:: bash

    /usr/bin/spawn-fcgi /home/rtorrent/pyrotorrent/pyrotorrent.py \
    -s /tmp/torrent.sock-1 \
    -u lighttpd -g lighttpd \
    -d /home/rtorrent/pyrotorrent/

Where the socket path is defined by *-s*, the user and group of the pid
are set with *-u* and *-g*, and finally, the directory to change to is
defined by *-d*.

Now that you've spawned a πϱTorrent process, let's check that it's still
alive:

.. code-block:: bash

    # ps xua  | grep python
    lighttpd 31639 84.5  1.6  12276  8372 ?        Rs   19:57   0:01    /usr/bin/python2.6 /home/rtorrent/pyrotorrent/pyrotorrent.py


πϱTorrent configuration
-----------------------


The πϱTorrent configuration file is trivial.

Basic πϱTorrent configuration
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

A basic configuration file (just enough for the famous ``test.py``) looks like
this:

.. code-block:: python

    ## Exemplary SCGI setup using unix socket
    #rtorrent_config = {
    #   'sheeva': {
    #        'scgi' : {
    #            'unix-socket' : '/tmp/rtorrent.sock'
    #        }
    #    }
    #}
    #
    ## Exemplary SCGI setup using scgi over network
    #rtorrent_config = {
    #    'sheeva': {
    #        'scgi' : {
    #            'host' : '192.168.1.70',
    #            'port' : 80
    #        }
    #    }
    #}

    # Exemplary HTTP setup using remote XMLRPC server. (SCGI is handled by the HTTPD
    # in this case)
    rtorrent_config = {
        'sheeva' : {
            'http' : {
                'host' : '192.168.1.70',
                'port' : 80,
                'url'  : '/RPC2',
            }
        }
    }


With examples for all of the three communication methods, uncomment the one you
want to use and comment the other ones. (And make sure you adjust the
information such as host, port or path)

πϱTorrent configuration for webpages
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

To actually serve webpages over FCGI, we need to extend the configuration file a
bit:

.. code-block:: python

    # Place all your globals here

    # Base URL for your HTTP website
    BASE_URL = '/torrent'
    # HTTP URL for the static files
    STATIC_URL = BASE_URL + '/static'

    # Use built-in HTTPD?
    USE_OWN_HTTPD = False

    # Default background
    BACKGROUND_IMAGE = 'cat.jpg'

    USE_AUTH = True

    torrent_users = {
        'USER NAME' : {
            'targets' : ['sheeva', 'sheevareborn'],
            'background-image' : 'space1.png',
            'password' : 'FILL IN PASSWORD'
        }
    }

    ## Exemplary SCGI setup using unix socket
    #rtorrent_config = {
    #    'sheeva' : {
    #        'scgi' : {
    #            'unix-socket' : '/tmp/rtorrent.sock'
    #        }
    #    }
    #}
    #
    ## Exemplary SCGI setup using scgi over network
    #rtorrent_config = {
    #    'sheeva' : {
    #        'scgi' : {
    #            'host' : '192.168.1.70',
    #            'port' : 80
    #        }
    #    }
    #}

    # Exemplary HTTP setup using remote XMLRPC server. (SCGI is handled by the HTTPD
    # in this case)
    rtorrent_config = {
        'sheeva' : {
            'http' : {
                'host' : '192.168.1.70',
                'port' : 80,
                'url'  : '/RPC2',
            }
        }
        ,
        'sheevareborn' : {
            'http' : {
                'host' : '42.42.42.42',
                'port' : 80,
                'url'  : '/RPC2',
            }
        }
    }


Make sure the *BASE_URL* matches the URL you set in your HTTPD setup.

πϱTorrent configuration for serving downloaded files
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

πϱTorrent can also act as direct download server for torrent files.
Upon clicking on a torrent you will be presented with a list of files
contained by that torrent. With the configuration below, the files will become
clickable as well, upon which you will be offered to download the file.

.. code-block:: python

    # Example configuration with file downloading enabled
    rtorrent_config = {
        'woensdag' : {
            'http' : {
                'host' : '127.0.0.1',
                'port' : 8080,
                'url'  : '/RPC2',
            },
            'storage_mode' : {
                'local_path' : '/home/torrent/woensdag',
                'remote_path' : '/home/rtorrent'
            }
        }

As you can see, the rtorrent entry ``woensdag`` has an extra ``storage_mode``
property. There are currently 2 possible ways of configuring downloads.

    1.  rtorrent runs on the same machine as πϱTorrent 

    2.  rtorrent runs on another machine, but πϱTorrent can access this
        machine's filesystem through a mounted directory.

local setup
```````````

As you no doubt have guessed, the configuration above is the remote setup.
To configure a locally running rtorrent simply drop the ``remote_path``
from the configuration, and set the ``local_path`` property to ``/``.

remote setup
````````````

In this configuration ``local_path`` represents the path to the local
mount point. ``remote_path`` is the path on the remote host running
rtorrent, mounted by the local machine.
To summerize, in the above configuration we have mounted the remote directory
``/home/rtorrent`` on the local directory ``/home/torrent/woensdag``

When you're done
----------------

Congratulations. (Some stuff here on what to do if you ran into problems, and
also hint that people can now start looking at the code to add features, or how
to request features)

Oh, and enjoy πϱTorrent.
