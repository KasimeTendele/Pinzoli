<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeadRequest;
use App\Http\Requests\searchDefuntRequest;
use App\Models\Cimetiere;
use App\Models\Defunt;
use App\Models\Famille;
use App\Models\Hommage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeadController extends Controller
{
    public function create()
    {
        $familles=Famille::all();
        $cimetieres=Cimetiere::all();

        return view('users.createDead',['familles'=>$familles,'cimetieres'=>$cimetieres]);
    }
    public function storeDead(DeadRequest $request)
    {
        // dd($request);
        $dead=$request->validated();
        $avatar_def=null;
        if($request->file('avatar_def')){
           
            $file=$request->file('avatar_def');
            $fileName=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/dead_images'),$fileName);
            $avatar_def=$fileName;
        }
        $avatar_cim=null;
        if($request->file('avatar_cim')){
           
            $file=$request->file('avatar_cim');
            $fileName=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/cimetiere_images'),$fileName);
            $avatar_cim=$fileName;
        }
        $oraison=null;
        if($request->file('oraison')){
           
            $file=$request->file('oraison');
            $fileName=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/oraison_files'),$fileName);
            $oraison=$fileName;
        }
        $dead['avatar_def']=$avatar_def;
        $dead['avatar_cim']=$avatar_cim;
        $dead['oraison']=$oraison;
        $mort=Defunt::create($dead);
        // $dead->save();
        return to_route('createDead')->with('success','le défunt a bien été créé');
    }
    public function all(searchDefuntRequest $request)
    {
        $cimetieres=Cimetiere::all();
        $query=Defunt::query();
        if($request->has('defuntSearch')){
            $query=$query->where('nom','like',"%{$request->defuntSearch}%");
        }
        // if($request->has('cimetiere_id')){
        //     $query=$query->where('cimetiere_id',$request->cimetier_id);
        // }
        // $defunts=Defunt::orderBy('created_at','desc')->paginate(9);
        return view('defunts',
        [
                'defunts'=>$query->paginate(9),
                'cimetieres'=>$cimetieres,
                'input'=>$request->validated()
        ]);
    }
    public function show($defun)
    {
        // dd($defunt);
        $defunt=Defunt::find($defun);
      
       
        return view('defunt',['Defunt'=>$defunt]);
    }
    public function readOraison($defun){
        $defunt=Defunt::find($defun);

        return view('oraison',['Defunt'=>$defunt]);
    }

    public function updateDead(Request $request){
        $actuel=Defunt::find($request->id)->first();
         $actuel->update([
            'nom'=>$request->nom,
            'postnom'=>$request->postnom,
            'prenom'=>$request->prenom,
            'sexe'=>$request->sexe,
            'famille_id'=>$request->famille_id,
            'cimetiere_id'=>$request->cimetiere_id,
            'date_naissance'=>$request->date_naissance,
            'date_deces'=>$request->date_deces,
            'date_enterrement'=>$request->date_enterrement
         ]);
         return to_route('callUpdater',['defunt'=>$actuel])->with('success',"votre modification est faite avec succès");

    }
    public function callUpdater($defunt){
        $familles=Famille::all();
        $cimetieres=Cimetiere::all();
        $actuel=Defunt::find( $defunt);
        return view('admin.updateDead',['defunt'=>$actuel,'familles'=>$familles,'cimetieres'=>$cimetieres]);
    }
    public function recorder(){
        return view('testRecorder');
    }
    public function traitement(Request $request){
        try{
            // dd($request);
            $audio_data=base64_decode($request->fichier);
            $rand=rand(10,1000);
            $filename=date('YmdHi').$rand."audio.mp4";
            $file_path="upload\comments_files\\".$filename;
            $file=  file_put_contents($file_path,$audio_data);
          
            


            // $file_path=public_path('upload/comments_files');
            // echo "tout s'est bien passé";
        }catch(Exception $e){
            echo "erreur".$e;
        }
      
       
    // if(file_put_contents('audio.oga', base64_decode($request->base64))){
    //     dd("réussi");
    // }
     
}
}
