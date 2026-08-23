<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from demo.plainadmin.com/signin by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Oct 2025 10:09:00 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="{{asset('dashboard')}}/images/favicon.svg" type="image/x-icon" />
  <title>Sign In | PlainAdmin Demo</title>

  <!-- ========== All CSS files linkup ========= -->
  <link rel="stylesheet" href="{{asset('dashboard')}}/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{asset('dashboard')}}/css/lineicons.css" />
  <link rel="stylesheet" href="{{asset('dashboard')}}/css/quill/bubble.css" />
  <link rel="stylesheet" href="{{asset('dashboard')}}/css/quill/snow.css" />
  <link rel="stylesheet" href="{{asset('dashboard')}}/css/fullcalendar.css" />
  <link rel="stylesheet" href="{{asset('dashboard')}}/css/morris.css" />
  <link rel="stylesheet" href="{{asset('dashboard')}}/css/datatable.css" />
  <link rel="stylesheet" href="{{asset('dashboard')}}/css/main.css" />
</head>

<body>

    <!-- ========== header end ========== -->

    <!-- ========== signin-section start ========== -->
    <section class="signin-section">
      <div class="">
        <!-- ========== title-wrapper start ========== -->
        {{-- <div class="title-wrapper pt-30">
          <div class="row align-items-center">
            <div class="col-md-6">
              <div class="title">
                <h2>Sign in</h2>
              </div>
            </div>
            <!-- end col -->
            <div class="col-md-6">
              <div class="breadcrumb-wrapper">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#0">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#0">Auth</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Sign in
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->
        </div> --}}
        <!-- ========== title-wrapper end ========== -->

        <div class="row g-0 auth-row">
          <div class="col-lg-6">
            <div class="auth-cover-wrapper bg-primary-100">
              <div class="auth-cover">
                <div class="title text-center">
                  <h1 class="text-primary mb-10">Welcome Back</h1>
                  <p class="text-medium">
                    Sign in to your Existing account to continue
                  </p>
                </div>
                <div class="cover-image">
                  <img src="{{asset('dashboard')}}/images/auth/signin-image.svg" alt="" />
                </div>
                <div class="shape-image">
                  <img src="{{asset('dashboard')}}/images/auth/shape.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
          <!-- end col -->
          <div class="col-lg-6">
            <div class="signin-wrapper">
              <div class="form-wrapper">
                <h6 class="mb-15">Sign In Form</h6>
                <p class="text-sm mb-25">
                  Start creating the best possible user experience for you
                  customers.
                </p>

               <div>
                    @if(session('ms'))
                    <p class="alert alert-danger">

                     {{session('ms')}}

                        </p>
                        @endif
                    </div>

                <form action="{{ route('auth_manager_check') }}" method="post" >
                    @csrf
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Email</label>
                        <input type="email" placeholder="Email" name="email" value="{{old('email')}}" />
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name="password" />
                         @error('password')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                      </div>
                    </div>


                    <!-- end col -->
                    <div class="col-12">
                      <div class="button-group d-flex justify-content-center flex-wrap">
                        <button class="main-btn primary-btn btn-hover w-100 text-center">
                          Sign In
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- end row -->
                </form>

              </div>
            </div>
          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
      </div>
    </section>
    <!-- ========== signin-section end ========== -->

    <!-- ========== footer start =========== -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 order-last order-md-first">
            <div class="copyright text-center text-md-start">
              <p class="text-sm">
                Designed and Developed by
                <a href="https://plainadmin.com/" rel="nofollow" target="_blank">
                  PlainAdmin
                </a>
              </p>
            </div>
          </div>
          <!-- end col-->
          <div class="col-md-6">
            <div class="terms d-flex justify-content-center justify-content-md-end">
              <a href="#0" class="text-sm">Term & Conditions</a>
              <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
            </div>
          </div>
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </footer>
    <!-- ========== footer end =========== -->
  </main>
  <!-- ======== main-wrapper end =========== -->

  <!-- ============ Theme Option Start ============= -->
  <button class="option-btn">
    <i class="lni lni-cog"></i>
  </button>
  <div class="option-overlay"></div>
  <div class="option-box">
    <div class="option-header">
      <h5>Settings</h5>
      <button class="option-btn-close text-gray">
        <i class="lni lni-close"></i>
      </button>
    </div>
    <h6 class="mb-10">Layout</h6>
    <ul class="mb-30">
      <li><button class="leftSidebarButton active">Left Sidebar</button></li>
      <li><button class="rightSidebarButton">Right Sidebar</button></li>
    </ul>

    <h6 class="mb-10">Theme</h6>
    <ul class="d-flex flex-wrap align-items-center">
      <li>
        <button class="lightThemeButton active">
          Light Theme + Sidebar 1
        </button>
      </li>
      <li><button class="darkThemeButton">Dark Theme + Sidebar 1</button></li>
    </ul>

    <div class="promo-box">
      <div class="promo-icon">
        <img class="mx-auto" src="{{asset('dashboard')}}/images/logo/logo-icon-big.svg" alt="Logo">
      </div>
      <h3>Upgrade to PRO</h3>
      <p>Improve your development process and start doing more with PlainAdmin PRO!</p>
      <a href="https://plainadmin.com/pro" target="_blank" rel="nofollow" class="main-btn primary-btn btn-hover">
        Upgrade to PRO
      </a>
    </div>
  </div>
  <!-- ============ Theme Option End ============= -->

  <!-- ========= All Javascript files linkup ======== -->
  <script src="{{asset('dashboard')}}/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('dashboard')}}/js/Chart.min.js"></script>
  <script src="{{asset('dashboard')}}/js/apexcharts.min.js"></script>
  <script src="{{asset('dashboard')}}/js/dynamic-pie-chart.js"></script>
  <script src="{{asset('dashboard')}}/js/moment.min.js"></script>
  <script src="{{asset('dashboard')}}/js/fullcalendar.js"></script>
  <script src="{{asset('dashboard')}}/js/jvectormap.min.js"></script>
  <script src="{{asset('dashboard')}}/js/world-merc.js"></script>
  <script src="{{asset('dashboard')}}/js/polyfill.js"></script>
  <script src="{{asset('dashboard')}}/js/quill.min.js"></script>
  <script src="{{asset('dashboard')}}/js/datatable.js"></script>
  <script src="{{asset('dashboard')}}/js/Sortable.min.js"></script>
  <script src="{{asset('dashboard')}}/js/main.js"></script>
</body>


<!-- Mirrored from demo.plainadmin.com/signin by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 06 Oct 2025 10:09:01 GMT -->
</html>
