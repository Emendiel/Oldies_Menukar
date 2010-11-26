<?php 
	session_start();
    
?>
<div class="ui-overlay">
	<div class="ui-widget-overlay"></div>
	<div class="ui-widget-shadow ui-corner-all" style="width: 400px; height: 152px; position: absolute; margin-left: 370px; top: 100px;"></div>
</div>
<div class="ui-widget ui-widget-content ui-corner-all" style="color: white; padding: 10px; position: absolute; width: 376px; height: 130px; margin-left: 378px; top: 100px; text-align: center;">
	<p>Bienvenue sur la page de connexion du site Menukar</p>
	<br />
	<?php 	
	if(isset($_POST['login_menukar']))
	{
		include('../bdd/bdd.php');
		
		$login_menukar = $_POST['login_menukar'];
		$mdp_menukar = md5($_POST['mdp_menukar']);
		
		$reponse = mysql_query("SELECT * FROM `menukar_account` WHERE `pseudo`='".$login_menukar."' AND `mdp`='".$mdp_menukar."'");
		$donnees = mysql_fetch_array($reponse);
        
		if($reponse && $login_menukar==$donnees['pseudo'] && $mdp_menukar==$donnees['mdp'])
			{
                $requete04 = mysql_query("SELECT * FROM `menukar_background` WHERE `menukar_account_id`='".$donnees['id']."'");
                $bg = mysql_fetch_array($requete04);
        
				$_SESSION['Menukar_Login']=$login_menukar;
				$_SESSION['auteur_id']=$donnees['id'];
				$_SESSION['birthdate']=$donnees['birthdate'];
                $_SESSION['body_bg']=$bg['menukar_bg'];
                
				echo "F&eacute;licitation ".$_SESSION['Menukar_Login']." la connexion est r&eacute;ussite !<br/><br/>";
				echo "<a href='/web'>accueil</a>";
			}else
			{
				echo "Votre mot de passe ou votre login est faux<br/><br/>";
				echo "<a href='/web'>accueil</a>";
			}
			    
	}else{
	?>
	<div class="login_form">
		<form method="POST" action="">
			<table style="text-align: right;">
				<tr>
					<td>Login :</td>
					<td>
						<div class="input_text_gauche"></div>
						<div class="input_text_fond">
							<input class="input_champ" type="text" name="login_menukar" id="login_menukar"/>
						</div>
						<div class="input_text_droite"></div>
					</td>
				</tr>
				<tr>
					<td>Mot de passe :</td>
					<td>
						<div class="input_text_gauche"></div>
						<div class="input_text_fond">
							<input class="input_champ" type="password" name="mdp_menukar" id="mdp_menukar"/>
						</div>
						<div class="input_text_droite"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<center>
						<input type="submit" class="bouton_connexion" value="" 
						onClick="requeteajaxco('../application/modules/portail/portail.php', document.getElementById('login_menukar').value, document.getElementById('mdp_menukar').value); return false;"/>
                        </center>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php 
	}
	?>
</div>