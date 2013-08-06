<?php

require_once( '../_task/task.php' );
eval( getPluginConf( 'spectrogram' ) );

$ret = array();
if(isset($_REQUEST['cmd']))
{
	switch($_REQUEST['cmd'])
	{
		case "sox":
		{
			if(isset($_REQUEST['hash']) && 
				isset($_REQUEST['no']))
			{
				$req = new rXMLRPCRequest( new rXMLRPCCommand( "f.get_frozen_path", array($_REQUEST['hash'],intval($_REQUEST['no']))) );
				if($req->success())
				{
					$filename = $req->val[0];
					if($filename=='')
					{
						$req = new rXMLRPCRequest( array(
							new rXMLRPCCommand( "d.open", $_REQUEST['hash'] ),
							new rXMLRPCCommand( "f.get_frozen_path", array($_REQUEST['hash'],intval($_REQUEST['no'])) ),
							new rXMLRPCCommand( "d.close", $_REQUEST['hash'] ) ) );
						if($req->success())
							$filename = $req->val[1];
					}
					if($filename!=='')
					{
						$mediafile = basename($filename);
						$commands = array();
						$name = '"${dir}"/frame.png';
						$commands[] = getExternal("sox").
								" ".escapeshellarg($filename)." ".
								implode( " ", array_map( "escapeshellarg", explode(" ",$arguments) ) ).
								' -t '.escapeshellarg($mediafile).' -o '.
								$name;
						$commands[] = '{';
						$commands[] = '>-=*=-';
						$commands[] = '}';
						$commands[] = 'chmod a+r "${dir}"/frame.png';
					}
					$ret = rTask::start($commands, rTask::FLG_ONE_LOG | rTask::FLG_STRIP_LOGS);
				}
			}
			break;
		}
		case "soxgetimage":
		{
			$dir = rTask::formatPath( $_REQUEST['no'] );
			$filename = $dir.'/frame.png';
			sendFile($filename, 'image/png', $_REQUEST['file'].".png");
			exit();
		}
		case "soxclose":
		{
			$dir = rTask::formatPath( $_REQUEST['no'] );
			@unlink( $dir.'/frame.png' );
			@rmdir($dir);
			exit();
		}
	}
}

cachedEcho(json_encode($ret),"application/json");
