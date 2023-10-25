<!DOCTYPE html>

<html lang="en">

   <head>

      <meta charset="utf-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <meta name="description-gambolthemes" content="">

      <meta name="author-gambolthemes" content="">

      <title>{{config('constants.site_name')}} | Page Not Found</title>

      <link href="{{asset('admin/assets/css/admin-style.css')}}" rel="stylesheet">

      <link href="{{asset('admin/assets/css/styles.css')}}" rel="stylesheet">

      <link href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

      <link href="{{asset('admin/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

   </head>

    <style type="text/css">

    body { background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAAaCAYAAACpSkzOAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAALEgAACxIB0t1+/AAAABZ0RVh0Q3JlYXRpb24gVGltZQAxMC8yOS8xMiKqq3kAAAAcdEVYdFNvZnR3YXJlAEFkb2JlIEZpcmV3b3JrcyBDUzVxteM2AAABHklEQVRIib2Vyw6EIAxFW5idr///Qx9sfG3pLEyJ3tAwi5EmBqRo7vHawiEEERHS6x7MTMxMVv6+z3tPMUYSkfTM/R0fEaG2bbMv+Gc4nZzn+dN4HAcREa3r+hi3bcuu68jLskhVIlW073tWaYlQ9+F9IpqmSfq+fwskhdO/AwmUTJXrOuaRQNeRkOd5lq7rXmS5InmERKoER/QMvUAPlZDHcZRhGN4CSeGY+aHMqgcks5RrHv/eeh455x5KrMq2yHQdibDO6ncG/KZWL7M8xDyS1/MIO0NJqdULLS81X6/X6aR0nqBSJcPeZnlZrzN477NKURn2Nus8sjzmEII0TfMiyxUuxphVWjpJkbx0btUnshRihVv70Bv8ItXq6Asoi/ZiCbU6YgAAAABJRU5ErkJggg==);}

    .error-template {padding: 40px 15px;text-align: center;}

    .error-actions {margin-top:15px;margin-bottom:15px;}

    .error-actions .btn { margin-right:10px; }

    .btn-primary, .btn-primary:focus{

        background-color: #f55d2c !important;

        border: 1px solid #f55d2c !important;

        color: #fff !important;

        cursor: pointer;

    }

    </style>

    <body>

        <div class="container py-md-5" style="height: 100vh;">

            <div class="row">

                <div class="col-md-12">

                    <div class="error-template">

                        <h1>Unauthorised!</h1>

                        <div class="error-details">

                            Sorry, You don't have permission to access this page!

                        </div>

                        <div class="error-actions">

                            <a onclick="history.back()" class="btn btn-primary btn-lg"><i class="fas fa-angle-left"></i> Back </a>
                            @if(str_contains(url()->previous(), 'contractor'))
                            <a onclick="window.location.href='{{url('contractor/logout')}}';" class="btn btn-primary btn-lg">Login Here </a>
                            @elseif(str_contains(url()->previous(), 'builder'))
                            <a onclick="window.location.href='{{url('builder/logout')}}';" class="btn btn-primary btn-lg">Login Here </a>
                            @else
                            <a onclick="window.location.href='{{url('landowner/logout')}}';" class="btn btn-primary btn-lg">Login Here </a>
                            @endif
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </body>

</html>