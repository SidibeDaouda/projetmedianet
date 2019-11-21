require("modele/User.php");
require("modele/Article.php");
require("controller/Dao.php");
$data = json_decode(file_get_contents("php://input"));
$action=$_SERVER['REQUEST_METHOD']; 

//On recupére le login et le mot de passe
$action=$data->action;
$login=$data->login;
$password=$data->password;







if ($action=="create") {
	$nom=$_GET["nom"];
	$prenom=$_GET["prenom"];
	$datenaiss=$_GET["datenaiss"];
	$login=$_GET["login"];
	$password=$_GET["password"];
	$email=$_GET["email"];
	$utilisateur=new User($nom,$prenom,$datenaiss,$login,$password,$email);
	$dao=Dao::getPdoGsb();
    //On appelle une methode qui compare le user saisi 
    //avec les user de la table User , et on recupere 
    //vrai ou faux
	$existeuser=$dao->verifierUser($utilisateur);
    //on teste si faux (booleean) si il existe pas
	if (!$existeuser){
		$dao->ajouterUser($utilisateur);
		include("view/login.php");
	}else {
		include("view/enregistrement.php");
	}
}

if ($action=="enregistrer"){
	include("view/enregistrement.php");
}

if ($action=="login"){
	$tab["login"]=$login;
	$tab["password"]=$password;
	$dao=Dao::getPdoGsb();
	$user=$dao->getInfosUser($login, $password);
	if ($user!=null){
		$tab["id"]=$user->getId();
        //Pour convertir l'array en array json
		$encode_donnees = json_encode($tab);
//met a disposition les données json
		print_r($encode_donnees);
	}else{
		$tab["existe"]=0;
		$encode_donnees = json_encode($tab);
//met a disposition les données json
		print_r($encode_donnees);
	}
}

if ($action=="index.php"){
	include("view/login.php");
}
//Ici on traite la requete provenant de readmore
if ($action=="details"){
    //on recupere l'ID
	$id=$_GET["id"];
	$dao=Dao::getPdoGsb();
    //On recherche l'article correspondant à l'Id
	$article=$dao->getArticleById($id);
    //si l'article existe on affiche la page details
	if ($article!=null){
		include("view/details.php");
	}
}
if ($action=="ajouterpost"){

	include("view/ajouterpost.php");
}
if ($action=="insererpost"){
	$dao=Dao::getPdoGsb();
	$titre=$_GET["titre"];
	$date=$_GET["date"];
	$idauteur=$_GET["idauteur"];
	$article=$_GET["post"];
    //ON instancie un objet article avec le nouveau constructeur
	$post=new Article($titre,$date,$idauteur,$article);
    //on fait appel à la méthode d'ajout du nouveau post
	$dao->ajouterArticle($post);
    //on appelle tous les articles (avec le nouveau)
	$liste=$dao->getLesArticles();
	include("view/accueil.php");
}
if ($action=="accueil"){
	$dao=Dao::getPdoGsb();
	$liste=$dao->getLesArticles();
	include("view/accueil.php");

}




//Pour convertir larray en array json
$encode_donnees = json_encode($tab1);
//met a disposition les données json
print_r($encode_donnees);

}