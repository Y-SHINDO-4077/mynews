@extends('layouts.front')

@section('title','プロフィール一覧')

@section('content')
  <div class="container">
    <hr color="#c0c0c0">  
     <div class="headline col-md-10 mx-auto">
      @if(!is_null($headline))
       <div class="row">
         <div class="col-md-6">
            <div class="caption"> 
             <h2>{{$headline->namae}}</h2>
            </div>
            <div class="col-md-8">
              <p class="body mx-auto">{{$headline->gender ==0 ? "男(male)" : "女(female)"}}</p>
              <p class="body mx-auto">{{$headline->hobby}}</p>
              <p class="body mx-auto">{{$headline->introduction}}</p>
            </div>
         </div> 
       </div>    
      @endif 
     </div>
     <hr color="#c0c0c0">
     <div class="row">
      <div class="posts col-md-8 mx-auto mt-3">
       @foreach($posts as $post)
        <div class="post col-md-6">
          <div class="date">
           {{$post->updated_at->format('Y年m月d日')}}
          </div>
          <div class="title">
            <h2>{{$post->namae}}</h2>
          </div>
          <div class="body mt-3">
            {{$post->gender==0 ? "男(male)" : "女(female)"}}
          </div>
          <div class="body mt-3">
            {{$post->hobby}}
          </div>
          <div class="body mt-3">
            {{$post->introduction}}
          </div>
        </div>
        <hr color="c0c0c0">
       @endforeach
      </div>
     </div>
  </div>
@endsection  