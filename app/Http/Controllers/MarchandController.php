<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarchandController extends Controller
{

    /* ------------------------------
     SYSTEME DE GESTION MENU ADMIN
    --------------------------------*/
    //Déconnection compte marchand
    public function logoutMarchd(Request $request)
    {
        logout();
        return redirect('signMarchd');
    }
    //Connection compte marchand
    public function conectmarchd(Request $request)
    {
        $res = Marchandconect($request->pass);
        if ($res=='') {
          return response()->json(['conect'=>0]);
         }else{
         //Ouverture de la session abone
         $_SESSION['marchdID'] = $res->idmarchand;
         $_SESSION['marchdPASS'] = $res->pass;
         return response()->json(['conect'=>1]);
        }
    }
    //Login marchand
    public function signMarchd(Request $request)
    {
        return view('signMarchd');
    }
    //Dash
    public function marchand(Request $request)
    {
        if (isset($_SESSION['marchdID']) AND $_SESSION['marchdID']!='') {
            return view('marchand');
        }else{
            return redirect('signMarchd');
        } 
    }

}

?>