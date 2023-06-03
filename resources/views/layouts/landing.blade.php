<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Car') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/assets/scss/style.scss', 'resources/js/app.js']);

</head>

<body class="theme-color-1">

    {{-- {{ $slot }} --}}

    <!-- header start -->
    <header class="header-style-7 " style="z-index: 100">
        <div class="container-fluid px-sm-5">
            <div class="row">
                <div class="col-12">
                    <div class="main-menu">
                        <div class="menu-left">

                            <div class="brand-logo">
                                <a href="{{ url('/') }}"
                                    class="text-decoration-none h3 text-capitalize">Sithu'Cars</a>
                            </div>
                        </div>

                        <div class="menu-right ms-auto d-flex align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="icon-nav">
                                    <ul class="d-flex align-items-center">

                                        <li class="onhover-div mobile-cart">
                                            <div>
                                                <img src="{{ asset('/images/icon/trolley.png') }}" class="img-fluid"
                                                    alt="">
                                            </div>


                                            @if (session()->has('cars'))
                                                <span class="cart_qty_cls">

                                                    {{ count(session('cars', [])) }}
                                                </span>
                                            @endif

                                            <ul class="show-div shopping-cart">
                                                @php
                                                    $cars = collect(session('cars'));
                                                @endphp

                                                @forelse ($cars as $value)
                                                    <li>
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <h4>{{ $value['name'] }}</h4>
                                                                <h4><span>1 x $ {{ $value['price'] }}</span></h4>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li>
                                                        <div class="media">
                                                            Not Add To Cart
                                                        </div>
                                                    </li>
                                                @endforelse

                                                <li>
                                                    <div class="buttons">
                                                        <a href="/cart" class="view-cart">
                                                            view cart
                                                        </a>
                                                        {{-- <a href="#" class="checkout">checkout</a> --}}
                                                    </div>
                                                </li>
                                            </ul>

                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- shop body start -->
    <div class="shop-sidebar-demo container-xxl">
        {{ $slot }}

    </div>
    <!-- shop body end -->

    <footer class="bg-light py-3 mt-4">
        <p class="text-center"> &copy; All Rights Reserved By Sithu'cars Showroom</p>

    </footer>
</body>

</html>
