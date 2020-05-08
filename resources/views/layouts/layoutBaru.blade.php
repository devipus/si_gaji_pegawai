<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Politeknik Negeri Sriwijaya</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
 <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Favicons -->
  <link href="{{ asset('assets/img/polsri.jpg') }}" rel="icon">
  <link href="{{ asset('assets/img/polsri.jpg') }}">
  <link href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
  <link href="{{ asset('assets/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('assets/lib/bootstrap/css/bootstraps.min.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet"   href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
  <!--external css-->
  <link href="{{ asset('assets/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/zabuto_calendar.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/lib/gritter/css/jquery.gritter.css') }}"/>
  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet">
  <script src="{{ asset('assets/lib/chart-master/Chart.js') }}" rel="stylesheet" ></script>
  <script src="{{ asset('assets/dist/css/AdminLTE.min.css') }}" rel="stylesheet" ></script>
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="#" class="logo"><b>GAJI<span> Pegawai</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
             
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="#">
                  <span class="photo"><img alt="avatar" href="{{ asset('assets/img/ui-zac.jpg') }}"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="#">
                  <span class="photo"><img alt="avatar" href="{{ asset('assets/img/ui-divya.jpg') }}"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="#">
                  <span class="photo"><img alt="avatar" href="{{ asset('assets/img/ui-danro.jpg') }}"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="#">
                  <span class="photo"><img alt="avatar" href="{{ asset('assets/img/ui-sherman.jpg') }}"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>

              <li>
                <a href="#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
</ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ route('logout') }}">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="#"><img src="{{ asset('assets/img/devipus.jpg') }}"class="img-circle" width="80"></a></p>
          <h5 class="centered"> Devi Puspitasari</h5>

          <li >
            <a href="/coba/public/honor">
              <i class="fa fa-dashboard"></i>
              <span>Honor</span>
              </a>
          </li>

          <li >
            <a href="/coba/public/pajak">
              <i class="fa fa-dashboard"></i>
              <span>Pajak</span>
              </a>
          </li>

          <li >
            <a href="/coba/public/mengajar">
              <i class="fa fa-dashboard"></i>
              <span>Mengajar</span>
              </a>
          </li>

          <li >
            <a href="/coba/public/jurusan">
              <i class="fa fa-dashboard"></i>
              <span>Jurusan</span>
              </a>
          </li>

          <li >
            <a href="/coba/public/matkul">
              <i class="fa fa-dashboard"></i>
              <span>Matkul</span>
              </a>
          </li>

          <li >
            <a href="/coba/public/kelas">
              <i class="fa fa-dashboard"></i>
              <span>Kelas</span>
              </a>
          </li>

          <li >
            <a href="/coba/public/penggajian">
              <i class="fa fa-dashboard"></i>
              <span>Gaji </span>
              </a>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-share"></i> <span>Bidang Pemeriksaan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="/coba/public/lpd">
                  <i class="fa fa-circle-o"></i>
                  <span>LPD</span>
              </a>
              </li>
            </ul>
          </li>
               
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
          @yield('content')
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Devi</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
         
        </div>
        <a href="#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->

  <script src="{{ asset('assets/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  <script src="{{ asset('assets/lib/bootstrap/js/bootstrap.min.js') }}"></script>
  <script class="include" type="text/javascript" src="{{ asset('assets/lib/jquery.dcjqaccordion.2.7.js') }}"></script>
  <script src="{{ asset('assets/lib/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('assets/lib/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <script src="{{ asset('assets/lib/jquery.sparkline.js') }}"></script>
  <!--common script for all pages-->
  <script src="{{ asset('assets/lib/common-scripts.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/lib/gritter/js/jquery.gritter.js') }}"></script>
  <script type="text/javascript" src="{{ asset('assets/lib/gritter-conf.js') }}"></script>
  <!--script for this page-->
  <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/lib/sparkline-chart.js') }}"></script>
  <script src="{{ asset('assets/lib/zabuto_calendar.js') }}"></script>
  <script src="{{ asset('assets/validator/validator.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/fastclick/fastclick.js') }}"></script>
  <script src="{{ asset('assets/dist/js/datepicker.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
 
  @yield('script')
</body>

</html>
