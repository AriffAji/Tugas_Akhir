<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  {{-- <title>Register &mdash; Stisla</title> --}}
  <title>Login</title>


  <!-- General CSS Files -->
  <link rel="stylesheet" href={{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}>
  <link rel="stylesheet" href={{asset('assets/modules/fontawesome/css/all.min.css')}}>

  <!-- CSS Libraries -->
  @stack('CSSLibs')
  
  
  @stack('page-styles')
  <!-- Template CSS -->
  <link rel="stylesheet" href={{asset('assets/css/style.css')}}>
  <link rel="stylesheet" href={{asset('assets/css/components.css')}}>
 

  <!-- Start GA -->
  <script type="text/javascript" async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA -->
</head>


<body style="background-image: linear-gradient( 135deg, #65FDF0 10%, #1D6FA3 100%);; ">
 <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand t-5">
                <img src="/assets/img/logo.png" alt="" width="100" alt="logo" class="shadow rounded-circle mt-5" >
            </div>

            <div class="card card-primary" style="border-radius:10px">
              <br>
               @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" style="border-radius:10px" role="alert">
                          {{ session()->get('success') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                @endif
              <br>
               @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" style="border-radius:10px" role="alert">
                          {{ session()->get('loginError') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                @endif
              <div class="card-header d-block text-center"><h4>Login</h4></div>
              <div class="card-body">
                <form method="post" action="/login" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" required value="{{ old('nim') }}">
                    @error('email')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      </div>
                    @enderror

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" tabindex="2" required>
                     @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      </div>
                    @enderror
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                     <div class="mt-5 text-muted text-center shadow p-3 mb-5 bg-body " style="border-radius:5px; background:white">
                        Don't have an account? <a href="/register">Create One</a>
                     </div>
              </div>
            </div>
         
            <div class="simple-footer">
              Teknik Informatika &copy; 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @stack('before-script')
  <!-- General JS Scripts -->
  <script src={{asset('assets/modules/jquery-3.3.1.min.js')}}></script>
  <script src={{asset('assets/modules/popper.js')}}></script>
  <script src={{asset('assets/modules/tooltip.js')}}></script>
  <script src={{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}></script>
  <script src={{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}></script>
  <script src={{asset('assets/modules/moment.min.js')}}></script>
  <script src={{asset('assets/js/stisla.js')}}></script>

  
  <!-- JS Libraies -->
  @stack('JSLib')

  <!-- Page Specific JS File -->
  @stack('JSFile')
  
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/auth-register.js"></script>
</body>
</html>
