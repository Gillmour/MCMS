<?php
	//Config SQL Toon-Live
	
	$PARAM_hote='127.0.0.1'; 
	$PARAM_port='3306';
	$PARAM_nom_bd='mcms'; 
	$PARAM_utilisateur='root'; 
	$PARAM_mot_passe='test'; 
	$PARAM_options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);
	try
	{
        $sql = new PDO('mysql:host='.$PARAM_hote.';port='.$PARAM_port.';dbname='.$PARAM_nom_bd, $PARAM_utilisateur, $PARAM_mot_passe, $PARAM_options);
	}
	catch(Exception $e)
	{
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
	}
?>