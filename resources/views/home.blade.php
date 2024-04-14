@extends('layouts.main')
@section('html')
    <html data-wf-domain="academytemplate.webflow.io" data-wf-page="5f52d24bbe17c576df1c6bbe"
        data-wf-site="5f52d24bbe17c561061c6b7a" data-wf-status="1">
@endsection

@section('title', 'Student Listing |')

@section('content')
    <div data-w-id="081c0aac-b96f-7778-465c-c59646c49506"
        style="-webkit-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
        class="section wf-section">
        <div class="container-default-1209px">
            <h2 class="special-2 about-us text-center">Our <span class="font-color-primary">Achievers</span></h2>
            @foreach ($studentsByCategory as $category => $students)
            @if (count($students['students']) >= 1)
                <div>
                    <div class="mt-4">
                        <h4 class="text-muted text-xl-start text-center">{{ $category }} Exam Achievements and Scores
                        </h4>
                    </div>
                    <div class="row-divider"></div>
                    <div class="row">
                        @foreach ($students['students'] as $s)
                            <div class="col-xl-4 mt-5">
                                <div class="card" id="card{{ $s['id'] }}">
                                    <div class="inner-card card-body">
                                        <span class="custom-span" data-content="{{ $s['rank'] }}"></span>

                                        <div class="d-flex justify-content-center align-items-center">
                                            <img src="{{ asset('assets/profile_images/' . $s['profile']) }}" alt=""
                                                class="img-fluid rounded-circle">
                                        </div>
                                        <div class="h5 text-center fw-bold text-bj mt-2 text-uppercase">{{ $s['name'] }}
                                        </div>
                                        <div class="h6 text-center text-muted">MARKS - {{ $s['total_marks'] }}</div>
                                        <div class="h6 text-center text-muted">{{ $s['exam_name'] }} -
                                            {{ $s['exam_month_year'] }}</div>
                                        <h6 class="text-bj text-center">"BISJHINTUSYENS"</h6>
                                        <h6 class="text-center">Pedagogical Innovators</h6>
                                        <div class="text-center rating text-warning fs-5">
                                            @php
                                                $rating = $s['rating'];
                                                $fullStars = floor($rating);
                                                $halfStar = ceil($rating - $fullStars);
                                                $emptyStars = 5 - $fullStars - $halfStar;
                                            @endphp

                                            @for ($i = 1; $i <= $fullStars; $i++)
                                                <i class="bi bi-star-fill"></i>
                                            @endfor

                                            @if ($halfStar)
                                                <i class="bi bi-star-half"></i>
                                            @endif

                                            @for ($i = 1; $i <= $emptyStars; $i++)
                                                <i class="bi bi-star"></i>
                                            @endfor
                                        </div>
                                        <p class="text-center text-muted">
                                            {{ $s['review'] }}
                                        </p>
                                        <div class="hidden-items">
                                            <div class="row mt-2 mb-2">
                                                <div class="col text-center text-muted">
                                                    <h6>Roll - {{ $s['regno'] }}</h6>
                                                    <h6>Studying since {{ $s['since'] }}</h6>
                                                    <h6>{{ $s['state'] }}</h6>
                                                    <h6>Mode of learning - {{ $s['mode'] == 'on' ? 'Online' : 'Offline' }}</h6>
                                                    <h6>Franchise - {{ $s['franchise'] }}</h6>
                                                    <h6 class="text-center">Placement: {{ $s['placement'] }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn btn-bj px-3" onclick="expandCard({{ $s['id'] }})">More
                                                Info</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($students['count'] > 3)
                        <div data-w-id="081c0aac-b96f-7778-465c-c59646c494de"
                            style="-webkit-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                            class="container-default-1209px d-flex justify-content-center">
                            <a href="{{ route('all-students', $students['categoryName']) }}"
                                class="button-primary w-button mobile-view-btn {{ request()->is('more*') ? 'd-none' : '' }}">View
                                All </a>
                        </div>
                    @endif
                </div>
            @endif
            @endforeach
        </div>
    </div>

    <div data-w-id="458a3e47-e544-5eec-ffce-58aa64417b32" class="section wf-section" id="partners">
        <div class="container-default-1209px w-container">
            <div data-w-id="081c0aac-b96f-7778-465c-c59646c494dc"
                style="-webkit-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                class="divider"></div>
        </div>
        <div data-w-id="081c0aac-b96f-7778-465c-c59646c494dd"
            style="-webkit-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
            class="section wf-section">
            <div data-w-id="081c0aac-b96f-7778-465c-c59646c494de"
                style="-webkit-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                class="container-small-615px text-center w-container">
                <h2>Official Addresses</h2>

            </div>
            <div class="container-default-1209px w-container">
                <div data-w-id="081c0aac-b96f-7778-465c-c59646c494e4"
                    style="-webkit-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                    class="w-layout-grid visit-us-grid">
                    <div class="card visit-us">

                        <div class="card-content visit-us">
                            <h3 class="title visit-us" style="color:#0c9db3"> Registered Office</h3>
                            <div class="visit-us-contact-wrapper">
                                <div class="visit-us-location-wrapper">
                                    <img src="{{ asset('assets/images/graphics/map-pin.svg') }}" alt=""
                                        class="visit-us-icon location" />
                                    <div class="visit-us-location-text">C/O Jhintu Baidya Adhikari, Ramakrishna Colony,
                                        Belonia,<br>
                                        South Tripura, Tripura – 799155</div>
                                </div>
                                <div class="spacer visit-us"></div>
                                <a href="tel:+919353383517" class="visit-us-phone-number-wrapper w-inline-block">
                                    <img src="{{ asset('assets/images/graphics/phone.svg') }}" alt=""
                                        class="visit-us-icon" />
                                    <div class="visit-us-phone-number-text">+91 93533 83517</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card visit-us">

                        <div class="card-content visit-us">
                            <h3 class="title visit-us" style="color:#0c9db3"> Corporate Office</h3>
                            <div class="visit-us-contact-wrapper">
                                <div class="visit-us-location-wrapper">
                                    <img src="{{ asset('assets/images/graphics/map-pin.svg') }}" alt=""
                                        class="visit-us-icon location" />
                                    <div class="visit-us-location-text">KUDCEMP Building, 2nd Floor, MCC Commercial
                                        Complex, Mallikatte, Kadri, Mangalore, Karnataka – 575002</div>
                                </div>
                                <div class="spacer visit-us"></div>
                                <a href="tel:+919353383517" class="visit-us-phone-number-wrapper w-inline-block">
                                    <img src="{{ asset('assets/images/graphics/phone.svg') }}" alt=""
                                        class="visit-us-icon" />
                                    <div class="visit-us-phone-number-text">+91 93533 83517</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-w-id="081c0aac-b96f-7778-465c-c59646c49503"
                    style="-webkit-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 0, 0) scale3d(0.97, 0.97, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                    class="vc-flex">
                </div>
            </div>
        </div>

        <div class="container-default-1209px w-container">
            <div data-w-id="081c0aac-b96f-7778-465c-c59646c49526"
                style="-webkit-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 48PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                class="divider"></div>
        </div>
    @endsection
