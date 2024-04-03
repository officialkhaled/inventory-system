<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | Admin</title>

    @include('components.adminPanel.imports')

</head>

<body id="page-top">

<div id="wrapper">

    @include('components.adminPanel.sidebar')

    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            @include('components.adminPanel.navbar')

            <div class="container-fluid">

                @include('components.adminPanel.pageHeading')

                @yield('content')

            </div>
        </div>

        @include('components.adminPanel.footer')

    </div>
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
@include('components.adminPanel.logoutModal')

@include('components.adminPanel.scripts')

</body>

</html>
