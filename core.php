<?php
	session_start();
	//require_once($_SERVER['DOCUMENT_ROOT'].'/class/class.compte.php');
	require_once(getenv('DOCUMENT_ROOT').'/smarty/libs/Smarty.class.php');
	$tpl = new Smarty();
	require_once(getenv('DOCUMENT_ROOT').'/inc/Site.php');
	require_once(getenv('DOCUMENT_ROOT').'/inc/Sql.php');
	require_once(getenv('DOCUMENT_ROOT').'/inc/Fonctions.php');
?>