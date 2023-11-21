<?php
/** @var PdoGsb $pdo */
include 'views/v_sommaire.php';
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'selectionnerMois':{
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste,
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
		$moisASelectionner = $lesCles[0];
		include("views/v_listeMois.php");
		break;
	}
	case 'voirEtatFrais':{
		$leMois = $_REQUEST['lstMois'];
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		$moisASelectionner = $leMois;
		include("views/v_listeMois.php");
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		
		//Gestion des dates
		@list($annee,$mois,$jour) = explode('-',$dateModif);
		$dateModif = "$jour"."/".$mois."/".$annee;

		//$dateModif =  dateAnglaisVersFrancais($dateModif);
		include("views/v_etatFrais.php");
	}
	
    case 'cumulefrais':{
		$typeFrais=$pdo->getTypeDeFrais();
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		include("views/v_cumulefrais.php");
		break;
	}

	case 'voirCumuleFrais':{
		$typeFrais=$pdo->getTypeDeFrais();
		$leMois = $_REQUEST['lstMois'];
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		include("views/v_cumulefrais.php");
		$idFraisForfait=$_REQUEST['tfrais'];
		$mois = $_REQUEST['lstMois'];
		$montant=$pdo->getCumuleEtatFrais($idVisiteur,$mois,$idFraisForfait);
		include("views/v_voirCumuleFrais.php");
		break;
	}

	case 'fraisVisiteur':{
		$visiteurs=$pdo->getIdVisiteur();
		$typeFrais=$pdo->getTypeDeFrais();
		include("views/v_fraisVisiteur.php");
		break;
	}

	case 'voirFraisVisiteur':{
		$visiteurs=$pdo->getIdVisiteur();
		$leVisiteur=$_REQUEST['numero'];
		$typeFrais=$pdo->getTypeDeFrais();
		include("views/v_fraisVisiteur.php");
		$idFraisForfait=$_REQUEST['tfrais'];
		$montant=$pdo->getFraisVisiteur($idVisiteur,$idFraisForfait);
		include("views/v_voirFraisVisiteur.php");
		break;
	}

	case 'cumuletous':{
		$typeFrais=$pdo->getTypeDeFrais();
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		include("views/v_cumuletous.php");
		break;
	}

	case 'voirCumuletous':{
		$typeFrais=$pdo->getTypeDeFrais();
		$leMois = $_REQUEST['lstMois'];
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		include("views/v_cumuletous.php");		
		$mois = $_REQUEST['lstMois'];
		$idFraisForfait='ETP';
		$etp=$pdo->getCumuletous($idVisiteur,$mois,$idFraisForfait);
		$idFraisForfait='KM';
		$km=$pdo->getCumuletous($idVisiteur,$mois,$idFraisForfait);
		$idFraisForfait='NUI';
		$nui=$pdo->getCumuletous($idVisiteur,$mois,$idFraisForfait);
		$idFraisForfait='REP';
		$rep=$pdo->getCumuletous($idVisiteur,$mois,$idFraisForfait);
		include("views/v_voirCumuletous.php");
		break;
	}

	case 'cumulevisiteur':{
		$visiteurs=$pdo->getIdVisiteur();
		$typeFrais=$pdo->getTypeDeFrais();
		$lesMois=$pdo->getLesMoisDisponibles($idVisiteur);
		include("views/v_cumulevisiteur.php");
		break;
	}
	case 'voirCumulevisiteur':{
		$visiteurs=$pdo->getIdVisiteur();
		$leVisiteur=$_REQUEST['numero'];
		$typeFrais=$pdo->getTypeDeFrais();
	
		
		include("views/v_cumulevisiteur.php");		
	
		$idFraisForfait='ETP';
		$etp=$pdo->getCumulevisiteur($leVisiteur,$idFraisForfait);
		$idFraisForfait='KM';
		$km=$pdo->getCumulevisiteur($leVisiteur,$idFraisForfait);
		$idFraisForfait='NUI';
		$nui=$pdo->getCumulevisiteur($leVisiteur,$idFraisForfait);
		$idFraisForfait='REP';
		$rep=$pdo->getCumulevisiteur($leVisiteur,$idFraisForfait);
		include("views/v_voirCumulevisiteur.php");
		break;
	}

	
	case '1e':{
		$visiteurs=$pdo->getIdVisiteur();
		include("views/v_1e.php");
		break;
	}
	case 'voir1e':{
		$visiteurs=$pdo->getIdVisiteur();
		$leVisiteur=$_REQUEST['numero'];
		$mois = $_REQUEST['mois'];
		$an = $_REQUEST['an'];
		$mo=$an.$mois;
		$rp = $_REQUEST['rp'];
		$nu = $_REQUEST['nu'];
		$et = $_REQUEST['et'];
		$km = $_REQUEST['km'];
		$tarif="";
		$qt="";
		
		$ad=$pdo->get1ee($leVisiteur,$mo);
		if($rp != ''){
			$tarif='REP';
			$qt=$rp;
			$rep=$pdo->get1e($leVisiteur,$mo,$tarif,$qt);
		}
		if($nu != ''){
			$tarif='NUI';
			$qt=$nu;
			$nui=$pdo->get1e($leVisiteur,$mo,$tarif,$qt);
		}
		if($et != ''){
			$tarif='ETP';
			$qt=$et;
			$etp=$pdo->get1e($leVisiteur,$mo,$tarif,$qt);
		}
		if($km != ''){
			$tarif='KM';
			$qt=$km;
			$km=$pdo->get1e($leVisiteur,$mo,$tarif,$qt);
		}
		include("views/v_1ee.php");
		break;


}
}