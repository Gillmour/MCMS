<?php
require_once(getenv('DOCUMENT_ROOT').'/core.php');

if(isset($_GET['pseudo']))
{
    	$verif = $sql->prepare("SELECT  FROM comptes WHERE pseudo = :pseudo");
	$verif->execute(Array(":pseudo" => $_GET['pseudo']));
	
	if(verifPseudoDejaUtiliser($_GET['pseudo']))
		echo '1';
	else
		echo '2';
}
?>
