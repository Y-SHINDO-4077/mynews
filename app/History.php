<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/*2020.04.27 History 追加 */
class History extends Model
{
    protected $guarded = array('id');
    
    public static $rules = array(
        'news_id' => 'required',
        'edited_at' => 'required'
        );
}
