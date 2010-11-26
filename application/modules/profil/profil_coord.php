<?php
session_start();

if(isset($_SESSION['Menukar_Login']))
{
	if(isset($_POST['email']))
	{
		function replace($text)
		{
			$text=str_replace( "'", "&#39;",$text);
			$text=str_replace( '"', '&#34;',$text);
			$text=str_replace( '_', '&#95;',$text);
			$text=str_replace( '-', '&#45;',$text);
			$text=str_replace( '<', '&#60;',$text);
			$text=str_replace( '>', '&#62;',$text);
			
			return $text;
		}
		
		include($_SERVER['DOCUMENT_ROOT'].'/application/modules/bdd/bdd.php');
		
		$ville = replace($_POST['ville']);
		$email = replace($_POST['email']);
		$messagerie_web = $_POST['messagerie_web'];
		$website = replace($_POST['website']);
		$telephone = replace($_POST['telephone']);
		$mobile_phone = replace($_POST['mobile_phone']);

		$requete = mysql_query("UPDATE `menukar_coordonnees` 
								SET `email` = '".$email."',
									`ville` = '".$ville."',
									`messagerie_web` = '".$messagerie_web."',
									`website` = '".$website."',
									`telephone` = '".$telephone."',
									`mobile_phone` = '".$mobile_phone."'
								WHERE `menukar_coordonnees`.`menukar_account_id` =".$_SESSION['auteur_id'].";");
		
		$requete02 = mysql_query("SELECT * FROM `menukar_coordonnees` WHERE `menukar_account_id`='".$_SESSION['auteur_id']."'");
		$coord = mysql_fetch_array($requete02);
	}
?>
<fieldset>
<legend>Coordonn&eacute;es</legend>

    <div id="profil_coord_view">
        <a href="#" class="modif" onClick="hideshow('profil_coord_view', 'profil_coord_edit'); return false;" title="Modifier">Modifier</a>
        <table style="padding: 10px;">
			<tr>
				<td class="td">
					Ville :
				</td>
				<td>
					<?php echo $coord['ville']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Email :
				</td>
				<td>
					<?php echo $coord['email']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Messagerie :
				</td>
				<td>
					<?php echo $coord['messagerie_web']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Site Web :
				</td>
				<td>
					<?php echo $coord['website']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					t&eacute;l&eacute;phone :
				</td>
				<td>
					<?php echo $coord['telephone']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Mobile :
				</td>
				<td>
					<?php echo $coord['mobile_phone']; ?>
				</td>
			</tr>
		</table>
    </div>

    <div id="profil_coord_edit" style="display: none;">
		<table style="padding: 10px;">
			<tr>
				<td class="td">
					Ville :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="ville" id="ville" value="<?php echo $coord['ville']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Email :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="email" id="email" value="<?php echo $coord['email']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Messagerie :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="messagerie_web" id="messagerie_web" value="<?php echo $coord['messagerie_web']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Site Web :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="website" id="website" value="<?php echo $coord['website']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					t&eacute;l&eacute;phone :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="telephone" id="telephone" value="<?php echo $coord['telephone']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Mobile :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="mobile_phone" id="mobile_phone" value="<?php echo $coord['mobile_phone']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
		</table>
        <br/>
        <br/>
        <a href="#" onClick="profil_coord(); return false;" class="bouton_type_envoyer" title="Envoyer"></a>
		<a href="#" onClick="hideshow('profil_coord_edit', 'profil_coord_view'); return false;" class="bouton_type_annuler" title="Annuler"></a>
    </div>
</fieldset>
<?php
    }else{
        header("Location: http://emendiel.free.fr/menukar/web/");
    }
?>