@extends('layouts.main')
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
@push('styles')
<link rel="stylesheet" href="assets/css/author.css" />
@endpush
@section('content')
@inject('carbon', 'Carbon\Carbon')
<div class="mainAuthor">
    <div class="container">
      <div class="card">
        <div style="max-height: 300px; overflow: hidden;">
            <img src="{{$user->cover_photo?$user->cover_url:"assets/pictures/author/banner.jpg"}}" style="width:100%; height:100%; object-fit: cover;" class="card-img-top" alt="banner">
        </div>
        <div class="card-body">
          <!-- Review  -->
          <div class="review container">
            <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
              <div class="left d-flex align-items-end flex-wrap">
                <div class="position-relative image bg-light rounded-circle">
                  <img src="{{$user->avatar?$user->avatar_url:"https://ppt1080.b-cdn.net/images/avatar/none.png"}}" alt="">
                  <span></span>
                </div>
                <div class="mt-5 ms-2">
                  <p class="mb-1"><span><b>{{$user->name}}</b></span>
                    <span class="star opacity-50" data-bs-container="body" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="0 stars based on 0 reviews.">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </span>
                  </p>
                  <span class="mb-0 opacity-50"><b class="span">{{$user_type}}</b><span class="span"> 233
                      VIEWS</span> <span>1 SUBSCRIBERS</span></span>
                </div>
              </div>
              <div class="right text-center">
                <button class="btn btn-lg ">Message Me</button>
              </div>
            </div>
          </div>
          <!-- End  -->
        </div>
      </div>
      <div class="buyerOfferContentDetails mt-3 row">
        <div class="col-sm-12 col-md-6 col-lg-9">
          <div class="cardsDetails row  justify-content-start">
            {{--  --}}
            @foreach ($pAuctions as $pa)
            <div class="col-sm-6 col-md-12 col-lg-4 mb-3">
                <div class="card" style="overflow: hidden;">
                  <div style="min-height: 202px;">
                    <img
                    src="{{url('/auction/images/'.$pa->firstImage->name)}}"
                    class="card-img-top" alt="..." style="width: 100%; height:202px; object-fit: cover;">
                  </div>
                  <div class="card-body pb-2 pt-2">
                    <div style="min-height: 56px;">
                        <h5 class="card-title"><a href="{{route('view-pl',$pa->id)}}">{{$pa->address}}</a>
                        </h5>
                    </div>
                    <div class="houseDetails mb-1">
                      <span>
                        <span class="d-inline-flex justify-content-center align-items-center gap-1"><img
                            src="assets/fontawesome/svgs/thin/bed-front.svg" alt="bed icon" width="15"><b> {{$pa->bedroom->name}}</b></span>
                        <span class="d-inline-flex justify-content-center align-items-center gap-1"><img
                            src="assets/fontawesome/svgs/thin/bath.svg" alt="bed icon" width="15"><b> {{$pa->bathroom->name}}</b></span>
                        <span class="d-inline-flex justify-content-center align-items-center gap-1"><img
                            src="assets/fontawesome/svgs/thin/ruler-triangle.svg " alt="bed icon" width="15"><b> {{number_format($pa->heated_sqft,0,"",",")}}
                          </b>Sq Ft</span>
                      </span>
                      - House for sale
                    </div>
                    <p class="card-text mb-1"><span class="badge bg-secondary">{{$pa->property_type[0]->property_type->name}}</span> <span
                        class="float-end"><span><b>MLS ID</b></span> <span>#{{$pa->mls_id}}</span></span></p>
                    <p class="m-0"><svg xmlns="http://www.w3.org/2000/svg" class="clock" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                          @php
                              $start = $carbon::now();
                              $end = $carbon::parse($pa->created_at)->addDays(30);
                              $diff = $end->diffInDays($start);
                          @endphp
                      </svg><b>{{round($pa->auction_length)<=0?"No Time Limit": $diff.'d '.$start->diff($end)->format('%H:%I:%S')}}</b></p>
                  </div>
                  <div class="card-footer bg-light">
                    <div class="row">
                      <div class="col-6 left">
                        <!-- Barcode  -->
                        <svg data-bs-container="body" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                          data-bs-placement="top" data-bs-content="Scan Qr Code" xmlns="http://www.w3.org/2000/svg"
                          fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z">
                          </path>
                        </svg>
                        <!-- <div hidden class="w-50">
                              <div id="qr-content" class="text-center w-75 m-auto">
                                <img class="w-50" src="https://www.freepnglogos.com/uploads/qr-code-png/qr-code-file-bangla-mobile-code-0.png" alt="">
                                <p>Scan QR code to view on mobile device.</p>
                              </div>
                            </div> -->
                        <!-- Message  -->
                        <svg data-bs-container="body" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                          data-bs-placement="top" data-bs-content="Send Message" xmlns="http://www.w3.org/2000/svg"
                          fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                          </path>
                        </svg>
                        <!-- FAvourite  -->
                        <svg data-bs-container="body" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                          data-bs-placement="top" data-bs-content="Add Favorites" xmlns="http://www.w3.org/2000/svg"
                          fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                          </path>
                        </svg>
                      </div>
                      <div class="col-6 right text-end">
                        <b>${{number_format($pa->starting_price,0,"",",")}}</b>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
            <!-- Card 1 -->
            {{-- <div class="col-sm-6 col-md-12 col-lg-4 mb-3">
              <div class="card">
                <img
                  src="https://bidyouroffer.com/wp-content/uploads/2022/10/165522238955562a8b07535346697508007-300x200.jpg"
                  class="card-img-top" alt="...">
                <div class="card-body pb-2 pt-2">
                  <h5 class="card-title"><a href="listingDescription.html">1199 Randall Way, Brownsburg, IN 46112 </a>
                  </h5>
                  <div class="houseDetails mb-1">
                    <span>
                      <span class="d-inline-flex justify-content-center align-items-center gap-1"><img
                          src="assets/fontawesome/svgs/thin/bed-front.svg" alt="bed icon" width="15"><b> 4</b></span>
                      <span class="d-inline-flex justify-content-center align-items-center gap-1"><img
                          src="assets/fontawesome/svgs/thin/bath.svg" alt="bed icon" width="15"><b> 2</b></span>
                      <span class="d-inline-flex justify-content-center align-items-center gap-1"><img
                          src="assets/fontawesome/svgs/thin/ruler-triangle.svg " alt="bed icon" width="15"><b> 1,643
                        </b>Sq Ft</span>
                    </span>
                    - House for sale
                  </div>
                  <p class="card-text mb-1"><span class="badge bg-secondary">land/lots</span> <span
                      class="float-end"><span><b>MLS ID</b></span> <span>#12345</span></span></p>
                  <p class="m-0"><svg xmlns="http://www.w3.org/2000/svg" class="clock" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg><b>28d 03:15:29</b></p>
                </div>
                <div class="card-footer bg-light">
                  <div class="row">
                    <div class="col-6 left">
                      <!-- Barcode  -->
                      <svg data-bs-container="body" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                        data-bs-placement="top" data-bs-content="Scan Qr Code" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z">
                        </path>
                      </svg>
                      <!-- <div hidden class="w-50">
                            <div id="qr-content" class="text-center w-75 m-auto">
                              <img class="w-50" src="https://www.freepnglogos.com/uploads/qr-code-png/qr-code-file-bangla-mobile-code-0.png" alt="">
                              <p>Scan QR code to view on mobile device.</p>
                            </div>
                          </div> -->
                      <!-- Message  -->
                      <svg data-bs-container="body" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                        data-bs-placement="top" data-bs-content="Send Message" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                        </path>
                      </svg>
                      <!-- FAvourite  -->
                      <svg data-bs-container="body" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus"
                        data-bs-placement="top" data-bs-content="Add Favorites" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                        </path>
                      </svg>
                    </div>
                    <div class="col-6 right text-end">
                      <b>$1,000</b>
                    </div>
                  </div>
                </div>
              </div>
            </div> --}}

          </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
          <div class="card">

            @inject('country', 'App\Models\Country')
            <div class="card-body">
              <h5 class="mb-3">About </h5>
              <ul class="list-group list-group-flush small text-uppercase">
                <li class="list-group-item d-flex px-0 justify-content-between flex-wrap"> <strong>Joined</strong> <span
                    class="mb-0">{{ $carbon::parse($user->created_at)->format('M d, Y') }}</span> </li>
                <li class="list-group-item d-flex px-0 justify-content-between flex-wrap"> <strong>Last Online</strong> <span
                    class="mb-0">13 Days ago</span> </li>
                <li class="list-group-item d-flex px-0 justify-content-between flex-wrap"> <strong>Location</strong> <span
                    class="mb-0">{{$user->country_id?$country::whereId($user->country_id)->first()->name:""}} <span class="flag flag-af ppt_locationflag"></span></span> </li>
                <li class="list-group-item d-flex px-0 justify-content-between flex-wrap"> <strong>User Verified</strong>
                    @if($user->email_verified_at)
                    <span
                    class="mb-0"><span class="onlinebadge online text-dark badge border px-2 bg-white"><i
                        class="fa fa-award text-success"></i> Email Verified</span></span>
                    @else
                    <span
                    class="mb-0"><span class="onlinebadge online text-dark badge border px-2 bg-white"> Not Verified</span></span>
                    @endif
                    </li>
              </ul>
            </div>
            <div class="card-footer bg-white border-top text-center">
                <button>Add Friend</button>
                <button>Block User</button>
            </div>
          </div>
        </div>

      </div>

    </div>
  </div>
@endsection
