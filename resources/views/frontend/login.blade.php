<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory Login System</title>

    
    {{-- MDB  --}}
    <link rel="stylesheet" type="text/css" href="{{ asset("css/mdb.min.css") }}">
    {{-- bootstrap css  --}}
    <link rel="stylesheet" type="text/css" href="{{ asset("css/bootstrap.min.css") }}">
    {{-- toastr cdn  --}}
    <link rel="stylesheet" href="{{ asset("css/toastr.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/frontend.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("css/progress.css") }}">
     <link rel="stylesheet" type="text/css" href="{{ asset("css/toastrustom.css") }}">
    
  </head>
  <body>

    <div class="ProgressContent d-none">
      <div class="progress-bar">
        <div class="progress-bar-value"></div>
      </div>
    </div>
    <div class="fullScreenDiv d-none"></div>

    <div class="loginRow">
      <div class="col-10 col-sm-8 col-md-6 col-lg-5 col-xl-4">
        <div class="card">
          @if(Session::has("faild"))
            <div class="alert alert-danger" role="alert">
             <strong>{{ Session::get("faild") }}</strong>
            </div>
          @endif
          <div class="card-body">
            <h5>SIGN IN</h5>
            <form id="signFormId">
            	@csrf
              <div class="form-group">
                <div class="col-12">
                  <input type="email" name="email" class="email form-control" placeholder="Enter Your Email">
                </div>
                <div class="col-12 mt-2">
                  <input type="password" name="password" class="password form-control" placeholder="Enter Your Password">
                </div>
                <br>
                <div class="col-8 m-auto">
                  <button type="submit" class="btn form-control loginBtn">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



    <script type="text/javascript" src="{{ asset("js/jquery.min.js") }}"></script>
     <!-- MDB -->
    <script type="text/javascript" src="{{ asset("js/mdb.min.js") }}"></script>
 	<script type="text/javascript" src="{{ asset("js/bootstrap.bundle.min.js") }}" ></script>
 	<script type="text/javascript" src="{{ asset("js/popper.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset("js/toastr.min.js") }}"></script>

    <script src=" {{asset("js/frontend.js")}}" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $(".alert").fadeTo(2000, 500).slideUp(500,function(){
            $(".alert").slideUp(500);
        });
      })
    	signInFunc();
    </script>
  </body>
</html>