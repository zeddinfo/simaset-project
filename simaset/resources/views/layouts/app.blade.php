<!DOCTYPE html> 
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$title}}</title>
    @toastr_css
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="{{url('plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.theme.default.min.css"> --}}

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/components.css')}}">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!-- Datepicker -->
    <script src="{{url('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>

    <style>
     .menu{
        color: cyan;
      }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    
                
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{url('assets/img/avatar/avatar-1.png')}}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{Session::get('name')}}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
                            {{-- <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a> --}}
                            <div class="dropdown-divider"></div>
                            <a href="{{url('/auth/logout')}}" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a>Simaset</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a>Aset</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="menu-header">Master Data</li>
                        <li class="nav-item dropdown">

                            @php
                            $currentUrl = explode('/', Route::getCurrentRoute()->uri());
                            $countEndPoint = count($currentUrl);
                            ($countEndPoint == 3) ? $currentUrl = isset($currentUrl) ? '/'.$currentUrl[0].'/'.$currentUrl[1].'/'.$currentUrl[2] : '' : $currentUrl = isset($currentUrl) ? '/'.$currentUrl[0] : ''; 
                            @endphp

                            @if(isset($menuList))
                            @foreach ($menuList as $key => $r)
                            <li class="dropdown{{$key}}">
                            @if ($r->parent == 0 && $r->link == '#')
                            <a class="nav-link collapsed" href="{{$r->link}}" data-toggle="collapse"  role="button" aria-expanded="true" data-target="#collapse{{$key}}" aria-controls="collapse{{$key}}">
                            <i class="{{$r->icon}}"></i>
                              <span>{{$r->title}}</span>
                            </a>
                            @else
                            <a class="nav-link" href="{{url($r->link)}}">
                                <i class="{{$r->icon}}"></i>
                                <span>{{$r->title}}</span></a>
                            @endif
                            @if($r->sub_menu2)
                            <div class="collapse" id="collapse{{$key}}" aria-labelledby="heading{{$key}}">
                                <div class="bg-white py-2 collapse-inner rounded">
                                  @foreach ($r->sub_menu2 as $s)
                                    <a class="nav-link {{$currentUrl == $s->link ? 'active' : ''}} ml-5" href="{{url($s->link)}}">{{$s->title}}</a>
                                    @if($currentUrl == $s->link)
                                    <script>
                                      $('#collapse{{$key}}').addClass('show');
                                      // $('.dropdown{{$key}}').addClass(' menu');
                                    </script>
                                    @endif
                                  @endforeach
                                </div>
                            </div>
                            @endif
                        </li>
                        @endforeach
                        @endif
                       
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{url('assets/js/stisla.js')}}"></script>
    <script src="{{url('assets/plugins/datetime/datetime.js')}}"></script>

    <!-- JS Libraies -->
    {{-- <script src="{{url('node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="../node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> --}}

    <!-- Template JS File -->
    <script src="{{url('assets/js/scripts.js')}}"></script>
    <script src="{{url('assets/js/custom.js')}}"></script>

    <!-- Page Specific JS File -->
    <script src="{{url('assets/js/page/index.js')}}"></script>

    <!-- Datatable -->
    <script src="{{url('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('assets/js/dataTables.bootstrap4.min.js')}}"></script>



    <!-- Input Mask -->
    <script src="{{url('plugins/inputmask/inputmask.js')}}"></script>
    <script src="{{url('plugins/inputmask/jquery.inputmask.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script></script>
    <script>
        Inputmask.extendAliases({
            'numeric': {
                'groupSeparator': ',',

                'radixPoint': '.',

                'autoGroup': true,

                'removeMaskOnSubmit': true,

                'rightAlign': true,

                'autoUnmask': true,

                'unmaskAsNumber': true,
            }
        });

    </script>
    @yield('script')
</body>
@toastr_js
@toastr_render

</html>
