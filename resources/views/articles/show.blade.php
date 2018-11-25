@extends('layouts.welcome')
@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card mb-4">
            @if ($article->image_path)
                <img class="card-img-top" src="{{ $article->image_path }}" alt="{{ $article->title }}'s Image">
            @endif
            <div class="card-body">
                <h6 class="card-title ">
                    <a  href="{{ route('articles.show',$article) }}">{{ $article->title }}</a>
                </h6>
                <p>
                    {{ $article->body}}
                </p>
                <a href="{{ route('articles.show',$article) }}" class="text-light">Read more ...</a>
            </div>
            @include('articles.footer',["author"=>$article->author])
        </div>
    </div>
    
@endsection