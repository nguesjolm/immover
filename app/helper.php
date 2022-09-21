<?php
session_start();
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


/**
 *  ---------------------------------
 *  SYSTEME  DE GESTION DES ALERTES
 *  --------------------------------
 */
//Read biens by code
function FiltBiensCode($code)
{
   $bienscode = DB::table('biens')->where('codebiens','=',$code)
                                   ->where('statut','=',0)
                                   ->first();
   return $bienscode;
}
//Filter Alerte Demande
function FiltDemand($opera,$pays,$ville,$quartier,$type)
{
   $demand = DB::table('alerte')->where('typopera','=',$opera)
                                ->where('pays','=',$pays)
                                ->where('ville','=',$ville)
                                ->where('quartier','=',$quartier)
                                ->where('typebien','=',$type)
                                ->where('stat','=',0)
                                ->get();
   return $demand;
}
//Send Alerte to custumer
function sendAlerte($opera,$pays,$ville,$quartier,$type,$codebiens)
{
   //Check Biens
   $biens = FiltBiensCode($codebiens);
   
   //Check demande
   $demnd = FiltDemand($opera,$pays,$ville,$quartier,$type);
   $nb = count($demnd);
   if ($nb!=0) {
      foreach ($demnd as $demd) {
         //send Email alerte
         $titre = "ImmOver :".$biens->libele;
         $msgG = "Infos Biens :
                  - Voir le biens: ".env('APP_URL')."/single?biens=".$biens->idbiens."
                  - Désactiver votre alerte de demande ImmOver: ".env('APP_URL')."/lockDemnd?demande=".$demd->alerteid;
         SendEmail($demd->email,$titre,$msgG);  
         //dd($demd->email,$titre,$msgG);         
      }
      //Send Push
   }
   
}
//Read demande by ID
function DemandeID($demande)
{
   $demand = DB::table('alerte')->where('alerteid','=',$demande)
                                ->first();
   return $demand;
}
//Update demande All stat
function DemandeStat()
{
   DB::table('alerte')->where('budget','=',0)
                      ->update(['stat'=>1]);
}

//Read demande All
function DemandeAll($stat)
{
   $demand = DB::table('alerte')->where('stat','=',$stat)
                                ->get();
   return $demand;
}
//Bloquer une demande
function lockDemande($demande)
{
   DB::table('alerte')->where('alerteid','=',$demande)
                      ->update(['stat'=>1]);
}
//Save alerte
function SaveDemande($opera,$pays,$ville,$quartier,$type,$mail,$budget,$tel)
{
   //Data
   $datas = ['typopera'=>$opera,
             'pays'=>$pays,
             'ville'=>$ville,
             'quartier'=>$quartier,
             'typebien'=>$type,
             'email'=>$mail,
             'budget'=>$budget,
             'tel'=>$tel
            ];
   //Check
   $res = DB::table('alerte')->where('typopera','=',$opera)
                             ->where('pays','=',$pays)
                             ->where('ville','=',$ville)
                             ->where('quartier','=',$quartier)
                             ->where('typebien','=',$type)
                             ->where('email','=',$mail)
                             ->where('stat','=',0)
                             ->first();
   //Insert
   if ($res) {
      return 0;
   }else {
      DB::table('alerte')->insert($datas);
      return 1;
   }
   
}

/**
 * --------------------------------------
 * SYSTEME DE GESTION DES DEMANDES
 * --------------------------------------
 */
//Read Proprio phone
function ReadProprio($code)
{
   $demand = DB::table('soumissions')->where('demndcodes','=',$code)
                                     ->get();
   return $demand;
}
//Update Demande and pub
function PubUpdDemnd($more,$idDemd)
{
   DB::table('demandes')->where('demandeID','=',$idDemd)
                        ->update(['more'=>$more,
                                  'demandeID'=>$idDemd,
                                  'stat'=>3
                                 ]);
}
//Read Demande by ID
function ReadDemndID($id)
{
   $demand = DB::table('demandes')->where('demandeID','=',$id)
                                  ->first();
   return $demand;
}
//Filter demandes by opera
function FilterDemndOpera($opera,$stat)
{
   $filterResult = DB::table('demandes')->where('opera','=',$opera)
                                        ->where('stat','=',$stat)
                                        ->get();
   return $filterResult;
}
//Filter demandes
function FilterDemnd($typesbiens,$pays,$ville,$quartier,$opera,$stat)
{
   $filterResult = DB::table('demandes')->where('typesbiens','=',$typesbiens)
                                        ->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->where('opera','=',$opera)
                                        ->where('stat','=',$stat)
                                        ->get();
   return $filterResult;
}
//Verify transaction
function ReadTransIDdemd($idtrans)
{
   $trans = DB::table('demandepay')->where('transid','=',$idtrans)->first();
   return $trans;
}
//Save bien soumis
function SaveDemand($code,$phone)
{
   $soumis = DB::table('soumissions')->where('demndcodes','=',$code)->where('proprio','=',$phone)->first();
   if ($soumis=='') {
      $datas = ['demndcodes'=>$code,'proprio'=>$phone];
      DB::table('soumissions')->insert($datas);
   }
}
//Generate demandes codes
function Demandcodes()
{
   $Demandcode = rand(10,5000);
   $Demand = DB::table('demandes')->where('codes','=',$Demandcode)->first();
   if ($Demand) {
      $res = rand(10,5000);
   }else {
      $res = $Demandcode;
   }
   return $res;
}
//Update state of demande
function UpdDemand($stat,$demand)
{
   DB::table('demandes')->where('demandeID','=',$demand)
                        ->update(['stat'=>$stat]);

}
//Read All demandes pub
function PubDemnd($stat,$pub)
{
   $Demand = DB::table('demandes')->where('stat','=',$stat)->where('pub','=',$pub)->get();
   return $Demand;
}
//Read All demande by stat
function ReadDemand($stat)
{
   $Demand = DB::table('demandes')->where('stat','=',$stat)->get();
   return $Demand;
}
//Nouvelle demande
function NewDemand($opera,$pays,$villes,$quartier,$typesbiens,$whats,$mail,$more,$transid)
{
   $datas = ['codes'=>Demandcodes(),
            'opera'=>$opera,
            'pays'=>$pays,
            'villes'=>$villes,
            'typesbiens'=>$typesbiens,
            'quartier'=>$quartier,
            'whatsap'=>$whats,
            'mail'=>$mail,
            'more'=>$more,
            'transid'=>$transid,
            'stat'=>0
         ];
   DB::table('demandes')->insert($datas);
}

/**
 * -------------------------
 * SYSTEME DE CONTROLE REGEX
 * -------------------------
 */
//Contrôle Email validation
function valid_email($str) 
{
   return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

/**
 * ----------------------------------
 * SYSTEME DE RECHERCHE AUTOMATIQUE
 * ----------------------------------
 */
//Calculate property price
function Priceproperty($opera,$typesbiens,$quartier,$ville,$pays)
{
   $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)
                                    ->where('pays','=',$pays)
                                    ->where('villes','=',$ville)
                                    ->where('quartier','=',$quartier)
                                    ->where('typesoperations_idtypesoperations','=',$opera)
                                    ->select('prix')
                                    ->distinct()
                                    ->get();
   return $filterResult;
}
//Filtre de recherche achat
function FilterBuy($typesbiens,$pays,$ville,$quartier,$minprice,$maxprice)
{
   //Filtre by typesbiens + pays + Ville + Quartier
   if ($typesbiens!=''&& $quartier!=''&& $ville!=''&& $pays!='' && $minprice=='' && $maxprice=='')
   {
     $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)
                                       ->where('pays','=',$pays)
                                       ->where('villes','=',$ville)
                                       ->where('quartier','=',$quartier)
                                       ->where('statut','=',0)
                                       ->where('typesoperations_idtypesoperations','=',9)
                                       ->get();
   }
   //Filtre by pays
   if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays!='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('pays','=',$pays)->where('statut','=',0)->where('typesoperations_idtypesoperations','=',9)->get();
   }
   //Filtre by Villes
   if ($typesbiens==''&& $quartier==''&& $ville!=''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('villes','=',$ville)->where('statut','=',0)->where('typesoperations_idtypesoperations','=',9)->get();
   }
   //Filtre by Quartier
   if ($typesbiens==''&& $quartier!=''&& $ville==''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('quartier','=',$quartier)->where('statut','=',0)->where('typesoperations_idtypesoperations','=',9)->get();
   }
   //Filtre by Pays + Ville
   if ($typesbiens==''&& $quartier==''&& $ville!=''&& $pays!='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('statut','=',0)
                                        ->where('typesoperations_idtypesoperations','=',9)
                                        ->get();
   }
   //Filtre by Ville + Quartier
   if ($typesbiens==''&& $quartier!=''&& $ville!=''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->where('typesoperations_idtypesoperations','=',9)
                                        ->get();
   }
   //Filtre by Pays + Ville + Quartier
   if ($typesbiens==''&& $quartier!=''&& $ville!=''&& $pays!='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->where('statut','=',0)
                                        ->where('typesoperations_idtypesoperations','=',9)
                                        ->get();
   }
   //Filtre by types de biens
   if ($typesbiens!=''&& $quartier==''&& $ville==''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)->where('statut','=',0)->where('typesoperations_idtypesoperations','=',8)->get();
   }
   //Filtre by typesbiens + pays + Ville + Quartier + Min price + Max price
   if ($typesbiens!=''&& $quartier!=''&& $ville!=''&& $pays!='' && $minprice!='' && $maxprice!='')
   {
      //dd("Filtre by typesbiens + pays + Ville + Quartier + Minprice + Maxprice");
      $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)
                                        ->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->where('prix', 'BETWEEN', $minprice, 'AND', $maxprice)
                                        ->where('statut','=',0)
                                        ->where('typesoperations_idtypesoperations','=',9)
                                        ->get();
   }
   //Filtre Min price + Max price
   if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays=='' && $minprice!='' && $maxprice!='')
   {
      //dd("Filtre by typesbiens + pays + Ville + Quartier + Minprice + Maxprice");
      $filterResult = DB::table('biens')->whereBetween('prix', [$minprice, $maxprice])
                                        ->where('statut','=',0)
                                        ->where('typesoperations_idtypesoperations','=',9)
                                        ->get();
   }

   return $filterResult;
}
//Filtre de recherche Location
function FilterRent($typesbiens,$pays,$ville,$quartier,$minprice,$maxprice)
{
   //Filtre by typesbiens + pays + Ville + Quartier
   if ($typesbiens!=''&& $quartier!=''&& $ville!=''&& $pays!='' && $minprice=='' && $maxprice=='')
   {
     $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)
                                       ->where('pays','=',$pays)
                                       ->where('villes','=',$ville)
                                       ->where('quartier','=',$quartier)
                                       ->where('statut','=',0)
                                       ->where('typesoperations_idtypesoperations','=',8)
                                       ->get();
   }
   //Filtre by pays
   if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays!='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('pays','=',$pays)->where('statut','=',0)->where('typesoperations_idtypesoperations','=',8)->get();
   }
   //Filtre by Villes
   if ($typesbiens==''&& $quartier==''&& $ville!=''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('villes','=',$ville)->where('statut','=',0)->where('typesoperations_idtypesoperations','=',8)->get();
   }
   //Filtre by Quartier
   if ($typesbiens==''&& $quartier!=''&& $ville==''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('quartier','=',$quartier)->where('statut','=',0)->where('typesoperations_idtypesoperations','=',8)->get();
   }
   //Filtre by Pays + Ville
   if ($typesbiens==''&& $quartier==''&& $ville!=''&& $pays!='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('statut','=',0)
                                        ->where('typesoperations_idtypesoperations','=',8)
                                        ->get();
   }
   //Filtre by Ville + Quartier
   if ($typesbiens==''&& $quartier!=''&& $ville!=''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->where('typesoperations_idtypesoperations','=',8)
                                        ->get();
   }
   //Filtre by Pays + Ville + Quartier
   if ($typesbiens==''&& $quartier!=''&& $ville!=''&& $pays!='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->where('statut','=',0)
                                        ->where('typesoperations_idtypesoperations','=',8)
                                        ->get();
   }
   //Filtre by types de biens
   if ($typesbiens!=''&& $quartier==''&& $ville==''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)->where('statut','=',0)->where('typesoperations_idtypesoperations','=',8)->get();
   }
   //Filtre by typesbiens + pays + Ville + Quartier + Min price + Max price
   if ($typesbiens!=''&& $quartier!=''&& $ville!=''&& $pays!='' && $minprice!='' && $maxprice!='')
   {
      //dd("Filtre by typesbiens + pays + Ville + Quartier + Minprice + Maxprice");
      $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)
                                        ->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->where('prix', 'BETWEEN', $minprice, 'AND', $maxprice)
                                        ->where('statut','=',0)
                                        ->where('typesoperations_idtypesoperations','=',8)
                                        ->get();
   }
   //Filtre Min price + Max price
   if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays=='' && $minprice!='' && $maxprice!='')
   {
      //dd("Filtre by typesbiens + pays + Ville + Quartier + Minprice + Maxprice");
      $filterResult = DB::table('biens')->whereBetween('prix', [$minprice, $maxprice])
                                        ->where('statut','=',0)
                                        ->where('typesoperations_idtypesoperations','=',8)
                                        ->get();
   }

   return $filterResult;
}
//Filtre de recherche Globale
function Filter($opera,$typesbiens,$pays,$ville,$quartier,$minprice,$maxprice)
{
   //Filtre by typesbiens + pays + Ville + Quartier
   if ($typesbiens!=''&& $quartier!=''&& $ville!=''&& $pays!='' && $minprice=='' && $maxprice=='')
   {
     $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)
                                       ->where('pays','=',$pays)
                                       ->where('villes','=',$ville)
                                       ->where('quartier','=',$quartier)
                                       ->where('typesoperations_idtypesoperations','=',$opera)
                                       ->where('statut','=',0)
                                       ->get();
   }
   //Filtre by pays
   if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays!='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('pays','=',$pays)->where('statut','=',0)->get();
   }
   //Filtre by Villes
   if ($typesbiens==''&& $quartier==''&& $ville!=''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('villes','=',$ville)->where('statut','=',0)->get();
   }
   //Filtre by Quartier
   if ($typesbiens==''&& $quartier!=''&& $ville==''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('quartier','=',$quartier)->where('statut','=',0)->get();
   }
   //Filtre by Pays + Ville
   if ($typesbiens==''&& $quartier==''&& $ville!=''&& $pays!='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('statut','=',0)
                                        ->get();
   }
   //Filtre by Ville + Quartier
   if ($typesbiens==''&& $quartier!=''&& $ville!=''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->get();
   }
   //Filtre by Pays + Ville + Quartier
   if ($typesbiens==''&& $quartier!=''&& $ville!=''&& $pays!='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->where('statut','=',0)
                                        ->get();
   }
   //Filtre by types de biens
   if ($typesbiens!=''&& $quartier==''&& $ville==''&& $pays=='' && $minprice=='' && $maxprice=='') {
      $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)->where('statut','=',0)->get();
   }
   //Filtre by typesbiens + pays + Ville + Quartier + Min price + Max price
   if ($typesbiens!=''&& $quartier!=''&& $ville!=''&& $pays!='' && $minprice!='' && $maxprice!='')
   {
      //dd("Filtre by typesbiens + pays + Ville + Quartier + Minprice + Maxprice");
      $filterResult = DB::table('biens')->where('typesbiens_idtypes','=',$typesbiens)
                                        ->where('pays','=',$pays)
                                        ->where('villes','=',$ville)
                                        ->where('quartier','=',$quartier)
                                        ->where('prix', 'BETWEEN', $minprice, 'AND', $maxprice)
                                        ->where('statut','=',0)
                                        ->get();
   }
   //Filtre Min price + Max price
   if ($typesbiens==''&& $quartier==''&& $ville==''&& $pays=='' && $minprice!='' && $maxprice!='')
   {
      //dd("Filtre by typesbiens + pays + Ville + Quartier + Minprice + Maxprice");
      $filterResult = DB::table('biens')->whereBetween('prix', [$minprice, $maxprice])
                                        ->where('statut','=',0)->get();
   }

   return $filterResult;
}
//Read product by name
function ReadProdName($name)
{
  $filterResult = DB::table('biens')->where('libele', 'LIKE', '%'. $name. '%')->where('statut','=',0)->get();
  return $filterResult;
}



/**
 * ----------------------------------
 * SYSTEME DE GESTION DE TRANSACTION
 * ----------------------------------
 */
//API key
function apikey()
{
   $api = '188375423961402d02d3b216.71475314';
   return $api;
}
//SITE ID
function siteID()
{
   $site_id = '295492';
   return $site_id;
}
//Save Demande
function SaveDmndTrans($typops,$pays,$villes,$quartier,$typBiens,$whatsapp,$mail,$descript,$transid)
{
   $data = [
      'typops'=>$typops,
      'pays'=>$pays,
      'villes'=>$villes,
      'quartier'=>$quartier,
      'typBiens'=>$typBiens,
      'whatsapp'=>$whatsapp,
      'mail'=>$mail,
      'descript'=>$descript,
      'transid'=>$transid
   ];
   DB::table('demandepay')->insert($data);
}
//Save transaction
function SaveTrans($nom,$phone,$mail,$marchand,$debut,$fin,$codebiens,$amount,$transid,$passclts,$codeAgent)
{
   $data = ['nom'=>$nom,
            'phone'=>$phone,
            'mail'=>$mail,
            'marchand'=>$marchand,
            'debut'=>$debut,
            'fin'=>$fin,
            'codebiens'=>$codebiens,
            'amount'=>$amount,
            'transid'=>$transid,
            'passclts'=>$passclts,
            'codeagent'=>$codeAgent
            ];
   DB::table('transactions')->insert($data);
}
//Read Transaction by code
function ReadTransID($trans)
{
   $trans = DB::table('transactions')->where('transid','=',$trans)->first();
   return $trans;
}
//Update transaction state
function UpdTransID($trans)
{
   DB::table('transactions')->where('transid','=',$trans)->update(['statut'=>1]);
}


/**
 * --------------------------------------
 * SYSTEME DE GESTION DES BIENS FRONT END
 * --------------------------------------
 */
//Update biens state => Rendre visible les biens dont la durée de visite est depasse
function updBienStat()
{
   $today = date('d-m-Y');
   $visite =  DB::table('biens_clients')->where('statut','!=',4)->get();
   foreach($visite as $vis)
   {
      if ($today>$vis->datevisite) {
         UpdBiensStat(0,$vis->idbiens);
      }
   }
}
//Read All biens rent and buy
function AllFrontBiens()
{
   $biens = DB::table('biens')->where('statut','=',0)->get();
   return $biens;
}

/**
 * --------------------------------
 * SYSTEME DE GESTION DES MARCHANDS
 * --------------------------------
 */
//Connection compte marchand
function Marchandconect($pass)
{
   $marchd = DB::table('marchands')->where('pass','=',$pass)->first();
   return $marchd;
}
//TriumphK payment
function triumphKPay($bcltID,$dateVist,$statut,$amount)
{
   $data = ['biens_clientsID'=>$bcltID,
            'datevisite'=>$dateVist,
            'statut'=>$statut,
            'amount'=>$amount
            ];
   DB::table('triumphk')->insert($data);
}
//Solder le compte Triumphk
function triumphkSold()
{
   DB::table('triumphk')->update(['statut'=>1]);
}
//Nombre de visite triumphK
function visiteTriumphk()
{
   $visite =  DB::table('triumphk')->where('statut','=',0) ->get();
   $nbvisite = count($visite);
   return $nbvisite;
}
//Solde compte TriumphK
function SoldTriumphk()
{
   $i = 0;
   $solde =  DB::table('triumphk')->where('statut','=',0)  
                                  ->get();
   foreach ($solde as  $value) {
      $i = $i+$value->amount;
   }
   return $i;
}
//LogRapid Payment
function logRapidPay($bcltID,$dateVist,$statut,$amount)
{
  $data = ['biens_clientsID'=>$bcltID,
           'datevisite'=>$dateVist,
           'statut'=>$statut,
           'amount'=>$amount
            ];
   DB::table('lograpid')->insert($data);
}
//Solder le compte LogRapid
function logRapidSold()
{
   DB::table('lograpid')->update(['statut'=>1]);
}
//Nombre de visite LogRapid
function VisiteLog()
{
   $visite =  DB::table('lograpid')->where('statut','=',0)->get();
   $nbvisite = count($visite);
   return $nbvisite;
}
//Solde compte LogRapid
function SoldeLog()
{
   $i = 0;
   $solde =  DB::table('lograpid')->where('statut','=',0)  
                                  ->get();
   foreach ($solde as  $value) {
      $i = $i+$value->amount;
   }
   return $i;
}
//Visite compte marchand
function VisiteMarchd($marchd)
{
   $visite =  DB::table('visites_marchands')->where('marchdID','=',$marchd)
                                           ->where('statut','=',0)  
                                           ->get();
   return count($visite);
}
//Marchand LogRapid payment
function MarchandPay($bcltID,$dateVist,$statut,$amount,$marchdID)
{
   $data = ['biens_clientsID'=>$bcltID,
            'datevisite'=>$dateVist,
            'statut'=>$statut,
            'amount'=>$amount,
            'marchdID'=>$marchdID
            ];
   DB::table('visites_marchands')->insert($data);
}
//Solde un compte marchand
function SoldeMarchd($marchd)
{
   DB::table('visites_marchands')->where('marchdID','=',$marchd)
                                 ->update(['statut'=>1]);
}
//Format price
function formatPrice($prix)
{
	$prix = number_format( $prix,0,',','.').' ';
	return $prix;
}
//Calcul de solde marchand total
function SoldMarchdAll()
{
   $i = 0;
   $solde =  DB::table('visites_marchands')->where('statut','=',0)  
                                           ->get();
   foreach ($solde as  $value) {
      $i = $i+$value->amount;
   }
   return $i;
}
//Calcul de solde marchand
function SoldMarchd($marchd)
{
   $i = 0;
   $solde =  DB::table('visites_marchands')->where('marchdID','=',$marchd)
                                           ->where('statut','=',0)  
                                           ->get();
   foreach ($solde as  $value) {
      $i = $i+$value->amount;
   }
   return $i;
}
//Supprimer un marchand
function DelMarchd($marchd)
{
   DB::table('marchands')->where('idmarchand','=',$marchd)->delete();
}
//Read marchand by ID
function marchdID($marchd)
{
   $marchd =  DB::table('marchands')->where('idmarchand','=',$marchd)->first();
   return $marchd;
}
//Read All marchands
function ReadMarchd()
{
   $marchd = DB::table('marchands')->get();
   return $marchd;
}
//Generer code marchand
function CodeMarchd()
{
   $codemarcd = rand(10,5000);
   $marchd = DB::table('marchands')->where('pass','=',$codemarcd)->first();
   if ($marchd) {
      $res = rand(10,5000);
   }else {
      $res = $codemarcd;
   }
   return $res;
}
//Ajouter un marchand
function AddMarchd($nom,$phone,$mail,$pays,$ville)
{
   $data = ['nom'=>$nom,
            'phone'=>$phone,
            'mail'=>$mail,
            'pays'=>$pays,
            'ville'=>$ville,
            'pass'=>CodeMarchd()
   ];
   $marchd = DB::table('marchands')->where('mail','=',$mail)->first();
   if ($marchd) {
      $res = 1;
      return $res;
   }else {
      $res = 0;
      DB::table('marchands')->insert($data);
      return $res;
   }
}

/**
 * -------------------------------
 * SYSTEME DE GESTION DE CLIENTS
 * -------------------------------
 */
//Check coupons existing
function Checkcoupon($coupon,$client)
{
   $coupons = DB::table('coupons')->where('coupons','=',$coupon)
                                  ->where('clients','=',$client)
                                  ->where('stat','=',0)
                                  ->first();
   return $coupons;
}
//Read coupons actif by client
function Readcoupondclient($client)
{
  $coupons = DB::table('coupons')->where('clients','=',$client)->get();
  return $coupons;
}
//Update coupons
function Updcoupons($coupons,$client,$stat)
{
  DB::table('coupons')->where('coupons','=',$coupons)
                      ->where('clients','=',$client)
                      ->update(['stat'=>$stat]);
}
//Add new coupons
function Adddcoupons($coupon,$visite,$client,$stat)
{
  $data = ['coupons'=>$coupon,  
           'visite'=>$visite,
           'clients'=>$client,
           'stat'=>$stat
         ];
  DB::table('coupons')->insert($data);
}
//Generate clients coupons
function coupons($visite,$client)
{
  #Verification de l'existence de la visite
  $visite = DB::table('coupons')->where('clients','=',$client)
                                  ->where('visite','=',$visite)
                                  ->first();
  if ($visite) {
   $res ='0';
  }else{
    $codecoup = rand(100,10000);
    $coupons = DB::table('coupons')->where('coupons','=',$codecoup)
                                  ->where('visite','=',$visite)
                                  ->first();
    if ($coupons) {
      $res = rand(100,10000);
    }else {
      $res = $codecoup;
    }
  }
  return $res;
}
//Modification de compte Client
function UpdClient($nom,$mail,$phone,$pass,$client)
{
  $data = ['nom'=>$nom,'mail'=>$mail,'phone'=>$phone,'pass'=>$pass];
  DB::table('clients')->where('idclients','=',$client)
                      ->update($data);
}
//Sign client
function SignClient($mail,$pass)
{
   $clients = DB::table('clients')->where('pass','=',$pass)
                                  ->where('mail','=',$mail)
                                  ->first();
   return $clients;
}
//Read Client By pass
function ReadClientPass($pass)
{
   $clients = DB::table('clients')->where('pass','=',$pass)->first();
   return $clients;
}
//Generate Client pass
function GenerateClts()
{
   $codeclts = rand(10,5000);
   $clts = DB::table('clients')->where('pass','=',$codeclts)->first();
   if ($clts) {
      $res = rand(10,5000);
   }else {
      $res = $codeclts;
   }
   return $res;
}
//Save new client
function SaveClient($nom,$phone,$mail)
{
   $pass = GenerateClts();
   $data = ['nom'=>$nom,
           'phone'=>$phone,
           'mail'=>$mail,
           'pass'=>$pass
         ];
   DB::table('clients')->insert($data);
   return $pass;
}
//Read All clients
function ReadClientAll()
{
   $clients = DB::table('clients')->get();
   return $clients;
}
//Read clients by Email
function ReadClientEmail($mail)
{
   $clients = DB::table('clients')->where('mail','=',$mail)->first();
   return $clients;
}
//Read clients by ID
function ReadClientID($client)
{
   $clients = DB::table('clients')->where('idclients','=',$client)->first();
   return $clients;
}

/**
 * -------------------------------
 * SYSTEME DE GESTION DE VISITES
 * -------------------------------
 */
//Read visite by code visite
function readvisite($code)
{
  $visite = DB::table('biens_clients')->where('codevisites','=',$code)->first();
  return $visite;
}
//Read Visites recouverte
function recouvert($stat,$recouv)
{
   $visites = DB::table('biens_clients')->where('recouvrement','=',$recouv)->where('statut','=',$stat)->get();
   return $visites;
}
//Generate visite code
function CodeVisite()
{
   $codevisites = rand(100,10000);
   $visite = DB::table('biens_clients')->where('codevisites','=',$codevisites)->first();
   if ($visite) {
      $res = rand(10,5000);
   }else {
      $res = $codevisites;
   }
   return $res;
}
//Save visite
function SaveVisite($idclients,$idbiens,$idgerants,$daterdvprise,$datevisite,$codeAgent)
{
  $codevisite = CodeVisite();
  $data = ['idclients'=>$idclients,  
           'idbiens'=>$idbiens,
           'idgerants'=>$idgerants,
           'daterdvprise'=>$daterdvprise,
           'datevisite'=>$datevisite,
           'codevisites'=>$codevisite,
           'codeagent'=>$codeAgent
         ];
   DB::table('biens_clients')->insert($data);
   return $codevisite;
}
//Recouvrir visite
function RecouVisite($stat,$visite)
{
   DB::table('biens_clients')->where('idbiensclient','=',$visite)
                             ->update(['recouvrement'=>$stat]);
}
//Update visite
function UpdVisiteStat($stat,$visite)
{
   DB::table('biens_clients')->where('idbiensclient','=',$visite)
                             ->update(['statut'=>$stat]);
}
//Nouvelle visite
function AllVisites($stat)
{
   $visites = DB::table('biens_clients')->where('statut','=',$stat)->get();
   return $visites;
}
//All Visite by client
function AllVisiteClient($client,$stat)
{
   $visites = DB::table('biens_clients')->where('statut','=',$stat)
                                        ->where('idclients','=',$client)
                                        ->get();
   return $visites;
}

/**
 * -------------------------------
 * SYSTEME DE GESTION DES SOLDES
 * -------------------------------
 */
//Two last offre
function TwoBiensLimit($stat)
{
   $biensLimit = DB::table('biens')->where('statut','=',$stat)
                                   ->limit(2)
                                   ->orderBy('idbiens','desc')
                                   ->get();
   return $biensLimit;
}
//Biens limit dispo by state
function AllbiensLimit($stat)
{
   $biensLimit = DB::table('biens')->where('statut','=',$stat)
                                   ->limit(5)
                                   ->orderBy('idbiens','desc')
                                   ->get();
   return $biensLimit;
}
//Biens All Dispo by state
function Allbiens($stat)
{
   $biensAll = DB::table('biens')->where('statut','=',$stat)
                                 ->orderBy('idbiens','desc')
                                 ->get();
   return $biensAll;
}
//Read biens by Types
function AllbiensType($type)
{
   $biensType = DB::table('biens')->where('typesbiens_idtypes','=',$type)
                                   ->where('statut','=',0)
                                   ->get();
   //dd($biensType);
   return $biensType;
}
//Read biens by operation
function AllbiensOpera($opera)
{
   $biensOpera = DB::table('biens')->where('typesoperations_idtypesoperations','=',$opera)
                                   ->where('statut','=',0)
                                   ->get();
   return $biensOpera;
}
//Biens total by operation
function operaBiens($opera)
{
   $stat = 0;
   $biensOpera = DB::table('biens')->where('typesoperations_idtypesoperations','=',$opera)
                                   ->where('statut','=',$stat)
                                   ->get();
   $nbBiens = count($biensOpera);
   return $nbBiens;
}
//Biens total by type
function typesBiens($types)
{
   $stat = 0;
   $biensType = DB::table('biens')->where('typesbiens_idtypes','=',$types)
                                  ->where('statut','=',$stat)
                                  ->get();
   $nbBiens = count($biensType);
   return $nbBiens;
}
//Biens total by gerant
function gerantBiens($gerant)
{
   $stat = 0;
   $biensg = DB::table('biens')->where('gerants_idgerant','=',$gerant)
                               ->where('statut','=',$stat)
                               ->get();
   $nbBiens = count($biensg);
   return $nbBiens;
}
//Biens total by villes
function villesbiens($ville)
{
   $stat = 0;
   $biensv = DB::table('biens')->where('villes','=',$ville)
                               ->where('statut','=',$stat)
                               ->get();
   $nbBiens = count($biensv);
   return $nbBiens;
}
//Biens total by quartier
function quartierbiens($quartier)
{
   $stat = 0;
   $biensq = DB::table('biens')->where('quartier','=',$quartier)
                               ->where('statut','=',$stat)
                               ->get();
   $nbBiens = count($biensq);
   return $nbBiens;
}


/**
 * -------------------------------
 * SYSTEME DE GESTION DE BIENS
 * -------------------------------
 */
//Activation automatique de biens
function ActvBiens()
{
   DB::table('biens')->where('statut','=',1)
                     ->update(['statut'=>0]);
}
//Modifier un bien
function UpdBiens($bienid,$operation,$typesbiens,$gerant,$pays,$villes,$quartier,$libele,$prix,$resume,$descrpt,$img1,$img2,$img3,$img4,$img5,$img6,$img7,$img8)
{
   //data
   $data = ['gerants_idgerant'=>$gerant,
            'typesbiens_idtypes'=>$typesbiens,
            'typesoperations_idtypesoperations'=>$operation,
            'pays'=>$pays,
            'villes'=>$villes,
            'quartier'=>$quartier,
            'libele'=>$libele,
            'prix'=>$prix,
            'resume'=>$resume,
            'descript'=>$descrpt,
            'img1'=>$img1,
            'img2'=>$img2,
            'img3'=>$img3,
            'img4'=>$img4,
            'img5'=>$img5,
            'img6'=>$img6,
            'img7'=>$img7,
            'img8'=>$img8
           ];
   //Update 
   DB::table('biens')->where('idbiens','=',$bienid)
                     ->update($data);
}
//Ajouter un partenaire bien soumis
function SavePart($nom,$phone,$mail,$ville,$quartier,$descrp)
{
  $data = ['nom'=>$nom,
           'tel'=>$phone,
           'mail'=>$mail,
           'pays'=>"Côte d'voire",
           'ville'=>$ville,
           'quartier'=>$quartier,
           'descrp'=>$descrp,
           'statut'=>0
          ];
   DB::table('bienssoumis')->insert($data);
}
//Update biens soumis state
function UpdBiensoumis($stat,$biensoumis)
{
   DB::table('bienssoumis')->where('idbienssoumis','=',$biensoumis)
                           ->update(['statut'=>$stat]);
}
//Read biens soumis by stat
function ReadBiensoumisStat($stat)
{
   $biens = DB::table('bienssoumis')->where('statut','=',$stat)->get();
   return $biens;
}
//Update biens state
function UpdBiensStat($stat,$biens)
{
   DB::table('biens')->where('idbiens','=',$biens)
                     ->update(['statut'=>$stat]);
}
//Del biens by Gerant
function DelBiensGerant($gerant)
{
   $biens = DB::table('biens')->where('gerants_idgerant','=',$gerant)->delete();
   return $biens;
}
//Read biens by ID
function ReadBiensID($biens)
{
   $biens = DB::table('biens')->where('idbiens','=',$biens)->first();
   return $biens;
}
//Supprimer un bien
function DelBiens($biens)
{
   DB::table('biens')->where('idbiens','=',$biens)->delete();
}
//Generate code Biens
function CodeBiens()
{
   $codebiens = rand(10,5000);
   $biens = DB::table('biens')->where('codebiens','=',$codebiens)->first();
   if ($biens) {
      $res = rand(10,5000);
   }else {
      $res = $codebiens;
   }
   return $res;
}
//Ajouter un bien
function AddBiens($operation,$typesbiens,$gerant,$pays,$villes,$quartier,$libele,$prix,$resume,$descrpt,$img1,$img2,$img3,$img4,$img5,$img6,$img7,$img8)
{
   $codebien = CodeBiens();
   $data = ['gerants_idgerant'=>$gerant,
            'typesbiens_idtypes'=>$typesbiens,
            'typesoperations_idtypesoperations'=>$operation,
            'pays'=>$pays,
            'villes'=>$villes,
            'quartier'=>$quartier,
            'libele'=>$libele,
            'prix'=>$prix,
            'resume'=>$resume,
            'descript'=>$descrpt,
            'img1'=>$img1,
            'img2'=>$img2,
            'img3'=>$img3,
            'img4'=>$img4,
            'img5'=>$img5,
            'img6'=>$img6,
            'img7'=>$img7,
            'img8'=>$img8,
            'codebiens'=> $codebien
           ];
   DB::table('biens')->insert($data);
   return $codebien;
}


//Read quartier by ville
function ReadQuartVille($ville)
{
   $ville = DB::table('quartiers')->where('villesid','=',$ville)->get();
   return $ville;
}
//Read villes by pays id
function ReadVillepays($pays)
{
   $ville = DB::table('villes')->where('pays_idpays','=',$pays)->get();
   return $ville;
}

/**
 * -------------------------------
 * SYSTEME DE LOCALISATION DE BIENS
 * -------------------------------
 */
//Read quartier by ID
function ReadQuartierID($quartier)
{
   $quartier =  DB::table('quartiers')->where('idquartier','=',$quartier)->first();
   return $quartier;
}
//Read villes by ID
function ReadVillID($ville)
{
  $ville =  DB::table('villes')->where('idvilles','=',$ville)->first();
  return $ville;
}
//Supprimer quartier
function DelQuart($quartier)
{
   DB::table('quartiers')->where('idquartier','=',$quartier)->delete();
}
//Read All quartier
function ReadQuart()
{
   $quartier = DB::table('quartiers')->get();
   return $quartier;
}

//Ajouter quartier
function AddQuart($quartier,$ville)
{
   $data = ['nom'=>$quartier,'villesid'=>$ville];
   #Check Existing
   $check = DB::table('quartiers')->where('nom','=',$quartier)->first();
   if ($check) {
      $check = DB::table('quartiers')->where('nom','=',$quartier)->first();
      $res =  $check->idquartier;
   }else {
      DB::table('quartiers')->insert($data);
      $check = DB::table('quartiers')->where('nom','=',$quartier)->first();
      $res =  $check->idquartier;
   }
   return $res;
}
//Supprimer ville en fonction de l'id
function DelVille($ville)
{
   DB::table('villes')->where('idvilles','=',$ville)->delete();
}
//Lecture de la ville en fonction de l'id
function ReadVilleId($ville)
{
   $ville = DB::table('villes')->where('idvilles','=',$ville)->first();
   return $ville;
}
//Lecture pays All
function ReadPaysAll()
{
   $pays = DB::table('pays')->get();
   return $pays;
}
//Lecture du  pays en fonction de l'id
function ReadpaysId($pays)
{
   $pays = DB::table('pays')->where('idpays','=',$pays)->first();
   return $pays;
}
//Read All villes
function ReadVille()
{
   $ville = DB::table('villes')->get();
   return $ville;
}
//Ajouter une ville
function AddVille($pays,$ville)
{
   $data = ['ville'=>$ville,'pays_idpays'=>$pays];
   #Check Existing
   $check = DB::table('villes')->where('ville','=',$ville)->first();
   if ($check) {
      $check = DB::table('villes')->where('ville','=',$ville)->first();
      $res =  $check->idvilles;
   }else {
      DB::table('villes')->insert($data);
      $check = DB::table('villes')->where('ville','=',$ville)->first();
      $res =  $check->idvilles;
   }
   return $res;
}
//Read All pays
function ReadPays()
{
   $pays = DB::table('pays')->get();
   return $pays;
}
//Ajouter un pays
function AddPays($pays)
{
   $data = ['pays'=>$pays];
   #Check Existing
   $check = DB::table('pays')->where('pays','=',$pays)->first();
   if ($check) {
      $res = 0;
   }else {
      $res =  1;
      DB::table('pays')->insert($data);
   }
   return $res;
}

/**
 * -------------------------------
 * SYSTEME DE GESTION DES TYPES
 * -------------------------------
 */
//Read Types de biens by id
function ReadTypesID($idtypes)
{
   $typesbiens = DB::table('typesbiens')->where('idtypes','=',$idtypes)->first();
   return $typesbiens;
}
//Read operations by id
function ReadOperaID($idopera)
{
   $opera = DB::table('typesoperations')->where('idtypesoperations','=',$idopera)->first();
   return $opera;
}
//Read Operations All
function ReadOpera()
{
   $opera = DB::table('typesoperations')->get();
   return $opera;
}
//Supprimer une operation
function DelOpera($opera)
{
   DB::table('typesoperations')->where('idtypesoperations','=',$opera)->delete();
}
//Ajouter une operation
function AddOpera($opera)
{
   $data = ['operation'=>$opera];
   #Check Existing
   $check = DB::table('typesoperations')->where('operation','=',$opera)->first();
   if ($check) {
      $res = 0;
   }else {
      $res =  1;
      DB::table('typesoperations')->insert($data);
   }
   return $res;
}
//Supprimer types de biens
function DelTypesbiens($type)
{
   DB::table('typesbiens')->where('idtypes','=',$type)->delete();
}
//Read Types de biens
function ReadTypebiens()
{
   $types = DB::table('typesbiens')->get();
   return $types;
}
//Ajouter type de biens
function AddTypebiens($type,$icons)
{
   $data = ['types'=>$type,'icons'=>$icons];
   #Check Existing
   $check = DB::table('typesbiens')->where('types','=',$type)->first();
   if ($check) {
      $res = 0;
   }else {
      $res =  1;
      DB::table('typesbiens')->insert($data);
   }
   return $res;
}

/**
 *  ---------------------------------------
 *  SYSTEME  DE GESTION DES AGENTS LOGRAPID
 *  ----------------------------------------
 */
//Visites agent recouvertes
function visiteRecouv($recouv,$stat,$agent)
{
   $visites = DB::table('biens_clients')->where('recouvrement','=',$recouv)->where('statut','=',$stat)->where('codeagent','=',$agent)->get();
   return $visites;
}
//Read Agent Visites
function VisiteAgent($agent,$stat)
{
   $visite = DB::table('biens_clients')->where('statut','=',$stat)->where('codeagent','=',$agent)->get();
   return $visite;
}
//Check Agent LogRapid pass
function CheckAgent($pass)
{
   $res = DB::table('agents')->where('codeagent','=',$pass)->first();
   return $res;
}
//Supprimer Agent LogRapid
function DelAgent($agent)
{
    DB::table('agents')->where('idagents','=',$agent)->delete();
}
//Lecture des Agents LogRapid
function ReadAgent()
{
   $agents = DB::table('agents')->get();
   return $agents;
}
//Generate Agent LogRapid Pass
function GeneratePassAgt()
{
   $codeagt = rand(10,5000);
   $agt = DB::table('agents')->where('codeagent','=',$codeagt)->first();
   if ($agt) {
      $res = rand(10,5000);
   }else {
      $res = $codeagt;
   }
   return $res;
}
//Create Agent LogRapid
function AddAgent($nomagt,$phoneagt,$mailagt,$statut)
{
   $data = ['nomagent'=>$nomagt,'phone'=>$phoneagt,'mail'=>$mailagt,'codeagent'=>GeneratePassAgt(),'statut'=>$statut];
   #Check Existing
   $check = DB::table('agents')->where('phone','=',$phoneagt)->first();
   if ($check) {
     $res = 0;
   }else {
     $res = 1;
     DB::table('agents')->insert($data);
   }
   return $res;
}
//Read Agent LogRapid Code
function ReadAgentCode($code)
{
   $agent = DB::table('agents')->where('codeagent','=',$code)->first();
   return $agent;
}

/**
 * -------------------------------
 * SYSTEME DE GESTION DES GERANTS
 * -------------------------------
 */
 //Check Offreur Identity
function CheckGerant($nom,$mail,$phone,$pays,$villes,$pass,$identity,$identityfile,$profil,$nagreement)
{
   $data = [
      'nom' =>$nom,
      'mail' =>$mail,
      'phone'=>$phone,
      'pays'=>$pays,
      'villes'=>$villes,
      'pass'=>$pass,
      'identity'=>$identity,
      'identityfile'=>$identityfile,
      'profil'=>$profil,
      'nagreement'=>$nagreement
   ];
   # Check Existing
   $check = DB::table('gerants')->where('mail','=',$mail)->first();
   if ($check) {
      $res = 0;
   }else {
      $res =  1;
      DB::table('verifgerant')->insert($data);
   }
   return $res;
   
}
 //Check offreur Confirmation mail
 function CheckGerantCode($code)
 {
   $res = DB::table('verifgerant')->where('pass','=',$code)->first();
   return $res;
 }
//Activer le compte offreur
function unlockGerant($gerant)
{
   //UnLock compte
   DB::table('gerants')->where('idgerant','=',$gerant)
                       ->update(['statut'=>0]);
   //UnLock biens by offreur
   DB::table('biens')->where('gerants_idgerant','=',$gerant)
                     ->update(['statut'=>0]);
}
//Desactiver le compte offreur
function lockGerant($gerant)
{
   //Lock compte
   DB::table('gerants')->where('idgerant','=',$gerant)
                       ->update(['statut'=>1]);
   //Lock biens by offreur
   DB::table('biens')->where('gerants_idgerant','=',$gerant)
                     ->update(['statut'=>1]);
}
//Visites recouvertes 
function recouverteG($recouv,$stat,$gerant)
{
   $visites = DB::table('biens_clients')->where('recouvrement','=',$recouv)->where('statut','=',$stat)->where('idgerants','=',$gerant)->get();
   return $visites;
}
//Read Gerant visite
function VisiteGerant($idgerant,$stat)
{
   $visite = DB::table('biens_clients')->where('statut','=',$stat)->where('idgerants','=',$idgerant)->get();
   return $visite;
}
//Read Gerant biens disponible
function BiensGerant($idgerant,$stat)
{
   $biens = DB::table('biens')->where('statut','=',$stat)->where('gerants_idgerant','=',$idgerant)->get();
   return $biens;
}
//Login Gerant
function LogGerant($pass)
{
   $gerant = DB::table('gerants')->where('pass','=',$pass)->first();
   return $gerant;
}

//REad Gerant by Profil
function ReadgerantProf($prof)
{
   $gerant = DB::table('gerants')->where('profil','=',$prof)->get();
   return $gerant;
}

//Read Gerant by statut
function ReadgerantStat($stat)
{
   $gerant = DB::table('gerants')->where('statut','=',$stat)->get();
   return $gerant;
}

//Read Gerant by id
function ReadgerantID($gerant)
{
   $gerant = DB::table('gerants')->where('idgerant','=',$gerant)->first();
   return $gerant;
}
//Supprimer gérant
function Delgerant($gerant)
{
    DB::table('gerants')->where('idgerant','=',$gerant)->delete();
}
//Read gérant
function ReadGerant()
{
   $gerant = DB::table('gerants')->get();
   return $gerant;
}
//Ajouter un gérant
function AddGerant($nom,$mail,$phone,$ville,$pays,$pass,$identity,$identityfile,$profil,$nagrement)
{
   $data = ['nom'=>$nom,
            'mail'=>$mail,
            'phone'=>$phone,
            'villes'=>$ville,
            'pays'=>$pays,
            'pass'=>$pass,
            'identity'=>$identity,
            'identityfile'=>$identityfile,
            'profil'=>$profil,
            'nagreement'=>$nagrement,
           ];
   # Check Existing
   $check = DB::table('gerants')->where('mail','=',$mail)->first();
   if ($check) {
      $res = 0;
   }else {
      $res =  1;
      DB::table('gerants')->insert($data);
   }
   return $res;
}
//Générer pass du gérant
function Passgerant()
{
   $code = rand(2000,5000);
  
   #Check existing
   $check = DB::table('gerants')->where('pass','=',$code)->first();
   #save
   if ($check) {
      #Generate
      $code = rand(2000,5000);
   }else {
      #Save code
      $res = $code;
   }
   return $res;
}

/**
 * --------------------------
 * SYSTEME D'AUTHENTIFICATION
 * --------------------------
 */
 //Connection by pass
 function Adminconect($pass)
 {
    $admin = DB::table('admins')->where('pass','=',$pass)->first();
    return $admin;
 }
 //Logout
 function logout()
 {
    session_destroy();
 }

 /**
 * -------------------------------
 * SYSTEME DE NOTIFICATAION GLOBAL
 * -------------------------------
 */
//Email notification
function notifMail()
{
   $notif = "immovere@gmail.com";
   return $notif;
}
//Email de support
function LogRapidMail()
{
   $mail = 'support@immover.io';
   return $mail;
}
//Volume SMS
function SMSVolume()
{
   $key = 'af7ea63fd454f4dad669d0cd299c37';
   $api = 'Authorization: Bearer '.$key."";
   //Créer la requête
   $curl = curl_init();
   curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.letexto.com/v1/user-volume',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    //CURLOPT_POSTFIELDS =>json_encode($datas),
    CURLOPT_HTTPHEADER => array(
      $api,
      'Content-Type: application/json'
    ),
  ));
   //Execution de la requête
   $response = curl_exec($curl);
   curl_close($curl);
   //dd($api);
   //Retour json
   $res = json_decode($response);
   $text = $res->national;
   return $text;
}
//Send SMS
function Sendsms($msg,$tel,$sender)
{
   // Filtrer le messages
   $nvMsg = str_replace('à','a', $msg);
   $nvMsg = str_replace('á','a', $nvMsg);
   $nvMsg = str_replace('â','a', $nvMsg);
   $nvMsg = str_replace('ç','c', $nvMsg);
   $nvMsg = str_replace('è','e', $nvMsg);
   $nvMsg = str_replace('é','e', $nvMsg);
   $nvMsg = str_replace('ê','e', $nvMsg);
   $nvMsg = str_replace('ë','e', $nvMsg);
   $nvMsg = str_replace('ù','u', $nvMsg);
   $nvMsg = str_replace('ù','u', $nvMsg);
   $nvMsg = str_replace('ü','u', $nvMsg);
   $nvMsg = str_replace('û','u', $nvMsg);
   $nvMsg = str_replace('ô','o', $nvMsg);
   $nvMsg = str_replace('î','i', $nvMsg);
   $key = 'af7ea63fd454f4dad669d0cd299c37';
   $api = 'Authorization: Bearer '.$key."";
   // Step 1: Créer la campagne
   $curl = curl_init();
   $datas= [
     'step' => NULL,
     'sender' => $sender,
     'name' => 'SMS IMMOVER',
     'campaignType' => 'SIMPLE',
     'recipientSource' => 'CUSTOM',
     'groupId' => NULL,
     'filename' => NULL,
     'saveAsModel' => false,
     'destination' => 'NAT_INTER',
     'message' => $msg,
     'emailText' => NULL,
     'recipients' =>
     [
       [
         'phone' => $tel,
       ],
     ],
     'sendAt' => [],
     'dlrUrl' => NULL,
     'responseUrl' => NULL,
   ];
   curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.letexto.com/v1/campaigns',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_SSL_VERIFYHOST => 0,
      CURLOPT_SSL_VERIFYPEER => 0,
      //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0),
      //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0),
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>json_encode($datas),
      CURLOPT_HTTPHEADER => array(
        $api,
        'Content-Type: application/json'
      ),
   ));
   $response = curl_exec($curl);
   curl_close($curl);
   $res = json_decode($response);
   $camp_id = $res->id;

   // Step2: Programmer la campagne
   $curl_send = curl_init();
   curl_setopt_array($curl_send, array(
     CURLOPT_URL => 'https://api.letexto.com/v1/campaigns/'.$camp_id.'/schedules',
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => '',
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 0,
     CURLOPT_FOLLOWLOCATION => true,
     CURLOPT_SSL_VERIFYHOST => 0,
     CURLOPT_SSL_VERIFYPEER => 0,
     //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0),
     //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0),
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => 'POST',
     CURLOPT_HTTPHEADER => array(
       $api
     ),
   ));

   //dd($curl_send);
   $response_send = curl_exec($curl_send);
   //dd($response_send);
   curl_close($curl_send);
   return $response_send;
}
//Send Email TEXT
function SendEmail($to,$titre,$msg)
{
   $from = LogRapidMail();
   $to = $to;
   $subject = $titre;
   $message = $msg;
   $headers = "From:" . $from;
   mail($to,$subject,$message, $headers);
}
//Send Email HTML
function SendEmailHTML($to,$titre,$msg)
{
   $from = LogRapidMail();
   $to = $to;
   $subject = $titre;
   $message = $msg;
   $headers = "From:".$from."\n";
   $headers.="Content-Type:text/html; charset=\"iso-8859-1\"";
   $res = mail($to,$subject,$message, $headers);
   return $res;
}

/**
 * ---------------------------------------
 * SYSTEME DE CONTRÔLE DE LA DISPONIBILITE
 * ---------------------------------------
 */
//Read aletebiens
function readalerte($stat)
{
   $alerte = DB::table('alertebiens')->where('statut','=',$stat)->first();
   return $alerte;
}
//Update alertebiens stat
function updalerte($idalerte,$stat)
{
   DB::table('alertebiens')->where('alertebiensid','=',$idalerte)
                           ->update(['statut'=>$stat]);
}
//Save alertebiens
function savealerte($debut,$fin,$statut)
{
   $data = ['debut'=>$debut,
            'fin'=>$fin,
            'statut'=>$statut
   ];
   DB::table('alertebiens')->insert($data);
}
//Desactivation automatique 
function desactive()
{
   //Lecture des biens dispo
   $biensAll = AllFrontBiens();
   //Traitement de l'alerte
   $today = date('Y-m-d');
   $alterte = readalerte(0);
   if ($alterte) {
     if ($alterte->fin==$today) {
       //dd('Debut: '.$date_debuti.' - Fin: '.$date_fini.' comparaison: egales');
       
       //Desactivation automatique des biens disponibles
       foreach ($biensAll as $bien) {
         //Infos gérant
         $mailg = ReadgerantID($bien->gerants_idgerant)->mail;
         //Biens indispo
         UpdBiensStat(1,$bien->idbiens);
         //Email Infos
         $titre = "ImmOver : Disponibilité automatique des biens";
         $msg = "Infos du biens :
         - Biens:".$bien->libele."
         - resume :".$bien->resume."
         - Description :".$bien->descript."
         - Code Biens :".$bien->codebiens." 
         - Date de pub :".$bien->updated_at."
         - Voir le biens: ".env('APP_URL')."/single?biens=".$bien->idbiens."
          ---------------------------------
          Activation automatique du bien:
          ---------------------------------
           Veuillez activer le bien s'il est encore disponible
          - Activer le bien en cliquant sur ce lien: ".env('APP_URL')."/bienSold?biens=".$bien->idbiens."&&act=2";
         //Notification Email gerant
         SendEmail($mailg,$titre,$msg);
         //Notification email administrateur
         SendEmail(notifMail(),$titre,$msg);
       }
       //Calcul de l'intervalle de date
       $datefin = $alterte->fin;
       $datefinNew = date('Y-m-d',strtotime("+48 hours", strtotime($datefin)));
       savealerte($datefin,$datefinNew,0);
       updalerte($alterte->alertebiensid,1);
     }
   }  
}