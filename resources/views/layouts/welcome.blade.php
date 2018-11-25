<!doctype html>
<html lang="{{ app()->getLocale() }}">
    @include('partials.head')
    <body>
        @include('welcome.sections.topHeader')
        @yield("content")
        <!-- Scripts -->
        <script src="{{ mix('js/main.js') }}" defer></script>
    </body>

</html>
