<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mkombozi File Sharing</title>
    <link rel="shortcut icon" href="{{ URL::to('images/mkcb.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ URL::to('assets/images/favicon.svg') }}" type="image/x-icon">
{{--    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />--}}
    <link rel="stylesheet" href="{{ URL::to('assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ URL::to('assets/css/mystyles.css') }}">
{{--    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}


    {{-- message toastr --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

</head>
<style>
    .form-group[class*=has-icon-].has-icon-left .form-select {
    padding-left: 2.5rem;
}
    /*.sidebar{*/
    /*    background-color: #0c4128;*/
    /*    margin-top: 0;*/
    /*}*/
</style>

<body>
    <div id="app">
        @yield('menu')
        {{-- content main page --}}
        @yield('content')

    </div>

{{--    <script>--}}
{{--        // Get a reference to the file input element--}}
{{--        const inputElement = document.querySelector('input[type="file"]');--}}

{{--        // Create a FilePond instance--}}
{{--        const pond = FilePond.create(inputElement);--}}
{{--    </script>--}}

    <script src="{{ URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::to('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ URL::to('assets/js/pages/dashboard.js') }}"></script>
    <script src="{{ URL::to('assets/js/main.js') }}"></script>
{{--    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}

    <script src="{{ URL::to('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ URL::to('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="{{ URL::to('assets/js/main.js') }}"></script>



</body>

</html>
