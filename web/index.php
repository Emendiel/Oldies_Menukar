<?php
    session_start();
	
	if(isset($_SESSION['Menukar_Login']))
	{
    	include('../application/layout/layout.php');
	}else
	{
		include('../application/layout/layout_default.php');
	}
?>