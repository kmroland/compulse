@extends('layouts.welcome')
@section('content')
@include('welcome.sections.banner')
<div style="height: 0; width: 0; position: absolute; display: none;">
    {!! file_get_contents(public_path('icons.svg')) !!}
</div>
@include('welcome.sections.aboutus')
@include('welcome.sections.activities')
@include('welcome.sections.join')
@include('welcome.sections.articles')
@include('welcome.sections.contactUs')
@include('welcome.sections.footer')
@endsection