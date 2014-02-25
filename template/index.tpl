<!DOCTYPE HTML>
<html>
	<head>
		<title>{$NomSite} - Messagerie privée</title>
		<link href="{$LienSite}/css/style.css" rel="stylesheet" type="text/css" />
		<link href="{$LienSite}/css/index.css" rel="stylesheet" type="text/css" />
		<link rel="icon" href="{$LienSite}/images/favicon.ico" />
		<script src="{$LienSite}/js/fonctions.js" type="text/javascript"></script> 
	</head>
	<body style="background:url({$LienFond}) no-repeat center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
	<div id="superglobal">
		<div id="core">
		<div id="Logo"></div>
		<div id="CIBox">
			<b>{$NomSite}</b>, bienvenue sur ta messagerie privée !
			<div id="ConnexionForm" class="FormIndex" {if $Inscription}style="display:none;"{/if}>
				<form method="POST" name="connexion" action="/connexion">
					<label>Pseudo: </label><input type="text" class="inputText" name="pseudo" onKeyPress="if (event.keyCode == 13) document.connexion.submit()"  /><br />
					<label>Mot de passe: </label><input type="password" class="inputText" onKeyPress="if (event.keyCode == 13) document.connexion.submit()"  name="pass" /><br />
					<a onclick="ChangeForm(1);"><div class="BoutonIndex2">Inscription</div></a>
					<div onclick="document.connexion.submit()" class="BoutonIndex">Connexion</div>
				</form>
			</div>
			<div id="InscriptionForm" class="FormIndex" {if !$Inscription}style="display:none;"{/if}>
				<form method="POST" name="inscription" action="/inscription">
					{if isset($inscriptionMessageErreur['all'])}{$inscriptionMessageErreur['all']}<br />{/if}
					<label>Pseudo: </label><input type="text" class="inputText" name="pseudoInscription" onKeyPress="if (event.keyCode == 13) document.inscription.submit();" onKeyUp="verifPseudo(this.value);"  /><br /><div id="pseudobox"></div>
					{if isset($inscriptionMessageErreur['pseudo'])}{$inscriptionMessageErreur['pseudo']}<br />{/if}
					<label>Mot de passe: </label><input type="password" class="inputText" onKeyPress="if (event.keyCode == 13) document.inscription.submit()"  name="passInscription" /><br />
					{if isset($inscriptionMessageErreur['pass'])}{$inscriptionMessageErreur['pass']}<br />{/if}
					<label>Retape ton m.d.p.: </label><input type="password" class="inputText" onKeyPress="if (event.keyCode == 13) document.inscription.submit()"  name="repass" /><br />
					{if isset($inscriptionMessageErreur['repass'])}{$inscriptionMessageErreur['repass']}<br />{/if}
					<label>Adresse mail: </label><input type="text" class="inputText" onKeyPress="if (event.keyCode == 13) document.inscription.submit()"  name="mail" /><br />
					{if isset($inscriptionMessageErreur['mail'])}{$inscriptionMessageErreur['mail']}<br />{/if}
					<label>Genre: </label>
					<select name="sexe">
						<option value="0">Fille</option>
						<option value="1">Garçon</option>
					</select><br />
					{if isset($inscriptionMessageErreur['sexe'])}{$inscriptionMessageErreur['sexe']}<br />{/if}
					<input type="checkbox" value="true" name="CGU" />J'accepte les <a href="{$LienSite}/cgu" style="color:black;">C.G.U.</a><br />
					{if isset($inscriptionMessageErreur['cgu'])}{$inscriptionMessageErreur['cgu']}<br />{/if}
					<input type="hidden" name="Inscription" value="ok" />
					<a onclick="ChangeForm(2);"><div class="BoutonIndex2">Connexion</div></a>
					<div onclick="document.inscription.submit()" class="BoutonIndex">Inscription</div>
				</form>
			</div>
		</div>
		<div id="StatistiquesBox">
			<div class="StatistiqueBox">
				{$NbComptes}<br />Membres
			</div>
			<div class="StatistiqueBox">
				{$NbConversations}<br />Conversations
			</div>
			<div class="StatistiqueBox">
				{$NbMessages}<br />Messages
			</div>
		</div>
		</div>
		<div id="FooterIndex">
			Mentions légales | Conditions d'utilisation | Nous contacter<br />
			© {$NomSite} 2014/2015 - Tous droits réservés.<br />
			Basé sur MCms par Mehdy.
		</div>
	</div>
	</body>	
</html>