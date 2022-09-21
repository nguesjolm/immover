<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ClientController extends Controller
{
    /**
     *  -------------------------------------
     *   SYSTEM D'AUTHENTIFICATION DE CLIENT
     *  -------------------------------------
     */
    //Modifier infos client
    public function updClts(Request $request)
    {
        $nom = $request->nom;
        $mail = $request->mail;
        $phone = $request->phone;
        $pass = $request->pass;
        //Update client info
        UpdClient($nom,$mail,$phone,$pass,$_SESSION['clientID']);
        return response()->json(['res'=>1]);
    }
    //Recuperer Mot de passe
    public function recupPass(Request $request)
    {
       $mail = $request->mail;
       $res = ReadClientEmail($mail);
       if ($res) {
         $passclts = $res->pass;
         $msg = "-----------------------------------------------
                     Akwaba . Merci d'être Immover !
                                  www.immover.io
                    -----------------------------------------------
                      Votre compte Immover est actif :
                       - Votre Email : ".$mail."
                       - Votre Mot de Passe : ".$passclts."
                    ";
         SendEmail($mail,"Compte Immover",$msg);
         return response()->json(['msg'=>'Votre Mot de passe a été envoyer à votre mail: '.$mail]);
       }else {
           return response()->json(['msg'=>"Ce compte Immover n'existe pas! Veuillez vous inscrire Svp"]);
       }
       
    }
    //Connection Client
    public function signClient(Request $request)
    {
        $mail = $request->mail;
        $pass = $request->password;
        $res = SignClient($mail,$pass);
        if ($res) {
         $_SESSION['clientID'] = $res->idclients;
         return response()->json(['res'=>1,'msg'=>'Connection de compte en cours...']);
        }else {
         return response()->json(['res'=>0,'msg'=>'Vos coordonnées de connection sont incorrectes']);
        }
        
    }
    //Ouverture de compte
    public function Signup(Request $request)
    {
      $nom = $request->nom;
      $prfx = $request->prfx;
      $tel = $request->tel;
      $phone = $prfx.$tel;
      $mail = $request->mail;
      //Contrôle nom
      if ($nom=='') {
         return response()->json(['res'=>0,'msg'=>'Nom incorrecte']);
         die();
      }
      //Contrôle phone
      if ($tel=='') {
         return response()->json(['res'=>0,'msg'=>'Numéro de Téléphone incorrecte']);
         die();
      }
      //Contrôle mail
      $res = valid_email($mail);
      if ($res=='true') {
         //Contrôle custumer exisiting
         $resMail = ReadClientEmail($mail);
         //dd($resMail);
         if ($resMail) {
             #Existing
             return response()->json(['res'=>0,'msg'=>'Cet Email '.$mail.' existe déjà ! Changez le Svp']);
         }else {
             #New custumer
             $passclts = SaveClient($nom,$phone,$mail);
             #Ouverture de session client
             $resC = ReadClientEmail($mail);
             $_SESSION['clientID'] = $resC->idclients;
             #Send Email
             $msg = "-----------------------------------------------
                     Akwaba chers Immover. Merci de nous réjoindre !
                                  www.immover.io
                    -----------------------------------------------
                      Votre compte Immover est ouvert avec succès :
                       - Votre Email : ".$mail."
                       - Votre Mot de Passe : ".$passclts."
                    ";
             #SendEmail($mail,"Akwaba LogRapid",$msg);
             return response()->json(['res'=>1]);
         } 
      }else {
         return response()->json(['res'=>0,'msg'=>'Email incorrecte']);
         die();
      }
      
    }
    
    /**
     *  ------------------------------------
     *   SYSTEM DE GESTION DE COMPTE  CLIENT
     *  ------------------------------------
     */
      //Generate coupons
      public function savecoupon(Request $request)
      {
        $mail =  ReadClientID($_SESSION['clientID'])->mail;
        $visite = $request->code;
        //Verification de disponiblité de la visite
        $res = readvisite($visite);
        if ($res) {
         #Vérification de la disponibilité du biens
         $bienstat = ReadBiensID($res->idbiens)->statut;
         if ($bienstat==1) {
           //Annuler la visite
           UpdVisiteStat(2,$res->idbiensclient);
           //Generer et enregistrer le coupon
           $coupon = coupons($visite,$mail);
           if ($coupon=='0') {
             return response()->json(['res'=>1,'msg'=>'Coupons déjà généré pour cette visite','alert'=>'error']);
           }else {
             //Save coupons
             Adddcoupons($coupon,$visite,$mail,0);
             return response()->json(['res'=>1,'msg'=>'Coupons généré avec succès','alert'=>'success']);
           }
         }else {
           return response()->json(['res'=>1,'msg'=>'Le biens est toujours disponible','alert'=>'error']);
         }
         
        }else {
         #Indisponibilité de la visite
         return response()->json(['res'=>0]);
        }
        
      }

      //Mes coupons
      public function coupons(Request $request)
      {
        
        if (isset($_SESSION['clientID']) AND $_SESSION['clientID']!='') {
            return view('coupons');
         }else {
            $info = "Oup !! Akwaba chers Immover, Veuillez vous connecter à votre compte";
            $title = "Compte Immover";
            $libele = "Akwaba";
            $url = '/';
            return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
            die();
         }
      }
      //Visite Soldée
      public function visitesSold()
      {
          if (isset($_SESSION['clientID']) AND $_SESSION['clientID']!='') {
             return view('visiteSold');
          }else {
             $info = "Oup !! Akwaba chers Immover, Veuillez vous connecter à votre compte";
             $title = "Compte Immover";
             $libele = "Akwaba";
             $url = '/';
             return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
             die();
          }
      }
     //Visite Annulée
     public function visitesAnnul()
     {
         if (isset($_SESSION['clientID']) AND $_SESSION['clientID']!='') {
             return view('visiteAnnul');
          }else{
             $info = "Oup !! Akwaba chers Immover, Veuillez vous connecter à votre compte";
             $title = "Compte Immover";
             $libele = "Akwaba";
             $url = '/';
             return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
             die();
          }
     }
     //Visite Effectuée
     public function visitesEffect()
     {
         if (isset($_SESSION['clientID']) AND $_SESSION['clientID']!='') {
             return view('visiteEffect');
         }else{
             $info = "Oup !! Akwaba chers Immover, Veuillez vous connecter à votre compte";
             $title = "Compte Immover";
             $libele = "Akwaba";
             $url = '/';
             return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
             die();
         }
     }
     //Visite reportée
     public function visitesReport()
     {
         
         if (isset($_SESSION['clientID']) AND $_SESSION['clientID']!='') {
             return view('visiteReport');
         }else{
             $info = "Oup !! Akwaba chers Immover, Veuillez vous connecter à votre compte";
             $title = "Compte Immover";
             $libele = "Akwaba";
             $url = '/';
             return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
             die();
         }
     }
     //Visite nouvelle
     public function visitesNew()
     {
        
         if (isset($_SESSION['clientID']) AND $_SESSION['clientID']!='') {
             return view('visiteNew');
         }else{
             $info = "Oup !! Akwaba chers Immover, Veuillez vous connecter à votre compte";
             $title = "Compte Immover";
             $libele = "Akwaba";
             $url = '/';
             return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
             die();
         }
     }
     //Mon compte
     public function count()
     {
         
         if (isset($_SESSION['clientID']) AND $_SESSION['clientID']!='') {
             return view('count');
         }else{
             $info = "Oup !! Akwaba chers Immover, Veuillez vous connecter à votre compte";
             $title = "Compte Immover";
             $libele = "Akwaba";
             $url = '/';
             return redirect('alertinfo?info='.$info.'&url='.$url.'&libele='.$libele.'&title='.$title);
             die();
         }
     }
     //Logout client
     public function logoutLog()
     {
         logout();
         return redirect('/');
     }

}