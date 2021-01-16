<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Surat Keterangan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('layouts/header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts/sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Main content -->
            {{-- @section('container') --}}
            <div class="container">
                <div class="row">
                    <div class="col-11">
                        <h1 class="mt-3">Download Surat Disetujui</h1>

                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    {{-- <th scope="col">No</th> --}}
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr> --}}
                                @foreach($surat as $mhs)
                                @if ($mhs->id == auth()->id())
                                @if ($mhs->role == "mahasiswa")
                                {{-- </tr> --}}
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $mhs->name }}</td>
                                    <td>{{ $mhs->email }}</td>
                                    <td>
                                        @foreach ($mhs->suratmhs as $srtmhs)
                                        @if ($srtmhs->user_id == auth()->id())
                                        @if ($srtmhs->tindakan == "disetujui")
                                        {{ $srtmhs->surat_disetujui}}
                                        <br>
                                        @endif
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($mhs->suratmhs as $srtmhs)
                                        @if ($srtmhs->user_id == auth()->id())
                                        @if ($srtmhs->tindakan == "disetujui")
                                        <a href="/unduh/{{$srtmhs->surat_disetujui}}" class="btn btn-xs btn-primary"
                                            onclick="return confirm('Apakah anda yakin ingin mendownload file ini ?')"">download</a>
                                        <br>
                                        @endif
                                        @endif
                                        @endforeach
                                        @endif
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        @include('layouts/footer')
    </div>
    <!-- ./wrapper -->
    @include('sweetalert::alert')
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src=" {{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
                                            <!-- Bootstrap 4 -->
                                            <script
                                                src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
                                            </script>
                                            <!-- AdminLTE App -->
                                            <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>