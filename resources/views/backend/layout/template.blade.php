<!DOCTYPE html>
<html lang="en">

<head>

    @include('backend.include.header')

    @include('backend.include.css')

</head>

<body>

    <div class="main-wrapper">
        @include('backend.include.topbar')

        @include('backend.include.sidebar')

        @yield('body-content')

    </div>


    @include('backend.include.script')
</body>

</html>