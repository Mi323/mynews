<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

// 以下を追記(カリキュラム17課題)
use App\HistoryProfiles;

use Carbon\Carbon;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view('admin.profile.create');
    }
    
    public function create(Request $request)
    {
      // Varidationを行う 
      $this->validate($request, Profile::$rules);
      $profile = new Profile;
      $form = $request->all();
      
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
    
      // データベースに保存する
      $profile->fill($form);
      $profile->save();
      
      return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
      $profile = Profile::find($request->id);
      if (empty($profile)) {
        abort(404);    
      }
        return view('admin.profile.edit', ['profile_form' => $profile]);
        
    }
    
    public function update(Request $request)
    {
      $this->validate($request, Profile::$rules);
      // profile Modelからデータを取得する
      $profile = Profile::find($request->id);
      // 送信されてきたフォームデータを格納する
      $profile_form = $request->all();

      unset($profile_form['remove']);
      unset($profile_form['_token']);
      // 該当するデータを上書きして保存する
      $profile->fill($profile_form)->save();
      
      // 以下を追記（カリキュラム17課題)
      $history_profiles = new HistoryProfiles();
      $history_profiles->profile_id = $profile->id;
      $history_profiles->edited_at = Carbon::now();
      $history_profiles->save();
      
      
      return redirect('admin/profile/');
    }
    
    
}
