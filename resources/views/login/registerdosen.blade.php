<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  {{-- <title>Register &mdash; Stisla</title> --}}
  <title>Register</title>


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
  <div id="app" >
    <section class="section" >
      <div class="container mt-5" >
        <div class="row justify-content-center">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
                <img src="/assets/img/logo.png" alt="" style="height: 100px" alt="logo" >
                {{-- class="shadow-light rounded-circle" --}}
            </div>

            <div class="card card-primary" style="border-radius:10px">
              <div class="card-header d-block text-center"><h4>Hello Dosen!</h4></div>
              <div class="card-header d-block text-center"><h4>Register</h4></div>
              <div class="card-body">
                <form action="/register" method="post">
                  @csrf
                  <div class="shadow p-3 mb-5 bg-body " style="border-radius:5px">
                    <div class="form-group form-floating">
                      <label for="username">Nama Lengkap</label>
                      <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Nama Anda" value="{{ old('username') }}" required>
                      @error('username')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                  </div>

                  <div class="shadow p-3 mb-5 bg-body " style="border-radius:5px">
                    <div class="col-lg-12">
                        <div class="form-group ">
                            <label for="nim">NIP/NIPPK</label>
                            <input id="nim" type="number" class="form-control @error('nim') is-invalid @enderror " name="nim" placeholder="361955401112" value="{{ old('nim') }}" required>
                              @error('nim')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                              @enderror
                        </div>
                        <div class="form-group ">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="none@gmail.com" value="{{ old('email') }}"required>
                             @error('email')
                                  <div class="invalid-feedback">
                                      {{ $message }}
                                  </div>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="inputPassword" required>
                                @error('password')
                                      <div class="invalid-feedback">
                                          {{ $message }}
                                      </div>
                                @enderror
                            <br>
                            <input type="checkbox" onclick="tampilkanPassword()"> Tampilkan Password
                        </div>
                    </div>
                  </div>
                  <br>

                  <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Buat Akun
                    </button>
                  </div>
                </form>
                  <div class="mt-5 text-muted text-center shadow p-3 mb-5 bg-body " style="border-radius:5px; background:white">
              Sudah memiliki akun? <a href="/">Login</a>
            </div>
              </div>
            </div>
            <div class="simple-footer ">
              Teknik Informatika &copy; 2022
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  
    <script>
        function tampilkanPassword() {
            var x = document.getElementById("inputPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
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
