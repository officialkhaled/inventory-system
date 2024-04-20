<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ !empty($header_title) ? $header_title : '' }} | INV MNG SYS</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    @include('components.adminPanel.imports')

</head>

<body id="page-top">
    <div id="wrapper">

        @include('components.adminPanel.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @include('components.adminPanel.navbar')

                <div class="container-fluid">

                    @yield('content')

                </div>
            </div>

            @include('components.adminPanel.footer')

        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    @include('components.adminPanel.logoutModal')

    @include('components.adminPanel.scripts')

</body>
</html>
