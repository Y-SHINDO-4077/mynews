@extends('layouts.front')

@section('title','TOP')

@section('content')
   <div class="container">
       <!--2020.05.10 heroku デプロイ課題 pタグ追加-->
       <p>NEWS TOP PAGE</p>
       <!--2020.05.10 heroku デプロイ課題 pタグ追加-->
       <hr color="#c0c0c0"><!-- hrタグ：テーマや話題の区切りを表す-->
         @if(!is_null($headline))
            <div class="headline col-md-10 mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <div class="caption mx-auto">
                            <div class="image">
                                @if($headline->image_path)
                                  <img src="{{secure_asset('storage/image/'.$headline->image_path)}}">
                                  <!-- assert(パス名)はパス名を読み込む-->
                                @endif
                            </div>
                            <div class="title p-2"><!--p:padding 2:0.5rem-->
                                <h1>{{str_limit($headline->title,70)}}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="body mx-auto">{{\str_limit($headline->body,650)}}</p>
                    </div>
                </div>
            </div>
            
        @endif
       <hr color="#c0c0c0">
       <div class="row">
           <div class="posts col-md-8 mx-auto mt-3">
               @foreach($posts as $post)
               <div class="post">
                   <div class="row">
                       <div class="text col-md-6">
                           <div class="date">
                               {{$post->updated_at->format('Y年m月d日')}}
                           </div>
                           <div class="title">
                               {{\str_limit($post->title,150)}}
                           </div>
                           <div class="body mt-3">
                               {{\str_limit($post->body,1500)}}
                           </div>
                        </div>
                           <div class="image col-md-6 text-right mt-4">
                               @if($post->image_path)
                                <img src="{{secure_asset('storage/image/'.$post->image_path)}}">
                               @endif
                           </div>
                    </div>
                </div>
                   <hr color="#c0c0c0">
               @endforeach
           </div>
        
       </div>
@endsection