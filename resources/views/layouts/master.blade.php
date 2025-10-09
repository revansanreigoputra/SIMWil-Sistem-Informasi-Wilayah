<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem Informasi Wilayah</title>
    @include('includes.style')
    @stack('addon-style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf/notyf.min.css">

</head>

<body>
    <div class="page">
        @include('partials.sidebar')
        @include('partials.navbar')
        <div class="page-wrapper">
            @include('partials.header')
            <div class="page-body">
                <div class="container-xl">
                    @include('partials.alert')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @stack('modals')

    @include('includes.script')
    <script src="https://cdn.jsdelivr.net/npm/notyf/notyf.min.js"></script>

    <script>
        @if (session('message'))
            var notyf = new Notyf({
                position: {
                    x: 'right',
                    y: 'top'
                },
                duration: 4000
            });
            notyf.success('{{ session('message') }}');
        @endif
    </script>
    @stack('addon-script')
</body>

</html>