<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile_History extends Model
{
    protected $table = 'profile_histories';
    /*2020.04.28 17章課題 SQLSTATE[42S02]：table名が存在しないというエラー対処 */
    protected $guarded = array('id');
    
    public static $rules = array (
        'profiles_id' => 'required',
        'edit_at' => 'required'
        );
}
