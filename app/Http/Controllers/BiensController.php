<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*----------------------
  INTEGRATION CINETPAY
-----------------------*/
use App\Cinetpay\Cinetpay;

class BiensController extends Controller
{
/**
 * -------------------------------
 * SYSTEME DE GESTION DES ALERTES
 * -------------------------------
 */
//Lock demande
function lockDemnd(Request $request)
{
  //check
  $res = DemandeID($request->demande);
  if ($res) {
    lockDemande($request->demande);
    $info = "Votre alerte de demande ImmOver est desactivée avec succès";
    $title = "Demande ImmOver";
    $libele = "Ok";
    $url = 'morehome';
    return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
    die();
  }else {
    lockDemande($request->demande);
    $info = "Cette Alerte de demande ImmOver n'existe pas";
    $title = "Demande ImmOver";
    $libele = "Ok";
    $url = 'morehome';
    return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
    die();
  }
}
//Enregistrer une alerte
public function savealerte(Request $request)
{
  //Reception des données
  $types = $request->typeA;
  $quartier = $request->quartierA;
  $ville = $request->villeA;
  $pays = $request->paysA;
  $mail = $request->mailA;
  $opera = $request->operA;
  $tel = $request->telA;
  $budget = $request->budgA;
  
  //Save alerte
  if ($budget<40000) {
    $msg = 'Budget Minimum:40 000f';
    $alert = 'error';
    //return response()->json(['msg'=>$msg,'alert'=>$alert]);
    return $msg;
    die();
  }
  if (valid_email($mail)==true) {
    SaveDemande($opera,$pays,$ville,$quartier,$types,$mail,$budget,$tel);
    //Check Exisiting
    $output = '';
    $filt = Filter($opera,$types,$pays,$ville,$quartier,'','');
    $filtnb = count($filt);
    if ( $filtnb!=0) {

      $output.='Demande soumise avec succès, voici quelques biens disponibles </br>';
      //Show biens dispo
      foreach ($filt as $biens) {
        $output.='
        <!-- Item-->
        <div class="col-sm-6 col-xl-4 col-lg-6">
          <div class="card shadow-sm card-hover border-0 h-100">
            <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="#"></a>
              <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Dispo</span></div>
              <div class="content-overlay end-0 top-0 pt-3 pe-3">
                <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
              </div>
              <a href="#" class="d-block rounded-3 overflow-hidden">
                <img class="d-block" src="'.$biens->img1.'">
              </a>
            </div>
            <div class="card-body position-relative pb-3">
              <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">'.ReadOperaID($biens->typesoperations_idtypesoperations)->operation.'</h4>
              <span class="text-success"><i class="fi-map-pin mt-n1 me-2 lead align-middle opacity-70"></i>'.ReadPaysID($biens->pays)->pays.' - '.ReadVillID($biens->villes)->ville.' - '.ReadQuartierID($biens->quartier)->nom.' </span>

              <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="#">'.$biens->libele.'</a></h3>
              <p class="mb-2 fs-sm text-muted">'.$biens->resume.'</p>
              <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>'.$biens->prix.' Fcfa</div>
            </div>

            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
              <a href="single?biens='.$biens->idbiens.'">
                <button type="button" class="btn btn-outline-primary rounded-pill">
                 <i class="fi-heart-filled ms-1 mt-n1 fs-lg text-muted"></i> Visiter
                </button>
              </a>
            </div>

          </div>
        </div>
        ';
       }

    }else {
      $output.='Demande soumise avec succès, Vous serez notifier';
    }
    
    $alert ='success';
    $msgD = "Ce que le client cherche :
                  - Type d'operation: ".ReadOperaID($opera)->operation."
                  - Type de biens: ".ReadTypesID($types)->types."
                  - Pays: ".ReadpaysId($pays)->pays."
                  - Ville: ".ReadVilleId($ville)->ville."
                  - Quartier: ".ReadQuartierID($quartier)->nom."
                  - Budget: ".formatPrice($budget)." Fcfa
                  - Client: ImmOver"."
                  - Ajoutez vite un bien correspondant à ces caractéristiques pour bénéficier d'une transaction";
    
    //Send Push to offreur
    foreach (ReadGerant() as $gerant) {
      //SendEmail($gerant->mail,'ImmOver,un nouveau client',$msgD);
      //dd($gerant->mail,'ImmOver,un nouveau client',$msgD);
    }
  }else {
    $output='Email incorrect';
    $alert = 'error';
  }
  //Traitement return
  //return response()->json(['msg'=>$msg,'alert'=>$alert]);
  return $output;
}
    

/**
 * --------------------
 * GESTION DES DEMANDES
 * --------------------
 */
//Page de soumission d'une demande filtrée
public function soumet(Request $request)
{
  return view('soumet')->with('demandID',$request->idcode);
}
//Filtre de recherche des demandes
public function SearchFiltDemnd(Request $request)
{
  $typesbiens = $request->typesbiens;
  $quartier = $request->quartier;
  $ville = $request->ville;
  $pays = $request->pays;
  $opera = $request->opera;
  $output = '';
  if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays==''&& $opera=='') {
    $output.='<div class="alert alert-primary" role="alert">Aucun résultat, Veuillez préciser votre recherche</div>';
  }
  elseif($typesbiens!=''&& $quartier!=''&& $ville!=''&& $pays!=''&&$opera!=''){
    $result = FilterDemnd($typesbiens,$pays,$ville,$quartier,$opera,3);
    $nbres = count($result);
    //dd($nbres);
    if ($nbres==0) {
      $output.='<div class="alert alert-primary" role="alert">Aucun résultat</div>';
    }else {
      //$output.='<div class="alert alert-success" role="alert">Présence</div>';
      foreach ($result as $demand) {
        $output.='
        <!-- Item -->
        <div class="col-sm-6 col-xl-4">
          <div class="card shadow-sm card-hover border-0 h-100">

            <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="#"></a>
              <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Dispo</span></div>
              <div class="content-overlay end-0 top-0 pt-3 pe-3">
                <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
              </div>
              
            </div>

            <div class="card-body position-relative pb-3">
              <h4 class="mb-1 fs-xs  text-uppercase text-primary">'.ReadOperaID($demand->opera)->operation.'</h4>
              <h3 class="mb-2 fs-base"><a class="nav-link stretched-link" href="#">'.ReadTypesID($demand->typesbiens)->types.'</a></h3>
              <p class="mb-2 fs-sm fw-bold">'.$demand->more.'</p>
              <div class="fw-normal">
                Code Demande: '.$demand->codes.'<br>
                Pays: '.ReadpaysId($demand->pays)->pays.' <br> Ville: '.ReadVilleId($demand->villes)->ville.'<br>Quartier: '.ReadQuartierID($demand->quartier)->nom.'
              </div>
            </div>

            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
              <a href="#" class="soumet" id="'.$demand->codes.'">
                <button type="button" class="btn btn-outline-primary rounded-pill">
                 <i class="fi-cloud-upload ms-1 mt-n1 fs-lg text-muted"></i> Soumettre un bien
                </button>
              </a>
            </div>

          </div>
        </div>
        ';
      }
      
    }
  }else {
    $result = FilterDemndOpera($opera,3);
    $nbres = count($result);
    if ($nbres==0) {
      $output.='<div class="alert alert-primary" role="alert">Aucun résultat, Veuillez précisez votre recherche</div>';
    }else {
      //$output.='<div class="alert alert-success" role="alert">Présence</div>';
      foreach ($result as $demand) {
        $output.='
        <!-- Item -->
        <div class="col-sm-6 col-xl-4">
          <div class="card shadow-sm card-hover border-0 h-100">

            <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="#"></a>
              <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Dispo</span></div>
              <div class="content-overlay end-0 top-0 pt-3 pe-3">
                <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
              </div>
              
            </div>

            <div class="card-body position-relative pb-3">
              <h4 class="mb-1 fs-xs  text-uppercase text-primary">'.ReadOperaID($demand->opera)->operation.'</h4>
              <h3 class="mb-2 fs-base"><a class="nav-link stretched-link" href="#">'.ReadTypesID($demand->typesbiens)->types.'</a></h3>
              <p class="mb-2 fs-sm fw-bold">'.$demand->more.'</p>
              <div class="fw-normal">
                Code Demande: '.$demand->codes.'<br>
                Pays: '.ReadpaysId($demand->pays)->pays.' <br> Ville: '.ReadVilleId($demand->villes)->ville.'<br>Quartier: '.ReadQuartierID($demand->quartier)->nom.'
              </div>
            </div>

            <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
              <a href="soumet?idcode='.$demand->codes.'" class="soumet" id="'.$demand->codes.'">
                <button type="button" class="btn btn-outline-primary rounded-pill">
                 <i class="fi-cloud-upload ms-1 mt-n1 fs-lg text-muted"></i> Soumettre un bien
                </button>
              </a>
            </div>

          </div>
        </div>
        ';
      }
    }
  }
  return $output;
}
//Historique des demandes 
public function annulDemand(Request $request)
{
	return view('annulDemand');
}
//Historique des soumissions
public function soumisDemand(Request $request)
{
  if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
    return view('soumisDemand');
  }else{
    return redirect('signAdm');
  } 
}
//Historique des demandes publiées
public function PubDemandAll(Request $request)
{
  if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
    return view('PubDemandAll');
  }else{
    return redirect('signAdm');
  } 
}
//Publier une demande after modification
public function pubAdd(Request $request)
{
  $more = $request->moreP;
  $demandID = $request->demandID;
  PubUpdDemnd($more,$demandID);
  return redirect('newDemand');
}
//Publication
public function PubDemnd(Request $request)
{
  if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
    return view('PubDemnd')->with('Demnd',$request->Demnd);
  }else{
    return redirect('signAdm');
  } 
}
//Save soumission
public function saveSoumt(Request $request)
{
  $code = $request->codeP;
  $phone = $request->phoneP;
  $res = SaveDemand($code,$phone);
  //dd($res);
  return response()->json(['msg'=>'Soumission effectuée avec succès']);
}
//Historiques des demandes
public function demandes(Request $request)
{
  return view('demandes');
}
//Demandes Annumer :: Update demandes stat to annuler
public function DelDemnd(Request $request)
{
  $idDmd = $request->Demnd;
  UpdDemand(2,$idDmd);
  return redirect('annulDemand');
}
//Demandes trouver :: Update demandes stat to trouver
public function TrouvDemnd(Request $request)
{
  $idDmd = $request->Demnd;
  UpdDemand(1,$idDmd);
  return redirect('newDemand');
}
//Nouvelle demande
public function newDemand(Request $request)
{
  return view('newDemand');
}
//Demande trouver
public function solvDemand(Request $request)
{
  return view('solvDemand');
}
	
/**
 *  ---------------------------------
 *   SYSTEM DE RECHERCHE AUTOMATIQUE
 *  ---------------------------------
 */
//Achat de biens automatique
public function searchProdBuy(Request $request)
{
    $typesbiens = $request->typesbiens;
    $quartier = $request->quartier;
    $ville = $request->ville;
    $pays = $request->pays;
    $minprice = $request->minprice;
    $maxprice = $request->maxprice;
    //dd("types biens: ".$typesbiens." - Quartier :".$quartier." - Ville :".$ville." - Pays: ".$pays." - Minprice: ".$minprice." - Maxprice: ".$maxprice);
    $output = '';
    //Filtre Error :: Aucun champ rempli
    if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays=='' && $minprice=='' && $maxprice=='') {
       $output.='<div class="alert alert-primary" role="alert">Aucun résultat, Veuillez préciser votre recherche</div>';
    }else {
       $result = FilterBuy($typesbiens,$pays,$ville,$quartier,$minprice,$maxprice);
       $nbres = count($result);
       //dd($nbres);
       if ($nbres==0) {
           $output.='<div class="alert alert-primary" role="alert">Aucun résultat, pour cette recherche</div>';
       }else {
          foreach ($result as $biens) {
           $output.='
           <!-- Item-->
           <div class="col-sm-6 col-xl-4">
             <div class="card shadow-sm card-hover border-0 h-100">
               <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="#"></a>
                 <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Dispo</span></div>
                 <div class="content-overlay end-0 top-0 pt-3 pe-3">
                   <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                 </div>
                 <a href="#" class="d-block rounded-3 overflow-hidden">
                   <img class="d-block" src="'.$biens->img1.'">
                 </a>
               </div>
               <div class="card-body position-relative pb-3">
                 <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">'.ReadOperaID($biens->typesoperations_idtypesoperations)->operation.'</h4>
                 <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="#">'.$biens->libele.'</a></h3>
                 <p class="mb-2 fs-sm text-muted">'.$biens->resume.'</p>
                 <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>'.$biens->prix.' Fcfa</div>
               </div>
  
               <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                 <a href="single?biens='.$biens->idbiens.'">
                   <button type="button" class="btn btn-outline-primary rounded-pill">
                    <i class="fi-heart-filled ms-1 mt-n1 fs-lg text-muted"></i> Visiter
                   </button>
                 </a>
               </div>
  
             </div>
           </div>
           ';
          }
       }
    }
    return $output;
}
//Achat de biens immobiliers
public function buy(Request $request)
{
  return view('buy');
}
//Location recherche automatique
public function searchProdLocate(Request $request)
{
    $typesbiens = $request->typesbiens;
    $quartier = $request->quartier;
    $ville = $request->ville;
    $pays = $request->pays;
    $minprice = $request->minprice;
    $maxprice = $request->maxprice;
    //dd("types biens: ".$typesbiens." - Quartier :".$quartier." - Ville :".$ville." - Pays: ".$pays." - Minprice: ".$minprice." - Maxprice: ".$maxprice);
    $output = '';
    //Filtre Error :: Aucun champ rempli
    if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays=='' && $minprice=='' && $maxprice=='') {
       $output.='<div class="alert alert-primary" role="alert">Aucun résultat, Veuillez préciser votre recherche</div>';
    }else {
       $result = FilterRent($typesbiens,$pays,$ville,$quartier,$minprice,$maxprice);
       $nbres = count($result);
       //dd($nbres);
       if ($nbres==0) {
           $output.='<div class="alert alert-primary" role="alert">Aucun résultat, pour cette recherche</div>';
       }else {
          foreach ($result as $biens) {
           $output.='
           <!-- Item-->
           <div class="col-sm-6 col-xl-4">
             <div class="card shadow-sm card-hover border-0 h-100">
               <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="#"></a>
                 <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Dispo</span></div>
                 <div class="content-overlay end-0 top-0 pt-3 pe-3">
                   <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                 </div>
                 <a href="#" class="d-block rounded-3 overflow-hidden">
                   <img class="d-block" src="'.$biens->img1.'">
                 </a>
               </div>
               <div class="card-body position-relative pb-3">
                 <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">'.ReadOperaID($biens->typesoperations_idtypesoperations)->operation.'</h4>
                 <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="#">'.$biens->libele.'</a></h3>
                 <p class="mb-2 fs-sm text-muted">'.$biens->resume.'</p>
                 <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>'.$biens->prix.' Fcfa</div>
               </div>
  
               <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                 <a href="single?biens='.$biens->idbiens.'">
                   <button type="button" class="btn btn-outline-primary rounded-pill">
                    <i class="fi-heart-filled ms-1 mt-n1 fs-lg text-muted"></i> Visiter
                   </button>
                 </a>
               </div>
  
             </div>
           </div>
           ';
          }
       }
    }
    return $output;
}
//Location de biens immobiliers
public function locate()
{
    return view('locate');
}
//Recherche autimatique de biens by filter
public function SearchFilt(Request $request)
{
  $opera = $request->opera;
  $typesbiens = $request->typesbiens;
  $quartier = $request->quartier;
  $ville = $request->ville;
  $pays = $request->pays;
  $minprice = $request->minprice;
  $maxprice = $request->maxprice;
  //dd("types biens: ".$typesbiens." - Quartier :".$quartier." - Ville :".$ville." - Pays: ".$pays." - Minprice: ".$minprice." - Maxprice: ".$maxprice);
  $output = '';
  //Filtre Error :: Aucun champ rempli
  if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays=='' && $minprice=='' && $maxprice=='') {
     $output.='<div class="alert alert-primary" role="alert">Aucun résultat, Veuillez préciser votre recherche</div>';
  }else {
     $result = Filter($opera,$typesbiens,$pays,$ville,$quartier,$minprice,$maxprice);
     $nbres = count($result);
     //dd($nbres);
     if ($nbres==0) {
         $output.='<div class="alert alert-primary" role="alert">Aucun résultat, pour cette recherche</div>';
     }else {
        foreach ($result as $biens) {
         $output.='
         <!-- Item-->
         <div class="col-sm-6 col-xl-4">
           <div class="card shadow-sm card-hover border-0 h-100">
             <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="#"></a>
               <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Dispo</span></div>
               <div class="content-overlay end-0 top-0 pt-3 pe-3">
                 <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
               </div>
               <a href="#" class="d-block rounded-3 overflow-hidden">
                 <img class="d-block" src="'.$biens->img1.'">
               </a>
             </div>
             <div class="card-body position-relative pb-3">
               <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">'.ReadOperaID($biens->typesoperations_idtypesoperations)->operation.'</h4>

               <span class="text-success"><i class="fi-map-pin mt-n1 me-2 lead align-middle opacity-70"></i>'.ReadPaysID($biens->pays)->pays.' - '.ReadVillID($biens->villes)->ville.' - '.ReadQuartierID($biens->quartier)->nom.' </span>
              
               <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="#">'.$biens->libele.'</a></h3>
               <p class="mb-2 fs-sm text-muted">'.$biens->resume.'</p>
               <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>'.$biens->prix.' Fcfa</div>
             </div>

             <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
               <a href="single?biens='.$biens->idbiens.'">
                 <button type="button" class="btn btn-outline-primary rounded-pill">
                  <i class="fi-heart-filled ms-1 mt-n1 fs-lg text-muted"></i> Visiter
                 </button>
               </a>
             </div>

           </div>
         </div>
         ';
        }
     }
  }
  return $output;
}
//Recherche automatique de biens by libele
public function searchProd(Request $request)
{
    $name = $request->prod;
    $res = ReadProdName($name);
    $nbres = count($res);
    //dd($nbres);
    $output = '';
    if ($nbres!=0) {
        foreach ($res as $biens) {
            $output.='
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>'.$biens->libele.'(<span class="text-primary"><i class="fi-map-pin fa-2x"></i>: '.ReadPaysID($biens->pays)->pays.','.ReadVillID($biens->villes)->ville.','.ReadQuartierID($biens->quartier)->nom.'</span>) <br> '.$biens->resume.'</span>
                    <a href="single?biens='.$biens->idbiens.'">
                     <span class="badge bg-success"><i class="fi-check"></i> Visiter</span>
                    </a>
                </li>
            ';
        }
    }else {
        $output.='
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Aucun résultat pour cette recherche</span>
                </li>
            ';
    }
    
    return $output;
}
    
/**
 *  -------------------------------
 *   SYSTEM DE GESTION DE RDV
 *  -------------------------------
 */
//Proposition de bien
public function savebiens(Request $request)
{
   $nomp = $request->nom;
   $telp = $request->tel;
   $lieup = $request->lieu;
   $morep = $request->more;
   if ($nomp!=''&&$telp!=''&&$lieup!=''&&$morep!='') {
      $msg = "Infos Clients Proposition de biens:
              - Nom:".$nomp."
              - Phone :".$telp."
              - Lieu :".$lieup."
              - Biens :".$morep;
      SendEmail(notifMail(),'Proposer un bien',$msg);
     $output = "Proposition reçu avec succès, nous vous contactons dans 24H";
   }else {
     $output = "Veuillez remplir correctement le formulaire";
   }
   return response()->json(['msg'=>$output]);
}
//Return RDV
public function returnRdv(Request $request)
{
  if ($request->transaction_id) {
    $id_transaction = $request->transaction_id;
    #Vérification de la transaction par l'id
    $trans = ReadTransID($id_transaction);
    if ($trans->statut==1) {
        $info = "Votre prise de Rendez-vous a été effectuée avec succès. Notre Agent LogRapid vous contactera pour la visite du biens immobilier .Veuillez consulter votre addresse Email pour plus de détails";
        $title = "Visite LogRapid";
        $libele = "Ok";
        $url = 'morehome';
        return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
        die();
    }else {
        $info = "Votre paiement a échoué.";
        $title = "Visite LogRapid";
        $libele = "Reprendre";
        $url = 'single?biens='.$trans->codebiens;
        //dd($url);
        return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
        die();
    }
  }
}
//Notify RDV
public function notifyRdv(Request $request)
{
  //Id transaction
  $id_transaction = $request->cpm_trans_id; 	
  //apiKey
  $apikey = apikey();
  //Veuillez entrer votre siteId
  $site_id = siteID();
  //Version
  $version = "V2";
  //Verification de la transaction
  $trans = ReadTransID($id_transaction);
  
  if ($trans) {
        if ($trans->statut!=1) {
          //Nouveau paiement
          $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-checkout.cinetpay.com/v2/payment/check',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            #curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0),
            #curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0),
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>     '{
                  "transaction_id":"'.$id_transaction.'",
                  "site_id": "'.$site_id.'",
                  "apikey" : "'.$apikey.'"
              }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
          ));

          $response = curl_exec($curl);
          curl_close($curl);
          $result = json_decode($response);
          #dd($result);
          //Traitement en cas de paiement succès
          if ($result->{'code'}=='00') {
              #Transaction infos
              $nom = $trans->nom;
			        $phone = $trans->phone;
      			  $mail = $trans->mail;
      			  $marchand = $trans->marchand;
      			  $debut = $trans->debut;
      			  $fin = $trans->fin;
      			  $idbiens = $trans->codebiens;
      			  $idgerants = ReadBiensID($idbiens)->gerants_idgerant;
      			  $amount = $trans->amount;
      			  $pass = $trans->passclts;
      			  $codeAgent = $trans->codeagent;
              #Custumer infos
              $clients = ReadClientPass($pass)->idclients;
              #Save visite
              $codevisite = SaveVisite($clients,$idbiens,$idgerants,$debut,$fin,$codeAgent);
			        #Save Marchand AND LogRapid payment
			        if ($marchand!=0) {
				        #Save Marchand Payment
				        MarchandPay($codevisite,$debut,0,500,$marchand);
				        #Save LogRapid Payment
				        logRapidPay($codevisite,$debut,0,1500);
			        }else {
				        #Save LogRapid Payment
				        logRapidPay($codevisite,$debut,0,2000);
			        }
               #Update transaction statut
               UpdTransID($id_transaction);
			  
			         #Send SMS LogRapid to custumer
			         $sms = "Visite:".$codevisite.", Biens:".ReadBiensID($idbiens)->codebiens."/Gerant:".ReadgerantID($idgerants)->phone.", Mail:".$mail." ,Pass: ".$pass;
			        try {
				       $sender = "LOGRAPID";
				       Sendsms($sms,$phone,$sender);
			        } catch (\Throwable $e) {
				       //throw $th;
				       echo $e->getMessage();
			        }
              #Send Email to Gerant
			        $gerantmail = ReadgerantID($idgerants)->mail;
			        $titre = "LogRapid : Nouvelle visite";
			        $msgG = "Infos Clients :
								- Nom:".$nom."
								- Phone :".$phone."
								- Email :".$mail."
								- Code visite :".$codevisite." 
								- Code Biens :".ReadBiensID($idbiens)->codebiens."
								- Biens :".ReadBiensID($idbiens)->libele."
								- Date Visite :".$debut." au ".$fin."
								- Voir le biens: ".env('APP_URL')."/single?biens=".$idbiens;
			        try {
				       SendEmail($gerantmail,$titre,$msgG);
			        } catch (\Throwable $th) {
				       echo $th->getMessage();
			        }      
			  
              #Send Email to custumer
              $titre = "LogRapid : Nouvelle visite";
              $msgC = "Infos Agent LogRapid :
                - Nom:".ReadgerantID($idgerants)->nom."
                - Phone :".ReadgerantID($idgerants)->phone."
                - Email :".ReadgerantID($idgerants)->mail."
                - Code visite :".$codevisite." 
                - Code Biens :".ReadBiensID($idbiens)->codebiens."
                - Biens :".ReadBiensID($idbiens)->libele."
                - Date Visite :".$debut." au ".$fin."
                - Voir le biens: ".env('APP_URL')."/single?biens=".$idbiens."
              -------------------------------------------
              Infos de votre Compte LogRapid:
                - Email :".$mail."
                - Mot de passe :".$pass."
                Akawaba sur LogRapid (www.lograpid.com) !";
			        try {
				       SendEmail($mail,$titre,$msgC);
			        } catch (\Throwable $th) {
				       echo $th->getMessage();
			        }    
          }
			
        }  
  }
}

//Save RDV
public function saveRdv(Request $request)
{
    
    //Check Connection custumer
    if (isset($_SESSION['clientID']) AND !empty($_SESSION['clientID'])) {
     $nom = ReadClientID($_SESSION['clientID'])->nom;
     $phone = ReadClientID($_SESSION['clientID'])->phone;
     $mail = ReadClientID($_SESSION['clientID'])->mail;
    }else {
     $nom = $request->nomV;
     $phone = "225".$request->phoneV;
     $mail = $request->mailV;
     if (strlen($phone)!=13 AND !isset($_SESSION['clientID'])) {
      return response()->json(['msg'=>'Veuillez saisir correctement votre numéro de téléphone : 10 chiffres','info'=>'0']);
      die();
     }
    }

    //Check Marchand code
    $codebiens = $request->codebiensV;
    if ($request->codemarchdV=="") {
     $marchand = 0;
    }else {
     $marchand = $request->codemarchdV;
     #Check marchand code existing
     $res = Marchandconect($marchand);
     if ($res) {
      $marchand = $request->codemarchdV;
     }else {
       return response()->json(['msg'=>'Veuillez vérifier le code Marchand','info'=>'0']);
       die();
     }
    }
    
    //Check Agent Code
    if ($request->codeagentV=="") {
      $codeAgent = 0;
    }else {
      $codeAgent = $request->codeagentV;
      #Check Agent Code existing
      $res = CheckAgent($codeAgent);
      if ($res) {
        $codeAgent = $request->codeagentV;
      }else {
        return response()->json(['msg'=>'Veuillez vérifier le code Agent','info'=>'0']);
        die();
      }
    }
    $resMail = valid_email($mail);
    //dd($marchand);
    //Contrôle des champs
    if ($resMail!='true') {
      return response()->json(['msg'=>'Veuillez saisir correctement votre Email','info'=>'0']);
      die();
    }
    
    if ($nom=='') {
        return response()->json(['msg'=>'Veuillez saisir votre nom','info'=>'0']);
        die();
    }
    elseif($phone==''){
        return response()->json(['msg'=>'Veuillez saisir votre numéro de téléphone','info'=>'0']);
        die();
    }
    else {
     //Ouverture de nouveau compte :: Check Client existing
     $res = ReadClientEmail($mail);
     if ($res) {
        $mail = $res->mail;
        $passclts = $res->pass;
        if (!isset($_SESSION['clientID'])) {
          $_SESSION['clientID'] = ReadClientPass($passclts)->idclients;
        }
     }else {
        #Save new client
        $passclts = SaveClient($nom,$phone,$mail);
        $_SESSION['clientID'] = ReadClientPass($passclts)->idclients;
     }   
     
     //Calcul de la date du rdv
     $debut = date('d-m-Y H:m');
     $fin =  date('d-m-Y H:m', strtotime($debut. ' + 1 days'));

     //Check Coupons existing
     $coupon = $request->couponImov;
     $rescoup = Checkcoupon($coupon,$mail);
     if ($resMail=='true') {
      #save visite
      $codeAgentp = $codeAgent;
      $debutp = $debut; 
      $finp = $fin; 
      $idgerantsp = ReadBiensID($codebiens)->gerants_idgerant;
      $idbiensp = $codebiens;
      $clientsp = ReadClientPass($passclts)->idclients;
      $codevisite = SaveVisite($clientsp,$idbiensp,$idgerantsp,$debutp,$finp,$codeAgentp);
      #Update coupons state
      #Updcoupons($coupon,$mail,1);
      #Send SMS Immover to custumer
      $sms = "Visite:".$codevisite.", Biens:".ReadBiensID($idbiensp)->codebiens."/Gerant:".ReadgerantID($idgerantsp)->phone." Contacter nous en cas de soucis au 0798081047. Merci d'utiliser la solution ImmOver";
      try {
        $sender = "IMMOVER";
        Sendsms($sms,$phone,$sender);
       } catch (\Throwable $e) {
        //throw $th;
        echo $e->getMessage();
      }
      #Send Email to gerant
      $gerantmail = ReadgerantID($idgerantsp)->mail;
			$titre = "Immover : Nouvelle visite";
			$msgG = "Infos Clients :
								- Nom:".$nom."
								- Phone :".$phone."
								- Email :".$mail."
								- Code visite :".$codevisite." 
								- Code Biens :".ReadBiensID($idbiensp)->codebiens."
								- Biens :".ReadBiensID($idbiensp)->libele."
								- Date Visite :".$debut." au ".$fin."
								- Voir le biens: ".env('APP_URL')."/single?biens=".$idbiensp;
			try {
			 SendEmail($gerantmail,$titre,$msgG);
			 SendEmail('immovere@gmail.com',$titre,$msgG);
			} catch (\Throwable $th) {
			 echo $th->getMessage();
			}   
      
      #Send Email to custumer
      $titre = "Immover : Nouvelle visite";
      $msgC = "Infos Agent Immover :
                - Nom:".ReadgerantID($idgerantsp)->nom."
                - Phone :".ReadgerantID($idgerantsp)->phone."
                - Email :".ReadgerantID($idgerantsp)->mail."
                - Code visite :".$codevisite." 
                - Code Biens :".ReadBiensID($idbiensp)->codebiens."
                - Biens :".ReadBiensID($idbiensp)->libele."
                - Date Visite :".$debut." au ".$fin."
                - Voir le biens: ".env('APP_URL')."/single?biens=".$idbiensp."
              -------------------------------------------
              Infos de votre Compte Immover:
                - Email :".$mail."
                - Mot de passe :".$passclts."
              Akawaba sur Immover (www.immover.io) !";
			try {
			 SendEmail($mail,$titre,$msgC);
			} catch (\Throwable $th) {
			 echo $th->getMessage();
			}  
      return response()->json(['msg'=>'Prise de rendez-vous effectuées avec succès','info'=>'1']);
       
     }
     else {
      //Préparation du Guichet de paiement CinetPay
      try {
        $currency = 'XOF';
        $amount = 150;
        $description = "Prise de Rendez-vous Immover";
        //Initiate variable for credit card
        $alternative_currency = 'XOF';
        $customer_email = $mail;
        $customer_phone_number =$phone;
        $customer_address = 'Abidjan';
        $customer_city = 'Abidjan';
        $customer_country = 'CI';
        $customer_state = 'ABJ';
        $customer_zip_code ='225';
        //Transaction ID
        $id_transaction = date("YmdHis");
        //apiKey
        $apikey = apikey();
        //Veuillez entrer votre siteId
        $site_id = siteID();
        //version
        $version = "V2";
        //notify url
        $notify_url = env('APP_URL').'/notifyRdv';
        //return url
        $return_url = env('APP_URL').'/returnRdv';
        //Channel list
        $channels = "ALL";
        //Create Guichet
        $formData = array(
        "transaction_id"=> $id_transaction,
        "amount"=> $amount,
        "currency"=> $currency,
        "customer_surname"=>$nom,
        "customer_name"=>$nom,
        "description"=> $description,
        "notify_url" => $notify_url,
        "return_url" => $return_url,
        "channels" => $channels,
        //Pour afficher le paiement par carte de crédit
        "alternative_currency" => $alternative_currency,
        "customer_email" => $customer_email,
        "customer_phone_number" => $customer_phone_number,
        "customer_address" => $customer_address,
        "customer_city" => $customer_city,
        "customer_country" => strtoupper($customer_country),
        "customer_state" => $customer_state,
        "customer_zip_code" => $customer_zip_code
        );
        //Save transaction
        $id_transaction = date("YmdHis");
        SaveTrans($nom,$phone,$mail,$marchand,$debut,$fin,$codebiens,$amount,$id_transaction,$passclts,$codeAgent);
        //Lancement de CinetPay
        $CinetPay = new CinetPay($site_id, $apikey, $version);
        $result = $CinetPay->generatePaymentLink($formData);
        //Traitement du resultat
        if ($result['code']=='201') {
         $url = $result["data"]["payment_url"];
         return response()->json(['msg'=>$url,'info'=>'1']);
        }
      }catch (\Throwable $th) {
          echo $th->getMessage();
      }
    }
    

    }
    


}
 /**
 *  ----------------------------------------
 *   SYSTEM D'ALERTE CLIENT FOR ERROR
 *  ----------------------------------------
 */
//Alert info :: Client
public function alertinfo(Request $request)
{
    $url = $request->url;
    $info = $request->info;
    $libele = $request->libele;
    $title = $request->title;
    return view('alertinfo')->with('info',$info)
                            ->with('libele',$libele)
                            ->with('title',$title)
                            ->with('url',$url);
}

 /**
 *  ----------------------------------------
 *   SYSTEM DE GESTION DE BIENS CLIENT FRONT
 *  ----------------------------------------
 */
//Desactivation automatique de biens
public function activBiens(Request $request)
{
  ActvBiens();
  return response()->json(['msg'=>'1']);
}
//Update biens
public function UpdBienSelect(Request $request)
{
  //dd($request);
  /**
   * ------------
   * OPERATION 
   * -----------
   */
  //File .env
  $lien  = env('LIEN_FILE');
  //Operation
  if ($request->operations=='Choisir') {
    $opera = $request->operaS;
  }else {
    $opera = $request->operations;
  }
  //Type de biens
  if ($request->typesbiens=='Choisir') {
    $typesbiens = $request->typebS;
  }else {
    $typesbiens = $request->typesbiens;
  }
  //Gerant
  if ($request->gerant=='Choisir') {
    $gerant = $request->gerantS;
  }else {
    $gerant = $request->gerant;
  }
  //Pays
  if ($request->pays=='Choisir') {
    $pays = $request->paysS;
  }else {
    $pays = $request->pays;
  }
  //Ville
  if ($request->villes=='Choisir') {
    $ville = $request->villesS;
  }else {
    $ville = $request->villes;
  }
  //Quartier
  if ($request->quartier=='Choisir') {
    $quartier = $request->quartierS;
  }else {
    $quartier = $request->quartier;
  }
  //Libele
  $libele = $request->libele;
  //Prix 
  $prix = $request->prix;
  //Resume
  $resume = $request->resume;
  //Description
  $descript = $request->descript;
  //Image 1
  if ($request->file('img1')=='') {
    $img1 = $request->img1S;
  }else {
    $file1 = $request->file('img1');
    //Dossier de stockage
    $path1 = $file1->store('biensphoto','public');
    $img1 = $lien.$path1;
  }
  //Image 2
  if ($request->file('img2')=='') {
    $img2 = $request->img2S;
  }else {
    $file2 = $request->file('img2');
    $path2 = $file2->store('biensphoto','public');
    $img2 = $lien.$path2;
  }
  //Image 3
  if ($request->file('img3')=='') {
    $img3 = $request->img3S;
  }else {
    $file3 = $request->file('img3');
    $path3 = $file3->store('biensphoto','public');
    $img3 = $lien.$path3;
  }
  //Image 4
  if ($request->file('img4')=='') {
    $img4 = $request->img4S;
  }else {
    $file4 = $request->file('img4');
    $path4 = $file4->store('biensphoto','public');
    $img4 = $lien.$path4;
  }
  //Image 5
  if ($request->file('img5')=='') {
    $img5 = $request->img5S;
  }else {
    $file5 = $request->file('img5');
    $path5 = $file5->store('biensphoto','public');
    $img5 = $lien.$path5;
  }
  //Image 6
  if ($request->file('img6')=='') {
    $img6 = $request->img6S;
  }else {
    $file6 = $request->file('img5');
    $path6 = $file6->store('biensphoto','public');
    $img6 = $lien.$path6;
  }
  //Image 7
  if ($request->file('img7')=='') {
    $img7 = $request->img7S;
  }else {
    $file7 = $request->file('img7');
    $path7 = $file7->store('biensphoto','public');
    $img7 = $lien.$path7;
  }
  //Image 8
  if ($request->file('img8')=='') {
    $img8 = $request->img8S;
  }else {
    $file8 = $request->file('img7');
    $path8 = $file8->store('biensphoto','public');
    $img8 = $lien.$path8;
  }
  $bienid = $request->idbiens;
  UpdBiens($bienid,$opera,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$img1,$img2,$img3,$img4,$img5,$img6,$img7,$img8);
  //dd($request->url);
  if ($request->url=='BiensG') {
    //return view('updbiensG')->with('idbiens',$request->biens);
    return redirect('updBiens?biens='.$bienid.'&act=1&&url=BiensG');
  }else {
    //return view('updbiens')->with('idbiens',$request->biens);
    return redirect('updBiens?biens='.$bienid.'&act=1');
  }

}
//Page de modification de biens
public function updBiens(Request $request)
{
  if ($request->url=='BiensG') {
    return view('updbiensG')->with('idbiens',$request->biens);
  }else {
    return view('updbiens')->with('idbiens',$request->biens);
  }
  
}
//single page :: Details biens
public function single(Request $request)
{
    $biens = $request->biens;
    $res = ReadBiensID($biens);
    if ($res!=''&&$res->statut==0||isset($request->act)) {
        return view('single')->with('biens',$biens);
    }else {
     $info = "Ce biens immobilier n'est pas disponible";
     $title = "Recherche de biens immobilier";
     $libele = "Voir plus";
     $url = 'morehome';
     return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
    }
    
}

}
