<?php

namespace App\Http\Controllers;

use App\Models\Cimetiere;
use App\Models\Defunt;
use App\Models\Famille;
use App\Models\Message;
use App\Models\User;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function index()
    {
        $users=User::all();
        $cimetieres=Cimetiere::all();
        $defunts=Defunt::all();
        $familles=Famille::all();
        $user_auth=Auth::user();
        $lastDefunt=Defunt::latest()->first();
        $lastUser=User::latest()->first();
        $lastCim=Cimetiere::latest()->first();
        // dd($lastUser);
        $lastfamille=Famille::latest()->first();
        return view('admin.dashboard',['cimetieres'=>$cimetieres,'users'=>$users,
        'defunts'=>$defunts,
        'familles'=>$familles,
        'lastCim'=>$lastCim,
        'user'=>$user_auth,
        'lastUser'=>$lastUser,
        'lastDefunt'=>$lastDefunt,
        'lastFamille'=>$lastfamille  
    ]);
    }
    public function profile()
    {
        $users=User::all();
        $cimetieres=Cimetiere::all();
        $defunts=Defunt::all();
        $user_auth=Auth::user();
        return view('admin.adminProfile',['cimetieres'=>$cimetieres,'users'=>$users,'defunts'=>$defunts,'user'=>$user_auth]);
    }
    public function user()
    {
        $users=User::all();
        $cimetieres=Cimetiere::all();
        $defunts=Defunt::all();
        $familles=Famille::all();
        $user_auth=Auth::user();
        return view('admin.gestUser',['cimetieres'=>$cimetieres,'users'=>$users,
        'defunts'=>$defunts,

        'familles'=>$familles,
        'user'=>$user_auth
     
    ]);
    }
    public function defunt()
    {
        $users=User::all();
        $cimetieres=Cimetiere::all();
        $defunts=Defunt::all();
        $familles=Famille::all();
        $user_auth=Auth::user();
        return view('admin.gestDefunt',['cimetieres'=>$cimetieres,'users'=>$users,
        'defunts'=>$defunts,
        'familles'=>$familles,
        'user'=>$user_auth
     
    ]);
    }
    public function cimetiere($cimetiere)
    {
        $users=User::all();
        $cimetieres=Cimetiere::all();
        $defunts=Defunt::all();
        $familles=Famille::all();
        $user_auth=Auth::user();
       $query=Cimetiere::query();
        $query=$query->where('id',$cimetiere)->first();
        $cimetieres=Cimetiere::all();
       
        return view('admin.gestCimetier',['cimetieres'=>$cimetieres,'nom'=>$query,'users'=>$users,
        'defunts'=>$defunts,
        'familles'=>$familles,
        'user'=>$user_auth
    ]);
    }
    public function updateCim(Request $request){

        $cim=Cimetiere::where('id',$request->id)->first();
        $request->validate([
            'nom'=>'min:3|max:255|'
        ]);
        $cim->update(['nom'=>$request->nom]);;
        
        return to_route('gestCim',['cimetiere'=>1])->with('reussite','Cimétière Modifié avec succès');
       

    }
    public function addCim(Request $request){
        $request->validate([
            'nom'=>'min:3|max:255|'
        ]);
        $cim=Cimetiere::create([
            'nom'=>$request->nom,
            'adresse'=>'Congo Kinshasa'
        ]);
        return to_route('gestCim',['cimetiere'=>1])->with('success','Cimétière créé avec succès');

    }
    public  function adminiser($user){
        $actuel=User::find($user);
        $connecte=Auth::user()->id;
        if($actuel->id != $connecte){
            if($actuel->role == "user"){
                $actuel->update([
                    'role'=>'admin'
                ]);
            }else{
                $actuel->update([
                    'role'=>'user'
                ]);
            }
        }else{
            $users=User::all();
            
            $user_auth=Auth::user();
            return view('admin.gestUser',['users'=>$users, 'user'=>$user_auth])->with('error',"vous ne pouvez pas modifier votre propre status");
        }
        
        $users=User::all();
            
        $user_auth=Auth::user();
        return view('admin.gestUser',['users'=>$users,
        'user'=>$user_auth
     
    ]);  
    }
    public function notification(){
        
        $users=User::all();
        $cimetieres=Cimetiere::all();
        $defunts=Defunt::all();
        $familles=Famille::all();
        $user_auth=Auth::user();
        $messages=Message::orderBy('created_at','desc')->paginate();
        return view('admin.notification',['messages'=>$messages, 'cimetieres'=>$cimetieres,'users'=>$users,
        'defunts'=>$defunts,
        'familles'=>$familles,
        'user'=>$user_auth]);
    }
    public function destroyNotification(Request $request){
        $message=Message::where('id',$request->notification);
        $message->delete();
        // return to_route('notification')->with('success','la notification a bien été supprimée');
        return response()->json(["status"=>'success','message'=>"Message supprimé"]);

    }
}
