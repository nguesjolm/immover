<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GerantController extends Controller
{
   
    /**
     * --------------------------------
     * GESTION DES GERANTS OU OFFREURS
     * --------------------------------
     */
    //Story des demandes
    public function DemandeG(Request $request)
    {
      return view('DemandeG');
    }
    //Supprimer gerant
    public function delkGerant(Request $request)
    {
      
      $info="Offreur supprimer avec succès";
      $url="gerantStory";
      $libele = "Gestion des offreurs";
      $mailG = ReadgerantID($request->idgerant)->mail;
      //dd($mailG);
      //Envoie de mail
      SendEmail($mailG,'Compte Offreur ImmOver','Les pièces forunies ne correspondent pas, veuillez recréer votre compte');
      //Del Biens Gerant
      DelBiensGerant($request->idgerant);
      //DEl gerant
      Delgerant($request->idgerant);
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    
    //Check gerant count
    public function check(Request $request)
    {
      $codeg = $request->gerant;
      $res = CheckGerantCode($codeg);
      if ($res) {
        #Save new offreur
        $nom = $res->nom;
        $mail = $res->mail;
        $tel = $res->phone;
        $pays = $res->pays;
        $villes = $res->villes;
        $pass = $res->pass;
        $identity = $res->identity;
        $identityfile = $res->identityfile;
        $profil = $res->profil;
        $nagreement = $res->nagreement;
        #Save new offreur 
        AddGerant($nom,$mail,$tel,$villes,$pays,$pass,$identity,$identityfile,$profil,$nagreement);
        #Connection offreur
        $res = LogGerant($pass);
        $_SESSION['gerantID'] = $res->idgerant;
        $_SESSION['gerantNom'] = $res->nom;
        $_SESSION['gerantCode'] = $res->pass;
        return redirect('countgerant');
      }else{
        return redirect('morehome');
      }
    }
    //Check Gerant :: Envoie de mail pro
    public function checkT(Request $request)
    {

        $titre="ImmOver";
        $to = 'devdodo225@gmail.com';
        $msg ='
           <html>
            
             <head>
               <meta name="x-apple-disable-message-reformatting">
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
  
                <style type="text/css">
                  body,table,td{font-family:Helvetica,Arial,sans-serif !important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}a{text-decoration:none}*{color:inherit}a[x-apple-data-detectors],u+#body a,#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}img{-ms-interpolation-mode:bicubic}table:not([class^=s-]){font-family:Helvetica,Arial,sans-serif;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0px;border-collapse:collapse}table:not([class^=s-]) td{border-spacing:0px;border-collapse:collapse}@media screen and (max-width: 600px){.w-full,.w-full>tbody>tr>td{width:100% !important}*[class*=s-lg-]>tbody>tr>td{font-size:0 !important;line-height:0 !important;height:0 !important}.s-2>tbody>tr>td{font-size:8px !important;line-height:8px !important;height:8px !important}.s-3>tbody>tr>td{font-size:12px !important;line-height:12px !important;height:12px !important}.s-5>tbody>tr>td{font-size:20px !important;line-height:20px !important;height:20px !important}.s-10>tbody>tr>td{font-size:40px !important;line-height:40px !important;height:40px !important}}
                </style>
             </head>
             
             <body class="bg-light" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#f7fafc">
                <table class="bg-light body" valign="top" role="presentation" border="0" cellpadding="0" cellspacing="0" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#f7fafc">
                  <tbody>
                    <tr>
                      <td valign="top" style="line-height: 24px; font-size: 16px; margin: 0;" align="left" bgcolor="#f7fafc">
                        <table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                          <tbody>
                            <tr>
                              <td align="center" style="line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
                                <!--[if (gte mso 9)|(IE)]>
                                  <table align="center" role="presentation">
                                    <tbody>
                                      <tr>
                                        <td width="600">
                                <![endif]-->
                                <table align="center" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 600px; margin: 0 auto;">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 16px; margin: 0;" align="left">
                                        <table class="s-10 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;" align="left" width="100%" height="40">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="card" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 6px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #e2e8f0;" bgcolor="#ffffff">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left" bgcolor="#ffffff">
                                                <table class="card-body" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 20px;" align="left">
                                                        <h1 class="h3" style="padding-top: 0; padding-bottom: 0; font-weight: 500; vertical-align: baseline; font-size: 28px; line-height: 33.6px; margin: 0;" align="left">ImmOver : Offreur</h1>
                                                        <table class="s-2 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 8px; font-size: 8px; width: 100%; height: 8px; margin: 0;" align="left" width="100%" height="8">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <h5 class="text-teal-700" style="color: #13795b; padding-top: 0; padding-bottom: 0; font-weight: 500; vertical-align: baseline; font-size: 20px; line-height: 24px; margin: 0;" align="left">Confirmer votre addresse Email</h5>
                                                        <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="hr" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 24px; font-size: 16px; border-top-width: 1px; border-top-color: #e2e8f0; border-top-style: solid; height: 1px; width: 100%; margin: 0;" align="left">
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <div class="space-y-3">
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                          Merci de  de rejoindre la communauté ImmOver. 
                                                         ci-dessous les conditions d\'utilisation : </p>
                                                          <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                            <tbody>
                                                              <tr>
                                                                <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                                  &#160;
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                            1- Interdiction des droits de visites.
                                                          </p>
                                                          <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                            <tbody>
                                                              <tr>
                                                                <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                                  &#160;
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                            2- Répondre au prises de rendez-vous des clients
                                                          </p>
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                            3- Poster des biens dont vous maîtrisez parfaitement le dossier
                                                          </p>
                                                           <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                            4- Eviter les anarques
                                                          </p>
                                                          <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                            <tbody>
                                                              <tr>
                                                                <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                                  &#160;
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                           Si vous adhérez à nos conditions alors cliquez sur le bouttons
                                                            <b>Confirmer</b> ci-dessous pour accéder à votre compte et poster vos biens
            
                                                          </p>
                                                        </div>
                                                        <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="hr" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 24px; font-size: 16px; border-top-width: 1px; border-top-color: #e2e8f0; border-top-style: solid; height: 1px; width: 100%; margin: 0;" align="left">
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="btn btn-primary" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 6px; border-collapse: separate !important;">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 24px; font-size: 16px; border-radius: 6px; margin: 0;" align="center" bgcolor="#0d6efd">
                                                                <a href="https://app.bootstrapemail.com/templates" target="_blank" style="color: #ffffff; font-size: 16px; font-family: Helvetica, Arial, sans-serif; text-decoration: none; border-radius: 6px; line-height: 20px; display: block; font-weight: normal; white-space: nowrap; background-color: #0d6efd; padding: 8px 12px; border: 1px solid #0d6efd;">Confirmer</a>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="s-10 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;" align="left" width="100%" height="40">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                                <![endif]-->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </body>
             
             
            </html>
        ';
        
        $res = SendEmailHTML($to,$titre,$msg);
        dd($res);
    }
    //Create new profil
    public function saveprofil(Request $request)
    {
      //Traitement d'ouverture de compte

        $identity = $request->identity;
        if ($identity=='personne physique') {
         $idfile = $request->file('cni');
         if ($idfile=='') {
           return response()->json(['msg'=>'Photo de cni obligatoire']);
           die();
         }else{
           $lien = env('LIEN_FILE');
           //Recuperation du name file
           $fileIdenty_p =  $request->file('cni');
           //Dossier de stockage
           $path = $fileIdenty_p->store('Identity','public');
           //Chemin d'accès de l'image
           $fileIdenty = $lien.$path; 
         }
        }

        if ($identity=='personne morale') {
         $idfile = $request->file('impot');
          if ($idfile=='') {
           return response()->json(['msg'=>'Photo de DFE obligatoire']);
           die();
          }else {
            $lien = env('LIEN_FILE');
            //Recuperation du name file
            $fileIdenty_p =  $request->file('impot');
            //Dossier de stockage
            $path = $fileIdenty_p->store('Identity','public');
            //Chemin d'accès de l'image
            $fileIdenty = $lien.$path; 
          }
        }

       $nom = $request->nom;
       $mail = $request->mail;
       $tel = $request->tel;
       if (valid_email($mail)==false ) {
         return response()->json(['msg'=>'Email incorrecte']);
         die();
       }

       $profil = $request->profil;
       $agreenum = $request->agreenum;
        if ($profil=='agence agree') {
          if ($agreenum=='') {
           return response()->json(['msg'=>'Numéro d\'agréement obligatoire']);
           die(); 
          }
        }
        //return response()->json(['msg'=>'En cours de maintenance']);
        //die();
      //Save new offreur
      $passOffreur = Passgerant();
      $pays = 'CI';
      $ville = 'Abidjan';
      //$res = AddGerant($nom,$mail,$tel,$ville,$pays,$passOffreur,$identity,$fileIdenty,$profil,$agreenum);
      $res = CheckGerant($nom,$mail,$tel,$pays,$ville,$passOffreur,$identity,$fileIdenty,$profil,$agreenum);
      //dd($res);
      if ($res==0) {
        return response()->json(['msg'=>'L\'email est déjà utilisé']);
        die();
      }else {
        /*Ouverture de session offreur ou gerant
        $res = LogGerant($passOffreur);
        $_SESSION['gerantID'] = $res->idgerant;
        $_SESSION['gerantNom'] = $res->nom;
        $_SESSION['gerantCode'] = $res->pass;
        //Send offreur code to mail
        $msg = "Akwaba, Offreur ImmOver:
                - Votre code d'accès à votre compte offreur est : ".$passOffreur;
        SendEmail($mail,'Compte Offreur ImmOver',$msg);
        //dd($mail,'Compte Offreur ImmOver',$msg);
        $msg = "Ouverture de compte en cours";*/
        $lien = env('APP_URL')."/check?gerant=".$passOffreur;
        $titre="ImmOver";
        $to = $mail;
        $msg ='
           <html>
            
             <head>
               <meta name="x-apple-disable-message-reformatting">
               <meta name="viewport" content="width=device-width, initial-scale=1">
               <meta name="format-detection" content="telephone=no, date=no, address=no, email=no">
  
                <style type="text/css">
                  body,table,td{font-family:Helvetica,Arial,sans-serif !important}.ExternalClass{width:100%}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height:150%}a{text-decoration:none}*{color:inherit}a[x-apple-data-detectors],u+#body a,#MessageViewBody a{color:inherit;text-decoration:none;font-size:inherit;font-family:inherit;font-weight:inherit;line-height:inherit}img{-ms-interpolation-mode:bicubic}table:not([class^=s-]){font-family:Helvetica,Arial,sans-serif;mso-table-lspace:0pt;mso-table-rspace:0pt;border-spacing:0px;border-collapse:collapse}table:not([class^=s-]) td{border-spacing:0px;border-collapse:collapse}@media screen and (max-width: 600px){.w-full,.w-full>tbody>tr>td{width:100% !important}*[class*=s-lg-]>tbody>tr>td{font-size:0 !important;line-height:0 !important;height:0 !important}.s-2>tbody>tr>td{font-size:8px !important;line-height:8px !important;height:8px !important}.s-3>tbody>tr>td{font-size:12px !important;line-height:12px !important;height:12px !important}.s-5>tbody>tr>td{font-size:20px !important;line-height:20px !important;height:20px !important}.s-10>tbody>tr>td{font-size:40px !important;line-height:40px !important;height:40px !important}}
                </style>
             </head>
             
             <body class="bg-light" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#f7fafc">
                <table class="bg-light body" valign="top" role="presentation" border="0" cellpadding="0" cellspacing="0" style="outline: 0; width: 100%; min-width: 100%; height: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; font-family: Helvetica, Arial, sans-serif; line-height: 24px; font-weight: normal; font-size: 16px; -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; color: #000000; margin: 0; padding: 0; border-width: 0;" bgcolor="#f7fafc">
                  <tbody>
                    <tr>
                      <td valign="top" style="line-height: 24px; font-size: 16px; margin: 0;" align="left" bgcolor="#f7fafc">
                        <table class="container" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                          <tbody>
                            <tr>
                              <td align="center" style="line-height: 24px; font-size: 16px; margin: 0; padding: 0 16px;">
                                <!--[if (gte mso 9)|(IE)]>
                                  <table align="center" role="presentation">
                                    <tbody>
                                      <tr>
                                        <td width="600">
                                <![endif]-->
                                <table align="center" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%; max-width: 600px; margin: 0 auto;">
                                  <tbody>
                                    <tr>
                                      <td style="line-height: 24px; font-size: 16px; margin: 0;" align="left">
                                        <table class="s-10 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;" align="left" width="100%" height="40">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="card" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 6px; border-collapse: separate !important; width: 100%; overflow: hidden; border: 1px solid #e2e8f0;" bgcolor="#ffffff">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0;" align="left" bgcolor="#ffffff">
                                                <table class="card-body" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                  <tbody>
                                                    <tr>
                                                      <td style="line-height: 24px; font-size: 16px; width: 100%; margin: 0; padding: 20px;" align="left">
                                                        <h1 class="h3" style="padding-top: 0; padding-bottom: 0; font-weight: 500; vertical-align: baseline; font-size: 28px; line-height: 33.6px; margin: 0;" align="left">ImmOver : Offreur</h1>
                                                        <table class="s-2 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 8px; font-size: 8px; width: 100%; height: 8px; margin: 0;" align="left" width="100%" height="8">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <h5 class="text-teal-700" style="color: #13795b; padding-top: 0; padding-bottom: 0; font-weight: 500; vertical-align: baseline; font-size: 20px; line-height: 24px; margin: 0;" align="left">Confirmer votre addresse Email</h5>
                                                        <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="hr" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 24px; font-size: 16px; border-top-width: 1px; border-top-color: #e2e8f0; border-top-style: solid; height: 1px; width: 100%; margin: 0;" align="left">
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <div class="space-y-3">
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">Merci de  de rejoindre la communauté ImmOver. ci-dessous les conditions d\'utilisation : </p>
                                                          <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                            <tbody>
                                                              <tr>
                                                                <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                                  &#160;
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                            1- Interdiction des droits de visites.
                                                          </p>
                                                          <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                            <tbody>
                                                              <tr>
                                                                <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                                  &#160;
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                            2- Répondre au prises de rendez-vous des clients
                                                          </p>
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                            3- Poster des biens dont vous maîtrisez parfaitement le dossier
                                                          </p>
                                                           <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                            2- Eviter les anarques
                                                          </p>
                                                          <table class="s-3 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                            <tbody>
                                                              <tr>
                                                                <td style="line-height: 12px; font-size: 12px; width: 100%; height: 12px; margin: 0;" align="left" width="100%" height="12">
                                                                  &#160;
                                                                </td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                          <p class="text-gray-700" style="line-height: 24px; font-size: 16px; color: #4a5568; width: 100%; margin: 0;" align="left">
                                                           Si vous adhérez à nos conditions alors cliquez sur le bouttons
                                                            <b>Confirmer</b> ci-dessous pour accéder à votre compte et poster vos biens
            
                                                          </p>
                                                        </div>
                                                        <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="hr" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 24px; font-size: 16px; border-top-width: 1px; border-top-color: #e2e8f0; border-top-style: solid; height: 1px; width: 100%; margin: 0;" align="left">
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="s-5 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 20px; font-size: 20px; width: 100%; height: 20px; margin: 0;" align="left" width="100%" height="20">
                                                                &#160;
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <table class="btn btn-primary" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-radius: 6px; border-collapse: separate !important;">
                                                          <tbody>
                                                            <tr>
                                                              <td style="line-height: 24px; font-size: 16px; border-radius: 6px; margin: 0;" align="center" bgcolor="#0d6efd">
                                                                <a href="'.$lien.'" target="_blank" style="color: #ffffff; font-size: 16px; font-family: Helvetica, Arial, sans-serif; text-decoration: none; border-radius: 6px; line-height: 20px; display: block; font-weight: normal; white-space: nowrap; background-color: #0d6efd; padding: 8px 12px; border: 1px solid #0d6efd;">Confirmer</a>
                                                              </td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <table class="s-10 w-full" role="presentation" border="0" cellpadding="0" cellspacing="0" style="width: 100%;" width="100%">
                                          <tbody>
                                            <tr>
                                              <td style="line-height: 40px; font-size: 40px; width: 100%; height: 40px; margin: 0;" align="left" width="100%" height="40">
                                                &#160;
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!--[if (gte mso 9)|(IE)]>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                                <![endif]-->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </body>
             
             
            </html>
        ';
        
        $res = SendEmailHTML($to,$titre,$msg);
        if($res)
        {
            $msg = 'consultez votre mail pour valider';
            return response()->json(['msg'=>$msg,'count'=>1]);
        }else{
            $msg = 'Votre addresse email est incorrecte';
            return response()->json(['msg'=>$msg,'count'=>1]);
        }
        
      }
       
     
    }
    //Ouverture de compte Offreur
    public function countOffreur(Request $request)
    {
      return view('countoffreur');
    }
    //Visite Recouvertes
    public function RecouVisiteG(Request $request)
    {
      if (isset($_SESSION['gerantID']) AND $_SESSION['gerantID']!='') {
        return view('RecouVisiteG');
      }else {
        return view("singGerant");
      }
    }
    //Vistes soldées
    public function SoldVisiteG(Request $request)
    {
      if (isset($_SESSION['gerantID']) AND $_SESSION['gerantID']!='') {
        return view('SoldVisiteG');
      }else {
        return view("singGerant");
      }
    }
    //Visites Effectuées
    public function EffectVisiteG(Request $request)
    {
      if (isset($_SESSION['gerantID']) AND $_SESSION['gerantID']!='') {
        return view('EffectVisiteG');
      }else {
        return view("singGerant");
      }
    }
    //Nouvelles visites
    public function VisiteG(Request $request)
    {
      if (isset($_SESSION['gerantID']) AND $_SESSION['gerantID']!='') {
        return view('visiteG');
      }else {
        return view("singGerant");
      }
    }
    //Ajouter un bien
    public function bienGnew(Request $request)
    {
      if (isset($_SESSION['gerantID']) AND $_SESSION['gerantID']!='') {
        return view('bienGnew');
      }else {
        return view("singGerant");
      }
    }
    //Activer biens indisponibles
    public function bienSoldG(Request $request)
    {
      $biens = $request->biens;
      if ($request->act==1) {
        UpdBiensStat(1,$biens);//Biens indispo
        $info = 'Statut indisponible du bien est activé avec succès';
        $url = "BiensG";
      }else {
        UpdBiensStat(0,$biens);//Biens dispo
        $info = 'Statut disponible du bien est activé avec succès';
        $url = 'bienIndispoG';
      }
      $libele = 'OK';
      return redirect('alert?info='.$info.'&url='.$url.'&libele='.$libele);
    }
    //Lecture des biens indisponibles
    public function bienIndispoG()
    {
      
      if (isset($_SESSION['gerantID']) AND $_SESSION['gerantID']!='') {
        return view('bienIndispoG');
      }else {
        return view("singGerant");
      }
    }
    //All biens 
    public function BiensG()
    {
      if (isset($_SESSION['gerantID']) AND $_SESSION['gerantID']!='') {
        return view('biensG');
      }else {
        return view("singGerant");
      }
    }
    //Déconection Gérant
    public function logoutAgt(Request $request)
    {
        logout();
        return redirect('countgerant');
    }
    //Connection Gerant
    public function conectgerant(Request $request)
    {
        $res = LogGerant($request->pass);
        if ($res=='') {
           return response()->json(['conect'=>0]);
        }else {
           //Ouverture de la session abonne
           $_SESSION['gerantID'] = $res->idgerant;
           $_SESSION['gerantNom'] = $res->nom;
           $_SESSION['gerantCode'] = $res->pass;
           return response()->json(['conect'=>1]);
        }
    }
    //Compte Gerant
    public function countgerant(Request $request)
    {
        if (isset($_SESSION['gerantID']) AND $_SESSION['gerantID']!='') {
          return view("countgerant");
        }else {
          return view("singGerant");
        }
        
    }
}