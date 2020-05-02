<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $guarded = array('id');
    
    public static $rules =array(
        'namae' => 'required'
        );
    //17章課題 編集履歴を反映 2020.04.28
    // public function profile_histories(){
        
    //     return $this->hasMany('App\Profile_History');
    // }
    
    //17章課題 Profile_History2 Modelを使用してもう一度　2020.04.30
    public function profile_history2s(){
        return $this->hasMany('App\Profile_History2');
    }
}
