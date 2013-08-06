<?PHP

/*
 * nfo_img
 *
 * A plugin for RuTorrent
 * Creates images from .nfo files
 *
 * (c)2011 Kitty [kitty-kode]
 * 
 * Version 1.1
 *
 * Licence - Creative Commons Attribution-NonCommercial-ShareAlike 3.0
 *			  CC BY-NC-SA - http://creativecommons.org/licenses/by-nc-sa/3.0/
 *
 * Changes
 * 1.1 - 20110407
 * 	Added 'Save image...' button
 * 	Enabled right-click in init.js (thanks Novik!)
 * 	General tidy up and better error handling/reporting
 */

require_once('../../php/settings.php');
require_once('../../php/rtorrent.php');
require_once('./config.php');

$nfo = '';
$torrentID = '';
$nfoInfo = array();

// Got a torrent ID?
if(!isset($_GET['id']) || empty($_GET['id'])) {
	$_GET['id'] = false;
}

$torrentID = $_GET['id'];

$nfoInfo = getInfo($torrentID);

$nfo =& $nfoInfo['nfo'];

// Got a font file we can read?
if(!@is_readable($fontfile)) {
	die("Can't read font file");
}

if(!preg_match('/^.*-(\d*)x(\d*)\.([^\.]*$)/', $fontfile, $matches)) {
	die("Can't determine font size or file format");
}
$fontX = $matches[1];
$fontY = $matches[2];
$fontType = $matches[3];

switch(strtolower($fontType)) {
	case 'png' : {
		$font = @imagecreatefrompng($fontfile);
		break;
	}
	case 'gif' : {
		$font = @imagecreatefromgif($fontfile);
		break;
	}
	case 'jpg' : {
		$font = @imagecreatefromjpeg($fontfile);
		break;
	}
}

if(!$font) {
	die("Failed to create font image");
}

// Tidy up DOS/Windows line endings
$nfo = str_replace("\r\n", "\n", $nfo);

// Make an array
$nfo = explode("\n", $nfo);

// Work out the max line length
$linelength = getLongestLine($nfo);

// How many lines?
$linecount = count($nfo);

// Image dimensions
$imgWidth = ($fontX * $linelength);
$imgHeight =($fontY * $linecount) + ($fontY * 3);

// Make the base image
$img = imagecreate($imgWidth, $imgHeight);

// Allocate colours
$rgbBG = html2rgb($colourBG);
$rgbFG = html2rgb($colourFG);

$imgColourBG = imagecolorallocatealpha($img, $rgbBG['red'], $rgbBG['green'], $rgbBG['blue'], $rgbBG['alpha']);
$imgColourFG = imagecolorallocatealpha($img, $rgbFG['red'], $rgbFG['green'], $rgbFG['blue'], $rgbFG['alpha']);

// Useful numbers
$imgMaxX = $imgWidth - 1;
$imgMaxY = $imgHeight - 1 - ($fontY * 3);

// Fill the image
imagefill($img, 1, 1, $imgColourBG);

// Main image colours
if(!$ignoreColours) {
	// Convert the font colours
	$oldBG = imagecolorexact($font, 255, 255, 255);
	$oldFG = imagecolorexact($font, 0, 0, 0);
	imagecolorset($font, $oldBG, $rgbBG['red'], $rgbBG['green'], $rgbBG['blue']);
	imagecolorset($font, $oldFG, $rgbFG['red'], $rgbFG['green'], $rgbFG['blue']);
}


// Draw the nfo one character at a time
foreach($nfo as $lineNumber => $line) {
	foreach(str_split($line) as $charNumber => $char) {
		imagecopy($img, $font,
					($charNumber * $fontX), ($lineNumber * $fontY),
					(ord($char) % 16) * $fontX, ((int)(ord($char) / 16)) * $fontY,
					$fontX, $fontY);
	}
}
//foreach(str_split('[kitty-kode] nfo imager') as $charNumber => $char) {
//	imagecopymerge($img, $font,
//				$imgWidth - ((24 - $charNumber) * $fontX) - $fontX/2, $imgHeight - ($fontY * 2),
//				(ord($char) % 16) * $fontX, ((int)(ord($char) / 16)) * $fontY,
//				$fontX, $fontY, 35);
//}

// Are we saving it?
if(isset($_GET['save']) && $_GET['save'] == 'save') {
	// Send some headers to force a save dialog and suggest the name
	header('Content-Disposition: attachment; filename="'.$nfoInfo['file'].'.('.$nfoInfo['torrentName'].').png";');
	header('Content-Transfer-Encoding: binary');
}

// Send some common headers
// 30 seconds cache max-age should allow the user to save the image without re-requesting
header('Cache-Control: max-age=30, private, must-revalidate, post-check=30, pre-check=30');

// Finally!  It's time to spit the image at the user...
// What type do we want?
switch(strtolower($imageFormat)) {
	case 'gif' : {
		header('Content-type: image/gif');
		imagegif($img);
		break;
	}
	case 'jpg' : {
		header('Content-type: image/jpeg');
		imagejpeg($img);
		break;
	}
	default :
	case 'png' : {
		header('Content-type: image/png');
		imagepng($img);
		break;
	}
}

exit;

// All done

function getInfo($torrentID) {
	$info = array('nfo' => '',
					  'dir' => '',
					  'file' => '',
					  'torrentName' => getTorrentName($torrentID));
	if(!$torrentID) {
		$info['nfo'] = "\n Error!  No torrent ID received ";
		$info['file'] = 'error-no-id';
		return $info;
	}
	$req = new rXMLRPCRequest(array(new rXMLRPCCommand("d.get_base_path", $torrentID)));
	if(!$req->success()) {
		$info['nfo'] = "\n Error!  There was a problem with the xmlrpc request \n\n Possibly a bad torrent ID? \n\n ID passed = ".$torrentID." ";
		$info['file'] = 'error-xmlrpc-failed';
		return $info;
	}
	$info['dir'] = $req->val[0];
	if(!$h = @opendir($info['dir'])) {
		$info['nfo'] = "\n Error!  Can't open directory \n\n Directory requested = \n\n ".$info['dir']." ";
		$info['file'] = 'error-opendir-failed';
		return $info;
	}
	while(!$info['nfo'] && ($file = @readdir($h)) !== false) {
		if(preg_match("/\.nfo$/i", $file)) {
			$info['file'] = $file;
			$info['nfo'] = @file_get_contents($info['dir']."/".$file);
			if(!$info['nfo']) {
				$info['nfo'] = "\n  NFO file is empty or unreadable (has it downloaded?) ";
			}
		}
	}
	if(!$info['nfo']) {
		$info['nfo'] = "\n No NFO file found        ";
		$info['file'] = 'warn-nfo-not-found';
	}
	return $info;
}

function getTorrentName($torrentID) {
	$req = new rXMLRPCRequest(array(new rXMLRPCCommand("d.get_name", $torrentID)));
	if($req->success()) {
		return $req->val[0];
	}
	return $torrentID;
}

function getLongestLine($textArray) {
	$longest = 0;
	foreach($textArray as $thisLine) {
		$longest = (strlen($thisLine) > $longest ? strlen($thisLine) : $longest);
	}
	return $longest;
}

function html2rgb($colour) {
	// Convert HTML colour to RGB
	if(eregi("([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})", $colour, $colRGB)) {
		$red = hexdec($colRGB[1]);  $green = hexdec($colRGB[2]);  $blue = hexdec($colRGB[3]); $alpha=hexdec($colRGB[4]);
	}
	elseif(eregi("([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})", $colour, $colRGB)) {
			$red = hexdec($colRGB[1]);  $green = hexdec($colRGB[2]);  $blue = hexdec($colRGB[3]); $alpha='0';
	}
	else {
		$red = 255;  $green = 255;  $blue = 255; $alpha = 0;
	}
	return array('red' => $red, 'green' => $green, 'blue' => $blue, 'alpha' => $alpha);
}

?>
