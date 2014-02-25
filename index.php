<?php 
	require_once(getenv('DOCUMENT_ROOT').'/core.php');
	
	//Début gestion d'inscription
	$Inscription = false;
	if(isset($_POST['Inscription']))
	{
		$Inscription = true;
		$inscriptionErreur = false;
		$inscriptionMessagesErreur = Array();
		if(isset($_POST['pseudoInscription']) && isset($_POST['passInscription']) && isset($_POST['repass']) && isset($_POST['mail']) && isset($_POST['sexe']))
		{
			//Verifications sur le pseudo.
			if(strlen($_POST['pseudoInscription']) <= 3)
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['pseudo'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Le pseudo est trop court !</b></span>";
			}
			elseif(strlen($_POST['pseudoInscription']) >= 14)
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['pseudo'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Le pseudo est trop long !</b></span>";
			}
			elseif(mb_eregi('[^a-zA-Z0-9_]', $_POST['pseudoInscription']))
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['pseudo'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Le pseudo contient des caractères interdits.</b></span>";
			}
			elseif(verifPseudoDejaUtiliser($_POST['pseudoInscription']))
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['pseudo'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Ce pseudo est déjà pris !</b></span>";
			}
			
			//Verifications sur le mot de passe.
			if(strlen($_POST['passInscription']) < 6)
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['pass'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Votre mot de passe est trop court !</b></span>";
			}
			elseif(strlen($_POST['passInscription']) > 16)
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['pass'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Votre mot de passe est trop long !</b></span>";
			}
			elseif($_POST['passInscription'] == $_POST['repass'])
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['repass'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Les mots de passes ne correspondent pas !</b></span>";
			}
			
			//Verifications sur l'adresse mail.
			if(!preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#',$_POST['mail']))
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['mail'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>L'adresse mail n'est pas valide !</b></span>";
			}
			elseif(mailDejaUtiliser($_POST['mail']))
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['mail'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Cette adresse mail est déjà utilisée !</b></span>";
			}
			
			//Autres verifications.
			if($_POST['sexe'] < 0 && $_POST['sexe'] > 1)
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['sexe'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Le genre choisit n'est pas valide !</b></span>";
			}
			if(!isset($_POST['CGU']) || $_POST['CGU'] != "true")
			{
				$inscriptionErreur = true;
				$inscriptionMessagesErreur['cgu'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Vous n'avez pas accépter les C.G.U. !</b></span>";
			}
		}
		else
		{
			$inscriptionErreur = true;
			$inscriptionMessagesErreur['all'] = "<span style=\"color:#cc0000;font-family:Arial;\"><b>Des valeurs sont manquantes !</b></span>";
		}
		
		//Aucune erreur, inscription OK !
		if(!$inscriptionErreur)
		{
			$dateEtHeure = date("d/m/Y H:i");
			$token = newToken(26);
			$reqInscription = $sql->prepare("INSERT INTO `comptes`(`pseudo`, `pass`, `mail`, `sexe`, `date_inscription`, `derniere_connexion`, `ip_inscription`, `derniere_ip`, `token`) VALUES (:pseudo, :pass, :mail, :sexe, :date_inscription, :derniere_connexion, :ip_inscription, :derniere_ip, :token)");
			$reqInscription->execute(Array(":pseudo" => $_POST['pseudoInscription'], ":pass" => MCMSHashing($_POST['passInscription']), ":mail" => $_POST['mail'], ":sexe" => $_POST['sexe'], ":date_inscription" => $dateEtHeure, ":derniere_connexion" => $dateEtHeure, ":ip_inscription" => getenv("REMOTE_ADDR"), ":derniere_ip" => getenv("REMOTE_ADDR"), ":token" => $token));
			$_SESSION['pseudo'] = $_POST['pseudoInscription'];
			$_SESSION['pass'] = MCMSHashing($_POST['passInscription']);
			$_SESSION['token'] = $token;
			Redirection($LienSite."/accueil.php");
		}
		$tpl->assign("inscriptionMessageErreur", $inscriptionMessagesErreur);
	}
	//Fin gestion d'inscription
	
	$reqComptes = $sql->prepare("SELECT * FROM comptes");
	$reqComptes->execute();
	$reqConversations = $sql->prepare("SELECT * FROM conversations");
	$reqConversations->execute();
	$reqMessagesConvs = $sql->prepare("SELECT * FROM messages_conversation");
	$reqMessagesConvs->execute();
	//Suggestion pour une meilleur optimisation: créer une table cache_index pour mettre en cache les valeurs et les updates toutes les 15 minutes ou plus .
	
	$tpl->assign(Array("Inscription" => $Inscription, "NbComptes" => $reqComptes->rowCount(), "NbConversations" => $reqConversations->rowCount(), "NbMessages" => $reqMessagesConvs->rowCount(), "LienFond" => $Fonds[rand(0, count($Fonds) - 1)]));
	$tpl->display("./template/index.tpl");
?>