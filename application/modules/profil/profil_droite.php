<?php
session_start();

    if(isset($_SESSION['Menukar_Login']))
    {
        if(isset($_POST['img_fond']))
        {
            include($_SERVER['DOCUMENT_ROOT'].'/application/modules/bdd/bdd.php');
            
            $img_fond = $_POST['img_fond'];
            $img_fond=str_replace( "'", "&#39;",$img_fond);
            $img_fond=str_replace( '"', '&#34;',$img_fond);
            $img_fond=str_replace( '_', '&#95;',$img_fond);
            $img_fond=str_replace( '-', '&#45;',$img_fond);
            $img_fond=str_replace( '<', '&#60;',$img_fond);
            $img_fond=str_replace( '>', '&#62;',$img_fond);

            $requete = mysql_query("UPDATE `menukar_background` 
                                    SET `menukar_bg` = '".$img_fond."' 
                                    WHERE `menukar_background`.`menukar_account_id` =".$_SESSION['auteur_id'].";");
			
			$_SESSION['body_bg'] = $img_fond;
            
            $requete03 = mysql_query("SELECT * FROM `menukar_info_account` WHERE `menukar_account_id`='".$_SESSION['auteur_id']."'");
            $info = mysql_fetch_array($requete03);
            
            $requete04 = mysql_query("SELECT * FROM `menukar_background` WHERE `menukar_account_id`='".$_SESSION['auteur_id']."'");
            $bg = mysql_fetch_array($requete04);
        }
?>
<div id="avatar">
    <h3>Avatar</h3>
    <img src="<?php echo $info['avatar']; ?>" id="avatar_profil"/>
</div>
<br/>
<div id="BG_choix">
    <h3>Image de fond</h3>
    <div class="input_text_gauche"></div>
    <div class="input_text_fond">
        <input class="input_champ" type="text" name="BG_account" id="BG_account" value="<?php echo $bg['menukar_bg']?>"/>
    </div>
    <div class="input_text_droite"></div>
    <br/>
    <a href="#" class="ui-link" onclick="changebg('BG_account'); return false;">Preview</a>
</div>
<br/>
<br/>
<a href="#" onClick="profil_img(); return false;" class="bouton_type_envoyer" title="Envoyer"></a>
<?php
    }else{
        header("Location: http://emendiel.free.fr/menukar/web/");
    }
?>