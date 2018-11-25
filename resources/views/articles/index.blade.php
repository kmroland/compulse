@extends('layouts.welcome')
@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-8">
            @guest
            <div class="alert alert-primary">
                <div class="alert-body">
                    Kindly <a href="{{ route('login') }}" class="text-accent">login</a> to publish new articles
                </div>
            </div>
            <hr>
            @endguest
            @forelse ($articles as $article)
              @include('articles.article')
              @empty
              <div class="alert alert-primary">
                  <div class="alert-body">
                      There are no   published articles articles
                  </div>
              </div>
            @endforelse
            <div class="d-flex justify-content-center">
                {{ $articles->links() }}
            </div>
        </div>
        <div class="col-md-3 ml-auto">
            @include('articles.filters')
        </div>
    </div>
</div>
   
@endsection