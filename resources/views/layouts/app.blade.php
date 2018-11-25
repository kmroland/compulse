<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
    <div id="app">
       @include('welcome.sections.topHeader')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ mix('js/admin.js') }}" defer></script>
</body>
</html>
