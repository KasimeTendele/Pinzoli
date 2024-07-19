<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Defunt;
use App\Models\Famille;
use App\Models\Hommage;
use App\Models\Cimetiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\HommageRequest;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\users\userRequest;
use App\Http\Requests\users\familleRequest;
use App\Models\Message;

class UserControllerw extends Controller
{
    public function index()
    {
       
        $defunts=Defunt::orderBy('created_at','desc')->limit(8)->get();
        // dd($defunts);
        return view('users.index',['defunts'=>$defunts]);
    }
    public function storeMessage(MessageRequest $request){
       if(request()->ajax()){
            $verif=User::where('email',$request->email)->first();
            // $message="erreur";
          if($verif){
            $message=Message::create([
                'contenu'=>$request->validated('contenu'),
                'user_id'=>$verif->id
            ]);
            return response()->json(["status"=>'success','message'=>'Votre Hommage a bien été Envoyé']);
        }else{
            return response()->json(["status"=>'failed','message'=>'Une erreur est survenue. Assurez-vous d\'avoir bien rempli vos coordonnées']);


        }
        
       }
        
    }
    public function dashboard(Request $request) 
    {
        $user=Auth::user();
        $famille=$user->Famille;
        // $query=Defunt::query();
        // if($request->has('defuntSearch')){
        //     $query=$query->where('nom','like',"%{$request->defuntSearch}%")->where('famille_id', $famille->id);
        // }
     
        // dd($famille);
        return view('users.dashboard',['user'=>$user,'famille'=>$famille]);
    }
    public function login()
    {
        return view('login');
    }
    public function createUser()
    {
        $familles=Famille::all();
        return view('users.createUser',['familles'=>$familles]);
    }
    public function store(userRequest $request) 
    {
        
        $email=User::where('email','like',"{$request->email}")->get();
        if(count($email)>0){
            return to_route('createUser')->with('error',"l'adresse email n'est pas la votre");
        }else
        {  
            // $data=$request->validated();
         $path=null;
            if($request->file('avatar')){
               
                $file=$request->file('avatar');
                $fileName=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/users_images'),$fileName);
                $path=$fileName;
                // $path=$request->file('avatar')->storeAs(
                //     'avatars','test.jpg','public'
                // );
            }
            $user=User::create([
                'nom'=>$request->nom,
                'postnom'=>$request->postnom,
                'prenom'=>$request->prenom,
                'sexe'=>$request->sexe,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'avatar'=>$path,
                'famille_id'=>$request->famille_id,

            ]);
            $user->save();
        //    return redirect()->back();
            // $request=User::create($request->validated());
             return to_route('createUser')->with('success','Votre compte  a bien été créé');
        }
        
    }
    public  function createFamille()
    {
        return view('users.famille');
    }
    public  function storeFamille(familleRequest $request)
    {
        $manyFamilly=Famille::where('nom','LIKE',"{$request->nom}")->get();
        $manyPhone=Famille::where('telephone','like',"{$request->telephone}")->get();
        $manyEmail=Famille::where('email','like',"{$request->email}")->get();
        
        if(count($manyFamilly)>0){
        return to_route('createFamille')->with('error','la famille existe déjà');

        }
        elseif(count($manyPhone)>0)
        {
        return to_route('createFamille')->with('error','Veillez saisir le numéro de téléphone de référence de votre famille SVP!');
        }
        elseif(count($manyEmail)>0)
        {
        return to_route('createFamille')->with('error','Veillez saisir l\'adresse email de votre famille SVP!');
        }
        else
        {
        $famille=Famille::create($request->validated());
        return to_route('createFamille')->with('success','la famille a bien été créée');

        }
        // dd($request->all());
        // return view('login');
        // $request=Famille::create($request->validated());
    }
    public function addHommage(Request $request)
    {
        $path=null;
        if($request->isAudio){
            // $request->validate([
            //     'videos'=>'mimetypes:audio/oga,audio/mp4,audio/mp3,audio/acc,audio/quicktime'
            // ]);
            $audio_data=base64_decode($request->aud);
            $rand=rand(10,1000);
            $filename=date('YmdHi').$rand."audio.mp4";
            $file_path="upload\comments_files\\".$filename;
            $file=  file_put_contents($file_path,$audio_data);
           
            
            $hommage=Hommage::create([
                'contenu'=>$file_path,
                'user_id'=>Auth::user()->id,
                'defunt_id'=>$request->defunt_id
            ]);
            $nom=$hommage->user->nom;
            $avatar='upload/users_images/'.$hommage->user->avatar;
            $created_at=$hommage->created_at;
            $contenu=$hommage->contenu;
            $hommage=[
                'nom'=>$nom,
                'avatar'=>$avatar,
                'created_at'=>$created_at,
                'contenu'=>$contenu
            ];
            return response()->json(["hommage"=>$hommage,"status"=>'success','message'=>'Votre Hommage a bien été Envoyé']);


        }
        elseif($request->isVideo)
        {
            $request->validate([
                'videos'=>['mimetypes:video/avi,video/mpeg,video/mp4,video/mp3,video/quicktime',
                'required',
                    // min(1024),
                    // max:"12mb"
                ]
            ]);
            $file=$request->file('videos');
            $fileName=date('YmdHi').'video'.$file->getClientOriginalName();
            $file->move(public_path('upload/videos_files'),$fileName);
            $path=$fileName;
            $hommage=Hommage::create([
                'contenu'=>$path,
                'user_id'=>Auth::user()->id,
                'defunt_id'=>$request->defunt_id
            ]);
            $nom=$hommage->user->nom;
            $avatar='upload/users_images/'.$hommage->user->avatar;
            $created_at=$hommage->created_at;
            $contenu=$hommage->contenu;
            $hommage=[
                'nom'=>$nom,
                'avatar'=>$avatar,
                'created_at'=>$created_at,
                'contenu'=>$contenu
            ];
            return to_route('defunt.show',['Defunt'=>$request->defunt_id])->with('success',"Hommage Envoyé avec succèes");
            // return response()->json(["hommage"=>$hommage,"status"=>'success','message'=>'Votre Hommage a bien été Envoyé']);

        }
        
        else
        {
            $hommage=Hommage::create([
                'contenu'=>$request->contenu,
                'user_id'=>Auth::user()->id,
                'defunt_id'=>$request->defunt_id
            ]);
            $nom=$hommage->user->nom;
            $avatar='upload/users_images/'.$hommage->user->avatar;
            $created_at=$hommage->created_at;
            $contenu=$hommage->contenu;
            $hommage=[
                'nom'=>$nom,
                'avatar'=>$avatar,
                'created_at'=>$created_at,
                'contenu'=>$contenu
            ];
            return response()->json(["hommage"=>$hommage,"status"=>'success','message'=>'Votre Hommage a bien été Envoyé']);

        }
        
    }
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function espace(){
        $user=Auth::user();
        if($user->role !='admin'){
            $famille=$user->Famille;
        return view('users.dashboard',['user'=>$user,'famille'=>$famille]);
        }else{
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
    }
    


}
