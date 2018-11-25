@inject('article', 'App\Article')
@extends('layouts.welcome')
@section('content')
<div class="col-md-8 mx-auto">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Create A new Article</h4>
            @include('articles.form')
        </div>
    </div>
</div>

@endsection