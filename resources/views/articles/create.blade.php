@extends('default')

@section('content')
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>Creer votre article</p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data" novalidate>
                @csrf

                <div class="control-group">
                    <div class="form-group">
                        <label>Titre</label>
                    <input type="text" class="form-control" name="title" required value="{{ old('title') }}">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group">
                        <label>Sous titre</label>
                        <textarea rows="2" class="form-control" name="sub_title" required> {{ old('sub_title') }}</textarea>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group">
                        <label>Date</label>
                        <input type="date" class="form-control" name="published_at" required value="{{ old('title') }}">
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group">
                        <label>Body</label>
                        <textarea rows="5" class="form-control" name="body" required>{{ old('body') }}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input id="image" class="form-control-file" type="file" name="image">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection