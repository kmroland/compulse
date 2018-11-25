@extends('layouts.app')
@section('content')
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-center">Add or Update Article Image</h4>
                <p>{{ $article->title }}</p>
                <hr>
                <form action="{{ route("articles.images.store",$article) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class=" form-group">
                        <input type="file" name="image" class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}">
                        @if ($errors->has("image"))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="for-group">
                        <button class="btn btn-dark">
                            Upload Image
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
@endsection