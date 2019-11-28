<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//Profile  Modelを使えるようにする
use App\Profile;
use App\ProfileHistory;

use Carbon\Carbon;




class ProfileController extends Controller
{
    
    public function add(){
        return view('admin.profile.create');
    }
    

    public function edit(Request $request){
        
       //var_dump($request->id, 'test');
       //exit;
       if($request->id == NULL){
           $profile = Profile::first();
       }else{
           $profile = Profile::find($request->id);
       }

        return view('admin.profile.edit',['form'=>$profile]);
    }
    
    public function update(Request $request){
        
      // Validationをかける
      $this->validate($request, Profile::$rules);
      // Profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $form = $request->all();
      unset($form['_token']);
      // 該当するデータを上書きして保存する
      $profile->fill($form)->save();
      
      $history = new ProfileHistory;
      $history->profile_id = $profile->id;
      $history->edited_at = Carbon::now();
      $history->save();
      
      return redirect('admin/profile/edit?id=' . $request->id);
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
