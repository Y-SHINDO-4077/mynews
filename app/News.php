<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = array('id');
    //
    public static $rules = array(
        'title' => 'required',
        'body' => 'required'
        );
        
    // 2020.04.27 History追加（17章編集履歴の表示)
    public function histories()
    {
        return $this->hasMany('App\History');
        //hasMany はNewsのid とnews_idを関連づける
        //News.id has many History.nesw_id 1:多
    }
}
