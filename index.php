<?php 

function getContent($n, $datei_endung) {
	if($n == "Home"){
		$n = "index";
	}
	$nav = "content/".$n;
	if(!file_exists($nav.".".$datei_endung)){	//Wenn die Datei nicht existiert!
		$content = "Datei nicht gefunden!";
		return $content;
	}

	$datei=fopen($nav.".".$datei_endung, "r");

	 if(!$datei)
           {
             $content = "Datei konnte nicht geöffnet werden!";
			 return $content;
           }
           $rs = "<body>";
     while ( $inhalt = fgets($datei, 4096))
		{
			$rs .= $inhalt;
  			
		}

			$rs .= "</body>";
	return $rs;
}


function getNavigationBar($uid){

}


function getHeader(){
	
}



function createResult($title = "Home"){
	$rs = "	<!DOCTYPE html>
		   	<html>";

	$rs .= getContent($title, "html");

	return $rs;
}

if(isset($_GET['p'])){
echo createResult($_GET['p']);
}else{
echo createResult();	
}




?>