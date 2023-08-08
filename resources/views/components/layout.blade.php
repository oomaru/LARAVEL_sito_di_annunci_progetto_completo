<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRESTO.COM</title>
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    {{-- Sweet alert stylesheet --}}
    <link rel="stylesheet" href="sweetalert2.min.css">

    {{-- AOS --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
<body>
    <x-navbar></x-navbar>

    
    @if (session('message'))
            <div class="alert alert-success text-center">
                    {{session('message')}}
            </div>
     @endif
    
    {{$slot}}



    <x-footer></x-footer>

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11%22%3E%22%3E</script> --}}

        <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <x-livewire-alert::scripts />

    @include('sweetalert::alert')

    {{-- AOS --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    
</body>
</html>