<?php
require("modele/User.php");
require("modele/Article.php");
require("controller/Dao.php");
$data = json_decode(file_get_contents("php://input"));
$action=$data->action; 
$login = $data->login;
$password = $data->password;
$monfichier = fopen('compteur.txt', 'r+');
fputs($monfichier, $login." ".$password." "); 
fclose($monfichier);
print_r({"coucou":"coucou"});
// if ($action=="login"){
// 	$dao=Dao::getPdoGsb();
// 	$user=$dao->getInfosUser($login, $password);
// 	if ($user!=null){
//         //on stocke l'id utilisateur pour le recuperer 
//         //afin de le traiter ulterieurement
// 		$iduser=$user->getId();
// 		$tab["login"]=$login;
// 		$tab["password"]=$password;
// 		$tab["existe"]=1;
// 		$tab["id"]=$iduser;
// 		$tab1[]=$tab;
// 		$monfichier = fopen('compteur.txt', 'r+');
// 		fputs($monfichier, $login." ".$password." ".$iduser); 
// 		fclose($monfichier);
// 	}else{
// 		$existe=0;
// 		$tab["existe"]=$existe;
// 		$tab1[]=$tab;	
// 		$monfichier = fopen('compteur.txt', 'r+');
// 		fputs($monfichier, $existe); 
// 		fclose($monfichier);
// 	}
// }
// //Pour convertir l'array en array json
// $encode_donnees = json_encode($tab1);
// //met a disposition les données json
// print_r($encode_donnees);
?>
