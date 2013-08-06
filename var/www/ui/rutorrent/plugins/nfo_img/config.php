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
 *           CC BY-NC-SA - http://creativecommons.org/licenses/by-nc-sa/3.0/
 *
 * See get_img.php for changelog
 */

// Configuration

// The pre-rendered font images we'll use
// File format is a 16 x 16 block of character images in ascending ASCII order
// Each character must include its required letter- and line-spacing
// File name format is important!  Like this -
//    font_name-codepage-characterdimensions.extension
// File type will be determined from extension and may be .gif or .png or .jpg
// Characters must be pure black text on a pure white background with no
// greyscale or other colour else the colours defined below won't work
$fontfile = './cga-437-8x8.png';

// The colours to use - Background (BG) and foreground (FG)
// Must be six- or eight-digit hex values (RRGGBB) with no leading # or 0x
// If eight-digit then the final pair are transparency and should be in the
// range 00-7f with 00 being fully opaque and 7f being fully transparent
$colourBG = '101010';
$colourFG = 'afafaf';

// Ignore colours?
// Set this to true not convert colours (e.g. if using a pre-coloured or
// greyscale font set) - Background colourBG will still be used as the initial
// fill colour so empty areas/lines will still be coloured
$ignoreColours = false;

// Image output format - Valid values are 'gif' 'jpg' 'png'
$imageFormat = 'png';

?>
