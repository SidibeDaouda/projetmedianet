<?php
require("modele/User.php");
require("modele/Article.php");
require("controller/Dao.php");
//on recupere les donnees envoyes par ajax qui seront sous la forme
//{"login": "mousse", "password": "123456", "action": "loginsection"}
$data = json_decode(file_get_contents("php://input"));
//Les donnes sont recuperes au format json
$login = $data->login;
$password = $data->password;
$action=$data->action; 


// $tab["login"]=$login;
// $tab["password"]=$password;
// $tab["existe"]=1;
// //ON place le tableau dans un autre tableau pour obtenu des donnees au format json
// $tab1[]=$tab;
// //Le fichier compteur.txt est un fichier de log qui va me 
// //permettre d'effectuer un suivi des evenements que je veux tracer
// $monfichier = fopen('compteur.txt', 'r+');
// fputs($monfichier, json_encode($tab1)); 
// //close($monfichier);
// //j'encode les donnees en json et je les renvoie vers le telephone
// $encode_donnees = json_encode($tab1);
// print_r($encode_donnees);

// //Pour convertir larray en array json

// //met a disposition les données json

   if ($action=="loginsection"){
   $dao=Dao::getPdoGsb();
   $user=$dao->getInfosUser($login, $password);
 	if ($user!=null){
// cette variable permet de savoir qu'on a l'utilisateur pour le traitement dans le fichiher JS
		   $iduser=$user->getId();
		   $tab["login"]=$login;
		   $tab["password"]=$password;
		   $tab["existe"]=1;
		   $tab["id"]=$iduser;
		   $tab1[]=$tab;
		   // si le l'utilisateur existe on recupere tous les articles
		   $liste=$dao->getLesarticles();
		   // on recupere tous les articles pour les stocker dans le fichier compteur.txt a des fins de controle
		   // mais il faut convertir les resultats en json
		   $chaine="coucou";
           foreach($liste as $article){
             $chaine=$chaine." ".$article->getArticle();
           }

		   $monfichier = fopen('compteur.txt', 'r+');
		   fputs($monfichier, $chaine); 
		   fclose($monfichier);
		   $encode_donnees = json_encode($tab1);
		   print_r($encode_donnees);

 	  }else{
		$existe=0;
	    $tab["existe"]=$existe;
	    $tab1[]=$tab;	
	    $monfichier = fopen('compteur.txt', 'r+');
	    fputs($monfichier, json_encode($tab1)); 
	    fclose($monfichier);
	    $encode_donnees = json_encode($tab1);
	    print_r($encode_donnees);
 	  }  
   	  
 }



// //Pour convertir l'array en array json
// $encode_donnees = json_encode($tab1);
// //met a disposition les données json
// print_r($encode_donnees);
?>
