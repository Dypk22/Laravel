<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description-gambolthemes" content="">
      <meta name="author-gambolthemes" content="">
      <title>{{config('constants.site_name')}} | Login</title>
      <link href="{{asset('admin/assets/css/admin-style.css')}}" rel="stylesheet">
      <link href="{{asset('admin/assets/css/styles.css')}}" rel="stylesheet">
      <link href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('admin/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
   </head>
   <body class="bg-sign">
      <div id="layoutAuthentication">
         <div id="layoutAuthentication_content">
            <main>
               <div class="container">
                  <div class="row justify-content-center">
                     <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                           <div class="card-header card-sign-header">
                              <h3 class="text-center font-weight-light my-4">{{config('constants.site_name')}} Login</h3>
                           </div>
                           <div class="card-body">
                              <form action="{{ route('AdminLogin') }}" method="post">
                                @csrf
                                 <div class="form-group">
                                    <label class="form-label" for="inputEmailAddress">Email*</label>
                                    <input class="form-control py-3" id="inputEmailAddress" type="email" required name="email" value="{{old('email')}}" placeholder="Enter email address">
                                    @error('email')
                                    <div class="alert mt-3 text-14"><i class="fas fa-exclamation"></i> {{ $message }}</div>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    <label class="form-label" for="inputPassword">Password*</label>
                                    <input class="form-control py-3" id="inputPassword" type="password" required name="password" value="{{old('password')}}" placeholder="Enter password">
                                    @error('password')
                                    <div class="alert mt-3 text-14"><i class="fas fa-exclamation"></i> {{ $message }}</div>
                                    @enderror
                                 </div>
                                 <div class="form-group">
                                    @error('message')
                                    <div class="alert mt-3 text-14"><i class="fas fa-exclamation"></i> {{ $message }}</div>
                                    @enderror
                                    @if(!empty(session()->has('message')))
                                    <div class="alert mt-3 text-14"><i class="fas fa-exclamation"></i> {{session('message')}} </div>
                                    @endif                                         
                                 </div>
                                 <div class="form-group d-flex justify-content-between">
                                    <label class="form-label" style="text-decoration: underline; cursor: pointer;" onclick="window.location.href='{{url('register')}}';">Register</label>
                                    <label class="form-label" style="text-decoration: underline; cursor: pointer;" onclick="window.location.href='{{url('password-recovery')}}';">Forget Password</label>
                                 </div>
                                 <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-sign hover-btn">Login</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </main>
         </div>
      </div>
      <script src="{{asset('admin/assets/js/jquery-3.4.1.min.js')}}"></script>
      <script src="{{asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('admin/assets/js/scripts.js')}}"></script>
   </body>
</html>