<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MarchandController;
use App\Http\Controllers\GerantController;
use App\Http\Controllers\BiensController;
use App\Http\Controllers\TypesbiensController;
use App\Http\Controllers\ClientController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('morehome');
});



/**
 * -------------------------------
 * SYSTEME DE GESTION DES ALERTES
 * -------------------------------
 */
//Lock alerte
Route::get('lockDemnd',[BiensController::class, 'lockDemnd']);
//Enregistrer une alerte
Route::get('savealerte',[BiensController::class, 'savealerte']);



/**
 * --------------------
 * GESTION DES DEMANDES
 * -------------------
 */
//Soumission demandes
Route::get('soumet',[BiensController::class, 'soumet']);
//Historique des soumissions
Route::get('soumisDemand',[BiensController::class, 'soumisDemand']);
//Historique des demandes publiées
Route::get('PubDemandAll',[BiensController::class, 'PubDemandAll']);
//Publier une demande after modification
Route::get('pubAdd',[BiensController::class, 'pubAdd']);
//Publier une demande
Route::get('PubDemnd',[BiensController::class, 'PubDemnd']);
//Enregistrer une soumission de bien à une demande
Route::get('saveSoumt',[BiensController::class, 'saveSoumt']);
//Historique des demandes
Route::get('demandes',[BiensController::class, 'demandes']);
//Demandes annulées
Route::get('DelDemnd',[BiensController::class, 'DelDemnd']);
//Demandes trouvées
Route::get('TrouvDemnd',[BiensController::class, 'TrouvDemnd']);
//Nouvelles demandes
Route::get('newDemand',[BiensController::class, 'newDemand']);
//Demandes trouvées
Route::get('solvDemand',[BiensController::class, 'solvDemand']);
//Historique des demandes annulées
Route::get('annulDemand',[BiensController::class, 'annulDemand']);

/**
 *  ---------------------------------
 *   SYSTEM DE GESTION AGENT LOGRAPID
 *  ---------------------------------
 */
//Login Agent LogRapid
//Dash Agent LogRapid
//Visites Agent LogRapid

/**
 *  --------------------------------
 *   SYSTEM DE GESTION ABOUT && CGU
 *  --------------------------------
 */
//CGU
Route::get('cgu',[TypesbiensController::class, 'cgu']);
//About
Route::get('about',[TypesbiensController::class, 'about']);



/**
 *  --------------------------------
 *   SYSTEM DE GESTION IMMOBILIERE
 *  --------------------------------
 */
//Calculate
Route::get('calculate',[TypesbiensController::class, 'calculate']);
//Ajouter un partenaire
Route::get('AddPart',[TypesbiensController::class, 'AddPart']);
//Biens soumis
Route::get('soumis',[TypesbiensController::class, 'soumis']);

/**
 *  --------------------------------
 *   SYSTEM DE RECHERCHE AUTOMATIQUE
 *  --------------------------------
 */
//Biens by categorie de biens
Route::get('biens',[TypesbiensController::class, 'biens']);
//Recherche automatique achat
Route::get('searchProdBuy',[BiensController::class, 'searchProdBuy']);
//Achat de biens immobilier
Route::get('buy',[BiensController::class, 'buy']);
//Recherche automatique location
Route::get('searchProdLocate',[BiensController::class, 'searchProdLocate']);
//Location de biens immobiliers
Route::get('locate',[BiensController::class, 'locate']);
//Recherche All produits
Route::get('SearchFilt',[BiensController::class, 'SearchFilt']);
//Recherche automatique
Route::get('searchProd',[BiensController::class, 'searchProd']);
//Recherche des demandes
Route::get('SearchFiltDemnd',[BiensController::class, 'SearchFiltDemnd']);



/**
 *  ----------------------------------
 *   SYSTEM DE GESTION DE RDV & DEMND
 *  ----------------------------------
 */
//Save rdv
Route::get('saveRdv',[BiensController::class, 'saveRdv']);
//Traitement Notify rdv
Route::match(["get","post"],'notifyRdv',[BiensController::class,'notifyRdv']);
//Traitement return rdv
Route::match(["get","post"],'returnRdv',[BiensController::class,'returnRdv']);
//Traitement Notify Demand
Route::match(["get","post"],'notifyDmd',[TypesbiensController::class,'notifyDmd']);
//Traitement return Demand
Route::match(["get","post"],'returnDmd',[TypesbiensController::class,'returnDmd']);
//Traitement des biens proposés
Route::match(["get","post"],'savebiens',[BiensController::class,'savebiens']);

/**
 *  -------------------------------
 *   SYSTEM DE GESTION DE BIENS
 *  -------------------------------
 */
//Activation automatique
Route::get('activBiens',[BiensController::class, 'activBiens']);
//Modifier biens
Route::post('UpdBienSelect',[BiensController::class, 'UpdBienSelect']);
//Modifier biens page
Route::get('updBiens',[BiensController::class, 'updBiens']);
//Single page :: Details du biens
Route::get('single',[BiensController::class, 'single']);
//Single page :: Details du biens
Route::get('single',[BiensController::class, 'single']);


/**
 *  -------------------------------
 *   SYSTEM D'ALERTE INFOS
 *  -------------------------------
 */
//Alert client
Route::match(["get","post"],'alertinfo',[BiensController::class,'alertinfo']);
//Alert Admin
Route::get('alert',[AdminController::class, 'alert']);

/**
 *  ----------------------------------------
 *   SYSTEM DE GESTION DE COMPTE CLIENT
 *  ----------------------------------------
 */
//New coupons
Route::get('savecoupon',[ClientController::class, 'savecoupon']);
//Mes coupons
Route::get('coupons',[ClientController::class, 'coupons']);
//Modifier infos
Route::get('updClts',[ClientController::class, 'updClts']);
//Recuperer Password
Route::get('recupPass',[ClientController::class, 'recupPass']);
//Sign LogRapid
Route::get('signClient',[ClientController::class, 'signClient']);
//Singup LogRapid
Route::get('Signup',[ClientController::class, 'Signup']);
//My infos
Route::get('count',[ClientController::class, 'count']);
//Visite solder
Route::get('visitesSold',[ClientController::class, 'visitesSold']);
//Visite New
Route::get('visitesNew',[ClientController::class, 'visitesNew']);
//Visite Reporte
Route::get('visitesReport',[ClientController::class, 'visitesReport']);
//Visite Effectue
Route::get('visitesEffect',[ClientController::class, 'visitesEffect']);
//Visite Annule
Route::get('visitesAnnul',[ClientController::class, 'visitesAnnul']);
//Logout 
Route::get('logoutLog',[ClientController::class, 'logoutLog']);


/**
 *  -------------------------------------
 *   GESTION DE COMPTE GERANT OU OFFREUR
 *  -------------------------------------
 */
//Story des demandes
Route::get('DemandeG',[GerantController::class, 'DemandeG']);
//Del gerant
Route::get('delkGerant',[GerantController::class, 'delkGerant']);
//Check Gerant
Route::get('check',[GerantController::class, 'check']);
//Check Gerant Envoie de mail pro
Route::get('checkT',[GerantController::class, 'checkT']);
//Create gerant
Route::post('saveprofil',[GerantController::class, 'saveprofil']);
//New count page
Route::get('countOffreur',[GerantController::class, 'countOffreur']);
//Ajouter un nouveau bien
Route::get('bienGnew',[GerantController::class, 'bienGnew']);
//Activer biens indisponibles
Route::get('bienSoldG',[GerantController::class, 'bienSoldG']);
//Biens indisponibles
Route::get('bienIndispoG',[GerantController::class, 'bienIndispoG']);
//Biens disponibles
Route::get('BiensG',[GerantController::class, 'BiensG']);
//Visite recouverte
Route::get('RecouVisiteG',[GerantController::class, 'RecouVisiteG']);
//Visite new
Route::get('VisiteG',[GerantController::class, 'VisiteG']);
//Visites effectuée
Route::get('EffectVisiteG',[GerantController::class, 'EffectVisiteG']);
//Visites soldées
Route::get('SoldVisiteG',[GerantController::class, 'SoldVisiteG']);
//Mon compte
Route::get('countgerant',[GerantController::class, 'countgerant']);
//Login Gerant
Route::get('conectgerant',[GerantController::class, 'conectgerant']);


/**
 *  ---------------------------
 *   SYSTEM D'AUTHENTIFICATION
 *  ---------------------------
 */
//Déconnection compte agence immobilière
Route::get('logoutAgt',[GerantController::class, 'logoutAgt']);
//Déconnection compte marchand
Route::get('logoutMarchd',[MarchandController::class, 'logoutMarchd']);
//Connection compte marchand
Route::get('conectmarchd',[MarchandController::class, 'conectmarchd']);
//Déconnection Admin
Route::get('logoutadmin',[AdminController::class, 'logoutadmin']);
//Login Admin
Route::get('signAdm',[AdminController::class, 'signAdm']);
//Connect Traitement
Route::get('conectadmin',[AdminController::class, 'conectadmin']);



/**
 *  ---------------------------
 *   GESTION DE GERANT
 *  ---------------------------
 */
//Unlock gerant
Route::get('unlockGerant',[AdminController::class, 'unlockGerant']);
//Gerant off
Route::get('gerantStoryoff',[AdminController::class, 'gerantStoryoff']);
//Details offreur
Route::get('offreurplus',[AdminController::class, 'offreurplus']);
//Lock Gerant
Route::get('lockGerant',[AdminController::class, 'lockGerant']);
//Supprimer un gérant
Route::get('gerantsdel',[AdminController::class, 'gerantsdel']);
//Ajouter un gérant
Route::get('Addgerant',[AdminController::class, 'Addgerant']);
//Nouveau gerant
Route::get('gerantNew',[AdminController::class, 'gerantNew']);
//Historique gerant
Route::get('gerantStory',[AdminController::class, 'gerantStory']);

/**
 *  ---------------------------
 *   GESTION DE TYPES DE BIENS
 *  ---------------------------
 */
//Supprimer une operation
Route::get('operatypesDel',[AdminController::class, 'operatypesDel']);
//Ajouter une operation
Route::get('addOpera',[AdminController::class, 'addOpera']);
//Supprimer types de biens
Route::get('typebiensdel',[AdminController::class, 'typebiensdel']);
//Ajouter type de biens
Route::get('Addtypebiens',[AdminController::class, 'Addtypebiens']);
//Types de biens
Route::get('biensType',[AdminController::class, 'biensType']);
//Types opérations
Route::get('operaType',[AdminController::class, 'operaType']);


/**
 *  ---------------------------
 *   GESTION DE LOCALISATION
 *  ---------------------------
 */
//Supprimer quartier
Route::get('DelQuart',[AdminController::class, 'DelQuart']);
//Nouveau quartier
Route::get('Addquart',[AdminController::class, 'Addquart']);
//Supprimer une ville
Route::get('DelVille',[AdminController::class, 'DelVille']);
//Nouvelle ville
Route::get('AddVille',[AdminController::class, 'AddVille']);
//Nouveau pays
Route::get('Addpays',[AdminController::class, 'Addpays']);
//Pays & Villes
Route::get('newLocal',[AdminController::class, 'newLocal']);
//Quartier
Route::get('storLocal',[AdminController::class, 'storLocal']);

/**
 *  ---------------------------
 *   GESTION DE BIENS
 *  ---------------------------
 */
//Desactiver le bien
Route::get('bienSold',[AdminController::class, 'bienSold']);
//Supprimer un bien
Route::get('DelBiens',[AdminController::class, 'DelBiens']);
//Ajouter un bien
Route::post('AddBiens',[AdminController::class, 'AddBiens']);
//Quartier by villes
Route::get('quartierville',[AdminController::class, 'quartierville']);
//Villes by pays
Route::get('villebypays',[AdminController::class, 'villebypays']);
//Nouveau biens
Route::get('newBiens',[AdminController::class, 'newBiens']);
//Dispo biens
Route::get('dispBiens',[AdminController::class, 'dispBiens']);
//Indispo biens
Route::get('indispBiens',[AdminController::class, 'indispBiens']);


/**
 *  ---------------------------
 *   GESTION DE VISITES
 *  ---------------------------
 */
//Recouvrir une visite soldée
Route::get('visiteRecouvert',[AdminController::class, 'visiteRecouvert']);
//Visite recouvert
Route::get('recouvremnt',[AdminController::class, 'recouvremnt']);
//Visite solder
Route::get('visiteSold',[AdminController::class, 'visiteSold']);
//Visite reporter
Route::get('visiteReport',[AdminController::class, 'visiteReport']);
//Visite Effectuer
Route::get('visiteEffect',[AdminController::class, 'visiteEffect']);
//Annuler visite
Route::get('visiteAnnul',[AdminController::class, 'visiteAnnul']);
//Nouveau visites
Route::get('newVisite',[AdminController::class, 'newVisite']);
//En attente visites
Route::get('inVisites',[AdminController::class, 'inVisites']);
//Reporté visites
Route::get('reportVisites',[AdminController::class, 'reportVisites']);
//Effectué visites
Route::get('okVisites',[AdminController::class, 'okVisites']);
//Annulée visites
Route::get('noVisites',[AdminController::class, 'noVisites']);


/**
 *  ---------------------------
 *   GESTION DE BIENS SOUMIS
 *  ---------------------------
 */
//Refuser biens soumis
Route::get('biensRefuser',[AdminController::class, 'biensRefuser']);
//Accepter biens soumis
Route::get('biensAccepter',[AdminController::class, 'biensAccepter']);
//Nouveau  sousmis
Route::get('newSoumis',[AdminController::class, 'newSoumis']);
//Accepté soumis
Route::get('accepSoumis',[AdminController::class, 'accepSoumis']);
//Refusé soumis
Route::get('refuseSoumis',[AdminController::class, 'refuseSoumis']);

/**
 *  ---------------------------
 *   GESTION DE COMPTE MARCHAND
 *  ---------------------------
 */
//Solder le compte Triumphk
Route::get('triumphkSold',[AdminController::class, 'triumphkSold']);
//Solder le compte LogRapid
Route::get('logRapidSold',[AdminController::class, 'logRapidSold']);
//Solder le compte du marchand
Route::get('marchdSold',[AdminController::class, 'marchdSold']);
//Supprimer un marchand
Route::get('marchdDel',[AdminController::class, 'marchdDel']);
//Ajouter un marchand
Route::get('AddMarchd',[AdminController::class, 'AddMarchd']);
//Nouveau  marchd
Route::get('newMarchd',[AdminController::class, 'newMarchd']);
//Story marchd
Route::get('storyMarchd',[AdminController::class, 'storyMarchd']);
//Solde marchd
Route::get('soldMarchd',[AdminController::class, 'soldMarchd']);

/**
 *  ---------------------------
 *   GESTION DE AGENT LOGRAPID
 *  ---------------------------
 */
//Déconnection Agent LogRapid
Route::get('logoutAg',[AdminController::class, 'logoutAg']);
//Visites Nouvelles
Route::get('NewvisiteAg',[AdminController::class, 'NewvisiteAg']);
//Visites Effectuées
Route::get('EffectVisiteAg',[AdminController::class, 'EffectVisiteAg']);
//Visites Soldées
Route::get('SoldVisiteAg',[AdminController::class, 'SoldVisiteAg']);
//Visites Recouvertes
Route::get('RecouVisiteAg',[AdminController::class, 'RecouVisiteAg']);
//Traitement connection Agent LogRapid
Route::get('conectagent',[AdminController::class, 'conectagent']);
//Connection Agent LogRapid
Route::get('signAgt',[AdminController::class, 'signAgt']);
//Compte Agent LogRapid
Route::get('agentcount',[AdminController::class, 'agentcount']);
//Suppression Agent LogRapid
Route::get('agentdel',[AdminController::class, 'agentdel']);
//Nouveau Agent LogRapid
Route::get('newAgent',[AdminController::class, 'newAgent']);
//Historique Agent LogRapid
Route::get('storyAgent',[AdminController::class, 'storyAgent']);
//Ajouter un agent LogRapid
Route::get('Addagent',[AdminController::class, 'Addagent']);


/**
 *  ---------------------------
 *   GESTION DE PAIEMENTS
 *  ---------------------------
 */
//Soldé  paiements
Route::get('storPay',[AdminController::class, 'storPay']);
//Rapport paiements LogRapid
Route::get('soldPay',[AdminController::class, 'soldPay']);
//Rapport paiements Triumph-K
Route::get('soldtriumph',[AdminController::class, 'soldtriumph']);

/**
 *  ---------------------------
 *   GESTION DE ABONNEES
 *  ---------------------------
 */
//Gestion abonnes
Route::get('abones',[AdminController::class, 'abones']);


/**
 *  -------------------------------
 *   GESTION DE CAMPAGNE MARKETING
 *  -------------------------------
 */
//New Campagne
Route::get('campNew',[AdminController::class, 'campNew']);
//Story Campagne
Route::get('campStory',[AdminController::class, 'campStory']);
//Volume SMS
Route::get('sms',[AdminController::class, 'sms']);

/**
 *  ---------------------------
 *   GESTION DE ADMIN INTERFACE
 *  ---------------------------
 */
//Connection compte Marchand
Route::get('signMarchd',[MarchandController::class, 'signMarchd']);
//Marchand Dashboard
Route::get('marchand',[MarchandController::class, 'marchand']);
//Dashboard admin
Route::get('dash',[AdminController::class, 'dash']);






/**
 *  ---------------------------
 *   GESTION DE CLIENT INTERFACE
 *  ---------------------------
 */
//View more 
Route::get('morehome', function () {
    return view('morehome');
});



