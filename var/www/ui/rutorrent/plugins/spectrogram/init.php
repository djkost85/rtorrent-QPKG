<?php

eval( getPluginConf( 'spectrogram' ) );

$jResult.=("plugin.extensions = ".json_encode($extensions).";");

$theSettings->registerPlugin($plugin["name"],$pInfo["perms"]);
