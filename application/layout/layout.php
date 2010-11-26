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
	<body id="body" style="<?php 
	if(isset($_SESSION['body_bg']))
	{ 
		if($_SESSION['body_bg'] == 'ubuntu' || $_SESSION['body_bg'] == 'default')
		{ 
			echo "background:transparent url(http://www.tux-planet.fr/public/images/wallpapers/wallpaper-simple-ubuntu.png) repeat fixed center center"; 
		}
		else
		{ 
			if(preg_match("/^#[a-fA-F0-9]{6}$/", $_SESSION['body_bg']))
			{
				echo "background: ".$_SESSION['body_bg']."";
			}
			else
			{
				echo "background:transparent url(".$_SESSION['body_bg'].") repeat fixed center center";
			}
		}
	} 
	else 
	{ 
		echo "background:transparent url(http://www.tux-planet.fr/public/images/wallpapers/wallpaper-simple-ubuntu.png) repeat fixed center center"; 
	} 
	?>;">
    <!--<div id="color_bg" style="color: white; background-color: #B2B2B2; width: 200px; position: relative; float: left; top: 20px; left: 10px;">
            <div id="color_bg_handle" style="height:20px; width: 200px; background-color: #F58400; cursor: move;">Choisissez BG</div>
            <div style="padding:5px;">
                <input type="text" id="color" style="width:130px;" value="default"/>
                <span style="color:white; cursor:pointer; font-weight: bold;"onclick="changebg('color')">Change</span>
            </div>
        </div>-->
		<div id="conteneur">
		
			<div id="entete">
				<div id="navbar" class="fixed">
					<div id="navbar_gauche"></div>
					<div id="navbar_center">
						<div id="navbar_logo"></div>
						<div id="navbar_menu">
							<div id="navbar_menu_gauche" class="navbar_bouton"></div>
							<a href="#accueil" id="navbar_menu_accueil" class="navbar_bouton" onClick="chargement('content', 'accueil'); visiblepost('module_actualite_champ');"></a>
							<a href="#profil" id="navbar_menu_profil" class="navbar_bouton" onClick="chargement('content', 'profil'); cachepost('module_actualite_champ', 'profil');"></a>
							<a href="#membres" id="navbar_menu_membres" class="navbar_bouton"></a>
							<a href="#messagerie" id="navbar_menu_messagerie" class="navbar_bouton"></a>
							<div id="navbar_menu_droite" class="navbar_bouton"></div>
						</div>
					</div>
					<div id="navbar_droite"></div>
				</div>
            </div>
            
            <div id="module_profil">
                <div class="fixed">
                    <div id="module_profil_gauche"></div>
                    <div id="module_profil_fond">
                        <span class="float_left"><?php echo $_SESSION['Menukar_Login']; ?></span>
                        <div class="clear_both"></div>
                        <span class="float_left" style="padding-top:5px;">N&eacute; <?php echo $_SESSION['birthdate']; ?></span>
                        <a href="#param&egrave;tres" class="bouton_type_param" title="Param&egrave;tres"></a>
                        <div class="clear_both"></div>
                        <a href="/application/modules/deco/deco.php" class="bouton_type_deco" title="D&eacute;connexion" ></a>
                    </div>
                    <div id="module_profil_droite"></div>
                </div>
            </div>
            
			<div id="corps">
                <div id="module_actualite_ouvert">
                    <div id="module_actualite_ouvert_gauche"></div>
                    <div id="module_actualite_ouvert_fond">
                        <div id="module_actualite_ouvert_champ">
                            <div id="module_actualite_ouvert_champ_gauche"></div>
                            <div id="module_actualite_ouvert_champ_fond">
                                <form method="post" action="">
                                    <textarea id="textarea_ouvert" name="actualite_ouvert" class="champ" onBlur="if(document.getElementById('textarea_ouvert').value == ''){hideshow('module_actualite_ouvert', 'module_actualite');}"></textarea>
                                    <input id="auteur_post" name="auteur_post" type="hidden" value="<?php echo $_SESSION['auteur_id']; ?>"/>
                                    <input id="bouton_actualite" type="image" src="images/module_actualite_bouton_envoyer.png" 
                                    onMouseOver="document.getElementById('bouton_actualite').src='images/module_actualite_bouton_envoyer_h.png';"
                                    onMouseOut="document.getElementById('bouton_actualite').src='images/module_actualite_bouton_envoyer.png';"
                                    onFocus="document.getElementById('bouton_actualite').src='images/module_actualite_bouton_envoyer_c.png';"
                                    onClick="requeteajax('/application/modules/actu/filactu.php', document.getElementById('textarea_ouvert').value, document.getElementById('auteur_post').value); hideshow('module_actualite_ouvert', 'module_actualite'); document.getElementById('textarea_ouvert').value = ''; return false;"/>
                                </form>
                            </div>
                            <div id="module_actualite_ouvert_champ_droite"></div>
                        </div>
                    </div>
                    <div id="module_actualite_ouvert_droite"></div>
                </div>
                
                <div id="module_actualite">
                    <div id="module_actualite_gauche"></div>
                    <div id="module_actualite_fond">
                        <div id="module_actualite_champ">
                            <div id="module_actualite_champ_gauche"></div>
                            <div id="module_actualite_champ_fond">
                                <textarea id="textarea_ferme" type="text" name="actualite" class="champ" onclick="hideshow('module_actualite', 'module_actualite_ouvert'); focuson('textarea_ouvert');" readonly>Exprimez-vous ici</textarea>
                            </div>
                            <div id="module_actualite_champ_droite"></div>
                        </div>
                        <div id="profil_title_barre" class="title_barre">
                            <h3>Profil</h3>
                        </div>
                    </div>
                    <div id="module_actualite_droite"></div>
                </div>
                
                
                <div id="menu_droite">
                
                <div class="bloc">
                    <div class="bloc_title">
                        <div class="bloc_title_gauche"></div>
                        <div class="bloc_title_fond">Favoris</div>
                        <div class="bloc_title_droite"></div>
                    </div>
                    <div class="bloc_corps_favoris" style="min-height: 10px;">
                        
                    </div>
                    <div class="separateur"></div>
                </div>
                
                <div class="bloc">
                    <div class="bloc_title">
                        <div class="bloc_title_gauche"></div>
                        <div class="bloc_title_fond">Groupes</div>
                        <div class="bloc_title_droite"></div>
                    </div>
                    <div class="bloc_corps">
                        <p>
                        His nobis maeror dixistis autem iudicium quod criminis his autem matris ex iuratis 
                        pietate maeror quidem quam ex ex neque cernitis existimatio filium existimatio neque 
                        cernitis oportuit quam nos audietis haec declarat iuratis audietis oportuit nostra de 
                        certe Romani parentes ab nostra quidem quid declarat luctusque neque est de neque.
                        </p>
                    </div>
                    <div class="separateur"></div>
                </div>
                
                <div class="bloc">
                    <div class="bloc_title">
                        <div class="bloc_title_gauche"></div>
                        <div class="bloc_title_fond">Ev&egrave;nements</div>
                        <div class="bloc_title_droite"></div>
                    </div>
                    <div class="bloc_corps">
                        <p>
                        His nobis maeror dixistis autem iudicium quod criminis his autem matris ex iuratis 
                        pietate maeror quidem quam ex ex neque cernitis existimatio filium existimatio neque 
                        cernitis oportuit quam nos audietis haec declarat iuratis audietis oportuit nostra de 
                        certe Romani parentes ab nostra quidem quid declarat luctusque neque est de neque.
                        </p>
                    </div>
                    <div class="separateur"></div>
                </div>
                
            </div>
            
            <!--<div id="loader" style="display: none; position: fixed; z-index: 99900; width: 220px; height: 19px; margin-left: 300px; top: 100px; background: transparent url(images/ajax-loader.gif) repeat-x scroll center top;">
            </div>-->
            
            <div id="loader" style="display: none;">
                <div class="ui-overlay">
                    <div class="ui-widget-shadow ui-corner-all" style="z-index: 99998; width: 245px; height: 62px; position: fixed; margin-left: 370px; top: 200px;"></div>
                </div>
                <div class="ui-widget ui-widget-content ui-corner-all" style="z-index: 99999; color: white; padding: 10px; position: fixed; width: 220px; height: 40px; margin-left: 378px; top: 200px; text-align: center;">
                    <h3>Chargement</h3>
                    <p id="popup_text"><img src="images/ajax-loader.gif" alt="Loader" /></p>
                </div>
            </div>
                <script language="JavaScript" type="text/javascript">
					var load = false;
					
					var url_list = new Array( 	'accueil',
												'profil'
											);
											
					var url = window.location.href;
					var reg = new RegExp("[ #]+", "g");
					var result = url.split(reg);
					
					for(i = 0; i < url_list.length; i++)
					{
						if(result[1]==url_list[i])
						{
							chargement('content', url_list[i]);
							load = true;
						}
					}
					
					if(load == false)
					{
						chargement('content', 'accueil');
					}
				</script>
                <div id="content">
                    <?php 
                        //include('../application/modules/actu/filactu.php');
                    ?>
                </div>
			</div>
            
            <div id="pied">
				<div id="footer">
					<div id="footer_gauche"></div>
					<div id="footer_center"></div>
					<div id="footer_droite"></div>
				</div>
            </div>
            
		</div>
        
        <script language="JavaScript">

            var chemin = "images/";

            var liste_images = new Array(   'module_actualite_ouvert_gauche.png',
                                            'module_actualite_ouvert_droite.png',
                                            'module_actualite_ouvert_fond.png',
                                            'module_actualite_ouvert_champ_droite.png',
                                            'module_actualite_ouvert_champ_fond.png',
                                            'module_actualite_ouvert_champ_gauche.png'
                                        );

            document.image_chargee = new Array();

            function prechargement() {
                for ( i = 0; i < liste_images.length; i++ ) {
                // on créé virtuellement une image
                document.image_chargee[i] = new Image;
                // On en indique la source en assemblant le chemin, le nom et l'extension
                document.image_chargee[i].src = chemin + liste_images[i];
                //Si les images sont dans des répertoires différents ou ont des extensions différentes, ne pas mettre 'chemin + liste_images[i] + extension' mais uniquement les variables nécessaires
                }
            }
        </script>
        
        <script language="JavaScript" type="text/javascript">
        function cachepost(name, lien)
            {
                var div = document.getElementById(name);
                div.style.display = 'none';
                
                if(lien != '')
                {
                    var nom = document.getElementById(lien+'_title_barre');
                    nom.style.display = 'block';
                    
                    if($('#textarea_ouvert').val())
                    {
                        $('#module_actualite_ouvert').hide();
                        $('#module_actualite').show();
                        
                        document.getElementById('textarea_ouvert').value = ''
                    }
                }
            }
            
            function visiblepost(name)
            {
                var div = document.getElementById(name);
                div.style.display = 'block';
                
                var nom01 = document.getElementById('profil_title_barre');
                nom01.style.display = 'none';
            }
            
            function Jpopup(text)
            {
                if(text=='NULL')
                {
                    $('#popup').hide();
                }else {
                    document.getElementById('popup_text').innerHTML = text;
                    $('#popup').show();
                }
            }
            
            function changebg(cible)
            {
                var body = document.getElementById('body');
                var color = document.getElementById(cible);
                
                var url = /^http:\/\/.+\.(gif|jpe?g|png|bmp)/;
                var test = url.test(color.value);

                if(test) {
                    body.style.background = "transparent url('" + color.value + "') repeat fixed center center";
                }else {
                    var code = /^#[a-fA-F0-9]{6}$/;
                    var test2 = code.test(color.value);
                    
                    if(color.value == 'default' || color.value == 'ubuntu') {
                        body.style.background = "transparent url(http://www.tux-planet.fr/public/images/wallpapers/wallpaper-simple-ubuntu.png) repeat fixed center center";
                    }else if(test2) {
                        body.style.background = color.value;
                    }else {
                        Jpopup("Ce que vous avez rentr&eacute; n'est pas valide : " + color.value + "<br/>");
                    }
                }
            }
            
            
		// $(document).ready(function(){
			// $('#color_bg').draggable({ scroll: false, handle: 'div#color_bg_handle' });
            
            // var actualite_switch = function() {
                // if(!$('#textarea_ouvert').val())
                // { 
                    // $('#module_actualite').toggle();
                    // $('#module_actualite_ouvert').toggle();
                    // $('#textarea_ouvert').focus();
                // }
            // }
            
            
            
            // $('#textarea_ferme').focus(actualite_switch);
            // $('#textarea_ouvert').blur(actualite_switch);
	  	// });
		
		function hideshow(div1, div2)
		{
			document.getElementById(div1).style.display = 'none'; 
			document.getElementById(div2).style.display = 'block';
		}
    </script>
    
        <div id="popup" style="display: none;">
            <div class="ui-overlay">
                <div class="ui-widget-overlay" style="z-index: 99997; position: fixed;"></div>
                <div class="ui-widget-shadow ui-corner-all" style="z-index: 99998; width: 400px; height: 152px; position: fixed; margin-left: 370px; top: 100px;"></div>
            </div>
            <div class="ui-widget ui-widget-content ui-corner-all" style="z-index: 99999; color: white; padding: 10px; position: fixed; width: 376px; height: 130px; margin-left: 378px; top: 100px; text-align: center;">
                <h3>Erreur</h3>
                <br/>
                <p id="popup_text">Erreur inconnue veuillez contacter l'administrateur de ce site si l'erreur perdure !</p>
                <div class="close_popup">
                    <a href="#" onclick="Jpopup('NULL'); return false;">Close</a>
                </div>
            </div>
        </div>
	</body>
</html>