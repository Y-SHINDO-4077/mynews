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
    public function profile_histories(){
        
        return $this->hasMany('App\Profile_History');
    }
}
