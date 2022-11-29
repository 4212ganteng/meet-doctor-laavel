<!DOCTYPE html>
<html lang="en">

<head>



    {{-- set title here --}}
    <title>@yield('title') | Meet Doctor</title>

    @stack('before-style')
    {{-- call the style.css here --}}
    @include('includes.frontsite.style')
    @stack('after-style')

</head>

<body>


    {{-- slot main content --}}
    @yield('content')



    {{-- if you have a modal, you can create MODAL IN HERE --}}


</body>

</html>
