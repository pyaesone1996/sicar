 <header>
        <div class="mobile-fix-option"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">

                            <div class="brand-logo">
                                <a href="/"> <img src="{{ asset('images/logos/logo.png') }}" class="img-fluid"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">

                            <div>
                                <div class="icon-nav">
                                    @php
                                        $total_amount = 0;
                                        $total_qty = 0;
                                    @endphp

                                    @if (session()->has('cart'))
                                        @foreach ((array) session('cart') ?: [] as $id => $details)
                                            @php
                                                $total_amount += $details['price'] * $details['quantity'];
                                                $total_qty = count(session('cart'));
                                            @endphp
                                        @endforeach
                                    @endif
                                    <ul>
                                        <li class="onhover-div mobile-cart">
                                            <div class="">
                                                <img src="{{ asset('images/icon/shopping-cart.png') }}"
                                                    class="img-fluid" alt="">
                                                @if ($total_qty != 0)
                                                    <span class="cart_qty_cls">{{ $total_qty }}</span>
                                                @endif
                                            </div>
                                            @if ($total_qty != 0)
                                                <ul class="show-div shopping-cart">
                                                    <a href="javascript:void(0)" class="clear-cart"
                                                        id="remove-all-cart">
                                                        clear shopping cart
                                                    </a>
                                                    @if (session('cart'))
                                                        @foreach (session('cart') as $id => $details)
                                                            <li>
                                                                <div class="media">
                                                                    <a href="{{ route('product-detail', $id) }}">
                                                                        <img class="me-3" width="40"
                                                                            src="{{ $details['image'] }}"
                                                                            alt="Generic placeholder image"></a>
                                                                    <div class="media-body">
                                                                        <a href="#">
                                                                            <h4>{{ $details['name'] }}</h4>
                                                                        </a>
                                                                        <h4><span>{{ $details['quantity'] }} x $
                                                                                {{ $details['price'] }}</span></h4>
                                                                    </div>
                                                                </div>
                                                                <div class="close-circle">
                                                                    <a href="javascript:void(0)"
                                                                        class="ps-remove-from-cart"
                                                                        data-id="{{ $id }}"><i
                                                                            class="fa fa-times"
                                                                            aria-hidden="true"></i></a>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    @endif

                                                    <li>
                                                        <div class="total">
                                                            <h5>subtotal : <span>${{ $total_amount }}</span></h5>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="buttons">
                                                            <a href="{{ route('cart') }}" class="view-cart">view
                                                                cart</a>
                                                            <a href="{{ route('checkout') }}"
                                                                class="checkout">checkout</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @else
                                                <ul class="show-div shopping-cart">
                                                    <h4 class="text-center my-1">Shopping Cart</h4>

                                                    <p class="text-center my-5">
                                                        Your cart is empty. Add some items to your cart.
                                                    </p>

                                                    <a href="/" id="go-to-shop">
                                                        continute to shopping
                                                    </a>
                                                </ul>
                                            @endif

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