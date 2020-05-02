<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profiles; //14章課題 2020.04.22

use App\Profile_History; //17章課題 2020.04.28
use Carbon\Carbon; //17章課題 日付のための利用 2020.04.28

use App\Profile_History2; //17章課題 2020.04.30


class ProfileController extends Controller
{
    public function add()
    {
        return view('admin.profile.create');
    }
    /*14章課題 admin/profile/create */
    public function create(Request $request)
    {   
    
        //validationを行う
        $this->validate($request,Profiles::$rules);
        
        $profiles = new Profiles;
        $form = $request->all();
        
        //フォームから送信されてきた_tokenを削除
        unset($form['_token']);
        
        //DB保存
        $profiles->fill($form);
        $profiles->save();
        
        return redirect('admin/profile/create');
    }
    public function edit(Request $request)
    {
        $profiles = Profiles::find($request->id);
        
        if(empty($profiles)){
             abort(404);
      }
        return view('admin.profile.edit',["profile_form"=>$profiles]);
    }
    public function update(Request $request)
    {   //validationを行う
        $this->validate($request,Profiles::$rules);
        
        $profiles = new Profiles;
        $profile_form = $request->all();
        
        //フォームから送信されてきた_tokenを削除
        unset($profile_form['_token']);
        
        //DB保存
        $profiles->fill($profile_form);
        $profiles->save();
        
        
        // /*2020.04.28 17章課題　編集履歴をつける */
        // $profile_history = new Profile_History;
        // $profile_history->profiles_id = $profiles->id;
        // $profile_history->edit_at = Carbon::now();
        // $profile_history->save();
        // /*2020.04.28 17章課題　編集履歴をつける */
        
        //2020.04.30 17章課題　編集履歴　もう一度　Profile_hirtories2 Modelから
        $profile_history2 = new Profile_History2;
        $profile_history2->profiles_id = $profiles->id;
        $profile_history2->edited_at = Carbon::now();
        $profile_history2->save();
        //2020.04.30ここまで
        
        
        return redirect('admin/profile/edit');
    }
    
    //2020.04.27 編集画面への遷移元を作成する
    public function index(Request $request){
        //名前の部分一致で検索することとする
        $cond_namae = $request->cond_namae;
        if ($cond_namae != ''){
            /* 条件クエリを実行して取得：News::where(カラム名,値)->get()(またはfirst())*/
            $posts = Profiles::where('namae','LIKE',"%{$cond_namae}%")->get();
        }else{
            $posts = Profiles::all();
            /* すべての値を取得*/
        }
        return view('admin.profile.index',['posts'=>$posts,'cond_namae'=>$cond_namae]);
        //view(admin/profile/index.blade.php , データ内容)
    }
    public function delete(Request $request){
      $profiles = Profiles::find($request->id);
      $profiles->delete();
      return redirect('admin/profile/');
  }
}
