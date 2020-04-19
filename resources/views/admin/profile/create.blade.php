<!--<!DOCTYPE html>-->
<!--<html>-->
<!--    <head>-->
<!--        <meta charset='utf-8'>-->
<!--        <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--        <meta name="viewport" content="width=device-width,initial-scale=1">-->
        
<!--        <title>MyNews</title>-->
<!--    </head>-->
<!--    <body>-->
<!--        <h1>プロフィール新規画面</h1>-->
<!--    </body>-->
    
<!--</html>-->

{{--layouts/profile.blade.phpを読み込む--}}
@extends('layouts.profile')

{{--profile.blade.phpの@yield('title)に'ニュースの新規作成'を読み込む--}}
@section('title','Myプロフィール')

{{--profile.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-8 mx-auto">
             <h2>Myプロフィール</h2>
             <!--以下、13章課題4 2020.04.19-->
             <!--フォームをcreate Actionへ送る-->
             <form action="{{action('Admin\ProfileController@create')}}" method="POST">
                 @if(count($errors) > 0)
                   <ul>
                       @foreach($errors->all() as $e)
                         <li>{{ $e }}</li>
                       @endforeach
                   </ul>
                 @endif
                 <div class="form-group row">
                     <label class="col-md-2">氏名(name)</label>
                     <div class="col-md-10">
                         <input type="text" class="form-control" name="namae" value="{{ old('namae') }}">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label class="col-md-2">性別(gender)</label>
                     <div class="col-md-10">
                         <p>
                         <input type="radio" class="form-control" name="gender" value="{{old('male')}}" id="male" checked="checked">
                         <label for="male">男(male)</label><!--文字をクリックすると、ラジオボタンが選択される -->
                         <input type="radio" class="form-control" name="gender" value="{{old('female')}}" id="female">
                         <label for="female">女(female)</label><!--文字をクリックすると、ラジオボタンが選択される -->
                         </p>
                     </div>
                 </div>
                 <div class="form-group row">
                     <label class="col-md-2">趣味(hobby)</label>
                     <div class="col-md-10">
                         <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                     </div>
                 </div>
                 <div class="form-group row">
                     <label class="col-md-2">自己紹介欄(introduction)</label>
                     <div class="col-md-10">
                         <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                     </div>
                     {{ csrf_field()}}
                     <input type="submit" class="btn btn-primary" value="更新">
                 </div>
             </form>
         </div>
             <!--以上、13章課題4 -->
         </div>
     </div>
 </div>
@endsection