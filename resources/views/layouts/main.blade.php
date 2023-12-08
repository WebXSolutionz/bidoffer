<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{isset($title) ? $title ." - Bid Offer" : "Bid Offer"}}</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap-5.2.2/css/bootstrap.min.css')}}" />
    <!-- //Global css  -->
    <link rel="stylesheet" href="{{asset('assets/css/global.css')}}" />
    <!-- //Author css  -->
    <link rel="stylesheet" href="{{asset('assets/css/myAccountGlobal.css')}}" />
    <!-- Buyer Make Offer add file for card  -->
    <link rel="stylesheet" href="{{asset('assets/css/buyerMakeOffer.css')}}" />
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    @stack('styles')
    <style>
        .error {
            color: red;
        }
    </style>
  </head>

  <body>
   <!-- Header  -->
  <div class="header">
    <!-- <div class="container"> -->
    <div class="subHeader">
      <div class="container d-flex justify-content-between">
        <div class="left">
          <a href="sellerWork.html">How it works for Sellers</a>
          <a href="sellerWorkAgent.html">How it works for Seller’s Agents</a>
          <a href="buyerWork.html">How it works for Buyer’s</a>
        </div>
        <div class="right d-flex">
            @if(auth())
            <a class="a" href="{{route('logout')}}">Sign Out </a>
            @else
          <a class="a" href="{{route('login')}}">Sign In </a>
          <a class="a" href="{{route('register')}}">Register </a>
          @endif
          <div class="social">
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
            <a href=""><i class="fa fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar desktop-navbar">
      <div class="container d-flex justify-content-between">
        <div class="logo">
          <a href="home.html">
            <img src="{{asset('assets/pictures/logo.png')}}" alt="" />
          </a>
        </div>
        <nav>
          <a class="item" href="{{route('dashboard')}}">Home</a>
          <span class="dropdown">
            <span class="item" type="span" data-bs-toggle="dropdown" aria-expanded="false"> Seller </span>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="sellerWork.html"><i class="fa fa-angle-right"></i> How it works for Sellers</a>
              </li>
              <li>
                <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> List Property</a>
              </li>
            </ul>
          </span>
          <span class="dropdown">
            <span class="item" type="span" data-bs-toggle="dropdown" aria-expanded="false"> Buyer </span>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="buyerWork.html"><i class="fa fa-angle-right"></i> How it works for Buyers</a>
              </li>
              <li>
                <a class="dropdown-item" href="buyerMakeOffer.html"><i class="fa fa-angle-right"></i> Make an Offer on a Property</a>
              </li>
            </ul>
          </span>
          <span class="dropdown">
            <span class="item" type="span" data-bs-toggle="dropdown" aria-expanded="false"> Agents </span>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="sellerWorkAgent.html"><i class="fa fa-angle-right"></i> How it works for Seller’s Agents</a>
              </li>
              <li>
                <a class="dropdown-item" href="buyerWorkAgent.html"><i class="fa fa-angle-right"></i> How it works for Buyer’s Agent</a>
              </li>
              <li>
                <a class="dropdown-item" href="buyerMakeOffer.html"><i class="fa fa-angle-right"></i> Bid on a Property For a Buyer</a>
              </li>
              <li>
                <a class="dropdown-item" href="buyerMakeOffer.html"><i class="fa fa-angle-right"></i> List a Property For a Seller</a>
              </li>
            </ul>
          </span>
          <a class="item" href="{{route('searchListing')}}">Search Listings</a>
          <a class="item" href="faq.html">FAQ</a>
          <a class="item" href="{{route('add-listing')}}"><button class="btn">Add a Listing</button></a>
        </nav>
      </div>
    </div>
    <!-- Mobile Navbar -->
    <nav class="navbar mobile-navbar bg-light fixed-top">
      <div class="container-fluid p-0">
        <a class="logo" href="home.html"><img src="{{asset('assets/pictures/logo.png')}}" alt="" /></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end w-100" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <a class="logo" href="home.html"><h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img width="25%" src="{{asset('assets/pictures/logo.png')}}" alt="" /></h5></a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul>
              <li><a href="home.html">Home</a></li>
              <li>
                <span class="dropdown">
                  <span type="span" data-bs-toggle="dropdown" aria-expanded="false"> Seller </span>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="sellerWork.html"><i class="fa fa-angle-right"></i> How it works for Sellers</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#"><i class="fa fa-angle-right"></i> List Property</a>
                    </li>
                  </ul>
                </span>
              </li>
              <li>
                <span class="dropdown">
                  <span type="span" data-bs-toggle="dropdown" aria-expanded="false"> Buyer </span>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="buyerWork.html"><i class="fa fa-angle-right"></i> How it works for Buyers</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="buyerMakeOffer.html"><i class="fa fa-angle-right"></i> Make an Offer on a Property</a>
                    </li>
                  </ul>
                </span>
              </li>
              <li>
                <span class="dropdown">
                  <span type="span" data-bs-toggle="dropdown" aria-expanded="false"> Agents </span>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="sellerWorkAgent.html"><i class="fa fa-angle-right"></i> How it works for Seller’s Agents</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="buyerWorkAgent.html"><i class="fa fa-angle-right"></i> How it works for Buyer’s Agent</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="buyerMakeOffer.html"><i class="fa fa-angle-right"></i> Bid on a Property For a Buyer</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="buyerMakeOffer.html"><i class="fa fa-angle-right"></i> List a Property For a Seller</a>
                    </li>
                  </ul>
                </span>
              </li>
              <li>
                <a href="buyerMakeOffer.html">Search Listings</a>
              </li>
              <li><a href="faq.html">FAQ</a></li>
              <li>
                <a href="addListing.html"><button class="btn">Add a Listing</button></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!-- </div> -->
  </div>
  <!-- End  -->



@yield('content')



   <!-- Footer  -->
   <footer class="footer">
    <a href="home.html"><img src="{{asset('assets/pictures/footerLogo.png')}}" alt="footerLogo" /></a>
    <div class="footerNav">
      <a href="">About Us</a>
      <a href="">How it works Sellers</a>
      <a href="">Contact Us</a>
      <a href="">Faq's</a>
    </div>
    <div class="social">
      <a href=""><i class="fa fa-facebook"></i></a>
      <a href=""><i class="fa fa-twitter"></i></a>
      <a href=""><i class="fa fa-instagram"></i></a>
      <a href=""><i class="fa fa-youtube"></i></a>
    </div>
    <p class="text-light p-4">© 2022 Bid Your Offer All rights reserved.</p>
  </footer>
  <div class="nav-footer-nav position-fixed bottom-0 container">
    <ul class=" d-flex align-items-center justify-content-between ps-0">
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
        <a href="buyerWork.html"> <i class="fa fa-house"></i><span>Buyer</span></a>
      </li>

      <li>
        <a href="buyerWorkAgent.html"> <i class="fa fa-house"></i><span>Buyer’s Agent</span></a>
      </li>
    </ul>
  </div>
    <script src="https://kit.fontawesome.com/d7dd5c0801.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/jquery-3.6.1.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-5.2.2/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap-5.2.2/js/bootstrap.bundle.min.js')}}"></script>
    <!-- PopOver Script  -->
    <script>
      const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
      const popoverList = [...popoverTriggerList].map((popoverTriggerEl) => new bootstrap.Popover(popoverTriggerEl));
    </script>
    @stack('scripts')
  </body>
</html>
