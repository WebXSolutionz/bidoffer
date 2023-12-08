<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bid Offer</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5.2.2/css/bootstrap.min.css')}}" />
    <!-- //Global css  -->
    <link rel="stylesheet" href="{{asset('assets/css/global.css')}}" />
    <!-- Sign in Css  -->
    <link rel="stylesheet" href="{{asset('assets/css/signup.css')}}" />
    <!-- Font style  -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- //Font Icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>
        .error{
            color: red;
        }
    </style>
  </head>
  <body>
    <div class="signupMainDiv">
      <div class="row">
        <div class="col-7 leftCol">
          <img class="w-100" src="{{asset('assets/pictures/signup/signup.jpg')}}" alt="" />
        </div>
        <div class="col-5 signup p-5">
          <div class="logo">
            <a href="home.html"> <img src="{{asset('assets/pictures/logo.png')}}" alt="logo" class="navbar-brand-dark" /></a>
          </div>
          <div class="signupForm">
            <h1>Sign Up</h1>
            <p>Already a member? <a href="{{route('login')}}">Sign In</a></p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
              <div class="form-group position-relative">
                <input type="text" class="form-control" placeholder="Full Name" name="name" value="" />
                @if($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                @endif
              </div>
              <div class="form-group position-relative">
                <input type="email" placeholder="Email Address" class="form-control" name="email" id="email" value="" />
                @if($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                @endif
              </div>
              <div class="form-group position-relative">
                <input type="password" class="form-control" placeholder="Password" name="password" value="" />
                @if($errors->has('password'))
                    <div class="error">{{ $errors->first('password') }}</div>
                @endif
              </div>
              <div class="form-group position-relative">
                <input type="text" class="form-control" placeholder="User Name" name="user_name" value="" />
                <i data-bs-container="body" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Your unique account name. Must be 3 to 10 characters and can include lowercase letters, numbers, and hyphens." class="fa fa-info-circle"></i>
                @if($errors->has('user_name'))
                    <div class="error">{{ $errors->first('user_name') }}</div>
                @endif
              </div>
              <select class="form-select" aria-label="Default select example" name="user_type" id="userType">
                <option value="">Pick your account type.</option>
                <option value="buyer">Buyer</option>
                <option value="buyer_agent">Buyer’s Agent</option>
                <option value="seller_agent">Seller's Agent</option>
              </select>
               @if($errors->has('user_type'))
                    <div class="error">{{ $errors->first('user_type') }}</div>
                @endif


                <div class="form-group position-relative mls_id d-none">
                    <input type="text" class="form-control" placeholder="MLS ID" name="mls_id" value="" />
                    @if($errors->has('mls_id'))
                        <div class="error">{{ $errors->first('mls_id') }}</div>
                    @endif
                </div>

              <div class="row opacity-80 d-flex align-items-center">
                <div class="form-group my-4">
                  <div class="form-check">
                    <input class="form-check-input me-2" type="checkbox" id="privacy">
                    <label class="form-check-label ml-3" for="privacy">
                      Accept <a href="">Terms & conditions</a>
                    </label>
                  </div>
               </div>
              </div>


              <div class="form-group text-center">
                {{-- <a href="verifyEmail.html"> --}}
                  <button type="submit" class="btn btn-lg font-weight-bold text-uppercase">Create Account</button>
                {{-- </a> --}}
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>
    <div class="nav-footer-nav row position-fixed bottom-0" style="padding-left: 12px">
      <div class="col-12">
        <ul class="d-flex align-items-center justify-content-between ps-0">
          <li>
            <a href="sellerWork.html"> <i class="fa fa-home"></i> <span>Seller</span></a>
          </li>

          <li>
            <a href="sellerWorkAgent.html"> <i class="fa fa-home"></i><span> Seller’s Agent</span></a>
          </li>

          <li>
            <a href="addListing.html" class="add-listing"><i class="fa fa-plus text-white"></i> </a>
          </li>

          <li>
            <a href="buyerWork.html"> <i class="fa fa-home"></i><span>Buyer</span></a>
          </li>

          <li>
            <a href="buyerWorkAgent.html"> <i class="fa fa-home"></i><span>Buyer’s Agent</span></a>
          </li>
        </ul>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/d7dd5c0801.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/bootstrap-5.2.2/js/bootstrap.proper.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-5.2.2/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-3.6.1.min.js')}}"></script>
    <!-- PopOver Script  -->
    <script>
      const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
      const popoverList = [...popoverTriggerList].map((popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl));
      $(function () {
        $('#userType').on('change', ()=>{
            let userType = $('#userType').val();
            // alert(user_type);
            if(userType=="buyer_agent" || userType == "seller_agent"){
                $('.mls_id').removeClass('d-none');
            } else {
                $('.mls_id').addClass('d-none');
            }
        })
      });
    </script>
  </body>
</html>
