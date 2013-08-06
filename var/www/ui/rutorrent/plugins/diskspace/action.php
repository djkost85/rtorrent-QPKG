<?php
	require_once( '../../php/util.php' );
	//cachedEcho('{ "total": '.disk_total_space($topDirectory).', "free": '.disk_free_space($topDirectory).' }',"application/json");
	cachedEcho('{ "total": '.disk_total_space("/share/Download").', "free": '.disk_free_space("/share/Download").' }',"application/json");
