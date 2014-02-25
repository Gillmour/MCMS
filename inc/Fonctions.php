<?php
	function MCMSHashing($str)
	{
		$HashPlus = "IBUILD-PARTAGE-MCMS-1.0-PAR-MEHDY";
		return sha1($str . $HashPlus . $str . "2");
	}
	
	function Redirection($url)
	{
		header("Location: $url");  
	}
	
	function verifPseudoDejaUtiliser($pseudo)
	{
		global $sql;
		$verif = $sql->prepare("SELECT * FROM comptes WHERE pseudo = :pseudo");
		$verif->execute(Array(":pseudo" => $pseudo));
	
		if($verif->rowCount() >= 1)
			return true;
		else
			return false;
	}
	
	function mailDejaUtiliser($mail)
	{
		global $sql;
		$verif = $sql->prepare("SELECT * FROM comptes WHERE mail = :mail");
		$verif->execute(Array(":mail" => $mail));
	
		if($verif->rowCount() >= 1)
			return true;
		else
			return false;
	}
	
	function newToken($nbChar)
	{
		$token = "";
		$characters = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
        for($i=0;$i<$nbChar;$i++)
        {
			$token .= ($i%2) ? strtoupper($characters[array_rand($characters)]) : $characters[array_rand($characters)];
        }
        return $token;
	}
?>
