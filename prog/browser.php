<?php

function getBrowser() { 
	$u_agent = $_SERVER['HTTP_USER_AGENT']; 
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version= "";

	// Next get the name of the useragent yes seperately and for good reason
	if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
	{ 
	$bname = 'MSIE'; 
	}
	elseif(preg_match('/Maxthon/i',$u_agent)) 
	{ 
	$bname = 'Maxthon'; 
	} 
	elseif(preg_match('/Firefox/i',$u_agent)) 
	{ 
	$bname = 'Firefox'; 
	} 
	elseif(preg_match('/Chrome/i',$u_agent)) 
	{ 
	$bname = 'Chrome'; 
	} 
	elseif(preg_match('/Safari/i',$u_agent)) 
	{ 
	$bname = 'Safari'; 
	} 
	elseif(preg_match('/Opera/i',$u_agent)) 
	{ 
	$bname = 'Opera'; 
	} 
	elseif(preg_match('/Netscape/i',$u_agent)) 
	{ 
	$bname = 'Netscape'; 
	}
	
	
	// finally get the correct version number
	$known = array('Version', $bname, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .
	')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)) {
	// we have no matching number just continue
	}
	
	// see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
		//we will have two since we are not using 'other' argument yet
		//see if version is before or after the name
		if (strripos($u_agent,"Version") < strripos($u_agent,$bname)){
		$version= $matches['version'][0];
		}
		else {
		$version= $matches['version'][1];
		}
	}
	else {
	$version= $matches['version'][0];
	}
	
	// check if we have a number
	if ($version==null || $version=="") {$version="?";}
	
	return array(
	'userAgent' => $u_agent,
	'name' => $bname,
	'version' => $version);
} 

/*
$ua=getBrowser();
$sistema.="<br> Navegador: ".$ua['name'] . " " . $ua['version'];
$sistema.="<br > Agente Completo: " .$_SERVER['HTTP_USER_AGENT'];
echo $sistema;
*/

function segun_navegador($navegador, $version){
	$mensaje = Array();
	if ($navegador == 'Chrome'){
		if($version >= 26){
			$mensaje[0] ='OK'; 
			$mensaje[1] = 'ok';		
			return $mensaje;
			}
		else{
			$mensaje[0] ='Google Chrome no actualizado'; 
			$mensaje[1] = 'ko';		
			return $mensaje;
			}
	}
	else if($navegador == 'Firefox'){
		if($version >= 20){
			$mensaje[0] ='OK'; 
			$mensaje[1] = 'ok';		
			return $mensaje;
			}
		else{
			$mensaje[0] ='Mozilla Firefox no actualizado'; 
			$mensaje[1] = 'ko';		
			return $mensaje;
		}
	}
	else {
			$mensaje[0] ='Navegador no recomendado'; 
			$mensaje[1] = 'ko';		
			return $mensaje;		
	}

}


?>