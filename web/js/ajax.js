var xhr = null; 

// Fonction de creation de l'objet XMLHttpRequest qui resservira pour chaques fonctions AJAX

function focuson(id)
{
	document.getElementById(id).focus();
}

function getXhr() 
{ 
	if(window.XMLHttpRequest)
	{
		xhr = new XMLHttpRequest(); 
	}else if(window.ActiveXObject) 
	{ 
		try 
		{ 
			xhr = new ActiveXObject("Msxml2.XMLHTTP"); 
		} catch (e) 
		{ 
			xhr = new ActiveXObject("Microsoft.XMLHTTP"); 
		} 
	} else 
	{ 
		alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest, veuillez le mettre à jour"); 
		xhr = false; 
	} 
}

function chargement(idDiv, url)
{
	document.getElementById('loader').style.display = 'block'
	getXhr();
	
	xhr.onreadystatechange = function() 
	{ 
		if(xhr.readyState == 4 && xhr.status == 200) 
		{ 
			// Nous remplacons le contenu du div content par le retour de test 
			document.getElementById(idDiv).innerHTML = xhr.responseText; 
            document.getElementById('loader').style.display = 'none';
            //draggableactu();
		} 
	}
	switch(url) // /application/modules/actu/filactu.php
	{
		case 'accueil':
			url = '/application/modules/actu/filactu.php';
		break;
		case 'profil':
			url = '/application/modules/profil/profil.php';
		break;
		default:
			url = '/application/modules/actu/filactu.php';
		break;
	}
	
	xhr.open("POST", url,true); 
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
	xhr.send();
}

// Premiere fonction : remplacer le contenu d'un div 
// Sans recuperation de valeur 

function requeteajax(test, post, auteur) 
{
    document.getElementById('loader').style.display = 'block'
	getXhr(); 
	
	xhr.onreadystatechange = function() 
	{ 
		if(xhr.readyState == 4 && xhr.status == 200) 
		{ 
			// Nous remplacons le contenu du div content par le retour de test 
			document.getElementById('content').innerHTML = xhr.responseText; 
            document.getElementById('loader').style.display = 'none';
		} 
	} 
	
	xhr.open("POST", test,true); 
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
	xhr.send("auteur_post="+auteur+"&actualite_ouvert="+post); 
}

function requeteajaxco(div, login, mdp) 
{
	getXhr(); 
	
	xhr.onreadystatechange = function() 
	{ 
		if(xhr.readyState == 4 && xhr.status == 200) 
		{ 
			// Nous remplacons le contenu du div content par le retour de test 
			document.getElementById('corps').innerHTML = xhr.responseText; 
		} 
	} 
	
	xhr.open("POST", div,true); 
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
	xhr.send("login_menukar="+login+"&mdp_menukar="+mdp); 
}

function requeteajaxrefresh(div) 
{
    document.getElementById('loader').style.display = 'block';
    
	getXhr(); 
	
	xhr.onreadystatechange = function() 
	{ 
		if(xhr.readyState == 4 && xhr.status == 200) 
		{ 
			// Nous remplacons le contenu du div content par le retour de test 
			document.getElementById('content').innerHTML = xhr.responseText; 
            document.getElementById('loader').style.display = 'none';
		} 
	} 
	
	xhr.open("POST", div,true); 
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
	xhr.send(); 
}

function profil_compte()
{
	document.getElementById('loader').style.display = 'block';
	
	getXhr();
	
	xhr.onreadystatechange = function() 
	{ 
		if(xhr.readyState == 4 && xhr.status == 200) 
		{ 
			// Nous remplacons le contenu du div content par le retour de test 
			document.getElementById('profil_account').innerHTML = xhr.responseText; 
            document.getElementById('loader').style.display = 'none';
		} 
	} 
	
	xhr.open("POST", "/application/modules/profil/profil_account.php",true); 
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
	xhr.send("name="+document.getElementById('name').value
			+"&firstname="+document.getElementById('firstname').value
			+"&birthdate="+document.getElementById('birthdate').value
			+"&pseudo="+document.getElementById('pseudo').value);
            
//            +"&oldmdp="+document.getElementById('oldmdp').value
//			+"&newmdp="+document.getElementById('newmdp').value
//			+"&newmdpbis="+document.getElementById('newmdpbis').value)
}

function profil_coord()
{
	document.getElementById('loader').style.display = 'block';
	
	getXhr();
	
	xhr.onreadystatechange = function() 
	{ 
		if(xhr.readyState == 4 && xhr.status == 200) 
		{ 
			// Nous remplacons le contenu du div content par le retour de test 
			document.getElementById('profil_coord').innerHTML = xhr.responseText; 
            document.getElementById('loader').style.display = 'none';
		} 
	} 
	
	xhr.open("POST", "/application/modules/profil/profil_coord.php",true); 
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
	xhr.send("ville="+document.getElementById('ville').value+"&email="+document.getElementById('email').value+"&messagerie_web="+document.getElementById('messagerie_web').value+"&website="+document.getElementById('website').value+"&telephone="+document.getElementById('telephone').value+"&mobile_phone="+document.getElementById('mobile_phone').value);
}

function profil_info()
{
	document.getElementById('loader').style.display = 'block';
	
	getXhr();
	
	xhr.onreadystatechange = function() 
	{ 
		if(xhr.readyState == 4 && xhr.status == 200) 
		{ 
			// Nous remplacons le contenu du div content par le retour de test 
			document.getElementById('profil_info').innerHTML = xhr.responseText; 
            document.getElementById('loader').style.display = 'none';
		} 
	} 
	
	xhr.open("POST", "/application/modules/profil/profil_info.php",true); 
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
	xhr.send("activite="+document.getElementById('activite').value+"&interet="+document.getElementById('interet').value+"&musique="+document.getElementById('musique').value+"&livres="+document.getElementById('livres').value+"&film="+document.getElementById('film').value+"&citation="+document.getElementById('citation').value);
}

function upload()
{
    getXhr(); 
	
	xhr.onreadystatechange = function() 
	{ 
		if(xhr.readyState == 4 && xhr.status == 200) 
		{ 
			// Nous remplacons le contenu du div content par le retour de test 
			document.getElementById('profil_droite').innerHTML = xhr.responseText; 
            document.getElementById('loader').style.display = 'none';
		} 
	} 
	
	xhr.open("POST", "/application/modules/profil/profil_droite.php",true); 
	xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); 
	xhr.send("img_fond="+document.getElementById('BG_account').value);
}

function profil_img() 
{
    document.getElementById('loader').style.display = 'block';
    
    var body = document.getElementById('body');
    var color = document.getElementById('BG_account');
    
    var url = /^http:\/\/.+\.(gif|jpe?g|png|bmp)/;
    var test = url.test(color.value);

    if(test) {
        body.style.background = "transparent url('" + color.value + "') repeat fixed center center";
        upload();
    }else {
        var code = /^#[a-fA-F0-9]{6}$/;
        var test2 = code.test(color.value);
        
        if(color.value == 'default' || color.value == 'ubuntu') {
            body.style.background = "transparent url(http://www.tux-planet.fr/public/images/wallpapers/wallpaper-simple-ubuntu.png) repeat fixed center center";
            upload();
        }else if(test2) {
            body.style.background = color.value;
            upload();
        }else {
            Jpopup("Ce que vous avez rentr&eacute; n'est pas valide : " + color.value + "<br/>");
            document.getElementById('loader').style.display = 'none';
        }
    }
}

function draggableactu()
{
    $('.bloc_corps_favoris').sortable();
    
    $('.news').draggable({
        connectToSortable: '.bloc_corps_favoris', 
        helper: 'clone', 
        handle: '.img_auth' 
    });
    
    $('.news_bis').draggable({
        connectToSortable: '.bloc_corps_favoris', 
        helper: 'clone', 
        handle: '.img_auth' 
    });
}