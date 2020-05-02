<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;

use App\News;

class NewsController extends Controller
{
    public function index(Request $request){
        $posts= News::all()->sortByDesc('updated_at');
        //sortByDesc ''で降順に並び替える
        
        if(count($posts)>0){
            $headline = $posts->shift();
            //shift(配列の最初データを削除したもの)、最新記事にする
        }else{
            $headline=null;
        }
        
        return view('news.index',['headline' => $headline, 'posts' => $posts]);
    }
}
