@extends('default')

@section('title')
    {{ $article->title }}
@endsection

@section('bg-image')
    /storage/{{ $article->image }}
@endsection

@section('title')
    {{ $article->title }}
@endsection

@section('sub_title')
    {{ $article->sub_title }}
@endsection

@section('content')
    
  <!-- Post Content -->
  <article>
    <div class="container">
      
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            {{ $article->body }}
        </div>
      </div>
    </div>
  </article>
@endsection