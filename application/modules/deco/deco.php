<?php
	session_start();
	session_destroy();
	
	function redirection($adresse_url, $temps)
		{
			print('<meta http-equiv="refresh" content="' . $temps . ';URL='.$adresse_url.'">');
		}
		
	redirection('/web', 0);