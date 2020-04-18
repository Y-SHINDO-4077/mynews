<!DOCTYPE html>
<html lang = "{{app()->getLocale() }}">
    {{-- {{}}はphpの内容を指す。getLacale()はPCに設定されている言語情報--}}
    {{-- app()はApp::make()と同一、アプリケーション自体のインスタンスを生成--}}
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name = "viewpoint" content = "width=device-width","initial-scale=1">
        {{--↑画面の幅を小さくした時の文字や画像の大きさを調整する--}}
         
        {{-- CSRF Token --}}
        {{--csrf（クロスサイトリクエストフォージェリ）から
        アプリを守る。各セッションごとに「トークン」を自動的に生成 --}}
        <meta name = "csrf-token" content="{{csrf_token()}}">
        
        {{-- 各ページごとにtitleタグを入れるため@yieldで空けておきます。 --}}
        {{-- @yieldでセッションの内容を表示--}}
        <title>@yield('title')</title>


        <!-- Scripts -->
        {{-- Lalavel標準で用意されているJSを読み込む --}}
        <!-- 
        <script src="{{secure_asset('js.app.js')}}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Railway:300,400,600" rel="stylesheet" type="text/css">

        <!--styles -->
        {{--Lalavel標準で用意されているCSSを読み込みます --}}
        <!--asset('filepass')でpublicディレクトリのパスを返す -->
        <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">
        {{-- この章後半で作成するCSSを読み込みます --}}
         <link href="{{ secure_asset('css/profile.css') }}" rel="stylesheet">
    </head>    
    <body>
        <div id = "app">
            <nav class  = "navbar navbar-expand-md navbar-dark navbar-laravel">
                <div class="container">
                  {{ config('app.name','Lalavel') }}<!-- config/app.phpのnameを呼び出す-->
                   </a>
                   <button class="navbar-toggler" type="button" data-toggle="col
                   lapse" data-target="#navbarSupportedContent" aria-controls="n
                   avbarSupportedContent" aria-expanded="false" aria-label="Togg
                   ele navigation">
                    <span class="navbar-toggle-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                       <!-- left side pf navbar -->
                       <ul class="navbar-nav mr-auto">
                           
                       </ul>
                       
                       <!-- right side pf navbar -->
                       <ul class="navbar-nav ml-auto">
                          <!--以下、12章課題、ログイン・ログアウトリンク表示-->
                          @guest<!--ユーザー認証されていない場合 -->
                          <li><a class="nav-link" href="{{route('login')}}">{{__('Login')}}</a></li>
                          <!--↑loginリンク-->
                          @else<!--ユーザー認証すみの場合 -->
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{Auth::user()->name}}<span class="caret"></span>
                              </a><!--認証済のユーザ名称を表示↑ -->
                              
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                  {{__('Logout')}}
                                  </a><!--logoutformへクリック時に送信↑ -->
                                  <form id="logout-form" action="{{route('logout')}}" method="POST" style="display:none;">
                                      @csrf
                                  </form>
                             </div>
                          </li>
                          @endguest
                       </ul>
                   </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
            
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておきます--}}
                @yield('content')
            </main>
        </div>
    </body>
</html>