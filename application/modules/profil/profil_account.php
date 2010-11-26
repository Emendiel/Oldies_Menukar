<?php
session_start();

if(isset($_SESSION['Menukar_Login']))
{
	if(isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['birthdate']) && isset($_POST['pseudo']))
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
		
		$name = replace($_POST['name']);
		$firstname = replace($_POST['firstname']);
		$birthdate = $_POST['birthdate'];
		$pseudo = replace($_POST['pseudo']);

		$requete = mysql_query("UPDATE `menukar_account` 
								SET `name` = '".$name."',
									`firstname` = '".$firstname."',
									`birthdate` = '".$birthdate."',
									`pseudo` = '".$pseudo."'
								WHERE `menukar_account`.`id` =".$_SESSION['auteur_id'].";");
		
		$requete01 = mysql_query("SELECT * FROM `menukar_account` WHERE `id`='".$_SESSION['auteur_id']."'");
		$account = mysql_fetch_array($requete01);
		
		$_SESSION['birthdate']=$birthdate;
		$_SESSION['Menukar_Login']=$pseudo;
	}
?>
<fieldset>
<legend>Compte</legend>

    <div id="profil_account_view">
        <a href="#" class="modif" onClick="hideshow('profil_account_view', 'profil_account_edit'); return false;" title="Modifier">Modifier</a>
        <table style="padding: 10px;">
            <tr>
                <td class="td">
                    Nom :
                </td>
                <td>
                    <?php echo $account['name']; ?>
                </td>
            </tr>
            
            <tr>
                <td class="td">
                    Pr&eacute;nom :
                </td>
                <td>
                    <?php echo $account['firstname']; ?>
                </td>
            </tr>
            
            <tr>
                <td class="td">
                    Date de naissance :
                </td>
                <td>
                    <?php echo $account['birthdate']; ?>
                </td>
            </tr>
            
            <tr>
                <td class="td">
                    Pseudo :
                </td>
                <td>
                   <?php echo $account['pseudo']; ?>
                </td>
            </tr>
        </table>
    </div>

    <div id="profil_account_edit" style="display: none;">
        <table style="padding: 10px;">
            <tr>
                <td class="td">
                    Nom :
                </td>
                <td>
                    <div class="input_text_gauche"></div>
                    <div class="input_text_fond">
                        <input class="input_champ" type="text" name="name" id="name" value="<?php echo $account['name']; ?>"/>
                    </div>
                    <div class="input_text_droite"></div>
                </td>
            </tr>
            
            <tr>
                <td class="td">
                    Pr&eacute;nom :
                </td>
                <td>
                    <div class="input_text_gauche"></div>
                    <div class="input_text_fond">
                        <input class="input_champ" type="text" name="firstname" id="firstname" value="<?php echo $account['firstname']; ?>" />
                    </div>
                    <div class="input_text_droite"></div>
                </td>
            </tr>
            
            <tr>
                <td class="td">
                    Date de naissance :
                </td>
                <td>
                    <div class="input_text_gauche"></div>
                    <div class="input_text_fond">
                        <input class="input_champ" type="text" name="birthdate" id="birthdate" value="<?php echo $account['birthdate']; ?>" />
                    </div>
                    <div class="input_text_droite"></div>
                </td>
            </tr>
            
            <tr>
                <td class="td">
                    Pseudo :
                </td>
                <td>
                    <div class="input_text_gauche"></div>
                    <div class="input_text_fond">
                        <input class="input_champ" type="text" name="pseudo" id="pseudo" value="<?php echo $account['pseudo']; ?>" />
                    </div>
                    <div class="input_text_droite"></div>
                </td>
            </tr>
        </table>
        <br/>
        <br/>
        <a href="#" onClick="profil_compte(); return false;" class="bouton_type_envoyer" title="Envoyer"></a>
		<a href="#" onClick="hideshow('profil_account_edit', 'profil_account_view'); return false;" class="bouton_type_annuler" title="Annuler"></a>
    </div>
</fieldset>
<?php
    }else{
        header("Location: http://emendiel.free.fr/menukar/web/");
    }
?>