<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="public/images/favicon.png">
        <title>Axia Solusi - POS</title>

        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/frame-style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/responsive.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/all.css') }}">
        <script src="{{ URL::asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/javascript.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{ URL::asset('js/javascript.js') }}"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote-lite.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </head>
    <body>

      <div class="h-100 container-fluid p-0">
        <div class="h-100 p-0 float-left sidebar-container">
          <img class="py-4 ml-4" src="{{ URL::asset('img/axiasolusi.png') }}" width="100px">
          <div class="w-100 pt-3 overflow-auto navigasi-container">
            <ul class="w-100 p-0 navigasi">
              <li>
                <a href="{{ url('main') }}" style="text-decoration: none;">
                  <div class="mx-3 my-2 py-2 parent clearfix @if(Request::segment(1) == 'main') active @endif" data-toggle="tooltip" data-placement="right" title="Home">
                    <i class="fas fa-home menu-icon"></i><span class="nav-title">Home</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="{{ url('transaksi') }}" style="text-decoration: none;">
                  <div class="mx-3 my-2 py-2 parent clearfix @if(Request::segment(1) == 'transaksi' || Request::segment(1) == 'transaksi_detail') active @endif" data-toggle="tooltip" data-placement="right" title="Transaksi">
                    <i class="fas fa-file-invoice menu-icon"></i><span class="nav-title">Transaksi</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="{{ url('barang') }}" style="text-decoration: none;">
                  <div class="mx-3 my-2 py-2 parent clearfix @if(Request::segment(1) == 'barang') active @endif" data-toggle="tooltip" data-placement="right" title="Barang">
                    <i class="fas fa-box menu-icon"></i><span class="nav-title">Barang</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="{{ url('supplier') }}" style="text-decoration: none;">
                  <div class="mx-3 my-2 py-2 parent clearfix @if(Request::segment(1) == 'supplier') active @endif" data-toggle="tooltip" data-placement="right" title="Supplier">
                    <i class="fas fa-handshake menu-icon"></i><span class="nav-title">Supplier</span>
                  </div>
                </a>
              </li>
              <li>
                <a href="{{ url('report') }}" style="text-decoration: none;">
                  <div class="mx-3 my-2 py-2 parent clearfix @if(Request::segment(1) == 'report') active @endif" data-toggle="tooltip" data-placement="right" title="Report">
                    <i class="fas fa-file menu-icon"></i><span class="nav-title">Report Transaksi</span>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="h-100 float-left content-container">
          <div id="loader-wrap-modal">
            <div id="loader-modal"></div>
          </div>

          @yield('frame')
        </div>
      </div>

      

      <script type="text/javascript">
        
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
      </script>


    </body>
</html>