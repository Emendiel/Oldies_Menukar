<?php
session_start();

if(isset($_SESSION['Menukar_Login']))
{
	if(isset($_POST['interet']))
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
		
		$activite = replace($_POST['activite']);
		$interet = replace($_POST['interet']);
		$musique = replace($_POST['musique']);
		$film = replace($_POST['film']);
		$livres = replace($_POST['livres']);
		$citation = replace($_POST['citation']);

		$requete = mysql_query("UPDATE `menukar_info_account` 
								SET `activite` = '".$activite."',
									`interet` = '".$interet."',
									`musique` = '".$musique."',
									`film` = '".$film."',
									`livres` = '".$livres."',
									`citation` = '".$citation."'
								WHERE `menukar_info_account`.`menukar_account_id` =".$_SESSION['auteur_id'].";");
		
		$requete03 = mysql_query("SELECT * FROM `menukar_info_account` WHERE `menukar_account_id`='".$_SESSION['auteur_id']."'");
		$info = mysql_fetch_array($requete03);
	}
?>
<fieldset>
<legend>informations</legend>
    <div id="profil_info_view">
        <a style="margin-left: 650px;" href="#" class="modif" onClick="hideshow('profil_info_view', 'profil_info_edit'); return false;" title="Modifier">Modifier</a>
        <table style="padding: 10px;">
			<tr>
				<td class="td">
					Activit&eacute; :
				</td>
				<td>
					<?php echo $info['activite']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Int&eacute;r&ecirc;t :
				</td>
				<td>
					<?php echo $info['interet']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Musique :
				</td>
				<td>
					<?php echo $info['musique']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Livres :
				</td>
				<td>
					<?php echo $info['livres']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Films :
				</td>
				<td>
					<?php echo $info['film']; ?>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Citation :
				</td>
				<td>
					<?php echo $info['citation']; ?>
				</td>
			</tr>
		</table>
    </div>

    <div id="profil_info_edit" style="display: none;">
		<table style="padding: 10px;">
			<tr>
				<td class="td">
					Activit&eacute; :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="activite" id="activite" value="<?php echo $info['activite']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Int&eacute;r&ecirc;t :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="interet" id="interet" value="<?php echo $info['interet']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Musique :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="musique" id="musique" value="<?php echo $info['musique']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Livres :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="livres" id="livres" value="<?php echo $info['livres']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Films :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="film" id="film" value="<?php echo $info['film']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
			
			<tr>
				<td class="td">
					Citation :
				</td>
				<td>
					<div class="input_text_gauche"></div>
					<div class="input_text_fond">
						<input class="input_champ" type="text" name="citation" id="citation" value="<?php echo $info['citation']; ?>"/>
					</div>
					<div class="input_text_droite"></div>
				</td>
			</tr>
		</table>
        <br/>
        <br/>
        <a href="#" onClick="profil_info(); return false;" class="bouton_type_envoyer" title="Envoyer"></a>
		<a href="#" onClick="hideshow('profil_info_edit', 'profil_info_view'); return false;" class="bouton_type_annuler" title="Annuler"></a>
    </div>
</fieldset>
<?php
    }else{
        header("Location: http://emendiel.free.fr/menukar/web/");
    }
?>