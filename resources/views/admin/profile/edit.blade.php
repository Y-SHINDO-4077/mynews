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
          <form action="{{ action('Admin\ProfileController@update')}}" method="post">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="title">氏名(name)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="namae" value="{{ $profile_form->namae }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">性別(gender)</label>
                        <div class="col-md-10">
                           <p>
                         <input type="radio" class="form-control" name="gender" value=0 {{$profile_form->gender==0 ? 'checked':null}} id="male">
                         <label for="male">男(male)</label><!--文字をクリックすると、ラジオボタンが選択される -->
                         <input type="radio" class="form-control" name="gender" value=1 {{$profile_form->gender==1 ? 'checked':null}} id="female">
                         <label for="female">女(female)</label><!--文字をクリックすると、ラジオボタンが選択される -->
                         </p>
                        </div>
                    </div>
                    <div class="form-group row">
                     <label class="col-md-2">趣味(hobby)</label>
                     <div class="col-md-10">
                         <input type="text" class="form-control" name="hobby" value="{{ $profile_form->hobby }}">
                     </div>
                    </div>
                    <div class="form-group row">
                     <label class="col-md-2">自己紹介欄(introduction)</label>
                     <div class="col-md-10">
                         <textarea class="form-control" name="introduction" rows="20">{{ $profile_form->introduction }}</textarea>
                     </div>    
                    </div>     
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $profile_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <!--2020.04.28 17章課題 編集履歴を表示 -->
                <div class="row mt-5"><!--mt-5:margin top $spacer(16px)*3に設定-->
                  <div class="col-md-4 mx-auto">
                    <h2>編集履歴</h2>
                    <!--<ul class="list-group">-->
                    <!--  @if($profile_form->profile_histories != NULL)-->
                    <!--     @foreach($profile_form->profile_histories as $profile_history)-->
                    <!--     <li class="list-group-item">{{$profile_history->edit_at}}</li>-->
                    <!--     @endforeach-->
                    <!--  @endif-->
                    <!--</ul>-->
                    <!-- 2020.04.30 17章課題もう一度-->
                    <ul class="list-group">
                        @if($profile_form->profile_history2s != NULL)
                          @foreach($profile_form->profile_history2s as $profile_history2)
                           <li class="list-group-item">{{$profile_history2->edited_at}}</li>
                          @endforeach
                        @endif
                    </ul>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<!--    <body>-->
<!--        <h1>プロフィール編集画面</h1>-->
<!--    </body>-->
    
<!--</html>-->
