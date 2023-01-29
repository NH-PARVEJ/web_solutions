<!DOCTYPE html>
<html lang="en">

<head>

    @include('frontend.include.header')

    @include('frontend.include.css')

</head>

<body>

    <div class="main-wrapper">
        @include('frontend.include.topbar')

        @include('frontend.include.sidebar')

        @yield('body-content')

    </div>


    @include('frontend.include.script')
</body>

</html>