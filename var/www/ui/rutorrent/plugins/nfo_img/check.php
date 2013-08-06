<?php

/*
 *
 * nfo_img
 *
 * A plugin for RuTorrent
 * Creates images from .nfo files
 *
 * (c)2011 Kitty @ kitty-kode
 *
 * Version 1.1
 *
 * Licence - Creative Commons Attribution-NonCommercial-ShareAlike 3.0
 *           CC BY-NC-SA - http://creativecommons.org/licenses/by-nc-sa/3.0/
 * 
 * See get_img.php for changelog
 *
 */

require_once('../../php/settings.php');
require_once('../../php/rtorrent.php');

if(!isset($_GET['id']) || empty($_GET['id'])) {
	echo "error:no torrent ID";
}

echo checkNfo($_GET['id']);

exit;

function checkNfo($torrentID) {
	$req = new rXMLRPCRequest(array(new rXMLRPCCommand("d.get_base_path", $torrentID)));
	if(!$req->success()) {
		return "error:xmlrpc request failed";
	}
	$dir = $req->val[0];
	if(!$h = @opendir($dir)) {
		return "error:can't read directory";
	}
	while(($file = @readdir($h)) !== false) {
		if(preg_match("/\.nfo$/i", $file)) {
			return $torrentID;
		}
	}
	return "not_found";
}

?>
