<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png" sizes="48 x 48">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('title')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/style.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <img src="../assets/img/favicon.png">
        </a>
        <a href="#" class="simple-text logo-normal">
          All Time Delivery
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
            <a href="#">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li>
<a href="#pageSubmenu" data-toggle="collapse"><p><i class="fa fa-tasks" aria-hidden="true"></i> Manage Data</p></a>
   <li style="margin-left:25px;">
<ul class="collapse list-unstyled" id="pageSubmenu">
   <li>
            <a href="/cuisine">
             <i class="fas fa-utensils"></i>
              <p>Cuisine</p>
            </a>
          </li>
     <li>
            <a href="/status">
             <i class="fas fa-ban"></i>
              <p>Status</p>
            </a>
          </li>
           <li>
            <a href="/document">
            <i class="fa fa-book" aria-hidden="true"></i>
              <p>Document</p>
            </a>
          </li>
           <li>
            <a href="/availableday">
              <i class="fas fa-calendar-day"></i>
              <p>Availableday</p>
            </a>
          </li>
           <li>
            <a href="/discounttype">
             <i class="fas fa-percentage"></i>
              <p>Discount Type</p>
            </a>
          </li>
          <li>
            <a href="/restauranttype">
             <i class="fas fa-hamburger"></i>
              <p>Restaurant Type</p>
            </a>
          </li>
          <li>
            <a href="/menutype">
              <i class="fa fa-filter" aria-hidden="true"></i>
              <p>Menu Type</p>
            </a>
          </li>
            <li>
            <a href="/currentstate">
              <i class="fa fa-adjust" aria-hidden="true"></i>
              <p>Current State</p>
            </a>
          </li>
              <li>
            <a href="/location">
             <i class="fa fa-location-arrow" aria-hidden="true"></i>
              <p>Location</p>
            </a>
          </li>
</ul>
</li>
           <li>
            <a href="/restaurant">
              <i class="fa fa-store"></i>
              
              <p>Restaurants</p>
            </a>
          </li>
           <li>
            <a href="./notifications.html">
              <i class="fab fa-elementor"></i>
              <p>Food Menu</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="now-ui-icons users_single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons media-2_sound-wave"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons location_world"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="panel-header panel-header-sm">
      </div>
      <div class="content" style="margin-top: 20px;">
               @yield('content')
      </div>
    </div>
  </div>
  <!-----------------Confirm Box-------------------->
<div class="modal fade" id="deletebox" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: orange;color:white;">
        <h1 class="modal-title"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></h1>
        
      </div>
      <div class="modal-body">
             <h3 class="text-center">Are you sure?</h3>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-default" id="btnno">No</button>
        <button type="submit" class="btn btn-primary" id="btnyes">Yes</button>
      </div>
</div>
  </div>
</div>
<!-----------------Alert Box------------------------>
<div class="modal fade" id="deletealert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: orange;color:white;font-size:12px;">
           <h3>Information</h3>  
      </div>
      <div class="modal-body" style="font-size:12px;">
             <h3 class="text-center"><i class="fa fa-check-circle" aria-hidden="true" style="color:green;size:100px;margin:5px;"></i>Delete Successfully</h3>
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
</div>
  </div>
</div>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
  @yield('scripts')
</body>

</html>