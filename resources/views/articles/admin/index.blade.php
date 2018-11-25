@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <articles-table :articles="{{ $articles}}" ></articles-table>
    </div>
@endsection