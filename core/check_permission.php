<?php
if(!isset($_SESSION["adm_user"])){
	Url::redirect_url('webadmin.php?main=admin_login');
}

$CurrentAdmMod = CGlobal::$main;
if(!$_SESSION['adm_user']['radminsuper']){
	$AdmModAccess = unserialize($_SESSION['adm_user']['mod']);
	foreach ($SetAdmMod as $AdmMod){
		if(in_array($AdmMod["modkey"],$AdmModAccess)) $AccessMod[] = $AdmMod;
		if(($CurrentAdmMod != "admin_home") && !in_array($CurrentAdmMod,$AdmModAccess)){
			Url::redirect_url('webadmin.php?err='.md5(1));
		}
	}	
}else {
	$AccessMod = $SetAdmMod;
}
?>