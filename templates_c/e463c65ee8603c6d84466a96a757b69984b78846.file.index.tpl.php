<?php /* Smarty version Smarty-3.1.15, created on 2014-02-25 18:32:03
         compiled from ".\template\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2240952fe88091cb5f3-12628706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e463c65ee8603c6d84466a96a757b69984b78846' => 
    array (
      0 => '.\\template\\index.tpl',
      1 => 1393349513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2240952fe88091cb5f3-12628706',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_52fe880957cbd0_16824840',
  'variables' => 
  array (
    'NomSite' => 0,
    'LienSite' => 0,
    'LienFond' => 0,
    'Inscription' => 0,
    'inscriptionMessageErreur' => 0,
    'NbComptes' => 0,
    'NbConversations' => 0,
    'NbMessages' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52fe880957cbd0_16824840')) {function content_52fe880957cbd0_16824840($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['NomSite']->value;?>
 - Messagerie privée</title>
		<link href="<?php echo $_smarty_tpl->tpl_vars['LienSite']->value;?>
/css/style.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo $_smarty_tpl->tpl_vars['LienSite']->value;?>
/css/index.css" rel="stylesheet" type="text/css" />
		<link rel="icon" href="<?php echo $_smarty_tpl->tpl_vars['LienSite']->value;?>
/images/favicon.ico" />
		<script src="<?php echo $_smarty_tpl->tpl_vars['LienSite']->value;?>
/js/fonctions.js" type="text/javascript"></script> 
	</head>
	<body style="background:url(<?php echo $_smarty_tpl->tpl_vars['LienFond']->value;?>
) no-repeat center fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
	<div id="superglobal">
		<div id="core">
		<div id="Logo"></div>
		<div id="CIBox">
			<b><?php echo $_smarty_tpl->tpl_vars['NomSite']->value;?>
</b>, bienvenue sur ta messagerie privée !
			<div id="ConnexionForm" class="FormIndex" <?php if ($_smarty_tpl->tpl_vars['Inscription']->value) {?>style="display:none;"<?php }?>>
				<form method="POST" name="connexion" action="/connexion">
					<label>Pseudo: </label><input type="text" class="inputText" name="pseudo" onKeyPress="if (event.keyCode == 13) document.connexion.submit()"  /><br />
					<label>Mot de passe: </label><input type="password" class="inputText" onKeyPress="if (event.keyCode == 13) document.connexion.submit()"  name="pass" /><br />
					<a onclick="ChangeForm(1);"><div class="BoutonIndex2">Inscription</div></a>
					<div onclick="document.connexion.submit()" class="BoutonIndex">Connexion</div>
				</form>
			</div>
			<div id="InscriptionForm" class="FormIndex" <?php if (!$_smarty_tpl->tpl_vars['Inscription']->value) {?>style="display:none;"<?php }?>>
				<form method="POST" name="inscription" action="/inscription">
					<label>Pseudo: </label><input type="text" class="inputText" name="pseudoInscription" onKeyPress="if (event.keyCode == 13) document.connexion.submit(); verifPseudo(this.value)"  /><br /><div id="pseudobox"></div>
					<?php if (isset($_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['pseudo'])) {?><?php echo $_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['pseudo'];?>
<br /><?php }?>
					<label>Mot de passe: </label><input type="password" class="inputText" onKeyPress="if (event.keyCode == 13) document.connexion.submit()"  name="passInscription" /><br />
					<?php if (isset($_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['pass'])) {?><?php echo $_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['pass'];?>
<br /><?php }?>
					<label>Retape ton m.d.p.: </label><input type="password" class="inputText" onKeyPress="if (event.keyCode == 13) document.connexion.submit()"  name="repass" /><br />
					<?php if (isset($_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['repass'])) {?><?php echo $_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['repass'];?>
<br /><?php }?>
					<label>Adresse mail: </label><input type="text" class="inputText" onKeyPress="if (event.keyCode == 13) document.connexion.submit()"  name="mail" /><br />
					<?php if (isset($_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['mail'])) {?><?php echo $_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['mail'];?>
<br /><?php }?>
					<label>Genre: </label>
					<select name="sexe">
						<option value="0">Fille</option>
						<option value="1">Garçon</option>
					</select><br />
					<?php if (isset($_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['sexe'])) {?><?php echo $_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['sexe'];?>
<br /><?php }?>
					<input type="checkbox" value="true" name="CGU" />J'accepte les <a href="<?php echo $_smarty_tpl->tpl_vars['LienSite']->value;?>
/cgu" style="color:black;">C.G.U.</a><br />
					<?php if (isset($_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['cgu'])) {?><?php echo $_smarty_tpl->tpl_vars['inscriptionMessageErreur']->value['cgu'];?>
<br /><?php }?>
					<input type="hidden" name="Inscription" value="ok" />
					<a onclick="ChangeForm(2);"><div class="BoutonIndex2">Connexion</div></a>
					<div onclick="document.inscription.submit()" class="BoutonIndex">Inscription</div>
				</form>
			</div>
		</div>
		<div id="StatistiquesBox">
			<div class="StatistiqueBox">
				<?php echo $_smarty_tpl->tpl_vars['NbComptes']->value;?>
<br />Membres
			</div>
			<div class="StatistiqueBox">
				<?php echo $_smarty_tpl->tpl_vars['NbConversations']->value;?>
<br />Conversations
			</div>
			<div class="StatistiqueBox">
				<?php echo $_smarty_tpl->tpl_vars['NbMessages']->value;?>
<br />Messages
			</div>
		</div>
		</div>
		<div id="FooterIndex">
			Mentions légales | Conditions d'utilisation | Nous contacter<br />
			© <?php echo $_smarty_tpl->tpl_vars['NomSite']->value;?>
 2014/2015 - Tous droits réservés.<br />
			Basé sur MCms par Mehdy.
		</div>
	</div>
	</body>	
</html><?php }} ?>
