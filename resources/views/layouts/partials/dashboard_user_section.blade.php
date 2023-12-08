@php
$user = Auth::user();
if($user->user_type=="buyer"){
    $user_type = 'Buyer';
} else if($user->user_type=="buyer_agent") {
    $user_type = 'Buyer\'s Agent';
} else if($user->user_type=="seller_agent") {
    $user_type = 'Seller\'s Agent';
} else {
    $user_type = 'Admin';
}
@endphp
<div class="card">
    <div class="card-body">
      <!-- Review  -->
      <div class="review container">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
          <a href="{{ route('author') }}">
            <div class="left d-flex align-items-center flex-wrap">
              <div class="position-relative image">
                <img src="{{$user->avatar?$user->avatar:"https://ppt1080.b-cdn.net/images/avatar/none.png"}}" alt="" />
              </div>
              <div class="ms-2">
                <p class="mb-2">
                  <span><b>{{auth()->user()->name}}</b></span>
                  <span class="star opacity-50" data-bs-container="body" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="0 stars based on 0 reviews.">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                  </span>
                </p>
                <span class="mb-0 opacity-50 text-sm-center sm">{{$user_type}} • {{auth()->user()->email}}</span>
              </div>
            </div>
          </a>
          <div class="right text-center">
            <a href="addListing.html"><button class="btn btn-lg">Add Auction</button></a>
            <button class="btn btn-lg" onclick="window.location = '{{ route('logout') }}';">Logout</button>
          </div>
        </div>
      </div>
      <!-- End  -->
    </div>
  </div>
