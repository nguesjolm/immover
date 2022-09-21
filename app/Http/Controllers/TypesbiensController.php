<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*----------------------
  INTEGRATION CINETPAY
-----------------------*/
use App\Cinetpay\Cinetpay;

class TypesbiensController extends Controller
{

/**
 *  ---------------------------------
 *   SYSTEM INFOS SYSTEM LOGRAPID
 *  ---------------------------------
 */
//CGU
public function cgu()
{
   return view('cgu');
}
//About
public function about()
{
   return view('about');
}


/**
 *  ---------------------------------
 *   SYSTEM DE GESTION DE BIENS SOUMIS
 *  ---------------------------------
 */
//Traitement de notify
public function notifyDmd(Request $request)
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
   $trans = ReadTransIDdemd($id_transaction);
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

         //Traitement en cas de paiement succès
         if ($result->{'code'}=='00') {
            #Transaction infos
            $opera = $trans->typops;
			   $pays = $trans->pays;
      		$ville = $trans->villes;
      		$quartier = $trans->quartier;
      	   $typesbiens = $trans->typBiens;
      		$whats = $trans->whatsapp;
      		$mail = $trans->mail;
            $more = $trans->descript;
            $transid = $trans->transid;
      	   NewDemand($opera,$pays,$ville,$quartier,$typesbiens,$whats,$mail,$more,$transid);
            $msg = "Tel: ".$whats." / Description: ".$more;
            SendEmail(notifMail(),'Nouvelle Demandes',$msg);
            if ($mail!='') {
               SendEmail($mail,'Nouvelle Demandes',$msg);
            }

         }
      }
   }
}
//Traitement de return
public function returnDmd(Request $request)
{
   if ($request->transaction_id) {
      $id_transaction = $request->transaction_id;
      #Vérification de la transaction par l'id   
      $trans = ReadTransIDdemd($id_transaction);
      if ($trans->statut == 1) {
         $info = "Demande validée, nous vous contactons dans 48H, pour vous informer des disponibilités";
         $title = "Immover, Soumission de demande";
         $libele = "Ok";
         $url = '/';
         return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
         die();
      }else {
         $info = "Votre paiement a échoué.";
         $title = "Immover, Soumission de demande";
         $libele = "Reprendre";
         $url = '/';
         //dd($url);
         return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
         die();
      }
   }
}
//Calculate a property price
public function calculate(Request $request)
{
   $opera = $request->opera;
   $typesbiens = $request->typesbiens;
   $quartier = $request->quartier;
   $ville = $request->ville;
   $pays = $request->pays;
   $whats = $request->whatsap;
   $mail = $request->mail;
   $more = $request->descrp;
   $id_transaction = date("YmdHis"); 
   if ($opera!=''&&$pays!=''&&$ville!=''&&$quartier!=''&&$typesbiens!=''&&$whats!=''&&$more!='') {
      //Enregistrer une demande
      NewDemand($opera,$pays,$ville,$quartier,$typesbiens,$whats,$mail,$more,$id_transaction); 
      return response()->json(['msg'=>'Votre demande a été prise en compte','info'=>'1']);
      //Préparation du Guichet  
      /*try {
        $currency = 'XOF';
        $amount = 150;
        $description = "Soumission de demande immobilier sur Immover";
        //Initiate variable for credit card
        $alternative_currency = 'XOF';
        $customer_email = $mail;
        $customer_phone_number =$whats;
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
        $notify_url = env('APP_URL').'/notifyDmd';
        //return url
        $return_url = env('APP_URL').'/returnDmd';
        //Channel list
        $channels = "ALL";
        //Create Guichet
        $formData = array(
         "transaction_id"=> $id_transaction,
         "amount"=> $amount,
         "currency"=> $currency,
         "customer_surname"=>'Immover',
         "customer_name"=>'Immover',
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
       //NewDemand($opera,$pays,$ville,$quartier,$typesbiens,$whats,$mail,$more,$id_transaction);  
       SaveDmndTrans($opera,$pays,$ville,$quartier,$typesbiens,$whats,$mail,$more,$id_transaction);
       //Lancement de CinetPay
       $CinetPay = new CinetPay($site_id, $apikey, $version);
       $result = $CinetPay->generatePaymentLink($formData);
       //Traitement du resultat
       if ($result['code']=='201') {
         $url = $result["data"]["payment_url"];
         return response()->json(['msg'=>$url,'info'=>'1']);
       }
      } catch (Exception $e) {
         echo $e->getMessage();
      }*/
      
      
   }else {
      $output = "Demande non validée, veuillez remplir correctement le formulaire";
      return response()->json(['msg'=>$output,'info'=>'0']);
   }
   
   //$price = Priceproperty($opera,$typesbiens,$quartier,$ville,$pays);
   /*$nbprice = count($price);
   $output = '';
   if ($nbprice!=0) {
      foreach ($price as $biens) {
         $output.= formatPrice($biens->prix).' Fcfa - ';
      }
   }else {
      $output.=' Aucun résultat pour cette recherche ';
   }*/
   
   return response()->json(['msg'=>$output]);
}
//Ajouter un partenaire
public function AddPart(Request $request)
{
   $nom = $request->nom;
   $phone = $request->phone;
   $mail = $request->mail;
   $ville = $request->ville;
   $pers = $request->pers;
   $quartier = $request->quartier;
   SavePart($nom,$phone,$mail,$ville,$quartier,$pers);
   #Send Email 
   $to = notifMail();
   $titre = "Nouveau Partenaire";
   $msg = "Profil:".$pers." / Phone :".$phone." / Email: ".$mail." / Nom: ".$nom." / Ville: ".$ville;
   SendEmail($to,$titre,$msg);
   return response()->json(['msg'=>"Merci d'être LogRapid, Nous vous contacterons dans 24H"]);
}
//Soumettre un bien
public function soumis(Request $request)
{
   return view('soumis');
}

/**
 *  ---------------------------------
 *   SYSTEM DE RECHERCHE AUTOMATIQUE
 *  ---------------------------------
 */
 //Read biens by types de biens
 public function biens(Request $request)
 { 
    $types = $request->types;
    $biens = AllbiensType($types);
    return view('biens')->with('biensAll',$biens);
 }

}