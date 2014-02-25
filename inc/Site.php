<?php
	$NomSite = "MCms";
	$LienSite = "http://127.0.0.1";
	
	$Fonds = Array();
	$Fonds[0] = $LienSite."/images/fonds/1.jpg";
	$Fonds[1] = $LienSite."/images/fonds/2.jpeg";
	$Fonds[2] = $LienSite."/images/fonds/3.jpg";
	$Fonds[3] = $LienSite."/images/fonds/4.jpg";
	$Fonds[4] = $LienSite."/images/fonds/5.jpg";
	
	$tpl->assign(Array("NomSite" => $NomSite, "LienSite" => $LienSite));
?>