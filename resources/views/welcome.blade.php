<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Material Dash</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{url('css/demo/style.css')}}">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{url('images/favicon.png')}}" />
</head>
<body>
<script src="{{url('js/preloader.js')}}"></script>
@if(\Session::has('failed'))
      <p class="alert text-info text-center p-2" style="width:100px; box-shadow:  0 0 5px 2px rgb(255 66 15 / 35%); border:4px solid red; width:200px; position:relative; top:580px; left:20px; border:none; ">{!! \Session::get('failed') !!}</p>
      @endif
      
  <div class="body-wrapper">
    <div class="main-wrapper">
      <div class="page-wrapper full-page-wrapper d-flex align-items-center justify-content-center">
        <main class="auth-page">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-6-tablet">
                <div class="mdc-card">
                    <h1 class="text-center">Admin Login</h1>
                  <form action="{{route('loginAdmin')}}" method="post" >
                    @csrf
                    <div class="mdc-layout-grid">
                      <div class="mdc-layout-grid__inner">
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100">
                            <!-- <input class="mdc-text-field__input" name="email" id="text-field-hero-input"> -->
                            <input type="email" name="email" class="mdc-text-field__input">
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Eamil</label>
                          </div>
                        </div>
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <div class="mdc-text-field w-100">
                            <!-- <input class="mdc-text-field__input" name="password" type="password" id="text-field-hero-input"> -->
                            <input type="password" name="password" class="mdc-text-field__input" >
                            <div class="mdc-line-ripple"></div>
                            <label for="text-field-hero-input" class="mdc-floating-label">Password</label>
                          </div>
                        </div>
                       
                        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
                          <input type="submit" class="mdc-button mdc-button--raised w-100" value="login">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="stretch-card mdc-layout-grid__cell--span-4-desktop mdc-layout-grid__cell--span-1-tablet"></div>
            </div>
          </div>
        </main>
      </div>
    </div>
  </div>
  <!-- <form action="{{url('/admin_loing')}}" method="post" class="text-center">
    @csrf
    name: <input type="text" name="name" /><br><br>
    email: <input type="email" name="email" /><br><br>
    pass: <input type="password" name="pass" /><br><br>
    <input type="submit" value="ok" />
  </form> -->
  <!-- plugins:js -->
  <script src="{{url('vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{url('js/material.js')}}"></script>
  <script src="{{url('js/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</html>