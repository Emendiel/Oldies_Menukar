<?php
    session_start();
	
	if(isset($_SESSION['Menukar_Login']))
	{
    
    include($_SERVER['DOCUMENT_ROOT'].'/application/modules/bdd/bdd.php');

    $requete01 = mysql_query("SELECT * FROM `menukar_account` WHERE `id`='".$_SESSION['auteur_id']."'");
    $account = mysql_fetch_array($requete01);
    
    $requete02 = mysql_query("SELECT * FROM `menukar_coordonnees` WHERE `menukar_account_id`='".$_SESSION['auteur_id']."'");
    $coord = mysql_fetch_array($requete02);
    
    $requete03 = mysql_query("SELECT * FROM `menukar_info_account` WHERE `menukar_account_id`='".$_SESSION['auteur_id']."'");
    $info = mysql_fetch_array($requete03);
    
    $requete04 = mysql_query("SELECT * FROM `menukar_background` WHERE `menukar_account_id`='".$_SESSION['auteur_id']."'");
    $bg = mysql_fetch_array($requete04);
?>
<div id="page_profil">
    <div class="ui-overlay">
        <div class="ui-widget-shadow_profil ui-corner-all" style="margin: 0px;">
            <div class="ui-widget ui-widget-content ui-corner-all" style="color: white; padding: 10px;">
                
                    <div id="profil_droite">
                        <?php 
                            include('profil_droite.php');
                        ?>
                    </div>
                    
                    <div id="profil_account">
                        <?php
                            include('profil_account.php');
                        ?>
                    </div>
                    <div id="profil_coord">
                        <?php
                            include('profil_coord.php');
                        ?>
                    </div>
                    <div id="profil_info" style="width: 732px;">
                        <?php
                            include('profil_info.php');
                        ?>
                    </div>
                
            </div>
        </div>
    </div>
</div>
<?php
    }else{
        header("Location: http://emendiel.free.fr/menukar/web/");
    }
?>