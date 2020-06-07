<div class="minicart ">
    <div class="cart-block  box-has-content">
        <a href="{{ route('cart') }}" class="cart-icon">
            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
            <span class="count">{{ Cart::count() }}</span>
        </a>
        <span class="total-price">
            <span class="text">
                Cart:
            </span>
            F {{ Cart::subTotal() }}
        </span>
    </div>
    @if(\Cart::count() == 0)

    <div class="cart-inner cart-empty">
        <h5 class="title">You have <span class="count-item">0</span> items in your cart</h5>
    </div>

    @else

    <div class="cart-inner">
        <h5 class="title">You have <span class="count-item">{{ Cart::count() }}</span> item(s) in your cart</h5>
        <ul class="list-item">
            @foreach(Cart::content() as $cartItem)
                <li class="product-item">
                    <a href="{{ route('product.detail', ['slug' => $cartItem->model->slug]) }}"
                        class="thumb" title="{{ $cartItem->model->name }} Details">
                        <img src="{{ $cartItem->model->thumbnail }}" alt="Cart Item Image"
                        class="cart-image" width="80px" height="80px">
                    </a>
                    <div class="info">
                        <a href="{{ route('product.detail', ['slug' => $cartItem->model->slug]) }}"
                        class="product-name">
                            {{ $cartItem->model->name }}
                        </a>
                        <div class="product-item-qty">
                            <span class="number price">
                                <span class="qty">{{ $cartItem->qty }}</span> x
                                <span >{{ number_format($cartItem->price) }}</span>
                            </span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="subtotal">
            <span class="text">Total : </span>
            <span class="total-price">FCFA {{ Cart::total() }}</span>
        </div>
        <div class="group-button-checkout">
            <a href="{{ route('cart') }}">
                Cart
                <i class="fa fa-arrow-right"></i>
            </a>

            <a href="{{ route('checkout') }}">Checkout</a>
        </div>
    </div>

    @endif
</div>
