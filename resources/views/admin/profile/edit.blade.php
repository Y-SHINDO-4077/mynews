<!--12章課題により、次のように仕様を変更-->
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--    <head>-->
<!--        <meta charset='utf-8'>-->
<!--        <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--        <meta name="viewport" content="width=device-width,initial-scale=1">-->
        
<!--        <title>MyNews</title>-->
<!--    </head>-->
{{--layouts/admin.blade.phpを読み込む--}}
@extends('layouts.admin')

{{--admin.blade.phpの@yield('title)に'ニュースの新規作成'を読み込む--}}
@section('title','プロフィール編集画面')

{{--admin.blade.phpの@yield('content')に以下のタグを埋め込む--}}
@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-8 mx-auto">
             <h2>プロフィール編集画面</h2>
         </div>
     </div>
 </div>
@endsection
<!--    <body>-->
<!--        <h1>プロフィール編集画面</h1>-->
<!--    </body>-->
    
<!--</html>-->
