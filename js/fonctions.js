/*
		MCMS JavaScript
							*/

function ChangeForm(typ) {
			if(typ=='1') {
				document.getElementById('ConnexionForm').style.display='none';
				document.getElementById('InscriptionForm').style.display='block';
			}
			else if(typ=='2') {
				document.getElementById('InscriptionForm').style.display='none';
				document.getElementById('ConnexionForm').style.display='block';
			}
		}
		
	function writediv(texte)
	{
		document.getElementById('pseudobox').innerHTML = texte;
	}

	function verifPseudo(pseudo)
	{
		if(pseudo != '')
			{
			var reg=new RegExp("^[a-zA-Z0-9]+$","g");
			
			if(pseudo.length<=3)
			writediv('<span style="color:#cc0000"><b>Ce pseudo est trop court !</b></span>');
			else if(pseudo.length>14)
			writediv('<span style="color:#cc0000"><b>Ce pseudo est trop long !</b></span>');
			else if (!reg.test(pseudo) )
			writediv('<span style="color:#cc0000"><b>Votre pseudo doit uniquement contenir chiffres et lettres sans accent !</b></span>');
			
			else if(texte = file('actionPHP/verifpseudo_inscription.php?pseudo='+escape(pseudo)))
			{
			if(texte == 1)
			writediv('<span style="color:#cc0000"><b>Ce pseudo est deja pris !</b></span>');
			else if(texte == 2)
			writediv('<span style="color:#1A7917"><b>Ce pseudo est libre !</b></span>');
			else
			writediv(texte);
			}
		}
	}

	function file(fichier)
	{
		if(window.XMLHttpRequest) // FIREFOX
		xhr_object = new XMLHttpRequest();
		else if(window.ActiveXObject) // IE
			xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
		else
			return(false);
			xhr_object.open("GET", fichier, false);
			xhr_object.send(null);
		if(xhr_object.readyState == 4) return(xhr_object.responseText);
			else return(false);
	}