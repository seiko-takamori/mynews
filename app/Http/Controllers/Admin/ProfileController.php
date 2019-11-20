<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Profile  Modelを使えるようにする
use App\Profile;




class ProfileController extends Controller
{
    
    public function add(){
        return view('admin.profile.create');
    }
    

    public function edit(Request $request){
       $profile = Profile::find($request->id);
        return view('admin.profile.edit',["form"=>$profile]);
    }
    
    public function update(){
        return redirect('admin/profile/edit');
    }
    

    
    public function create(Request $request)
   {
      //以下を追記してVaridationを行う
      $this->validate($request, Profile::$rules);
      
      $profile = new Profile;
      $form = $request->all();

      //データベースに保存する
      $profile->fill($form);
      $profile->save();

      // admin/profile/createにリダイレクトする
      return redirect('admin/profile/create');
  }
  
  
  public function delete(Request $request)
  {
      $profile = Profile::find($request->id);
      $profile->delete();
      return redirect('admin/profile/');
  }
  

}
