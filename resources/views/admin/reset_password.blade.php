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
                              <form action="{{ url('reset_password_form') }}" method="post">
                                @csrf
                                 <div class="form-group">
                                    <label class="form-label" for="inputEmailAddress">Enter New password*</label>
                                    <input class="form-control py-3" id="inputEmailAddress" type="password" required name="password" value="{{old('password')}}" placeholder="Enter password address">
                                    @error('password')
                                    <div class="alert mt-3 text-14"><i class="fas fa-exclamation"></i> {{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="id" value="{{$uid}}">
                                 </div>
                                 @if(!empty(session()->has('message')))
                                 <div class="form-group">
                                    <div class="alert mt-3 text-14"><i class="fas fa-exclamation"></i> {{session('message')}} </div>
                                 </div>
                                 @endif                                         
                                 <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                    <button type="submit" class="btn btn-sign hover-btn">Next</button>
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