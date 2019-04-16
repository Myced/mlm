@extends('layouts.site')

@section('title')
    Cart
@endsection

@section('content')

<div class="main-content shop-page shoppingcart-content">
    <div class="container">
        <div class="breadcrumbs">
            <a href="#">Home</a> \ <span class="current">SHOPPING CART</span>
        </div>

        <form class="" action="{{ route('cart.update') }}" method="post">
            @csrf
            <div class="row content-form">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 content-offset">
                    <div class="cart-content">
                        <table class="shopping-cart-content">
                            <tr class="title">
                                <td class="product-thumb"></td>
                                <td class="product-name">Product Name</td>
                                <td class="price">Unit Price</td>
                                <td class="quantity-item">Qty</td>
                                <td class="total">SubTotal</td>
                                <td class="delete-item"></td>
                            </tr>

                            @if(Cart::count() == 0)
                            <tr>
                                <td colspan="7" class="text-center">
                                    <strong>
                                        <h3 class="text-bold"> Your Cart is empty </h3>
                                    </strong>
                                </td>
                            </tr>
                            @else
                                @foreach(Cart::content() as $cartItem)
                                <tr class="each-item">
                                    <td class="product-thumb">
                                        <a href="{{ route('product.detail', ['slug' => $cartItem->model->slug]) }}">
                                            <img src="{{ $cartItem->model->thumbnail }}" alt="">
                                        </a>
                                    </td>
                                    <td class="product-name" data-title="Product Name">
                                        <a href="{{ route('product.detail', ['slug' => $cartItem->model->slug]) }}"
                                            class="product-name text-bold">
                                            {{ $cartItem->name }}
                                        </a>
                                    </td>
                                    <td class="price" data-title="Unit Price">
                                        FCFA {{ number_format($cartItem->price) }}
                                    </td>
                                    <td class="quantity-item" data-title="Qty">
                                        <div class="quantity">

                                            <div class="group-quantity-button">
                                                <a class="minus" href="#"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                                <input class="input-text qty text" type="text" size="4" title="Qty"
                                                value="{{ $cartItem->qty }}" name="quantity[]">
                                                <a class="plus" href="#"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                            </div>
                                            <input type="hidden" name="rowId[]" value="{{ $cartItem->rowId }}">
                                        </div>
                                    </td>
                                    <td class="total" data-title="SubTotal">FCFA {{ $cartItem->total }}</td>
                                    <td class="delete-item" data-title="Remove">
                                        <a href="#" class="del" data-id1="{{ $cartItem->rowId }}">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif


                            <tr class="checkout-cart group-button">
                                <td colspan="6" class="left">
                                    <div class="left">
                                        <a href="{{ session()->get('_previous')['url'] }}" class="continue-shopping submit">
                                            <i class="fa fa-arrow-left"></i>
                                            Continue Shopping
                                        </a>
                                    </div>
                                    <div class="right">
                                        @if(\Cart::count() > 0)
                                        <input type="submit" class="submit update submit-btn"
                                            value="Update Shopping Cart">

                                        <a href="{{ route('cart.destroy') }}"
                                            class="submit update">
                                            Clear Shopping Cart
                                        </a>

                                        @endif
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 ">
                    <div class="proceed-checkout">
                        <h4 class="main-title">Proceed to Checkout</h4>
                        <div class="content">
                            <h5 class="title">cart Total</h5>
                            <div class="info-checkout">
                                <span class="text">Cart subtotal: </span>
                                <span class="item">FCFA {{ \Cart::subTotal() }}</span>
                            </div>
                            <div class="info-checkout shipping">
                                <span class="text">Shipping:</span><span class="item">Free shipping</span>
                            </div>
                            <div class="total-checkout">
                                <span class="text">Grand Total </span><span class="price">
                                     FCFA {{ \Cart::total() }}
                                 </span>
                            </div>
                            <div class="group-button">
                                @if(\Cart::count() > 0)
                                    <a href="{{ route('checkout') }}" class="button submit">Checkout</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>

    @include('site_includes.brands')
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".del").click(function(e){
            e.preventDefault();
            var rowId = $(this).data('id1');

            if(confirm("Are you sure you want to remove this item from your cart ?"))
            {
                var url = '/cart/remove/' + rowId;

                window.location.href= url;
            }
        });
    });
</script>
@endsection
