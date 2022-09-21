<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /* ------------------------------
     SYSTEME D'ALERTE ADMIN
    --------------------------------*/
    //Alert info
    public function alert(Request $request)
    {
      $url = $request->url;
      $info = $request->info;
      $libele = $request->libele;
      return view('alert')->with('info',$info)
                          ->with('libele',$libele)
                          ->with('url',$url);
    }

    /* ------------------------------
     SYSTEME DE GESTION TYPES ADMIN
    --------------------------------*/
    //Supprimer une operation
    public function operatypesDel(Request $request)
    {
      DelOpera($request->id);
      return redirect('operaType');
    }
    //Ajouter une operation
    public function addOpera(Request $request)
    {
       $opera = $request->opera;
       $res = AddOpera($opera);
       if ($res == 1) {
         # New
         return response()->json(['res'=>1]);
       }else {
         # Existing
         return response()->json(['res'=>0]);
       }
    }
    //Supprimer types de biens
    public function typebiensdel(Request $request)
    {
      $types = $request->id;
      DelTypesbiens($types);
      return redirect('biensType');
    }
    //Ajouter types de biens
    public function Addtypebiens(Request $request)
    {
      $types = $request->biens;
      $icons = $request->icons;
      $res = AddTypebiens($types,$icons);
      if ($res==0) {
        # Existing
        return response()->json(['res'=>0]);
      }else {
        # New
        return response()->json(['res'=>1]);
      }
    }
    //Types de biens
    public function biensType(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('biensType');
        }else{
            return redirect('signAdm');
        }
    }
    //Types d'operations
    public function operaType(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
         return view('operaType');
        }else{
            return redirect('signAdm');
        }
    }

    /* ------------------------------------
     SYSTEME DE GESTION LOCALISATION ADMIN
    ---------------------------------------*/
    //Supprimer un quartier
    public function DelQuart(Request $request)
    {
      $quartier = $request->id;
      DelQuart($quartier);
      return redirect('storLocal');
    }
    //Ajouter un quartier
    public function Addquart(Request $request)
    {
       $quartier = $request->quartier;
       $ville = $request->ville;
       $res = AddQuart($quartier,$ville);
       if ($res==0) {
         # Existing
         return response()->json(['res'=>0]);
       }else {
         # New
         return response()->json(['res'=>1]);
       }
    }
    //Supprimer une ville
    public function DelVille(Request $request)
    {
      DelVille($request->id);
      return redirect('newLocal');
    }
    //Ajouter une ville
    public function AddVille(Request $request)
    {
       $pays = $request->pays;
       $ville = $request->ville;
       $res = AddVille($pays,$ville);
       if ($res==0) {
         # Existing
         return response()->json(['conect'=>0]);
       }else {
         # New
         return response()->json(['conect'=>1]);
       }
       
    }
    //Ajouter un pays
    public function Addpays(Request $request)
    {
       $pays = $request->pays;
       $res = AddPays($pays);
       if ($res==0) {
         # Existing
         return response()->json(['res'=>0]);
       }else {
         # New
         return response()->json(['res'=>1]);
       }
    }
    //Localisation
    public function newLocal(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
         return view('newLocal');
       }else{
           return redirect('signAdm');
       }
    }
    //Quartier
    public function storLocal(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('storLocal');
      }else{
          return redirect('signAdm');
      }
    }
    
    /* ------------------------------
     SYSTEME DE GESTION BIENS ADMIN
    --------------------------------*/
    //Biens indisponibles
    public function bienSold(Request $request)
    {
      $biens = $request->biens;
      if ($request->act==1) {
        UpdBiensStat(1,$biens);//Biens indispo
        $info = 'Statut indisponible du bien est activé avec succès';
        $url = "dispBiens";
      }else {
        UpdBiensStat(0,$biens);//Biens dispo
        $info = 'Statut disponible du bien est activé avec succès';
        $url = "indispBiens";
      }
      
      
      $libele = 'OK';
     
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Supprimer un biens
    public function DelBiens(Request $request)
    {
      //DelBiens($request->id);
      UpdBiensStat(5,$request->id);
      $info = 'Biens supprimer avec succes.';
      $url = $request->url;
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
      
    }

    //Ajouter un biens
    public function AddBiens(Request $request)
    { 

      $pays = $request->pays;
      if ($pays=='Choisir') {
        return response()->json(['msg'=>'Préciser le pays']);
        die();
      }
      
      //Gestion de la localisation
      $ohterville = $request->otherVille;
      $ohterquartier = $request->otherQuartier;
      $ville = $request->villes;
      $quartier = $request->quartier;

      //dd('Quartier: '.$quartier.'/ autre Quartier:'.$ohterquartier);
    
      if ($ville=='Choisir' and $ohterville=='') {
        return response()->json(['msg'=>'Préciser la ville']);
        die();
      }
     
      if ($quartier=='Choisir' and $ohterquartier=='') {
        return response()->json(['msg'=>'Préciser le quartier']);
        die();
      }

      //Gestion de la localisation
      if ($ohterville!='') {
        # Ajout de nouvelle ville
        $Vil = strtolower($ohterville);
        $resV = AddVille($pays,$Vil);
        #Recuperation de l'id
        $ville = $resV;
      }
      if ($ohterquartier!='') {
        # Ajout de nouveau quartier
        $Quart = strtolower($ohterquartier);
        $resQ = AddQuart($Quart,$ville);
        #Recuperation de l'id
        $quartier = $resQ;
        //dd($quartier);
      }

      $operation = $request->operations;
      if ($operation=='Choisir') {
        return response()->json(['msg'=>'Préciser le type d\'opération']);
        die();
      }
      $typesbiens = $request->typesbiens;
      if ($typesbiens=='Choisir') {
        return response()->json(['msg'=>'Préciser le type de biens']);
        die();
      }
      $gerant = $request->gerant;
      $libele = $request->libele;
      if ($libele=='') {
        return response()->json(['msg'=>'Préciser le libele']);
        die();
      }
      $prix = $request->prix;
      if ($libele=='') {
        return response()->json(['msg'=>'Préciser le prix']);
        die();
      }
      $resume = $request->resume;
      if ($resume=='') {
        return response()->json(['msg'=>'Faite un resumé']);
        die();
      }
      $descript = $request->descript;
      if ($descript=='') {
        return response()->json(['msg'=>'Faites une description']);
        die();
      }

      

      //Traitement des images
      $lien  = env('LIEN_FILE');
      // Count the number of uploaded files in array
      $total_count = count($_FILES['files']['name']);
  
      if ($total_count>8) {
        if (isset($request->urlG)) {
          $url = 'bienGnew';
          $info = 'Vous ne pouvez pas soumettre plus de 8 photos';
          return response()->json(['msg'=>$info]);
          die();
        }else {
          $info = 'Vous ne pouvez pas soumettre plus de 8 photos';
          $url = 'newBiens';
          $libele = "OK";
          return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
        }
       
      }else {
       
        

        if ($total_count<8) {
          // Loop through every file
          foreach ($request->file('files') as $key => $file) {
            $path = $file->store('biensphoto','public');
            $insert[$key]['path'] = $lien.$path;
          }
          if ($total_count==1) {
            $acimg1 = $insert[0]["path"];
            $acimg2 = 'img/lograpid.png';
            $acimg3 = 'img/lograpid.png';
            $acimg4 = 'img/lograpid.png';
            $acimg5 = 'img/lograpid.png';
            $acimg6 = 'img/lograpid.png';
            $acimg7 = 'img/lograpid.png';
            $acimg8 = 'img/lograpid.png';
            //dd($operation,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$acimg1,$acimg2,$acimg3,$acimg4,$acimg5,$acimg6,$acimg7,$acimg8);
           
            $codebiens = AddBiens($operation,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$acimg1,$acimg2,$acimg3,$acimg4,$acimg5,$acimg6,$acimg7,$acimg8);
          }
          if ($total_count==2) {
            $acimg1 = $insert[0]["path"];
            $acimg2 = $insert[1]["path"];
            $acimg3 = 'img/lograpid.png';
            $acimg4 = 'img/lograpid.png';
            $acimg5 = 'img/lograpid.png';
            $acimg6 = 'img/lograpid.png';
            $acimg7 = 'img/lograpid.png';
            $acimg8 = 'img/lograpid.png';
            $codebiens = AddBiens($operation,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$acimg1,$acimg2,$acimg3,$acimg4,$acimg5,$acimg6,$acimg7,$acimg8);
          }
          if ($total_count==3) {
            $acimg1 = $insert[0]["path"];
            $acimg2 = $insert[1]["path"];
            $acimg3 = $insert[2]["path"];
            $acimg4 = 'img/lograpid.png';
            $acimg5 = 'img/lograpid.png';
            $acimg6 = 'img/lograpid.png';
            $acimg7 = 'img/lograpid.png';
            $acimg8 = 'img/lograpid.png';
            $codebiens = AddBiens($operation,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$acimg1,$acimg2,$acimg3,$acimg4,$acimg5,$acimg6,$acimg7,$acimg8);
          }
          if ($total_count==4) {
            $acimg1 = $insert[0]["path"];
            $acimg2 = $insert[1]["path"];
            $acimg3 = $insert[2]["path"];
            $acimg4 = $insert[3]["path"];
            $acimg5 = 'img/lograpid.png';
            $acimg6 = 'img/lograpid.png';
            $acimg7 = 'img/lograpid.png';
            $acimg8 = 'img/lograpid.png';
            $codebiens = AddBiens($operation,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$acimg1,$acimg2,$acimg3,$acimg4,$acimg5,$acimg6,$acimg7,$acimg8);
          }
          if ($total_count==5) {
            $acimg1 = $insert[0]["path"];
            $acimg2 = $insert[1]["path"];
            $acimg3 = $insert[2]["path"];
            $acimg4 = $insert[3]["path"];
            $acimg5 = $insert[4]["path"];
            $acimg6 = 'img/lograpid.png';
            $acimg7 = 'img/lograpid.png';
            $acimg8 = 'img/lograpid.png';
            $codebiens = AddBiens($operation,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$acimg1,$acimg2,$acimg3,$acimg4,$acimg5,$acimg6,$acimg7,$acimg8);
          }
          if ($total_count==6) {
            $acimg1 = $insert[0]["path"];
            $acimg2 = $insert[1]["path"];
            $acimg3 = $insert[2]["path"];
            $acimg4 = $insert[3]["path"];
            $acimg5 = $insert[4]["path"];
            $acimg6 = $insert[5]["path"];
            $acimg7 = 'img/lograpid.png';
            $acimg8 = 'img/lograpid.png';
            $codebiens = AddBiens($operation,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$acimg1,$acimg2,$acimg3,$acimg4,$acimg5,$acimg6,$acimg7,$acimg8);
          }
          if ($total_count==7) {
            $acimg1 = $insert[0]["path"];
            $acimg2 = $insert[1]["path"];
            $acimg3 = $insert[2]["path"];
            $acimg4 = $insert[3]["path"];
            $acimg5 = $insert[4]["path"];
            $acimg6 = $insert[5]["path"];
            $acimg7 = $insert[6]["path"];
            $acimg8 = 'img/lograpid.png';
            $codebiens = AddBiens($operation,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$acimg1,$acimg2,$acimg3,$acimg4,$acimg5,$acimg6,$acimg7,$acimg8);
          }
          if ($total_count==8) {
            $acimg1 = $insert[0]["path"];
            $acimg2 = $insert[1]["path"];
            $acimg3 = $insert[2]["path"];
            $acimg4 = $insert[3]["path"];
            $acimg5 = $insert[4]["path"];
            $acimg6 = $insert[5]["path"];
            $acimg7 = $insert[6]["path"];
            $acimg8 = $insert[7]["path"];
            $codebiens = AddBiens($operation,$typesbiens,$gerant,$pays,$ville,$quartier,$libele,$prix,$resume,$descript,$acimg1,$acimg2,$acimg3,$acimg4,$acimg5,$acimg6,$acimg7,$acimg8);
          }
        
          if (isset($request->urlG)) {
            $url = 'bienGnew';
            //Execution Alerte de demande
            //sendAlerte($operation,$pays,$ville,$quartier,$typesbiens,$codebiens);
            return response()->json(['msg'=>'Biens ajoute avec succes','res'=>'1']);
            die();
          }else {
            $url = 'newBiens';
          }
          
          //Execution Alerte de demande
          sendAlerte($operation,$pays,$ville,$quartier,$typesbiens,$codebiens);
           
          $libele = "OK";
          $info = 'Biens ajoute avec succes.';
          return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
        }
        
      }

      
    }
    //Quartier by villle
    public function quartierville(Request $request)
    {
      $output = '';
      $res = ReadQuartVille($request->villes);
      $output.='<option>Choisir</option>';
      foreach ($res as $quartier) {
        $output.='<option value='.$quartier->idquartier.'>'.$quartier->nom.'</option>';
      }
      return $output;
    }
    //Villes by pays
    public function villebypays(Request $request)
    { 
       $pays = $request->pays;
       $res = ReadVillepays($pays);
       $output = '';
       $output.='<option>Choisir</option>';
       foreach ($res as  $ville) {
         $output.='<option value='.$ville->idvilles.'>'.$ville->ville.'</option>';
       }
       return $output;
    }
    //Nouveau biens
    public function newBiens(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('newBiens');
      }else{
          return redirect('signAdm');
      }
    }
    //Biens disponibles
    public function dispBiens(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('dispBiens');
      }else{
          return redirect('signAdm');
      }
    }
    //Biens indisponibles
    public function indispBiens(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('indispBiens');
      }else{
          return redirect('signAdm');
      }
    }

    /* ------------------------------
     SYSTEME DE GESTION VISITES ADMIN
    --------------------------------*/
    //Visite recouvert
    public function recouvremnt(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('recouvremnt');
      }else{
          return redirect('signAdm');
      }
    }
    //Visite soldée
    public function visitesold(Request $request)
    {
      $visite = $request->id;
      $biens = $request->idbiens;
      $url = $request->url;
      UpdBiensStat(1,$biens);//Biens indispo
      UpdVisiteStat(4,$visite);//Visite soldé
      $info = 'Biens solde avec succes';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Visite reporter
    public function visiteReport(Request $request)
    {
      $visite = $request->id;
      $biens = $request->idbiens;
      $url = $request->url;
      UpdBiensStat(0,$biens);//Biens dispo
      UpdVisiteStat(1,$visite);//Visite reportée
      $info = 'Visite reportee avec succes';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Recouvrir visite
    public function visiteRecouvert(Request $request)
    {
      $visite = $request->id;
      $url = $request->url;
      RecouVisite(1,$visite);
      $info = 'Visite recouverte avec succes';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Visite effectuer
    public function visiteEffect(Request $request)
    {
       $visite = $request->id;
       $biens = $request->idbiens;
       $url = $request->url;
       UpdBiensStat(0,$biens);//Biens dispo
       UpdVisiteStat(3,$visite);//Visite Effectuée
       $info = 'Visite effectue avec succes';
       $libele = 'OK';
       return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Annuler visite
    public function visiteAnnul(Request $request)
    {
      $visite = $request->id;
      $biens = $request->idbiens;
      $url = $request->url;
      UpdBiensStat(0,$biens);//Biens dispo
      UpdVisiteStat(2,$visite);//Visite annuler
      $info = 'Visite annule avec succes';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Nouveau visite
    public function newVisite(Request $request)
    { 
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('newVisite');
          }else{
              return redirect('signAdm');
          }
    }
    //visites Soldées
    public function inVisites(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('inVisites');
          }else{
              return redirect('signAdm');
          } 
    }
    //Reportée
    public function reportVisites(Request $request)
    {  
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('reportVisites');
          }else{
              return redirect('signAdm');
          } 
    }
    //Effectuée
    public function okVisites(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('okVisites');
      }else{
          return redirect('signAdm');
      } 
    }
    //Annulée
    public function noVisites(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('noVisites');
      }else{
          return redirect('signAdm');
      }  
    }

    /* ------------------------------
     SYSTEME DE GESTION BIENS ADMIN
    --------------------------------*/
    //Biens soumis refuser
    public function biensRefuser(Request $request)
    {
      $biensoumis = $request->id;
      $url = $request->url;
      UpdBiensoumis(2,$biensoumis);
      $info = 'Biens sousmis refuser avec succes';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Biens soumis accepter
    public function biensAccepter(Request $request)
    {
      $biensoumis = $request->id;
      $url = $request->url;
      UpdBiensoumis(1,$biensoumis);
      $info = 'Biens sousmis accepter avec succes';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Nouveau biens
    public function newSoumis(Request $request)
    { 
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('newSoumis');
      }else{
          return redirect('signAdm');
      }  
    }
    //Accepté biens
    public function accepSoumis(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('accepSoumis');
      }else{
          return redirect('signAdm');
      }  
    }
    //Refusé biens
    public function refuseSoumis(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('refuseSoumis');
      }else{
          return redirect('signAdm');
      }   
    }

    /* -------------------------------
     SYSTEME DE GESTION MARCHAND ADMIN
    ----------------------------------*/
    //Solder le compte Triumphk
    public function triumphkSold()
    {
      triumphkSold();
      $info = 'Compte TriumphK solder avec succès';
      $url = 'soldtriumph';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Solder le compte LogRapid
    public function logRapidSold()
    {
      logRapidSold();
      $info = 'Compte LogRapid solder avec succès';
      $url = 'soldPay';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Solder un compte marchand
    public function marchdSold(Request $request)
    {
      $marchd  = $request->id;
      SoldeMarchd($marchd);
      $info = 'Marchand solder avec succes.';
      $url = 'soldMarchd';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    } 
    //Supprimer un marchand
    public function marchdDel(Request $request)
    {
      $marchd = $request->id;
      DelMarchd($marchd);
      $info = 'Marchand supprimer avec succes.';
      $url = 'storyMarchd';
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Ajouter un marchand
    public function AddMarchd(Request $request)
    {
      $nom = $request->nomM;
      $phone = $request->phoneM;
      $mail = $request->mailM;
      $pays = $request->paysM;
      $ville = $request->villesM;
      $res = AddMarchd($nom,$phone,$mail,$pays,$ville);
      return response()->json(['res'=>$res]);
    }
    //Nouveau marchand
    public function newMarchd(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('newMarchd');
      }else{
          return redirect('signAdm');
      }   
    }
    //Story marchand
    public function storyMarchd(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('storyMarchd');
          }else{
              return redirect('signAdm');
          }   
    }
    //Solde marchand
    public function soldMarchd(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('soldMarchd');
        }else{
              return redirect('signAdm');
        } 
    }

    /**
     * --------------------------------------
     * SYSTEME DE GESTION DES AGENTS LOGRAPID
     * --------------------------------------
     */
    //Deconnection Agent LogRapid
    public function logoutAg(Request $request)
    {
      logout();
      return redirect('agentcount'); 
    }
    //Nouvelles visites 
    public function NewvisiteAg(Request $request)
    {
      if (isset($_SESSION['agentID']) AND $_SESSION['agentID']!='') {
        return view('NewvisiteAg');
      }else{
        return redirect('signAgt');
      } 
    }
    //Visites Effectuées 
    public function EffectVisiteAg(Request $request)
    {
      if (isset($_SESSION['agentID']) AND $_SESSION['agentID']!='') {
        return view('EffectVisiteAg');
      }else{
        return redirect('signAgt');
      } 
    }
    //Visites Soldées
    public function SoldVisiteAg(Request $request)
    {
      if (isset($_SESSION['agentID']) AND $_SESSION['agentID']!='') {
        return view('SoldVisiteAg');
      }else{
        return redirect('signAgt');
      } 
    }
    //Visites Recouvertes 
    public function RecouVisiteAg(Request $request)
    {
      if (isset($_SESSION['agentID']) AND $_SESSION['agentID']!='') {
        return view('RecouVisiteAg');
      }else{
        return redirect('signAgt');
      } 
    }
    //Traitement de connection compte LogRapid
    public function conectagent(Request $request)
    {
      $res = CheckAgent($request->pass);
      if ($res=='') {
        return response()->json(['conect'=>0]);
      }else {
        $_SESSION['agentID'] = $res->idagents;
        $_SESSION['agentCD'] = $res->codeagent;
        return response()->json(['conect'=>1]);
      }
    }
    //Connection Compte Agent LogRapid
    public function signAgt(Request $request)
    { 
      return view('signAgt');
    }
    //Compte Agent LogRapid
    public function agentcount(Request $request)
    {
      if (isset($_SESSION['agentID']) AND $_SESSION['agentID']!='') {
        return view('agentcount');
      }else{
        return redirect('signAgt');
      } 
    }
    //Supprimer un Agent LogRApid
    public function agentdel(Request $request)
    {
      $idagent = $request->id;
      DelAgent($idagent);
      return redirect('storyAgent');
    }
    //Créer un Agent LogRapid
    public function Addagent(Request $request)
    {
      //Reception des données
      $nomAg = $request->nomAg;
      $mailAg = $request->mailAg;
      $phoneAg = $request->phoneAg;
      $statut = $request->statut;
      //Create Agent LogRapid
      $res = AddAgent($nomAg,$phoneAg,$mailAg,$statut);
      //dd($res);
      if ($res==1) {
        #Ajouter avec succès
        return response()->json(['res'=>1]);
      }
      if ($res==0) {
        #Gerant existe déjà
        return response()->json(['res'=>0]);
      }
    }
    //Nouveau Agent LogRapid
    public function newAgent(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('newAgent');
      }else{
        return redirect('signAdm');
      } 
    }
    //Historique Agent LogRapid
    public function storyAgent(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('storyAgent');
      }else{
        return redirect('signAdm');
      } 
    }

    /* ---------------------------------
     SYSTEME DE GESTION PAIEMENTS ADMIN
    ------------------------------------*/
    //Rapport de paiement
    public function storPay(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('storPay');
        }else{
              return redirect('signAdm');
        } 
    }
    //Solde de paiement LogRapid
    public function soldPay(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('soldPay');
          }else{
              return redirect('signAdm');
          } 
    }
    //Rapport de paiement LogRapid
    public function soldtriumph(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('soldtriumph');
      }else{
          return redirect('signAdm');
      } 
    }

    /* ---------------------------------
     SYSTEME DE GESTION ABONNES ADMIN
    ------------------------------------*/
    //Story abonnes
    public function abones(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('abones');
          }else{
              return redirect('signAdm');
          } 
    }

    /* ---------------------------------
     SYSTEME DE GESTION CAMPAGNES ADMIN
    ------------------------------------*/
    //Nouvelle campagne
    public function campNew(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('campNew');
          }else{
              return redirect('signAdm');
          } 
    }
    //Story campagne
    public function campStory(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('campStory');
          }else{
              return redirect('signAdm');
          } 
    }
    //SMS
    public function sms(Request $request)
    {
        if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
            return view('sms');
          }else{
              return redirect('signAdm');
          } 
    }
    

    /* ------------------------------
     SYSTEME DE GESTION GERANT ADMIN
    --------------------------------*/
        //Gerant off
    public function gerantStoryoff(Request $request)
    {
      return view('gerantStoryoff');
    }
    //Offreur identity page
    public function offreurplus(Request $request)
    {
      return view('offreurplus')->with('gerant',$request->id);
    }
    //Unlock Gerant
    public function unlockGerant(Request $request)
    {
      unlockGerant($request->idgerant);
      return redirect('gerantStoryoff');
    }
    //Lock Gerant
    public function lockGerant(Request $request)
    {
       lockGerant($request->idgerant);
       return redirect('gerantStory');
    }
    //Supprimer un gérant
    public function gerantsdel(Request $request)
    {
       $gerant = $request->id;
       Delgerant($gerant);
       return redirect('gerantStory');
    }
    //Ajouter un gérant
    public function Addgerant(Request $request)
    {
      $nom = $request->nomg;
      $mail = $request->mailg;
      $phone = $request->phoneg;
      $ville = $request->villesg;
      $pays = $request->paysg;
      $pass = Passgerant();
      /*$res = AddGerant($nom,$mail,$phone,$ville,$pays,$pass);
      if ($res==1) {
        # Ajouter avec succès
        return response()->json(['res'=>1]);
      }
      if ($res==0) {
        # Gérant existe déjà
        return response()->json(['res'=>0]);
      }*/
    }
    //Story des gérants
    public function gerantStory(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('gerantStory');
      }else{
          return redirect('signAdm');
      } 
    }
    //Nouveau gérant
    public function gerantNew(Request $request)
    {
      if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('gerantNew');
      }else{
          return redirect('signAdm');
      } 
    }

    
    /* ------------------------------
     SYSTEME DE GESTION MENU ADMIN
    --------------------------------*/
    //Dash
    public function dash(Request $request)
    {
     if (isset($_SESSION['adminID']) AND $_SESSION['adminID']!='') {
        return view('dash');
     }else{
        return redirect('signAdm');
     }
    }


    /* ------------------------------
     SYSTEME D'AUTHENTIFICATION
    --------------------------------*/
    //Déconnection Admin
    public function logoutadmin()
    {
        logout();
        return redirect('signAdm');
    }
    //Connect Admin
    public function conectadmin(Request $request)
    {
        $res = Adminconect($request->pass);
        if ($res=='') {
          return response()->json(['conect'=>0]);
        }else{
         //Ouverture de la session abone
         $_SESSION['adminID'] = $res->idadmin;
         return response()->json(['conect'=>1]);
        }
    }
    //Login Admin
    public function signAdm(Request $request)
    {  
        return view('signAdm');
    }

}

?>