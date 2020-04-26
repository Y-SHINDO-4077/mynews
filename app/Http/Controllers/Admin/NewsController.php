<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\News; //News Modelを扱う 2020.04.20

class NewsController extends Controller
{
    public function add(){
        return view('admin.news.create');
    }
    
    //13章以下、追記 2020.04.17
    
    public function create(Request $request)
    {    
        
        //Validationを行う 2020.04.20 追記
        $this->validate($request,News::$rules);
        //$this はインスタンス自身、NewsController自身
        //validation('validation対象のデータ','validationのルール')
        
        $news = new News;  //インスタンス生成
        $form = $request->all(); //$requestで受けっとったものすべてを連想配列で受け取るall()
        
        //フォームから画像が送信されてきたら、保存して、
        //$news->image_pathに画像のパスを保存する 2020.04.20追記
        if(isset($form['image']))
        //['image']の値が存在するなら
             {
            $path = $request->file('image')->store('public/image');
            //$request->file('image')ではファイル情報を取得
            //store()で保存場所を指定
            $news->image_path = basename($path);
            //basename()でパスの最後の名前の部分を返す
        }else{
            $news->image_path = null;
        }
        
        //フォームから送信されてきた_tokenを削除する（token不要になるので）
        unset($form['_token']);
        //フォームから送信されてきたimageを削除する(DBにimage_pathが入るので）
        unset($form['image']);
        
        //データベースに保存する
        $news->fill($form);//属性の代入
        $news->save(); //DB保存
        
        //admin/news/createにリダイレクトする
        return redirect('admin/news/create');
    }
    //2020.04.23 15章ニュース一覧画面
    public function index(Request $request){
        $cond_title = $request->cond_title;
        if ($cond_title != ''){
            /* 条件クエリを実行して取得：News::where(カラム名,値)->get()(またはfirst())*/
            $posts = News::where('title',$cond_title)->get();
        }else{
            $posts = News::all();
            /* すべての値を取得*/
        }
        return view('admin.news.index',['posts'=>$posts,'cond_title'=>$cond_title]);
        //view(admin/news/index.blade.php , データ内容)
    }
    
    public function edit(Request $request)
    {
        //News Model からデータを取得 find()メゾット
        $news = News::find($request->id);
        if(empty($news)){
            abort(404);
        }
        return view('admin.news.edit',['news_form' => $news]);
    }
    
    public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, News::$rules);
      // News Modelからデータを取得する
      $news = News::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      if (isset($news_form['image'])) {
        $path = $request->file('image')->store('public/image');
        $news->image_path = basename($path);
        unset($news_form['image']);
      } elseif (isset($request->remove)) {
        $news->image_path = null;
        unset($news_form['remove']);
      }
      unset($news_form['_token']);
      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();

      return redirect('admin/news/');
  }
  
  public function delete(Request $request){
      $news = News::find($request->id);
      $news->delete();
      return redirect('admin/news/');
  }
    
}
