@extends('layouts.admin')

@section('title')
    {{ __("Promoted Products") }}
@endsection

@section('content')
    <!-- Fixed Top Header + Footer Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-show_big_thumbnails"></i>
                Promoted  Products.
                <br>
                <small> These are products on promotion to boost orders </small>
            </h1>
        </div>
    </div>

    <!-- END Fixed Top Header + Footer Header -->


    <!-- Dummy Content -->
    @include('admin_includes.notification')

    <!-- All Products Block -->
    <div class="block full">
        <!-- All Products Title -->
        <div class="block-title">

            <h2><strong>Promoted Products</strong> </h2>
        </div>
        <!-- END All Products Title -->

        <!-- All Products Content -->
        <table id="ecom-products" class="table table-bordered table-striped table-vcenter">
            <thead>
                <tr>
                    <th class="text-center" style="width: 70px;">ID</th>
                    <th>Product Name</th>
                    <th class="text-center hidden-xs">Price (FCFA) </th>
                    <th class="hidden-xs text-center">Percent Off</th>
                    <th class=" text-center">Promo Price</th>
                    <th class="text-center"> Available </th>
                </tr>
            </thead>
            <tbody>

                @foreach($products as $product)
                    <tr>
                        <td class="text-center">
                            <a href="{{ route('admin.product.detail', ['id' => $product->id]) }}">
                                <strong> {{ $product->code }} </strong>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('admin.product.detail', ['id' => $product->id]) }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td class="text-center ">
                            <strong class="line-through">
                                {{ number_format($product->price) }}
                            </strong>
                        </td>

                        <td class="text-center">
                            <strong class="label label-danger btn-flat">
                                 - {{ $product->percent_off }} %
                             </strong>
                        </td>
                        <td class="text-center ">
                            <strong class="f-20">
                                {{ number_format($product->promotion_price) }}
                            </strong>
                        </td>
                        <td class="hidden-xs text-center">
                            @if($product->quantity == 0)
                                <span class="label label-danger" >Out of Stock</span>
                            @else
                                <span class="label label-success">Available ({{ $product->quantity }})</span>
                            @endif
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
        <!-- END All Products Content -->
    </div>
    <!-- END All Products Block -->
@endsection

@section('scripts')
    <script src="/adminn/js/pages/ecomProducts.js"></script>
    <script>
        $(function()
        {
            EcomProducts.init();
            $('.delete').click(function(){
                var id = $(this).data('id1');

                if(confirm('Do you want to delete this featured product ?'))
                {
                    url = '/admin/product/featured/' + id + '/destroy';

                    window.location.href = url;
                }
            });
        });
    </script>
@endsection
