@extends('default')

@section('content')
    <!-- Main Content -->
    <div class="container">

        
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <form action="" class="form-inline">
                    <input class="form-control" type="search" name="q" placeholder="Rechercher ..." value="{{ request('q') }}">
                    <button class="btn btn-info"><i class="fas fa-search    "></i></button>
                </form>
                @foreach ($articles as $article)
                    <div class="post-preview">
                        <a href="{{ route('articles.show', $article->slug) }}">
                            <h2 class="post-title">
                                
                                {{ $article->id }} - 
                                {!! $article->title_searched !!}
                            </h2>
                            <h3 class="post-subtitle">
                                {!! $article->sub_title_searched !!}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#">{{ $article->user->name }}</a>
                            on {{ $article->date_publication }}</p>
                    </div>
                    <hr>
                @endforeach
                
                
                <div class="text-center">
                    {{ $articles->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection