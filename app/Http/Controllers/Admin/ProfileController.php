<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profiles; //14章課題 2020.04.22

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
    public function edit()
    {
        return view('admin.profile.edit');
    }
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}
