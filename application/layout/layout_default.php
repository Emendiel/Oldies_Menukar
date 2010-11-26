<html>
	<head>
		<title>Menukar</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/main.css" />
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="css/custom-theme/jquery-ui-1.7.2.custom.css" />
		<script src="js/ajax.js" type="text/javascript"></script>
		<script src="js/jquery-1.3.2.min.js" type="text/javascript"></script> 
		<script src="js/jquery-ui-1.7.2.custom.min.js" type="text/javascript"></script> 
	</head>
	<body>
	
		<div id="conteneur">
		
			<div id="entete">
				<div id="navbar" class="fixed">
					<div id="navbar_gauche"></div>
					<div id="navbar_center">
						<div id="navbar_logo"></div>
					</div>
					<div id="navbar_droite"></div>
				</div>
            </div>
            
			<div id="corps" style="width: 1100px;">
                    <?php 
                        include('../application/modules/portail/portail.php');
                    ?>
			</div>
            
            <div id="pied">
				<div id="footer">
					<div id="footer_gauche"></div>
					<div id="footer_center"></div>
					<div id="footer_droite"></div>
				</div>
            </div>
            
		</div>
	</body>
</html>
