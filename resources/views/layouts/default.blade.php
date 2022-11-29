<!DOCTYPE html>
<html lang="en">

<head>

    {{-- call the meta file --}}
    @include('includes.frontsite.meta')

    {{-- set title here --}}
    <title>@yield('title') | Meet Doctor</title>

    @stack('before-style')
    {{-- call the style.css here --}}
    @include('includes.frontsite.style')
    @stack('after-style')

</head>

<body>
    @include('sweetalert::alert')

    {{-- call header here --}}
    @include('components.frontsite.header')

    {{-- slot main content --}}
    @yield('content')

    {{-- call footer here --}}
    @include('components.frontsite.footer')


    @stack('before-script')
    {{-- call script.js here --}}
    @include('includes.frontsite.script')
    @stack('after-script')

    {{-- if you have a modal, you can create MODAL IN HERE --}}


</body>

</html>
