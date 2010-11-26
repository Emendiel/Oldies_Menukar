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
	<body id="body">
    <script language="JavaScript" type="text/javascript">
        
        function ouvre()
        {
            var div = document.getElementById('module_actualite_ouvert');
            var div2 = document.getElementById('textarea_ouvert');
            var div3 = document.getElementById('module_actualite');

            div3.style.display = 'none';
            div.style.display = 'block';
            div2.focus();
        }

        function ferme()
        {
            var div = document.getElementById('module_actualite_ouvert');
            var div2 = document.getElementById('textarea_ouvert');
            var div3 = document.getElementById('module_actualite');

            div.style.display = 'none';
            div3.style.display = 'block';

            div2.value = '';
        }
        
        function controle()
        {
            var div = document.getElementById('module_actualite_ouvert');
            var div2 = document.getElementById('textarea_ferme');
            var div3 = document.getElementById('module_actualite');
            var div4 = document.getElementById('textarea_ouvert');
            
            if(div4.value != "")
            {
                
            }else
            {
                div2.value = 'Exprimez-vous ici';

                div.style.display = 'none';
                div3.style.display = 'block';
            }
        }
        
        function cachepost(name, lien)
        {
            var div = document.getElementById(name);
            div.style.display = 'none';
			
            
            if(lien != '')
            {
                var nom = document.getElementById(lien+'_title_barre');
                nom.style.display = 'block';
				
				ferme();
            }
        }
        
        function visiblepost(name)
        {
            var div = document.getElementById(name);
            div.style.display = 'block';
            
            var nom01 = document.getElementById('profil_title_barre');
            nom01.style.display = 'none';
        }
        
        function changebg()
        {
            var body = document.getElementById('body');
            var color = document.getElementById('color');
            
            body.style.background = color.value;
        }
        
    </script>
    <div id="color_bg" style="color: white; background-color: #B2B2B2; width: 200px; position: relative; float: left; top: 20px; left: 10px;">
            <div id="color_bg_handle" style="height:20px; width: 200px; background-color: #F58400; cursor: move;">Choisissez BG</div>
            <div style="padding:5px;">
                <input type="text" id="color" style="width:130px;"/>
                <span style="color:white; cursor:pointer; font-weight: bold;"onclick="changebg()">Change</span>
            </div>
        </div>
		<div id="conteneur">
		
			<div id="entete">
				<div id="navbar">
					<div id="navbar_gauche"></div>
					<div id="navbar_center">
						<div id="navbar_logo"></div>
						<div id="navbar_menu">
							<div id="navbar_menu_gauche" class="navbar_bouton"></div>
							<a href="#" id="navbar_menu_accueil" class="navbar_bouton" onClick="requeteajaxrefresh('/menukar/application/modules/actu/filactu.php'); visiblepost('module_actualite_champ'); return false;"></a>
							<a href="#" id="navbar_menu_profil" class="navbar_bouton" onClick="requeteajaxrefresh('/menukar/application/modules/profil/profil.php'); cachepost('module_actualite_champ', 'profil'); return false;"></a>
							<a href="#" id="navbar_menu_membres" class="navbar_bouton"></a>
							<a href="#" id="navbar_menu_messagerie" class="navbar_bouton"></a>
							<div id="navbar_menu_droite" class="navbar_bouton"></div>
						</div>
					</div>
					<div id="navbar_droite"></div>
				</div>
            </div>
            
            <div id="module_profil">
                <div id="module_profil_gauche"></div>
                <div id="module_profil_fond">
					<span class="float_left"><?php echo $_SESSION['Menukar_Login']; ?></span>
					<div class="clear_both"></div>
					<span class="float_left" style="padding-top:5px;">N&eacute; le 29/01/1988</span>
                    <a href="#" class="bouton_type_param" title="Param&egrave;tres"></a>
                    <div class="clear_both"></div>
                    <a href="/menukar/application/modules/deco/deco.php" class="bouton_type_deco" title="D&eacute;connexion"></a>
                </div>
                <div id="module_profil_droite"></div>
            </div>
            
			<div id="corps">
                <div id="module_actualite_ouvert">
                    <div id="module_actualite_ouvert_gauche"></div>
                    <div id="module_actualite_ouvert_fond">
                        <div id="module_actualite_ouvert_champ">
                            <div id="module_actualite_ouvert_champ_gauche"></div>
                            <div id="module_actualite_ouvert_champ_fond">
                                <form method="post" action="">
                                    <textarea id="textarea_ouvert" onBlur="controle()" name="actualite_ouvert" class="champ"></textarea>
                                    <input id="auteur_post" name="auteur_post" type="hidden" value="<?php echo $_SESSION['auteur_id']; ?>"/>
                                    <input id="bouton_actualite" type="image" src="images/module_actualite_bouton_envoyer.png" 
                                    onMouseOver="document.getElementById('bouton_actualite').src='images/module_actualite_bouton_envoyer_h.png';"
                                    onMouseOut="document.getElementById('bouton_actualite').src='images/module_actualite_bouton_envoyer.png';"
                                    onFocus="document.getElementById('bouton_actualite').src='images/module_actualite_bouton_envoyer_c.png';"
                                    onClick="requeteajax('/menukar/application/modules/actu/filactu.php', document.getElementById('textarea_ouvert').value, document.getElementById('auteur_post').value); ferme(); return false;"/>
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
                                <textarea id="textarea_ferme" onFocus="ouvre()" type="text" name="actualite" class="champ">Exprimez-vous ici</textarea>
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
                    <div class="bloc_corps">
                        His nobis maeror dixistis autem iudicium quod criminis his autem matris ex iuratis 
                        pietate maeror quidem quam ex ex neque cernitis existimatio filium existimatio neque 
                        cernitis oportuit quam nos audietis haec declarat iuratis audietis oportuit nostra de 
                        certe Romani parentes ab nostra quidem quid declarat luctusque neque est de neque.
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
                        His nobis maeror dixistis autem iudicium quod criminis his autem matris ex iuratis 
                        pietate maeror quidem quam ex ex neque cernitis existimatio filium existimatio neque 
                        cernitis oportuit quam nos audietis haec declarat iuratis audietis oportuit nostra de 
                        certe Romani parentes ab nostra quidem quid declarat luctusque neque est de neque.
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
                        His nobis maeror dixistis autem iudicium quod criminis his autem matris ex iuratis 
                        pietate maeror quidem quam ex ex neque cernitis existimatio filium existimatio neque 
                        cernitis oportuit quam nos audietis haec declarat iuratis audietis oportuit nostra de 
                        certe Romani parentes ab nostra quidem quid declarat luctusque neque est de neque.
                    </div>
                    <div class="separateur"></div>
                </div>
                
            </div>
                
                <div id="content">
                    <?php 
                        include('../application/modules/actu/filactu.php');
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
        
        
        
        <script language="JavaScript" type="text/javascript">
		$(document).ready(function(){
			$('#color_bg').draggable({ scroll: false, handle: 'div#color_bg_handle' });
	  	});
    </script>
	</body>
</html>