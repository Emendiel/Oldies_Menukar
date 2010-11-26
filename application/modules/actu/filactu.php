<?php

	session_start();
	
    function bbcode($text)
	{
		// Gras
		$text = preg_replace('#\[b\](.+)\[/b\]#i', '<b>$1</b>', $text);
		// Italique
		$text = preg_replace('#\[i\](.+)\[/i\]#i', '<em>$1</em>', $text);
		// Souligné
		$text = preg_replace('#\[u\](.+)\[/u\]#i', '<span style="text-decoration: underline;">$1</span>', $text);
		// barré
		$text = preg_replace('#\[s\](.+)\[/s\]#i', '<span style="text-decoration: line-through">$1</span>', $text);
		// URL
		$text = preg_replace('#\[url\]((.+))\[/url\]#i', '<a href="$1" target="_blank">$2</a>', $text);
		// URL titre
		$text = preg_replace('#\[url=(.+)\](.+)\[/url\]#i', '<a href="$1" target="_blank">$2</a>', $text);
		// Centré
		$text = preg_replace('#\[center\](.+)\[/center\]#i', '<center>$1</center>', $text);
		// Centré
		$text = preg_replace('#\[h([1-4])\](.+)\[/h([1-4])\]#i', '<h$1>$2</h$3>', $text);
		// Quote
		$text = preg_replace('#\[quote=\"(.+)\"\](.+)\[/quote\]#i', '<fieldset style="background-color: white;"><legend>$1</legend>$2</fieldset>', $text);
		// image
		$text = preg_replace('#\[img\](.+)\[/img\]#i', '<img src="$1"/>', $text);
		// \n
		$text = preg_replace('#\\n#', '<br />', $text);
		
		return $text;
	}
    
	if(isset($_SESSION['Menukar_Login']))
	{
		include($_SERVER['DOCUMENT_ROOT'].'/application/modules/bdd/bdd.php');

    function init()
        {
            $init = array( 
                    "titre"         =>      "Fil d'actualit&eacute;s",
                    "rafraichir"         =>      "rafraichir"
                        );
            
            return $init;
        }

    function actuAction()
        {
            $reponse = mysql_query("SELECT * FROM menukar_publication ORDER BY id DESC");
            $reponse2 = mysql_query("SELECT * FROM menukar_account");
            $requete03 = mysql_query("SELECT * FROM `menukar_info_account`");
            
            //$info = mysql_fetch_array($requete03);
            while($donnees2 = mysql_fetch_array($requete03))
            {
                $info[$donnees2['menukar_account_id']] = $donnees2['avatar'];
            }
            
            while($donnees2 = mysql_fetch_array($reponse2))
            {
                
                $auth[$donnees2['id']] = $donnees2['name']." ".$donnees2['firstname'];
                
            }
            
            $i=0;
            
            while($donnees = mysql_fetch_array($reponse))
            {
                $actu[$i] = array(
                        "autor_auth"        =>  $auth[$donnees['menukar_account_id']],
                        "p_actu"            =>  $donnees['text'],
                        "avatar"            =>  $info[$donnees['menukar_account_id']],
						"date_actu"			=>	$donnees['date']
                        );
                $i++;
            }
            
            return $actu;
        } 
        
    function addactuAction()
    {
        $text=$_POST['actualite_ouvert'];
		
		$text=str_replace( "'", "&#39;",$text);
		$text=str_replace( '"', '&#34;',$text);
		$text=str_replace( '_', '&#95;',$text);
		$text=str_replace( '-', '&#45;',$text);
		$text=str_replace( '<', '&#60;',$text);
		$text=str_replace( '>', '&#62;',$text);
		
        $auteur = mysql_real_escape_string(htmlspecialchars($_POST['auteur_post']));
		
		$date = date('d-m-Y H:i:s');

        $requete = mysql_query("INSERT INTO `menukar_publication` (`id`, `menukar_account_id`, `text`, `date`) VALUES (NULL, '".$auteur."', '".$text."', '".$date."');");
    }
        
        if(isset($_POST['auteur_post']))
        {
            addactuAction();
        }

        $init = init();
        $actuAction = actuAction();
    ?>
    <div class="title">
        <div class="title_gauche"></div>
        <div class="title_fond"><?php echo $init['titre']; ?><div class="refresh"><a href="#" onClick="requeteajaxrefresh('/application/modules/actu/filactu.php'); return false;"><?php echo $init['rafraichir']; ?></a></div></div>
        <div class="title_droite"></div>
    </div>

    <?php
        $t = count($actuAction);
        $bis = 0;
        
        for($i = 0; $i < $t; $i++)
        {
            if($bis==0)
            {
    ?>
                <div class="news" id="news_<?php echo $i ?>">
                    <div class="contenue">
                        <img class="img_auth" src="<?php if(isset($actuAction[$i]['avatar'])){echo $actuAction[$i]['avatar'];}else{echo 'images/photo.png';} ?>" title="machin 01"/>
                        <h3 class="autor_auth"><?php echo $actuAction[$i]['autor_auth']; ?></h3>
						<span class="date_actu"><?php echo $actuAction[$i]['date_actu']; ?></span>
                        <p class="p_actu">
                            <?php echo bbcode($actuAction[$i]['p_actu']); ?>
                        <br/>
                        <br/>
                        </p>
                    </div>
                    <div class="separateur"></div>
                </div>
    <?php
            $bis=1;
            }else{
    ?>
                <div class="news_bis" id="news_<?php echo $i ?>">
                    <div class="contenue">
                        <img class="img_auth" src="<?php if(isset($actuAction[$i]['avatar'])) {echo $actuAction[$i]['avatar'];}else{echo 'images/photo.png';} ?>" title="machin 01"/>
                        <h3 class="autor_auth"><?php echo $actuAction[$i]['autor_auth']; ?></h3>
						<span class="date_actu"><?php echo $actuAction[$i]['date_actu']; ?></span>
                        <p class="p_actu">
                            <?php echo bbcode($actuAction[$i]['p_actu']); ?>
                        <br/>
                        <br/>
                        </p>
                    </div>
                    <div class="separateur"></div>
                </div>
    <?php
            $bis=0;
            }
        }
     ?>
     
    <?php    
    }else{
        header("Location: http://emendiel.free.fr/menukar/web/");
    }
?>