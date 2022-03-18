<?php 

$tabRes = array();
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_DATABASE', 'akatsuki_db');
require_once("../includes/modele.inc.php");
require_once("../exercices/exercices_DAO.php");
require_once("../db/conn.php");
$exercices = new exerciceDAO(DB_USER, DB_PASS, DB_HOST, DB_DATABASE);
$exercices->init("exercicecatalogue", "idexercicecatalogue");

function lister(){
	global $tabRes, $exercices,$crud;
	$tabRes['action'] = "lister";
	try {
		$tabRes['listeExercices'] = array();
		$tabRes['listeExercices'] = $exercices->getExercices();
		foreach($tabRes['listeExercices'] as $ex){
			$cat = $crud->getNameOfCat($ex->idcategorie);
			$ex->idcategorie = $cat;
			$tabRes['listeExercices'][] = $ex;
		}
	} catch (Exception $e) {
	} finally {
	}
}


function rechercher(){
	global $tabRes, $exercices, $crud;
	$rctitre = $_POST['rctext'];
	$tabRes['action'] = "rechercher";
	try {
		$tabRes['listeRechercher'] = array();
		$tabRes['listeRechercher'] = $exercices->getExerciceByTitre($rctitre);
		// foreach($tabRes['listeRechercher'] as $ex){
		// 	$cat = $crud->getNameOfCat($ex->idcategorie);
		// 	$ex->idcategorie = $cat;
		// 	$tabRes['listeRechercher'][] = $ex;
		// }
	} catch (Exception $e) {
	} finally {
	}
}

function listerParGenre()
{
	global $tabRes,$crud,$exercices;
	$genre = $_POST['genre'];
	$tabRes['action'] = "listerParGenre";
	try {
		$tabRes['listeExercices'] = array();
		$tabRes['listeExercices'] = $exercices->getExoByCat($genre);
		foreach($tabRes['listeExercices'] as $ex){
			$cat = $crud->getNameOfCat($ex->idcategorie);
			$ex->idcategorie = $cat;
			$tabRes['listeExercices'][] = $ex;
		}
	} catch (Exception $e) {
	} finally {
	}
}

$action = $_POST['action'];

switch ($action) {
	case "listerParGenre":
		listerParGenre();
		break;
	case "lister":
		lister();
		break;
    case "rechercher":
        rechercher();
        break;
}
    
echo json_encode($tabRes);

?>